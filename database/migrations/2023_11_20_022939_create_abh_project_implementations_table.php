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
        Schema::create('abh_project_implementations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('abh_project_id')->constrained('abh_projects')->cascadeOnDelete()->cascadeOnUpdate();
            $table->date('date_started')->comment('get value from implementation period')->nullable();
            $table->integer('duration');
            $table->integer('extended_duration')->nullable();
            $table->double('budget');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abh_project_implementations');
    }
};
