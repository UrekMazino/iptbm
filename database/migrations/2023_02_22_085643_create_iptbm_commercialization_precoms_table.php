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
        Schema::create('iptbm_commercialization_precoms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('technology_id')->constrained('iptbm_technology_profiles')->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('pre_com_tech_name')->nullable();
            $table->string('market_study_summary')->nullable();
            $table->double('starting_capital')->nullable();
            $table->double('return_of_investment')->nullable();
            $table->double('breakeven')->nullable();
            $table->string('valuation_summary')->nullable();
            $table->string('freedom_operate_summary')->nullable();
            $table->string('proposed_term_sheet')->nullable();
            $table->string('fairness_opinion_report')->nullable();
            //    $table->string('commercialization_mode')->comment('Licensing Agreement/s,Outright sale,Joint venture,Start-up,Spin-off')->nullable();
            $table->double('estimated_acquisition_cost')->nullable();
            $table->string('video_clips')->nullable();
            $table->string('agreement_copy')->nullable();
            $table->string('financial_analysis')->nullable();
            $table->string('mach_test_cert')->nullable();
            $table->string('feasibility_study')->nullable();
            $table->string('business_model')->nullable();
            $table->string('income_gen_trans')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iptbm_commercialization_precoms');
    }
};
