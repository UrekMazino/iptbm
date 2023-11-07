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
        Schema::create('iptbm_ip_task_notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ip_alert_task_id')->constrained('iptbm_ip_alert_tasks')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('frequency')->comment('daily,weekly')->nullable();
            $table->text('notification_details')->comment('Display during notification')->nullable();
            $table->text('day_of_week')->nullable();
            $table->time('time_of_day')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iptbm_ip_task_notifications');
    }
};
