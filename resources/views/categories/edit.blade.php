<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Editar categoría
            </h2>

            <a href="{{ route('categories.index') }}"
               class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700">
                Volver
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <form action="{{ route('categories.update', $category) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                                Nombre de la categoría
                            </label>

                            <input type="text"
                                   id="name"
                                   name="name"
                                   value="{{ old('name', $category->name) }}"
                                   class="w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                   placeholder="Ejemplo: Laptops, Monitores, Accesorios">

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
                                      placeholder="Describe brevemente esta categoría">{{ old('description', $category->description) }}</textarea>

                            @error('description')
                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label class="flex items-center">
                                <input type="checkbox"
                                       name="is_active"
                                       value="1"
                                       {{ old('is_active', $category->is_active) ? 'checked' : '' }}
                                       class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">

                                <span class="ml-2 text-sm text-gray-700">
                                    Categoría activa
                                </span>
                            </label>

                            @error('is_active')
                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="flex justify-end gap-2">
                            <a href="{{ route('categories.index') }}"
                               class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">
                                Cancelar
                            </a>

                            <button type="submit"
                                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                                Actualizar categoría
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>