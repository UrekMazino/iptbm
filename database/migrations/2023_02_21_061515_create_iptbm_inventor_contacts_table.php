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
        Schema::create('iptbm_inventor_contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('iptbm_inventor_id')->constrained('iptbm_inventors')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('type')->nullable()->comment('[phone,mobile,fax,email]');
            $table->string('contact')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iptbm_inventor_contacts');
    }
};
