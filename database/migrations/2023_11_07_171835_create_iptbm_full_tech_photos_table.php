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
        Schema::create('iptbm_full_tech_photos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('iptbm_full_tech_descriptions_id')->constrained('iptbm_full_tech_descriptions')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('file_type')->comment('pdf,jpg,png');
            $table->text('file_description')->nullable();
            $table->text('file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iptbm_full_tech_photos');
    }
};
