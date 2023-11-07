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
        Schema::create('iptbm_ip_agent_contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ip_application_id')->constrained('iptbm_ip_alerts')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('type')->nullable()->comment('[telephone,mobile,fax,email]');
            $table->string('contact')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iptbm_ip_agent_contacts');
    }
};
