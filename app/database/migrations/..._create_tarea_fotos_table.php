<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tarea_fotos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tarea_id')->constrained('tareas')->onDelete('cascade');

            $table->string('url_imagen');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tarea_fotos');
    }
};