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
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('name', 'first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('avatar')->nullable();
            $table->unsignedBigInteger('usercredential_id')->nullable();
            $table->foreign('usercredential_id')->references('id')->on('user_credentials')->onDelete('cascade');
            $table->dropColumn(['email', 'password', 'email_verified_at', 'remember_token', 'created_at', 'updated_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
