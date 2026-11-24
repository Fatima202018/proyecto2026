
<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Ajustes del sistema
            </h2>
            <p class="text-sm text-gray-500 mt-1">
                Administra la información institucional de la parroquia.
            </p>
        </div>
    </x-slot>

    <div class="pt-2 pb-8">
    <div class="max-w-7xl mx-auto p-6 bg-gray-800 rounded-lg shadow-lg mt-6">
            @if(session('success'))
                <div class="mb-5 p-4 bg-green-100 text-green-800 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="mb-5 p-4 bg-red-100 text-red-800 rounded-lg">
                    <p class="font-semibold mb-2">
                        Revisa los siguientes datos:
                    </p>
                    <ul class="list-disc list-inside text-sm">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('configuracion.update') }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf
                @method('PUT')

                {{-- Información institucional --}}
                <div class="bg-white shadow-sm rounded-xl overflow-hidden mb-6">

                    <div class="p-6 border-b border-gray-200">
                        <h3 class="text-lg font-bold text-gray-800">
                            Información institucional
                        </h3>
                        <p class="text-sm text-gray-500 mt-1">
                            Datos generales que aparecerán en las actas y certificaciones.
                        </p>
                    </div>

                    <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-5">

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Nombre de la parroquia
                            </label>
                            <input type="text" name="nombre_parroquia"
                                value="{{ old('nombre_parroquia', $configuracion?->nombre_parroquia) }}"
                                class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="Ej. Parroquia San José">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Diócesis
                            </label>
                            <input type="text" name="nombre_diocesis"
                                value="{{ old('nombre_diocesis', $configuracion?->nombre_diocesis) }}"
                                class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="Nombre de la diócesis">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Nombre del párroco
                            </label>
                            <input type="text" name="nombre_parroco"
                                value="{{ old('nombre_parroco', $configuracion?->nombre_parroco) }}"
                                class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="Nombre completo del párroco">
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Dirección
                            </label>
                            <input type="text" name="direccion"
                                value="{{ old('direccion', $configuracion?->direccion) }}"
                                class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="Dirección de la parroquia">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Municipio
                            </label>
                            <input type="text" name="municipio"
                                value="{{ old('municipio', $configuracion?->municipio) }}"
                                class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="Municipio">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Departamento
                            </label>
                            <input type="text" name="departamento"
                                value="{{ old('departamento', $configuracion?->departamento) }}"
                                class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="Departamento">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Teléfono
                            </label>
                            <input type="text" name="telefono"
                                value="{{ old('telefono', $configuracion?->telefono) }}"
                                class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="Número de teléfono">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Correo electrónico
                            </label>
                            <input type="email" name="correo"
                                value="{{ old('correo', $configuracion?->correo) }}"
                                class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="correo@parroquia.com">
                        </div>

                    </div>
                </div>

                
            {{-- Identidad visual --}}
            <div class="bg-white shadow-sm rounded-xl overflow-hidden mb-6">

                <div class="p-6 border-b border-gray-200">
                    <h3 class="text-lg font-bold text-gray-800">
                        Identidad visual
                    </h3>
                    <p class="text-sm text-gray-500 mt-1">
                        Carga el logo y el sello que se utilizarán en los documentos parroquiales.
                    </p>
                </div>

                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">

                    {{-- Logo --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Logo de la parroquia
                        </label>

                        @if($configuracion?->logo)
                            <div class="mb-3 p-3 border rounded-lg">
                                <img src="{{ asset('storage/' . $configuracion->logo) }}"
                                    alt="Logo de la parroquia"
                                    class="h-32 mx-auto object-contain">
                                <p class="text-xs text-center text-gray-500 mt-2">
                                    Logo actual
                                </p>
                            </div>
                        @endif

                        <input type="file"
                            name="logo"
                            accept=".jpg,.jpeg,.png,.webp"
                            class="w-full text-sm border border-gray-300 rounded-lg p-2">

                        <p class="text-xs text-gray-500 mt-2">
                            Formatos permitidos: JPG, PNG y WEBP. Máximo 2 MB.
                        </p>
                    </div>

                    {{-- Sello --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Sello parroquial
                        </label>

                        @if($configuracion?->sello)
                            <div class="mb-3 p-3 border rounded-lg">
                                <img src="{{ asset('storage/' . $configuracion->sello) }}"
                                    alt="Sello de la parroquia"
                                    class="h-32 mx-auto object-contain">
                                <p class="text-xs text-center text-gray-500 mt-2">
                                    Sello actual
                                </p>
                            </div>
                        @endif

                        <input type="file"
                            name="sello"
                            accept=".jpg,.jpeg,.png,.webp"
                            class="w-full text-sm border border-gray-300 rounded-lg p-2">

                        <p class="text-xs text-gray-500 mt-2">
                            Formatos permitidos: JPG, PNG y WEBP. Máximo 2 MB.
                        </p>
                    </div>

                </div>
            </div>

                {{-- Botón guardar --}}
                <div class="flex justify-end">
                    <button type="submit"
                        class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow-sm">
                        Guardar configuración
                    </button>
                </div>

            </form>

        </div>
    </div>

</x-app-layout>
