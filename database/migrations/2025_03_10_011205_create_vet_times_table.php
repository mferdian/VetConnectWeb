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
        Schema::create('vet_times', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vet_date_id')->constrained()->cascadeOnDelete();
            // Menggunakan string untuk kompatibilitas PostgreSQL
            $table->string('jam_mulai', 8); // Format: HH:MM:SS
            $table->string('jam_selesai', 8); // Format: HH:MM:SS
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vet_times');
    }
};
