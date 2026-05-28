<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Productos
            </h2>

            <a href="{{ route('products.create') }}"
               class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 shadow">
                Nuevo producto
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <div class="mb-4 flex justify-end">
                        <a href="{{ route('products.create') }}"
                           class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 shadow">
                            Nuevo producto
                        </a>
                    </div>

                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="bg-gray-100 text-left">
                                <th class="p-3 border">ID</th>
                                <th class="p-3 border">Producto</th>
                                <th class="p-3 border">Categoría</th>
                                <th class="p-3 border">Precio</th>
                                <th class="p-3 border">Stock</th>
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
                                        S/ {{ number_format($product->price, 2) }}
                                    </td>

                                    <td class="p-3 border">
                                        @if ($product->hasLowStock())
                                            <span class="px-2 py-1 text-xs bg-red-100 text-red-700 rounded">
                                                {{ $product->stock }} - Bajo stock
                                            </span>
                                        @else
                                            <span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded">
                                                {{ $product->stock }}
                                            </span>
                                        @endif
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
                                            <span class="px-2 py-1 text-xs bg-red-100 text-red-700 rounded">
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

                                            <form action="{{ route('products.destroy', $product) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('¿Seguro que deseas eliminar este producto?');">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="p-4 text-center text-gray-500">
                                        No hay productos registrados.
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