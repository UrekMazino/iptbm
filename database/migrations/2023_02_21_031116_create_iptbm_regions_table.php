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
        Schema::create('iptbm_regions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('rrdcc_chair')->nullable();
            $table->string('consortium')->nullable();
            $table->string('consortium_director')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iptbm_regions');
    }
};
