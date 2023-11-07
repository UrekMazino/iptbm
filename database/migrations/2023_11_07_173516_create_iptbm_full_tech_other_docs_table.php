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
        Schema::create('iptbm_full_tech_other_docs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('full_descriptions_id')->constrained('iptbm_full_tech_descriptions')->cascadeOnUpdate()->cascadeOnDelete();
            $table->text('file_description');
            $table->text('file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iptbm_full_tech_other_docs');
    }
};
