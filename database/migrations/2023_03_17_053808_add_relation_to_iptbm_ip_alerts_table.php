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
            $table->foreignId('ip_type_id')->constrained('ip_types')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('iptbm_ip_alerts', function (Blueprint $table) {
            $table->dropColumn("ip_type_id");
        });
    }
};
