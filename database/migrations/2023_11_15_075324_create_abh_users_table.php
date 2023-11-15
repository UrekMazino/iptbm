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
        Schema::create('abh_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('abh_profiles_id')->constrained('abh_profiles')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name');
            $table->string('component')->comment('[IPTBM,ATBI,ABH]');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abh_users');
    }
};
