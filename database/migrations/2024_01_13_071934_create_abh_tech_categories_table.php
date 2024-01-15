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
        Schema::create('abh_tech_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('abh_tech_industries_id')->constrained('abh_tech_industries')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abh_tech_categories');
    }
};
