<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Laptops',
                'description' => 'Equipos portátiles para oficina, estudio o trabajo remoto.',
                'is_active' => true,
            ],
            [
                'name' => 'Monitores',
                'description' => 'Pantallas para computadoras de escritorio y estaciones de trabajo.',
                'is_active' => true,
            ],
            [
                'name' => 'Periféricos',
                'description' => 'Dispositivos complementarios como mouse, teclado y audífonos.',
                'is_active' => true,
            ],
            [
                'name' => 'Accesorios',
                'description' => 'Complementos tecnológicos como cables, adaptadores y soportes.',
                'is_active' => true,
            ],
            [
                'name' => 'Impresoras',
                'description' => 'Equipos de impresión para oficina o uso académico.',
                'is_active' => true,
            ],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(
                ['name' => $category['name']],
                $category
            );
        }
    }
}