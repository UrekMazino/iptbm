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
        Schema::create('iptbm_technology_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('iptbm_profile_id')->constrained('iptbm_profiles')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('title')->nullable();
            $table->year('year_developed')->nullable();
            $table->text('tech_desc')->nullable();
            $table->string('tech_photo')->nullable();
            $table->tinyInteger('tech_owner')->nullable()->comment('agency id');
            $table->string('tech_research_proj')->nullable();
            $table->string('tech_agency_res_donor')->nullable();
            $table->double('tech_res_amount')->nullable();
            $table->string('tech_trans_plan')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iptbm_technology_profiles');
    }
};
