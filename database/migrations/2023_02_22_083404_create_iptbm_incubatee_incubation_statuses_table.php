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
        Schema::create('iptbm_incubatee_incubation_statuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('incubation_id')->constrained('iptbm_incubation_incubatees')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('incubation_status')->nullable();
            $table->string('accepted_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iptbm_incubatee_incubation_statuses');
    }
};
