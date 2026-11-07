<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('calificaciones', function (Blueprint $table) {

            $table->id('id_calificacion');

            $table->foreignId('id_contratacion')
                  ->constrained('contrataciones', 'id_contratacion')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();

            $table->foreignId('id_emisor')
                  ->constrained('users')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();

            $table->foreignId('id_receptor')
                  ->constrained('users')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();

            $table->tinyInteger('puntuacion');

            $table->text('comentario')->nullable();

            $table->date('fecha_calificacion');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('calificaciones');
    }
};