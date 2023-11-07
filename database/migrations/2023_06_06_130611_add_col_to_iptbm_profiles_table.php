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
        Schema::table('iptbm_profiles', function (Blueprint $table) {
        //    $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('region_id')->nullable()->constrained('iptbm_regions')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('agency_id')->nullable()->constrained('iptbm_agencies')->cascadeOnUpdate()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('iptbm_profiles', function (Blueprint $table) {
            $table->dropColumn('region_id');
            $table->dropColumn('agency_id');
            $table->dropColumn('user_id');
        });
    }
};
