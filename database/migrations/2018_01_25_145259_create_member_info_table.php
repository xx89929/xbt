<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_info', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('member_id');
            $table->tinyInteger('type')->default(1);
            $table->string('phone')->nullable();
            $table->string('nickname')->nullable();
            $table->string('email')->nullable();
            $table->string('head_pic')->nullable();
            $table->double('goods',8,2)->default(0.00);
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
        Schema::dropIfExists('member_info');
    }
}
