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
        Schema::create('abh_technology_other_coms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('abh_technology_industry_id')->constrained('abh_technology_industries')->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('other_commodity_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abh_technology_other_coms');
    }
};
