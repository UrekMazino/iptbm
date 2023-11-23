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
        Schema::table('iptbm_inventors', function (Blueprint $table) {
            $table->tinyInteger('agency')->nullable()->after('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('iptbm_inventors', function (Blueprint $table) {
            $table->dropColumn('agency');
        });
    }
};
