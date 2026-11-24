
<x-app-layout>

    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Detalle de partida de bautismo
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Consulta de la información sacramental registrada.
                </p>
            </div>

            <div class="flex gap-2">
                <a href="{{ route('bautismos.edit', $bautismo->id) }}"
                   class="px-5 py-4 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg text-sm font-semibold">
                    Editar
                </a>

                <a href="{{ route('bautismos.index') }}"
                   class="px-5 py-4 bg-gray-600 hover:bg-gray-700 text-white rounded-lg text-sm font-semibold">
                    Volver
                </a>
            </div>
        </div>
    </x-slot>

    <div class="pt-2 pb-8">
    <div class="max-w-7xl mx-auto p-6 bg-gray-800 rounded-lg shadow-lg mt-6">
            {{-- Información de la partida --}}
            <div class="bg-white shadow-sm rounded-xl p-6">
                <h3 class="text-lg font-bold text-gray-800 border-b pb-3 mb-4">
                    Información de la partida
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                    <div>
                        <p class="text-sm text-gray-500">Número de partida</p>
                        <p class="font-semibold text-gray-800">{{ $bautismo->numero_partida }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Libro</p>
                        <p class="font-semibold text-gray-800">{{ $bautismo->libro ?? 'No registrado' }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Folio</p>
                        <p class="font-semibold text-gray-800">{{ $bautismo->folio ?? 'No registrado' }}</p>
                    </div>
                </div>
            </div>

            {{-- Datos de la persona bautizada --}}
            <div class="bg-white shadow-sm rounded-xl p-6">
                <h3 class="text-lg font-bold text-gray-800 border-b pb-3 mb-4">
                    Datos de la persona bautizada
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <p class="text-sm text-gray-500">Nombres</p>
                        <p class="font-semibold text-gray-800">{{ $bautismo->nombres }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Apellidos</p>
                        <p class="font-semibold text-gray-800">{{ $bautismo->apellidos }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Sexo</p>
                        <p class="font-semibold text-gray-800">{{ $bautismo->sexo ?? 'No registrado' }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Fecha de nacimiento</p>
                        <p class="font-semibold text-gray-800">
                            {{ $bautismo->fecha_nacimiento?->format('d/m/Y') ?? 'No registrada' }}
                        </p>
                    </div>

                    <div class="sm:col-span-2">
                        <p class="text-sm text-gray-500">Lugar de nacimiento</p>
                        <p class="font-semibold text-gray-800">{{ $bautismo->lugar_nacimiento ?? 'No registrado' }}</p>
                    </div>
                </div>
            </div>

            {{-- Datos del bautismo --}}
            <div class="bg-white shadow-sm rounded-xl p-6">
                <h3 class="text-lg font-bold text-gray-800 border-b pb-3 mb-4">
                    Datos del bautismo
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <p class="text-sm text-gray-500">Fecha del bautismo</p>
                        <p class="font-semibold text-gray-800">
                            {{ $bautismo->fecha_bautismo?->format('d/m/Y') ?? 'No registrada' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Lugar del bautismo</p>
                        <p class="font-semibold text-gray-800">{{ $bautismo->lugar_bautismo ?? 'No registrado' }}</p>
                    </div>

                    <div class="sm:col-span-2">
                        <p class="text-sm text-gray-500">Ministro celebrante</p>
                        <p class="font-semibold text-gray-800">{{ $bautismo->ministro_celebrante ?? 'No registrado' }}</p>
                    </div>
                </div>
            </div>

            {{-- Padres y padrinos --}}
            <div class="bg-white shadow-sm rounded-xl p-6">
                <h3 class="text-lg font-bold text-gray-800 border-b pb-3 mb-4">
                    Datos familiares y padrinos
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <p class="text-sm text-gray-500">Nombre del padre</p>
                        <p class="font-semibold text-gray-800">{{ $bautismo->nombre_padre ?? 'No registrado' }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Nombre de la madre</p>
                        <p class="font-semibold text-gray-800">{{ $bautismo->nombre_madre ?? 'No registrada' }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Nombre del padrino</p>
                        <p class="font-semibold text-gray-800">{{ $bautismo->nombre_padrino ?? 'No registrado' }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Nombre de la madrina</p>
                        <p class="font-semibold text-gray-800">{{ $bautismo->nombre_madrina ?? 'No registrada' }}</p>
                    </div>
                </div>
            </div>

            {{-- Observaciones --}}
            <div class="bg-white shadow-sm rounded-xl p-6">
                <h3 class="text-lg font-bold text-gray-800 border-b pb-3 mb-4">
                    Observaciones y notas marginales
                </h3>

                <div class="space-y-5">
                    <div>
                        <p class="text-sm text-gray-500">Observaciones</p>
                        <p class="text-gray-800 whitespace-pre-line">{{ $bautismo->observaciones ?: 'Sin observaciones.' }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Notas marginales</p>
                        <p class="text-gray-800 whitespace-pre-line">{{ $bautismo->notas_marginales ?: 'Sin notas marginales.' }}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>
