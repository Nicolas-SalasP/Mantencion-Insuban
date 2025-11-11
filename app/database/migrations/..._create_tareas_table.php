<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tareas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descripcion')->nullable();
            $table->text('informe_tecnico')->nullable();

            $table->foreignId('status_id')->constrained('statuses');
            $table->foreignId('cliente_id')->constrained('clientes');
            $table->foreignId('sucursal_id')->constrained('sucursales');

            $table->foreignId('tecnico_id')->nullable()->constrained('users');

            $table->foreignId('activo_id')->nullable()->constrained('activos');
            $table->date('fecha_creacion');
            $table->dateTime('fecha_programada')->nullable();
            $table->dateTime('fecha_culminacion')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tareas');
    }
};