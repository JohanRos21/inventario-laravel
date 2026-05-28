<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Productos con Bajo Stock
            </h2>

            <div class="flex gap-2">
                <a href="{{ route('stock-movements.create') }}"
                   class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 shadow">
                    Registrar movimiento
                </a>

                <a href="{{ route('products.index') }}"
                   class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 shadow">
                    Volver a productos
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-4 p-4 bg-yellow-100 text-yellow-800 rounded-lg">
                Aquí se muestran los productos cuyo stock actual es menor o igual al stock mínimo definido.
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="bg-gray-100 text-left">
                                <th class="p-3 border">ID</th>
                                <th class="p-3 border">Producto</th>
                                <th class="p-3 border">Categoría</th>
                                <th class="p-3 border">Stock actual</th>
                                <th class="p-3 border">Stock mínimo</th>
                                <th class="p-3 border">Estado</th>
                                <th class="p-3 border">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <td class="p-3 border">
                                        {{ $product->id }}
                                    </td>

                                    <td class="p-3 border font-medium">
                                        {{ $product->name }}
                                    </td>

                                    <td class="p-3 border">
                                        {{ $product->category->name ?? 'Sin categoría' }}
                                    </td>

                                    <td class="p-3 border">
                                        <span class="px-2 py-1 text-xs bg-red-100 text-red-700 rounded">
                                            {{ $product->stock }}
                                        </span>
                                    </td>

                                    <td class="p-3 border">
                                        {{ $product->minimum_stock }}
                                    </td>

                                    <td class="p-3 border">
                                        @if ($product->is_active)
                                            <span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded">
                                                Activo
                                            </span>
                                        @else
                                            <span class="px-2 py-1 text-xs bg-gray-100 text-gray-700 rounded">
                                                Inactivo
                                            </span>
                                        @endif
                                    </td>

                                    <td class="p-3 border">
                                        <div class="flex gap-2">
                                            <a href="{{ route('products.edit', $product) }}"
                                               class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                                Editar
                                            </a>

                                            <a href="{{ route('stock-movements.create') }}"
                                               class="px-3 py-1 bg-green-600 text-white rounded hover:bg-green-700">
                                                Reponer
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="p-4 text-center text-gray-500">
                                        No hay productos con bajo stock.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $products->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>