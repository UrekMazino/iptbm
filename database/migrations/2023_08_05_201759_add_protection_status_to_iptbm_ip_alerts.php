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
        Schema::table('iptbm_ip_alerts', function (Blueprint $table) {
            $table->foreignId('protection_status')->nullable()->constrained('iptbm_tech_protection_statuses')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('iptbm_ip_alerts', function (Blueprint $table) {
            $table->dropColumn('protection_status');
        });
    }
};
