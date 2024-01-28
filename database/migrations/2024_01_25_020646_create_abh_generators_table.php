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
        Schema::create('abh_generators', function (Blueprint $table) {
            $table->id();
            $table->foreignId('abh_profile_id')->constrained('abh_profiles')->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('first_name');
            $table->string('middle_name')->nullable();
            $table->text('last_name');
            $table->string('suffix')->nullable();
            $table->text('address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abh_generators');
    }
};
