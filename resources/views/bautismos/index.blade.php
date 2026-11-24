
<x-app-layout>

    <x-slot name="header">
        
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Gestión de Bautismos
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Registro y consulta de partidas de bautismo.
                </p>
            </div>

            <a href="{{ route('bautismos.create') }}"
            style="background-color: #16a34a; color: white;"
            class="inline-flex items-center justify-center w-24 px-3 py-2 rounded-lg text-sm font-medium transition">
                + REGISTRAR BAUTISMO
               
            </a>
        </div>
    </x-slot>
    <div>
            {{-- Buscador --}}
                <form action="{{ route('bautismos.index') }}"
                      method="GET"
                      class="mb-5 flex flex-col sm:flex-row gap-3">

                    <div class="flex-1">
                        <input
                            type="search"
                            name="buscar"
                            value="{{ $buscar ?? request('buscar') }}"
                            placeholder="Buscar partida por nombre o apellido..."
                            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm px-4 py-3">
                    </div>

                    <button type="submit"
                            class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-semibold transition">
                        BUSCAR
                    </button>

                    @if(request('buscar'))
                        <a href="{{ route('bautismos.index') }}"
                           class="inline-flex items-center justify-center px-6 py-3 bg-gray-500 hover:bg-gray-600 text-white rounded-lg text-sm font-semibold transition">
                            LIMPIAR
                        </a>
                    @endif

                </form>
        </div>

    <div class="pt-2 pb-8">
        <div class="max-w-7xl mx-auto p-6 bg-gray-800 rounded-lg shadow-lg mt-6">

            <div class="p-6 bg-gray-800 rounded-lg shadow-lg">

                {{-- Mensajes de éxito --}}
                @if(session('success'))
                    <div class="mb-5 p-4 bg-green-100 text-green-800 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Mensajes de error --}}
                @if(session('error'))
                    <div class="mb-5 p-4 bg-red-100 text-red-800 rounded-lg">
                        {{ session('error') }}
                    </div>
                @endif

               

                {{-- Tarjeta de partidas --}}
                <div class="bg-white shadow-sm rounded-xl overflow-hidden">

                    <div class="p-6 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-800">
                            Partidas registradas
                        </h3>

                        <p class="text-sm text-gray-500 mt-1">
                            Consulta y administra las partidas de bautismo.
                        </p>
                    </div>

                    {{-- Tabla --}}
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">

                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">
                                        N.º partida
                                    </th>

                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">
                                        Nombre completo
                                    </th>

                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">
                                        Fecha de bautismo
                                    </th>

                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">
                                        Libro / Folio
                                    </th>

                                    <th class="px-6 py-3 text-center text-xs font-semibold text-gray-500 uppercase">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200">

                                @forelse($bautismos as $bautismo)

                                    <tr class="hover:bg-gray-50">

                                        <td class="px-6 py-4 text-sm text-gray-700">
                                            {{ $bautismo->numero_partida }}
                                        </td>

                                        <td class="px-6 py-4 text-sm font-medium text-gray-900">
                                            {{ $bautismo->nombres }}
                                            {{ $bautismo->apellidos }}
                                        </td>

                                        <td class="px-6 py-4 text-sm text-gray-700">
                                            {{ $bautismo->fecha_bautismo->format('d/m/Y') }}
                                        </td>

                                        <td class="px-6 py-4 text-sm text-gray-700">
                                            {{ $bautismo->libro ?? '—' }} /
                                            {{ $bautismo->folio ?? '—' }}
                                        </td>

                                        {{-- Acciones --}}
                                        <td class="px-6 py-4">
                                            <div class="flex items-center justify-center gap-2">

                                                {{-- PDF --}}
                                                <a href="{{ route('bautismos.pdf', $bautismo->id) }}"
                                                   target="_blank"
                                                   style="background-color: #16a34a; color: white;"
                                                   class="inline-flex items-center justify-center w-24 px-3 py-2 rounded-lg text-sm font-medium transition">
                                                    PDF
                                                </a>

                                                {{-- Ver --}}
                                                <a href="{{ route('bautismos.show', $bautismo->id) }}"
                                                   class="inline-flex items-center justify-center w-24 px-3 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 text-sm font-medium transition">
                                                    VER
                                                </a>

                                                {{-- Editar --}}
                                                <a href="{{ route('bautismos.edit', $bautismo->id) }}"
                                                   class="inline-flex items-center justify-center w-24 px-3 py-2 bg-amber-500 text-slate-900 rounded-lg hover:bg-amber-600 text-sm font-medium transition">
                                                    EDITAR
                                                </a>

                                                {{-- Eliminar --}}
                                                <form action="{{ route('bautismos.destroy', $bautismo->id) }}"
                                                      method="POST"
                                                      onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta partida de bautismo? Esta acción no se puede deshacer.');">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit"
                                                            class="inline-flex items-center justify-center w-24 px-3 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 text-sm font-medium transition">
                                                        ELIMINAR
                                                    </button>

                                                </form>

                                            </div>
                                        </td>

                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="5" class="px-6 py-10 text-center text-gray-500">

                                            @if(request('buscar'))
                                                No se encontraron partidas con el nombre
                                                "{{ request('buscar') }}".
                                            @else
                                                Todavía no hay partidas de bautismo registradas.
                                            @endif

                                        </td>
                                    </tr>

                                @endforelse

                            </tbody>
                        </table>
                    </div>

                    {{-- Paginación --}}
                    <div class="p-4">
                        {{ $bautismos->links() }}
                    </div>

                </div>

            </div>
        </div>
    </div>

</x-app-layout>
