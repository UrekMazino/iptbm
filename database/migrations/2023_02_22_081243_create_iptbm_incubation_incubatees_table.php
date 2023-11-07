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
        Schema::create('iptbm_incubation_incubatees', function (Blueprint $table) {
            $table->id();
            $table->string('classification')->nullable();
            $table->boolean('with business_plan')->nullable();
            $table->string('business_type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iptbm_incubation_incubatees');
    }
};
