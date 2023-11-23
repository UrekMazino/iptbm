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

        /**
         * make this as table to save all ip alert stages instread of task names
         */

        Schema::create('iptbm_ip_alert_tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ip_alert_id')->constrained('iptbm_ip_alerts')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('stage_id')->constrained('iptbm_ip_task_stages')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('task_group_name')->nullable();
            $table->string('priority')->nullable()->comment('[Low,High]');
            /**
             * add name of person,unit,email charge in separate table related to parent (ip_alert)
             */
            $table->string('task_status')->nullable()->comment('[on-going,done]');
            $table->dateTime('deadline')->nullable();

            /**
             * add notification setup to another table
             */
            $table->text('description')->nullable();
            $table->string('attachment')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iptbm_ip_alert_tasks');
    }
};
