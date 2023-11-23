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
        Schema::create('abh_projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('abh_profiles_id')->constrained('abh_profiles')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('project_name')->comment('save and get list of title to other table (multiple entries)')->nullable();
            $table->string('project_leader')->comment('together with ip_projects_title table')->nullable();
            $table->date('implementation_period')->comment('together with ip_projects_title table')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abh_projects');
    }
};
