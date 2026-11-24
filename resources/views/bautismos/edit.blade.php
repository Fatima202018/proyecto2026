
<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Editar partida de bautismo
            </h2>
            <p class="text-sm text-gray-500 mt-1">
                Modifique la información de la partida seleccionada.
            </p>
        </div>
    </x-slot>
    
    <div class="pt-2 pb-8">
    <div class="max-w-7xl mx-auto p-6 bg-gray-800 rounded-lg shadow-lg mt-6">

            <div class="bg-white shadow-sm rounded-xl p-6">

                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-100 text-red-700 rounded-lg">
                        <strong>Hay errores en el formulario:</strong>
                        <ul class="list-disc ml-5 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('bautismos.update', $bautismo->id) }}"
                      method="POST">
                    @csrf
                    @method('PUT')

                    <h3 class="text-lg font-semibold text-gray-800 mb-4">
                        1. Información de la partida
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8">

                        <div>
                            <label class="block text-sm font-medium text-gray-700">
                                Número de partida *
                            </label>
                            <input type="text" name="numero_partida"
                                value="{{ old('numero_partida', $bautismo->numero_partida) }}"
                                required
                                class="mt-1 w-full rounded-lg border-gray-300 shadow-sm">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Libro</label>
                            <input type="text" name="libro"
                                value="{{ old('libro', $bautismo->libro) }}"
                                class="mt-1 w-full rounded-lg border-gray-300 shadow-sm">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Folio</label>
                            <input type="text" name="folio"
                                value="{{ old('folio', $bautismo->folio) }}"
                                class="mt-1 w-full rounded-lg border-gray-300 shadow-sm">
                        </div>

                    </div>

                    <h3 class="text-lg font-semibold text-gray-800 mb-4">
                        2. Datos de la persona bautizada
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-8">

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nombres *</label>
                            <input type="text" name="nombres"
                                value="{{ old('nombres', $bautismo->nombres) }}"
                                required
                                class="mt-1 w-full rounded-lg border-gray-300 shadow-sm">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Apellidos *</label>
                            <input type="text" name="apellidos"
                                value="{{ old('apellidos', $bautismo->apellidos) }}"
                                required
                                class="mt-1 w-full rounded-lg border-gray-300 shadow-sm">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Sexo</label>
                            <select name="sexo"
                                class="mt-1 w-full rounded-lg border-gray-300 shadow-sm">
                                <option value="">Seleccione</option>
                                <option value="Masculino" @selected(old('sexo', $bautismo->sexo) == 'Masculino')>Masculino</option>
                                <option value="Femenino" @selected(old('sexo', $bautismo->sexo) == 'Femenino')>Femenino</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Fecha de nacimiento</label>
                            <input type="date" name="fecha_nacimiento"
                                value="{{ old('fecha_nacimiento', $bautismo->fecha_nacimiento?->format('Y-m-d')) }}"
                                class="mt-1 w-full rounded-lg border-gray-300 shadow-sm">
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Lugar de nacimiento</label>
                            <input type="text" name="lugar_nacimiento"
                                value="{{ old('lugar_nacimiento', $bautismo->lugar_nacimiento) }}"
                                class="mt-1 w-full rounded-lg border-gray-300 shadow-sm">
                        </div>

                    </div>

                    <h3 class="text-lg font-semibold text-gray-800 mb-4">
                        3. Datos del bautismo
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-8">

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Fecha de bautismo *</label>
                            <input type="date" name="fecha_bautismo"
                                value="{{ old('fecha_bautismo', $bautismo->fecha_bautismo?->format('Y-m-d')) }}"
                                required
                                class="mt-1 w-full rounded-lg border-gray-300 shadow-sm">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Lugar de bautismo</label>
                            <input type="text" name="lugar_bautismo"
                                value="{{ old('lugar_bautismo', $bautismo->lugar_bautismo) }}"
                                class="mt-1 w-full rounded-lg border-gray-300 shadow-sm">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Ministro celebrante</label>
                            <input type="text" name="ministro_celebrante"
                                value="{{ old('ministro_celebrante', $bautismo->ministro_celebrante) }}"
                                class="mt-1 w-full rounded-lg border-gray-300 shadow-sm">
                        </div>

                    </div>

                    <h3 class="text-lg font-semibold text-gray-800 mb-4">
                        4. Datos familiares y padrinos
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-8">

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nombre del padre</label>
                            <input type="text" name="nombre_padre"
                                value="{{ old('nombre_padre', $bautismo->nombre_padre) }}"
                                class="mt-1 w-full rounded-lg border-gray-300 shadow-sm">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nombre de la madre</label>
                            <input type="text" name="nombre_madre"
                                value="{{ old('nombre_madre', $bautismo->nombre_madre) }}"
                                class="mt-1 w-full rounded-lg border-gray-300 shadow-sm">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nombre del padrino</label>
                            <input type="text" name="nombre_padrino"
                                value="{{ old('nombre_padrino', $bautismo->nombre_padrino) }}"
                                class="mt-1 w-full rounded-lg border-gray-300 shadow-sm">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nombre de la madrina</label>
                            <input type="text" name="nombre_madrina"
                                value="{{ old('nombre_madrina', $bautismo->nombre_madrina) }}"
                                class="mt-1 w-full rounded-lg border-gray-300 shadow-sm">
                        </div>

                    </div>

                    <h3 class="text-lg font-semibold text-gray-800 mb-4">
                        5. Observaciones y notas marginales
                    </h3>

                    <div class="space-y-5 mb-8">

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Observaciones</label>
                            <textarea name="observaciones" rows="3"
                                class="mt-1 w-full rounded-lg border-gray-300 shadow-sm">{{ old('observaciones', $bautismo->observaciones) }}</textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Notas marginales</label>
                            <textarea name="notas_marginales" rows="3"
                                class="mt-1 w-full rounded-lg border-gray-300 shadow-sm">{{ old('notas_marginales', $bautismo->notas_marginales) }}</textarea>
                        </div>

                    </div>

                    <div class="flex flex-col sm:flex-row justify-end gap-3 border-t pt-5">

                        <a href="{{ route('bautismos.index') }}"
                           class="px-5 py-2.5 rounded-lg border border-gray-300 text-gray-700 text-center hover:bg-gray-50">
                            Cancelar
                        </a>

                        <button type="submit"
                            style="background-color: #c82af8; color: white;"
                           class="px-5 py-2.5 rounded-lg border border-gray-300 text-gray-700 text-center hover:bg-gray-50">
                            Guardar cambios
                        </button>

                    </div>

                </form>

            </div>
        </div>
    </div>

</x-app-layout>
