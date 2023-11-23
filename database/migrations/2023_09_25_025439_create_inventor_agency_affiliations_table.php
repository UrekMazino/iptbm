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
        Schema::create('inventor_agency_affiliations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('iptbm_inventors_id')->constrained('iptbm_inventors')->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('latest_agency');
            $table->date('date_affiliated');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventor_agency_affiliations');
    }
};
