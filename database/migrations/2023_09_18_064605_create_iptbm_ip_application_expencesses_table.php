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
        Schema::create('iptbm_ip_application_expencesses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('iptbm_ip_alerts_id')->constrained('iptbm_ip_alerts')->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('description');
            $table->double('amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iptbm_ip_application_expencesses');
    }
};
