<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Movimientos de Stock
            </h2>

            <a href="{{ route('stock-movements.create') }}"
               class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 shadow">
                Nuevo movimiento
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

                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="bg-gray-100 text-left">
                                <th class="p-3 border">ID</th>
                                <th class="p-3 border">Producto</th>
                                <th class="p-3 border">Tipo</th>
                                <th class="p-3 border">Cantidad</th>
                                <th class="p-3 border">Stock antes</th>
                                <th class="p-3 border">Stock después</th>
                                <th class="p-3 border">Usuario</th>
                                <th class="p-3 border">Motivo</th>
                                <th class="p-3 border">Fecha</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($movements as $movement)
                                <tr>
                                    <td class="p-3 border">
                                        {{ $movement->id }}
                                    </td>

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
                                        {{ $movement->stock_before }}
                                    </td>

                                    <td class="p-3 border">
                                        {{ $movement->stock_after }}
                                    </td>

                                    <td class="p-3 border">
                                        {{ $movement->user->name ?? 'Usuario eliminado' }}
                                    </td>

                                    <td class="p-3 border">
                                        {{ $movement->reason ?? 'Sin motivo' }}
                                    </td>

                                    <td class="p-3 border">
                                        {{ $movement->created_at->format('d/m/Y H:i') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="p-4 text-center text-gray-500">
                                        No hay movimientos registrados.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $movements->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>