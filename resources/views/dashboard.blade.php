<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard de Inventario
            </h2>

            <div class="flex gap-2">
                <a href="{{ route('products.index') }}"
                   class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 shadow">
                    Productos
                </a>

                <a href="{{ route('stock-movements.create') }}"
                   class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 shadow">
                    Nuevo movimiento
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4 mb-6">
                <div class="bg-white p-5 rounded-lg shadow-sm border">
                    <p class="text-sm text-gray-500">Categorías</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $totalCategories }}</p>
                </div>

                <div class="bg-white p-5 rounded-lg shadow-sm border">
                    <p class="text-sm text-gray-500">Productos</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $totalProducts }}</p>
                </div>

                <div class="bg-white p-5 rounded-lg shadow-sm border">
                    <p class="text-sm text-gray-500">Productos activos</p>
                    <p class="text-3xl font-bold text-green-700">{{ $activeProducts }}</p>
                </div>

                <div class="bg-white p-5 rounded-lg shadow-sm border">
                    <p class="text-sm text-gray-500">Bajo stock</p>
                    <p class="text-3xl font-bold text-red-700">{{ $lowStockProducts }}</p>
                </div>

                <div class="bg-white p-5 rounded-lg shadow-sm border">
                    <p class="text-sm text-gray-500">Movimientos</p>
                    <p class="text-3xl font-bold text-indigo-700">{{ $totalMovements }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg lg:col-span-2">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold text-gray-800">
                                Últimos movimientos de stock
                            </h3>

                            <a href="{{ route('stock-movements.index') }}"
                               class="text-sm text-indigo-600 hover:text-indigo-800 font-medium">
                                Ver historial
                            </a>
                        </div>

                        <table class="w-full border-collapse">
                            <thead>
                                <tr class="bg-gray-100 text-left">
                                    <th class="p-3 border">Producto</th>
                                    <th class="p-3 border">Tipo</th>
                                    <th class="p-3 border">Cantidad</th>
                                    <th class="p-3 border">Usuario</th>
                                    <th class="p-3 border">Fecha</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($latestMovements as $movement)
                                    <tr>
                                        <td class="p-3 border font-medium">
                                            {{ $movement->product->name ?? 'Producto eliminado' }}
                                        </td>

                                        <td class="p-3 border">
                                            @if ($movement->isEntry())
                                                <span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded">
                                                    Entrada
                                                </span>
                                            @else
                                                <span class="px-2 py-1 text-xs bg-red-100 text-red-700 rounded">
                                                    Salida
                                                </span>
                                            @endif
                                        </td>

                                        <td class="p-3 border">
                                            {{ $movement->quantity }}
                                        </td>

                                        <td class="p-3 border">
                                            {{ $movement->user->name ?? 'Usuario eliminado' }}
                                        </td>

                                        <td class="p-3 border">
                                            {{ $movement->created_at->format('d/m/Y H:i') }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="p-4 text-center text-gray-500">
                                            No hay movimientos registrados.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">
                            Accesos rápidos
                        </h3>

                        <div class="space-y-3">
                            <a href="{{ route('categories.index') }}"
                               class="block w-full px-4 py-3 bg-gray-100 hover:bg-gray-200 rounded-lg text-gray-800 font-medium">
                                Gestionar categorías
                            </a>

                            <a href="{{ route('products.index') }}"
                               class="block w-full px-4 py-3 bg-gray-100 hover:bg-gray-200 rounded-lg text-gray-800 font-medium">
                                Gestionar productos
                            </a>

                            <a href="{{ route('stock-movements.index') }}"
                               class="block w-full px-4 py-3 bg-gray-100 hover:bg-gray-200 rounded-lg text-gray-800 font-medium">
                                Historial de stock
                            </a>

                            <a href="{{ route('stock-movements.create') }}"
                               class="block w-full px-4 py-3 bg-indigo-600 hover:bg-indigo-700 rounded-lg text-white font-medium">
                                Registrar movimiento
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>