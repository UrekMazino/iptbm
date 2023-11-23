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
        Schema::create('iptbm_ip_alert_notification_settups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ip_alert_task_id')->constrained('iptbm_ip_alert_tasks')->cascadeOnDelete()->cascadeOnUpdate();
            /**
             * need google calendar
             *
             */
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iptbm_ip_alert_notification_settups');
    }
};
