<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('postulaciones', function (Blueprint $table) {

            $table->id('id_postulacion');

            $table->foreignId('id_labor')
                  ->constrained('publicaciones', 'id_labor')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();

            $table->foreignId('id_trabajador')
                  ->constrained('users')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();

            $table->text('mensaje');

            $table->decimal('precio_referencial',10,2)->nullable();

            $table->date('fecha_postulacion');

            $table->enum('estado',[
                'Pendiente',
                'Aceptada',
                'Rechazada',
                'Cancelada'
            ])->default('Pendiente');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('postulaciones');
    }
};