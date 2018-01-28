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
        Schema::create('PayLog', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('member_id');
            $table->float('goods')->comment('交易金额');
            $table->tinyInteger('operation')->comment('运算 0：减  1加');
            $table->string('remark')->comment('备注');
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
        Schema::dropIfExists('PayLog');
    }
}
