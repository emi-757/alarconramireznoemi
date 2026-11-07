<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contrataciones', function (Blueprint $table) {

            $table->id('id_contratacion');

            $table->foreignId('id_labor')
                  ->constrained('publicaciones', 'id_labor')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();

            $table->foreignId('id_contratador')
                  ->constrained('users')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();

            $table->foreignId('id_trabajador')
                  ->constrained('users')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();

            $table->date('fecha_contratacion');

            $table->enum('estado', [
                'En proceso',
                'Finalizada',
                'Cancelada'
            ])->default('En proceso');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contrataciones');
    }
};