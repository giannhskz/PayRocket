<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('provider_id');
            $table->dateTime('billing_date');
            $table->dateTime('expiration_date');
            $table->float('cost');
            $table->dateTime('bonus_date')->nullable();
            $table->float('bonus_amount')->nullable();
            $table->float('final_cost')->nullable();
            $table->float('foul_amount')->nullable();
            $table->dateTime('payment_date')->nullable();


            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade');
            $table->foreign('provider_id')->references('id')->on('providers')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};
