<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Categorías
            </h2>

   <a href="{{ route('categories.create') }}"
   class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 shadow">
    Nueva categoría
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
                                <th class="p-3 border">Nombre</th>
                                <th class="p-3 border">Descripción</th>
                                <th class="p-3 border">Estado</th>
                                <th class="p-3 border">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td class="p-3 border">{{ $category->id }}</td>
                                    <td class="p-3 border font-medium">{{ $category->name }}</td>
                                    <td class="p-3 border">{{ $category->description ?? 'Sin descripción' }}</td>

                                    <td class="p-3 border">
                                        @if ($category->is_active)
                                            <span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded">
                                                Activa
                                            </span>
                                        @else
                                            <span class="px-2 py-1 text-xs bg-red-100 text-red-700 rounded">
                                                Inactiva
                                            </span>
                                        @endif
                                    </td>

                                    <td class="p-3 border">
                                        <div class="flex gap-2">
                                            <a href="{{ route('categories.edit', $category) }}"
                                               class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                                Editar
                                            </a>

                                            <form action="{{ route('categories.destroy', $category) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('¿Seguro que deseas eliminar esta categoría?');">
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
                                    <td colspan="5" class="p-4 text-center text-gray-500">
                                        No hay categorías registradas.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $categories->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>ah