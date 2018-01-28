<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('account');
            $table->string('doc_password');
            $table->string('remember_token')->nullable();
            $table->string('realname');
            $table->double('goods',8,2)->default('0.00')->nullable();
            $table->string('avatar')->comment('头像')->nullable();
            $table->integer('be_store')->nullable();
            $table->integer('bank_code')->nullable()->comment('银行卡号');
            $table->integer('bank_type')->nullable()->comment('银行类型');
            $table->string('bank_branch')->nullable()->comment('开户支行');
            $table->tinyInteger('is_check')->nullable()->default(0);
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
        Schema::dropIfExists('doctors');
    }
}
