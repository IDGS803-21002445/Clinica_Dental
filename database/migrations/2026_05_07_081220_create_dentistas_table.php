<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dentistas', function (Blueprint $table) {

            $table->id();

            $table->string('nombres');

            $table->string('apellidos');

            $table->string('especialidad')->nullable();

            $table->foreignId('usuario_id')
                ->unique()
                ->nullable()
                ->constrained('usuarios')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dentistas');
    }
};