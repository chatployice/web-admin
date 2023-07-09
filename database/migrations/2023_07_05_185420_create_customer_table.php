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
        Schema::create('customer', function (Blueprint $table) {
            $table->id('custID');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('address');
            // $table->string('subdistrictID');
            $table->string('mobilePhone');
            $table->string('email');
            // $table->string('userName');
            // $table->string('password');
            // $table->string('imagefile');
            // $table->integer('providerID');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};
