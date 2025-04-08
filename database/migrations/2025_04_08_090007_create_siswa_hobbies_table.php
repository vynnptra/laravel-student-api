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
        Schema::create('siswa_hobbies', function (Blueprint $table) {
            $table->foreignId('siswa_id')->constrained('siswas', 'id')->onDelete('cascade');
            $table->foreignId('hobby_id')->constrained('hobbies', 'id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa_hobbies');
    }
};
