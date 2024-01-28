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
        Schema::create('abh_generators_contacs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('abh_generator_id')->constrained('abh_generators')->cascadeOnUpdate()->cascadeOnDelete();
            $table->text('type')->comment('mobile,phone,fax,email')->nullable();
            $table->string('contact');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abh_generators_contacs');
    }
};
