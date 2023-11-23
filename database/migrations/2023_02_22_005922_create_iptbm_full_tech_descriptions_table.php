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
        Schema::create('iptbm_full_tech_descriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('iptbm_technology_profile_id')->constrained('iptbm_technology_profiles')->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('narrative')->nullable();
            $table->text('process_flow')->nullable();
            $table->text('requirements')->nullable();
            $table->text('significance_of_technology')->nullable();
            $table->text('limitation_of_technology')->nullable();
            $table->text('application_of_technology')->nullable();
            $table->text('other_application')->nullable();


            /*
             * $table->string('narrative')->nullable();
            $table->text('pictures_text')->nullable();
            $table->string('pictures_pdf')->nullable();
            $table->string('pictures_image')->nullable();
            $table->text('process_text')->nullable();
            $table->string('process_pdf')->nullable();
            $table->string('process_image')->nullable();
            $table->string('requirement_pdf')->nullable();
            $table->text('requirement_text')->nullable();
            $table->string('other_documents_text')->nullable();
            $table->string('other_documents_pdf')->nullable();
            $table->text('application_of_tech_text')->nullable();
            $table->string('application_of_tech_pdf')->nullable();
            $table->string('application_of_tech_image')->nullable();
            $table->text('other_application_text')->nullable();
            $table->string('other_application_pdf')->nullable();
            $table->string('other_application_image')->nullable();
            $table->text('market_potential_text')->nullable();
            $table->string('market_potential_pdf')->nullable();
            $table->string('market_potential_image')->nullable();
            $table->text('significant_text')->nullable();
            $table->string('significant_pdf')->nullable();
            $table->string('significant_image')->nullable();
            $table->text('similar_tech_text')->nullable();
            $table->string('similar_tech_pdf')->nullable();
            $table->string('similar_tech_email')->nullable();
            $table->text('limitation_text')->nullable();
            $table->string('limitation_pdf')->nullable();
            $table->string('limitation_image')->nullable();
             */
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iptbm_full_tech_descriptions');
    }
};
