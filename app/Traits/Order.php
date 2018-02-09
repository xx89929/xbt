<?php

namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

trait Order{
    use Doctor;


    public function orderDoctorSettle(){
        return $this->updateOrderLock();
    }

    protected function updateOrderLock(){
        DB::transaction(function () {
            $order = \App\Models\Order::where('is_lock',0)->whereDate('exp_at','<',Carbon::now()->toDateTimeString())->get();
            $order->map(function ($item){
                $item->update(['is_lock' => 1]);
                $this->docPayLogCreate($item);
            });
        });
    }

}