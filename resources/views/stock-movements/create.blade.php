<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Nuevo movimiento de stock
            </h2>

            <a href="{{ route('stock-movements.index') }}"
               class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 shadow">
                Volver
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <form action="{{ route('stock-movements.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="product_id" class="block text-sm font-medium text-gray-700 mb-1">
                                Producto
                            </label>

                            <select id="product_id"
                                    name="product_id"
                                    class="w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="">Selecciona un producto</option>

                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}"
                                            {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                        {{ $product->name }} - Stock actual: {{ $product->stock }}
                                    </option>
                                @endforeach
                            </select>

                            @error('product_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="type" class="block text-sm font-medium text-gray-700 mb-1">
                                Tipo de movimiento
                            </label>

                            <select id="type"
                                    name="type"
                                    class="w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="">Selecciona un tipo</option>
                                <option value="entrada" {{ old('type') == 'entrada' ? 'selected' : '' }}>
                                    Entrada
                                </option>
                                <option value="salida" {{ old('type') == 'salida' ? 'selected' : '' }}>
                                    Salida
                                </option>
                            </select>

                            @error('type')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="quantity" class="block text-sm font-medium text-gray-700 mb-1">
                                Cantidad
                            </label>

                            <input type="number"
                                   min="1"
                                   id="quantity"
                                   name="quantity"
                                   value="{{ old('quantity', 1) }}"
                                   class="w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500">

                            @error('quantity')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="reason" class="block text-sm font-medium text-gray-700 mb-1">
                                Motivo
                            </label>

                            <textarea id="reason"
                                      name="reason"
                                      rows="4"
                                      class="w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                      placeholder="Ejemplo: Compra inicial, venta, devolución, ajuste de inventario">{{ old('reason') }}</textarea>

                            @error('reason')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end gap-2">
                            <a href="{{ route('stock-movements.index') }}"
                               class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">
                                Cancelar
                            </a>

                            <button type="submit"
                                    class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 shadow">
                                Registrar movimiento
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>