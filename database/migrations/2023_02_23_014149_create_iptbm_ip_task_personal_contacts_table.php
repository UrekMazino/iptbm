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
        Schema::create('iptbm_ip_task_personal_contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ip_task_personel_id')->constrained('iptbm_ip_task_personels')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iptbm_ip_task_personal_contacts');
    }
};
