<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberOrderAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_order_address', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('member_id')->nullable();
            $table->tinyInteger('province')->nullable();
            $table->tinyInteger('city')->nullable();
            $table->tinyInteger('district')->nullable();
            $table->string('address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_order_address');
    }
}
