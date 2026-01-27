<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Data Isolation 
            $table->string('tmdb_id');
            $table->string('title');
            $table->string('poster_path')->nullable();
            $table->text('personal_notes')->nullable(); // Untuk fitur Update catatan 
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('movies');
    }
};