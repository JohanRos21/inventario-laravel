<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Nuevo producto
            </h2>

            <a href="{{ route('products.index') }}"
               class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 shadow">
                Volver
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <form action="{{ route('products.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">
                                Categoría
                            </label>

                            <select id="category_id"
                                    name="category_id"
                                    class="w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="">Selecciona una categoría</option>

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>

                            @error('category_id')
                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                                Nombre del producto
                            </label>

                            <input type="text"
                                   id="name"
                                   name="name"
                                   value="{{ old('name') }}"
                                   class="w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                   placeholder="Ejemplo: Lenovo ThinkPad, Mouse Logitech">

                            @error('name')
                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">
                                Descripción
                            </label>

                            <textarea id="description"
                                      name="description"
                                      rows="4"
                                      class="w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                      placeholder="Describe brevemente el producto">{{ old('description') }}</textarea>

                            @error('description')
                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                            <div>
                                <label for="price" class="block text-sm font-medium text-gray-700 mb-1">
                                    Precio
                                </label>

                                <input type="number"
                                       step="0.01"
                                       min="0"
                                       id="price"
                                       name="price"
                                       value="{{ old('price', 0) }}"
                                       class="w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500">

                                @error('price')
                                    <p class="mt-1 text-sm text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div>
                                <label for="stock" class="block text-sm font-medium text-gray-700 mb-1">
                                    Stock actual
                                </label>

                                <input type="number"
                                       min="0"
                                       id="stock"
                                       name="stock"
                                       value="{{ old('stock', 0) }}"
                                       class="w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500">

                                @error('stock')
                                    <p class="mt-1 text-sm text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div>
                                <label for="minimum_stock" class="block text-sm font-medium text-gray-700 mb-1">
                                    Stock mínimo
                                </label>

                                <input type="number"
                                       min="0"
                                       id="minimum_stock"
                                       name="minimum_stock"
                                       value="{{ old('minimum_stock', 0) }}"
                                       class="w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500">

                                @error('minimum_stock')
                                    <p class="mt-1 text-sm text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-6">
                            <label class="flex items-center">
                                <input type="checkbox"
                                       name="is_active"
                                       value="1"
                                       checked
                                       class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">

                                <span class="ml-2 text-sm text-gray-700">
                                    Producto activo
                                </span>
                            </label>

                            @error('is_active')
                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="flex justify-end gap-2">
                            <a href="{{ route('products.index') }}"
                               class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">
                                Cancelar
                            </a>

                            <button type="submit"
                                    class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 shadow">
                                Guardar producto
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>