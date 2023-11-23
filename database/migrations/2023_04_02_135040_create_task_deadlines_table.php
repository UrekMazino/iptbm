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
        Schema::create('task_deadlines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ip_alert_task_id')->constrained('iptbm_ip_alert_tasks')->cascadeOnUpdate()->cascadeOnDelete();
            $table->text('description')->nullable();
            $table->string('frequency')->nullable();
            $table->string('day_of_week')->nullable();
            $table->time('time_day')->nullable();
            $table->timestamps();
        });

        //remove the deadline and create a relationship to task stage
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_deadlines');
    }
};
