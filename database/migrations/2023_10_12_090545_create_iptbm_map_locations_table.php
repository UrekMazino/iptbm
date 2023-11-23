<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('iptbm_map_locations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('iptbm_profiles_id')->constrained('iptbm_profiles')->cascadeOnUpdate()->cascadeOnDelete();
            $table->text('lat')->nullable();
            $table->text('long')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iptbm_map_locations');
    }
};
