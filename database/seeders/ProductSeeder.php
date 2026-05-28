<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $laptops = Category::where('name', 'Laptops')->first();
        $monitores = Category::where('name', 'Monitores')->first();
        $perifericos = Category::where('name', 'Periféricos')->first();
        $accesorios = Category::where('name', 'Accesorios')->first();
        $impresoras = Category::where('name', 'Impresoras')->first();

        $products = [
            [
                'category_id' => $laptops?->id,
                'name' => 'Lenovo ThinkPad E14',
                'description' => 'Laptop empresarial para trabajo y productividad.',
                'price' => 2800.00,
                'stock' => 8,
                'minimum_stock' => 3,
                'is_active' => true,
            ],
            [
                'category_id' => $laptops?->id,
                'name' => 'HP Pavilion 15',
                'description' => 'Laptop para estudio, oficina y tareas generales.',
                'price' => 2400.00,
                'stock' => 2,
                'minimum_stock' => 5,
                'is_active' => true,
            ],
            [
                'category_id' => $monitores?->id,
                'name' => 'Monitor LG 24 pulgadas',
                'description' => 'Monitor Full HD para oficina.',
                'price' => 650.00,
                'stock' => 10,
                'minimum_stock' => 4,
                'is_active' => true,
            ],
            [
                'category_id' => $perifericos?->id,
                'name' => 'Mouse Logitech M90',
                'description' => 'Mouse óptico USB para uso diario.',
                'price' => 35.00,
                'stock' => 25,
                'minimum_stock' => 10,
                'is_active' => true,
            ],
            [
                'category_id' => $perifericos?->id,
                'name' => 'Teclado Redragon Kumara',
                'description' => 'Teclado mecánico compacto para gaming y productividad.',
                'price' => 180.00,
                'stock' => 4,
                'minimum_stock' => 5,
                'is_active' => true,
            ],
            [
                'category_id' => $accesorios?->id,
                'name' => 'Cable HDMI 2m',
                'description' => 'Cable HDMI de 2 metros para monitores y proyectores.',
                'price' => 25.00,
                'stock' => 30,
                'minimum_stock' => 8,
                'is_active' => true,
            ],
            [
                'category_id' => $impresoras?->id,
                'name' => 'Impresora Epson EcoTank',
                'description' => 'Impresora multifuncional con sistema continuo de tinta.',
                'price' => 950.00,
                'stock' => 1,
                'minimum_stock' => 2,
                'is_active' => true,
            ],
        ];

        foreach ($products as $product) {
            if ($product['category_id']) {
                Product::firstOrCreate(
                    ['name' => $product['name']],
                    $product
                );
            }
        }
    }
}