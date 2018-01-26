<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateXbtStoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('xbt_store', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('store_pic')->nullable();
            $table->string('doctor')->nullable();
            $table->tinyInteger('province')->nullable();
            $table->tinyInteger('city')->nullable();
            $table->tinyInteger('district')->nullable();
            $table->string('address')->nullable();
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
        Schema::dropIfExists('xbt_store');
    }
}
