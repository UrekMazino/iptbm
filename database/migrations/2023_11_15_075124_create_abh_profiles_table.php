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
        Schema::create('abh_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('rrdc_chair')->nullable();
            $table->string('consortium_dir')->nullable();
            $table->string('office_address')->nullable();
            $table->string('project_leader')->nullable();
            $table->string('manager')->nullable();
            $table->year('year_established')->nullable();
            $table->boolean('ip_policy')->nullable();
            $table->boolean('techno_transfer')->nullable();
            $table->string('logo')->comment('Uploaded in JPEG, PNG, or PDF copies url only')->nullable();
            $table->string('tag_line')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abh_profiles');
    }
};
