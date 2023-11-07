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
        Schema::create('iptbm_precom_tech_videos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('commercialization_precoms_id')->constrained('iptbm_commercialization_precoms')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('thumbnail')->nullable();
            $table->text('description')->nullable();
            $table->string('type')->nullable()->comment('uploaded,youtube link');
            $table->text('url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iptbm_precom_tech_videos');
    }
};
