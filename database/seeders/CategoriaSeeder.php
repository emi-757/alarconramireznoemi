<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        Categoria::insert([
            [
                'id_categoria' => 1,
                'nombre_categoria' => 'Construcción',
                'descripcion' => 'Trabajos relacionados con construcción y albañilería',
                'estado' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_categoria' => 2,
                'nombre_categoria' => 'Limpieza',
                'descripcion' => 'Servicios de limpieza del hogar y oficinas',
                'estado' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_categoria' => 3,
                'nombre_categoria' => 'Jardinería',
                'descripcion' => 'Mantenimiento de jardines y áreas verdes',
                'estado' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_categoria' => 4,
                'nombre_categoria' => 'Electricidad',
                'descripcion' => 'Instalaciones y reparaciones eléctricas',
                'estado' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_categoria' => 5,
                'nombre_categoria' => 'Plomería',
                'descripcion' => 'Instalaciones y reparaciones de fontanería',
                'estado' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_categoria' => 6,
                'nombre_categoria' => 'Carpintería',
                'descripcion' => 'Trabajos en madera y muebles',
                'estado' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_categoria' => 7,
                'nombre_categoria' => 'Pintura',
                'descripcion' => 'Servicios de pintura y decoración',
                'estado' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_categoria' => 8,
                'nombre_categoria' => 'Mecánica',
                'descripcion' => 'Reparación de vehículos y maquinaria',
                'estado' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_categoria' => 9,
                'nombre_categoria' => 'Tecnología',
                'descripcion' => 'Soporte técnico y reparación de equipos',
                'estado' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_categoria' => 10,
                'nombre_categoria' => 'Educación',
                'descripcion' => 'Clases particulares y tutorías',
                'estado' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_categoria' => 11,
                'nombre_categoria' => 'Transporte',
                'descripcion' => 'Servicios de transporte y mudanzas',
                'estado' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_categoria' => 12,
                'nombre_categoria' => 'Cuidado Personal',
                'descripcion' => 'Cuidado de niños, adultos mayores y mascotas',
                'estado' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_categoria' => 13,
                'nombre_categoria' => 'Cocina',
                'descripcion' => 'Servicios de cocina y catering',
                'estado' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_categoria' => 14,
                'nombre_categoria' => 'Costura',
                'descripcion' => 'Arreglos de ropa y confección',
                'estado' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_categoria' => 15,
                'nombre_categoria' => 'Otros',
                'descripcion' => 'Otros servicios no categorizados',
                'estado' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_categoria' => 16,
                'nombre_categoria' => 'Seguridad Privada',
                'descripcion' => 'Escoltas, guardaespaldas y guardias de seguridad',
                'estado' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}