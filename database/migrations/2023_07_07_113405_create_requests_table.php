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
        Schema::create('request', function (Blueprint $table) {
            $table->id('requestID');
            $table->string('custID');
            $table->string('dateStart');
            $table->string('timeStart');
            $table->string('hour');
            $table->string('pet');
            $table->string('note');
            $table->string('empID');
            $table->string('price');
            $table->string('address');
            $table->string('subdistrictID');
            $table->string('statusID');
            $table->string('providerID');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request');
    }
};
