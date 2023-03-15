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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->int('id_accounts_destination', 15);
            $table->string('type', 15);
            $table->int('id_accounts_origin', 15);
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
