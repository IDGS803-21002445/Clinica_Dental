<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('historiales', function (Blueprint $table) {

            $table->id();

            $table->foreignId('paciente_id')
                ->constrained('pacientes')
                ->onDelete('cascade');

            $table->date('fecha');

            $table->text('diagnostico')->nullable();

            $table->text('tratamiento')->nullable();

            $table->text('observaciones')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('historiales');
    }
};