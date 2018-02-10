<?php

namespace App\Traits;

use App\Models\DocCash;
use App\Models\DocPay;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PHPUnit\Runner\Exception;

trait Doctor{

    private $docId,$docCashGoods;

    protected function docPayLogCreate($order){
        $doctor = \App\Models\Doctor::with('doc_to_doc_group')->getId($order->doctor_id)->first();
        $doc_goods = $order->order_money * ($doctor->doc_to_doc_group->ratio / 100);
        DocPay::create([
            'order_id' => $order->id,
            'doctor_id' => $order->doctor_id,
            'goods' => $doc_goods,
            'remark' => $order->subject,
            'operation' => 1,
            'remain' => $doctor->goods,
        ]);
        $doctor->increment('goods', $doc_goods);
    }

    protected function applyCash($docId,$goods){
        $this->docId = $docId;$this->docCashGoods = $goods;
        $sql = DB::transaction(function (){
            $doc = \App\Models\Doctor::getId($this->docId)->with('doc_bank')->first();
            DocCash::create([
                'doctor_id' => $doc->id,
                'goods' => $this->docCashGoods,
                'bank_type' => $doc->doc_bank->bank_id,
                'bank_branch' => $doc->bank_branch,
                'bank_code' => $doc->bank_code,
            ]);
            $doc->decrement('goods',$this->docCashGoods);
            $doc->increment('lock_goods',$this->docCashGoods);
        });
        if ($sql == null){
            return 1;
        }else{
            Log::info('提现功能出错，医生ID：',$this->docId);
            return 0;
        }
    }


    protected function CashCreate($docId,$goods){
        $this->docId = $docId;
        $this->docCashGoods = $goods;
        DB::transaction(function (){
            $doc = \App\Models\Doctor::getId($this->docId)->first();
            DocPay::create([
                'doctor_id' => $doc->id,
                'goods' => $this->docCashGoods,
                'remain' => $doc->goods,
                'operation' => 3,
                'remark' => '提现',
            ]);
            $doc->map(function ($item){
                $item->decrement('goods',$this->docCashGoods);
            });
        });
    }

    protected function getDocGoods($docId){
        $goods = \App\Models\Doctor::getId($docId)->select('goods')->first();
        return doubleval($goods->goods);
    }

    protected function valiDocBankInfo($docId){
        $bank = \App\Models\Doctor::getId($docId)->select('bank_type','bank_code','bank_branch')->first();
        if (empty($bank->bank_type) || empty($bank->bank_code) || empty($bank->bank_branch)){
            return 0;
        }
        return 1;
    }
}