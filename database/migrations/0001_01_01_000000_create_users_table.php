<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {

            $table->id();

            $table->string('ci',20)->unique();

            $table->string('nombre',100);

            $table->string('apellido',100);

            $table->string('email')->unique();

            $table->string('telefono',20)->nullable();

            $table->string('direccion')->nullable();

            $table->string('password');

            $table->foreignId('id_rol')
                  ->constrained('roles','id_rol');
$table->text('habilidades')->nullable();

$table->string('experiencia',100)->nullable();

$table->text('descripcion')->nullable();
            $table->boolean('estado')->default(true);

            $table->rememberToken();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};