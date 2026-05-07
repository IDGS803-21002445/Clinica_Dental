<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('citas', function (Blueprint $table) {

            $table->id();

            $table->foreignId('paciente_id')
                ->constrained('pacientes')
                ->onDelete('cascade');

            $table->foreignId('dentista_id')
                ->constrained('dentistas')
                ->onDelete('cascade');

            $table->dateTime('fecha_hora');

            $table->enum('estatus', [
                'pendiente',
                'confirmada',
                'cancelada',
                'completada'
            ])->default('pendiente');

            $table->string('motivo')->nullable();

            $table->text('notas')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};