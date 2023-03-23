<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *

     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table)
         {
            $table->id();
            $table->string('type', 15);
            $table->string('amount', 50);
            $table->unsignedBigInteger('account_id_origin')->nullable();
            $table->unsignedBigInteger('account_id_destination');
            $table->foreign('account_id_origin')->references('id')->on('accounts');
            $table->foreign('account_id_destination')->references('id')->on('accounts');
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     *
    
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
