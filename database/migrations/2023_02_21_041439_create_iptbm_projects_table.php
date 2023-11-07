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
        Schema::create('iptbm_projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ip_profile_id')->constrained('iptbm_profiles')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('project_name')->comment('save and get list of title to other table (multiple entries)')->nullable();
            $table->string('project_leader')->comment('together with ip_projects_title table')->nullable();
            $table->date('implementation_period')->comment('together with ip_projects_title table')->nullable();
            $table->softDeletes();
            //  $table->date('update_implementation_period')->comment('together with ip_projects_title table')->nullable();
        //    $table->double('total_budget')->comment('together with ip_projects_title table')->nullable();
         //   $table->double('year_1_budget')->comment('together with ip_projects_title table')->nullable();
         //   $table->double('year_2_budget')->comment('together with ip_projects_title table')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iptbm_projects');
    }
};
