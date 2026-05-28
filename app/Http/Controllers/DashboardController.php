<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\StockMovement;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCategories = Category::count();

        $totalProducts = Product::count();

        $activeProducts = Product::where('is_active', true)->count();

        $lowStockProducts = Product::whereColumn('stock', '<=', 'minimum_stock')->count();

        $totalMovements = StockMovement::count();

        $latestMovements = StockMovement::with(['product', 'user'])
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalCategories',
            'totalProducts',
            'activeProducts',
            'lowStockProducts',
            'totalMovements',
            'latestMovements'
        ));
    }
}