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
        Schema::create('banks', function (Blueprint $table) {
            $table->id();
            $table->string("user_id");
            $table->string("account_reference");
            $table->string("account_name");
            $table->string("account_number");
            $table->string("bank_name");
            $table->string("bank_code");
            $table->string("collection_channel");
            $table->string("reservation_reference");
            $table->string("reserved_account_type");
            $table->string("bvn");
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
        Schema::dropIfExists('banks');
    }
};
