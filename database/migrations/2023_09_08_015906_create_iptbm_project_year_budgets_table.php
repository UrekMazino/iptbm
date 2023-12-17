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
        Schema::create('iptbm_project_year_budgets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('iptbm_projects_id')->constrained('iptbm_projects')->cascadeOnDelete()->cascadeOnDelete();
            $table->date('date_start');
            $table->integer('duration');
            $table->integer('extended_duration')->nullable();
            $table->double('year_budget')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iptbm_project_year_budgets');
    }
};
