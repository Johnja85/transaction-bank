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
        Schema::create('third_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('idaccount',18);
            $table->string('description',255);
            $table->string('name_third',255);
            $table->integer('created_by_id');
            $table->enum('active', ['yes','no']);
            $table->foreign('created_by_id', 'third_accounts_idfk_1')->references('nit')->on('users');
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
        Schema::dropIfExists('third_accounts');
    }
};
