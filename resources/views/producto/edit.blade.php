<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-white text-center">
            Editar producto
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-3xl mx-auto">
            <div class="bg-gray-800 border border-gray-700 shadow-lg rounded-lg p-8">
                @if ($errors->any())
                    <div class="mb-4 rounded bg-red-700/20 text-red-300 px-4 py-2">
                        <ul class="list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('producto.update', $producto->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="nombre" class="block text-sm text-white mb-1">Nombre</label>
                            <input id="nombre"
                                   name="nombre"
                                   value="{{ old('nombre', $producto->nombre) }}"
                                   required
                                   class="w-full bg-gray-900 text-white rounded-md px-4 py-2 border border-gray-700
                                          focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                                   placeholder="Nombre del producto">
                        </div>

                        <div>
                            <label for="descripcion" class="block text-sm text-white mb-1">Descripción</label>
                            <textarea id="descripcion"
                                      name="descripcion"
                                      required
                                      rows="3"
                                      class="w-full bg-gray-900 text-white rounded-md px-4 py-2 border border-gray-700
                                             focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                                      placeholder="Descripción del producto">{{ old('descripcion', $producto->descripcion) }}</textarea>
                        </div>

                        <div>
                            <label for="precio" class="block text-sm text-white mb-1">Precio</label>
                            <input id="precio"
                                   type="number"
                                   name="precio"
                                   step="0.01"
                                   min="0"
                                   value="{{ old('precio', $producto->precio) }}"
                                   required
                                   class="w-full bg-gray-900 text-white rounded-md px-4 py-2 border border-gray-700
                                          focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                                   placeholder="Precio del producto">
                        </div>

                        <div>
                            <label for="stock" class="block text-sm text-white mb-1">Stock</label>
                            <input id="stock"
                                   type="number"
                                   name="stock"
                                   value="{{ old('stock', $producto->stock) }}"
                                   required
                                   class="w-full bg-gray-900 text-white rounded-md px-4 py-2 border border-gray-700
                                          focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                                   placeholder="Stock del producto">
                        </div>
                    </div>

                    <div class="flex justify-end gap-4 mt-8">
                        <a href="{{ route('producto.index') }}"
                           class="px-4 py-2 rounded-md text-white bg-gray-700 hover:bg-gray-600 transition">
                            Cancelar
                        </a>
                        <button type="submit"
                                class="px-4 py-2 rounded-md text-white bg-indigo-600 hover:bg-indigo-700 transition">
                            Guardar cambios
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
