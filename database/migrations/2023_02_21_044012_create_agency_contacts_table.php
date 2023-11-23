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
        Schema::create('agency_contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('iptbm_agency_id')->constrained('iptbm_agencies')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('contact_type')->comment("mobile,phone,fax,email")->nullable();
            $table->string("contact")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agency_contacts');
    }
};
