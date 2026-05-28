<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockMovement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StockMovementController extends Controller
{
    public function index()
    {
        $movements = StockMovement::with(['product', 'user'])
            ->latest()
            ->paginate(10);

        return view('stock-movements.index', compact('movements'));
    }

    public function create()
    {
        $products = Product::where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('stock-movements.create', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'type' => 'required|in:entrada,salida',
            'quantity' => 'required|integer|min:1',
            'reason' => 'nullable|string',
        ]);

        $product = Product::findOrFail($validated['product_id']);

        $stockBefore = $product->stock;

        if ($validated['type'] === 'salida' && $validated['quantity'] > $product->stock) {
            return back()
                ->withErrors(['quantity' => 'No puedes retirar más stock del disponible.'])
                ->withInput();
        }

        if ($validated['type'] === 'entrada') {
            $stockAfter = $product->stock + $validated['quantity'];
        } else {
            $stockAfter = $product->stock - $validated['quantity'];
        }

        StockMovement::create([
            'product_id' => $product->id,
            'user_id' => Auth::id(),
            'type' => $validated['type'],
            'quantity' => $validated['quantity'],
            'stock_before' => $stockBefore,
            'stock_after' => $stockAfter,
            'reason' => $validated['reason'] ?? null,
        ]);

        $product->update([
            'stock' => $stockAfter,
        ]);

        return redirect()
            ->route('stock-movements.index')
            ->with('success', 'Movimiento de stock registrado correctamente.');
    }
}