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
        Schema::create('iptbm_research_industry_partners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('iptbm_tech_project_id')->constrained('iptbm_tech_research_projects')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string("industry_name")->nullable();
            $table->string("address")->nullable();
            $table->string("phone")->nullable();
            $table->string("mobile")->nullable();
            $table->string("fax")->nullable();
            $table->string("email")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iptbm_research_industry_partners');
    }
};
