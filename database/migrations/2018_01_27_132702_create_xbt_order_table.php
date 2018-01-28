<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateXbtOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('xbt_order', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_id');
            $table->string('logist_id')->unique()->comment('物流ID')->nullable();
            $table->integer('pro_id');
            $table->integer('member_id');
            $table->integer('pro_nub');
            $table->tinyInteger('deal_status')->comment('交易状态');
            $table->tinyInteger('order_status')->comment('订单状态');
            $table->double('order_money')->comment('交易金额');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('xbt_order');
    }
}
