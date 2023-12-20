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
        Schema::create('userdetails', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->text('about');
            $table->text('company');
            $table->text('job');
            $table->text('country');
            $table->text('address');
            $table->string('phone');
        });

        Schema::table('userdetails', function (Blueprint $table) {
           $table->foreign('user_id')->references('id')->on('users'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userdetails');
    }
};
