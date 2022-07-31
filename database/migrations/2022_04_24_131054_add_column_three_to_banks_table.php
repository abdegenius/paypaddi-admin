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
        Schema::table('banks', function (Blueprint $table) {
            $table->string("account_name1")->nullable();
            $table->string("account_number1")->nullable();
            $table->string("bank_name1")->nullable();
            $table->string("bank_code1")->nullable();

            $table->string("account_name2")->nullable();
            $table->string("account_number2")->nullable();
            $table->string("bank_name2")->nullable();
            $table->string("bank_code2")->nullable();

            $table->string("account_name3")->nullable();
            $table->string("account_number3")->nullable();
            $table->string("bank_name3")->nullable();
            $table->string("bank_code3")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('banks', function (Blueprint $table) {
            //
        });
    }
};
