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
        Schema::create('iptbm_extension_adoptor_contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('extension_adoptor_id')->constrained('iptbm_extension_pathways')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('type')->nullable()->comment('[phone,mobile,fax,email]');
            $table->string('contact');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iptbm_extension_adoptor_contacts');
    }
};
