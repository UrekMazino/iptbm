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
        /**
         * multiple entry per technology of ip alert related to its task
         */
        Schema::create('iptbm_ip_alerts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('technology_id')->constrained('iptbm_technology_profiles')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('application_number')->nullable();
            $table->date('date_of_filing')->nullable();
        //    $table->foreignId('protection_status')->nullable()->constrained('iptbm_tech_protection_statuses')->nullOnDelete();
            $table->text('abstract')->nullable();
            $table->string('agent_name')->nullable();
            $table->string('address')->nullable();
            $table->string('ip_total_cost')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iptbm_ip_alerts');
    }
};
