<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('account',18);
            $table->string('destination_account',18);
            $table->double('value',10,2);
            $table->string('observation');
            $table->bigInteger('created_by_id')->unsigned()->nullable();
            $table->foreign('account', 'transactions_idfk_1')->references('idaccount')->on('accounts');
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
        Schema::dropIfExists('transactions');
    }
};
