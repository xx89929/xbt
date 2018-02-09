<?php

namespace App\Traits;

use App\Models\DocPay;

trait Doctor{

    protected function docPayLogCreate($order){
        $doctor = \App\Models\Doctor::with('doc_to_doc_group')->getId($order->doctor_id)->first();
        $doc_goods = $order->order_money * ($doctor->doc_to_doc_group->ratio / 100);
        DocPay::create([
            'order_id' => $order->id,
            'doctor_id' => $order->doctor_id,
            'goods' => $doc_goods,
            'remark' => $order->subject,
            'operation' => 1,
        ]);
        $doctor->increment('goods', $doc_goods);
    }
}