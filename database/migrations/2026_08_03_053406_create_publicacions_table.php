<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('publicaciones', function (Blueprint $table) {

    $table->id('id_labor');

    $table->string('tipo',30);

    $table->string('titulo',200);

    $table->text('descripcion');

    $table->decimal('pago',10,2);

    $table->string('lugar',200);

    $table->date('fecha_publicacion');

    $table->foreignId('id_usuario')
          ->constrained('users')
          ->cascadeOnUpdate()
          ->cascadeOnDelete();

    $table->foreignId('id_categoria')
          ->constrained('categorias','id_categoria')
          ->cascadeOnUpdate()
          ->cascadeOnDelete();

    $table->boolean('estado')->default(true);

    $table->timestamps();

});
    }

    public function down(): void
    {
        Schema::dropIfExists('publicaciones');
    }
};