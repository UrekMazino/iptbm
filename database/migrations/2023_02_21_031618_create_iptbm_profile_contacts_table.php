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
        Schema::create('iptbm_profile_contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('iptbm_profiles_id')->constrained('iptbm_profiles')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('iptbm_profile_contacts');
    }
};
