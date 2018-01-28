<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocCashTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doc_cash', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dortor_id');
            $table->double('goods');
            $table->integer('bank_type');
            $table->string('bank_branch');
            $table->string('bank_code');
            $table->tinyInteger('is_cash');
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
        Schema::dropIfExists('doc_cash');
    }
}
