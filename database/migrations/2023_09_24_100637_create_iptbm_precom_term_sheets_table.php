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
        Schema::create('iptbm_precom_term_sheets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('iptbm_precoms_id')->constrained('iptbm_commercialization_precoms')->cascadeOnUpdate()->cascadeOnDelete();
            $table->text('description');
            $table->text('file_type')->comment('image or pdf');
            $table->text('file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iptbm_precom_term_sheets');
    }
};
