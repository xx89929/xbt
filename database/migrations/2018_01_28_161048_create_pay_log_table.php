<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_log', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('member_id');
            $table->double('goods',8,2)->comment('金额');
            $table->string('remark')->comment('备注、说明');
            $table->tinyInteger('operation')->comment('运算：0 减  1加');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pay_log');
    }
}
