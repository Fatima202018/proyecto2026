
<x-app-layout>

    {{-- ENCABEZADO --}}
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
            <div>
                <h2 class="text-2xl font-bold text-slate-800">
                    Panel principal
                </h2>
                <p class="text-sm text-slate-500 mt-1">
                    Resumen general de la gestión parroquial
                </p>
            </div>

            <span class="text-xs text-slate-500 bg-white border border-slate-200 rounded-lg px-3 py-2">
                <span class="inline-block w-2 h-2 rounded-full bg-emerald-500 mr-1"></span>
                Sistema activo
            </span>
        </div>
    </x-slot>

    <div class="space-y-6">

        {{-- BIENVENIDA --}}
        <section class="relative overflow-hidden bg-white rounded-2xl border border-slate-200 shadow-sm p-6">

            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-5">

                <div class="relative z-10">
                    <span class="text-xs font-bold tracking-widest text-amber-600 uppercase">
                        Sistema de administración parroquial
                    </span>

                    <h3 class="text-2xl font-bold text-slate-800 mt-2">
                        ¡Bienvenido, {{ Auth::user()->name }}!
                    </h3>

                    <p class="text-sm text-slate-500 mt-2 max-w-xl">
                        Desde este espacio puedes administrar los registros
                        sacramentales, consultar información y gestionar
                        las actividades de la parroquia.
                    </p>
                </div>

                <div class="hidden sm:flex w-20 h-20 shrink-0 rounded-2xl bg-amber-50 items-center justify-center">
                    <svg class="w-10 h-10 text-amber-500"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="1.5"
                            d="M12 3v18M7 8h10M5 21h14M8 8v4a4 4 0 008 0V8"/>
                    </svg>
                </div>

            </div>
        </section>

        {{-- INDICADORES --}}
        <section>

            <div class="flex items-center justify-between mb-4">
                <div>
                    <h3 class="text-lg font-bold text-slate-800">
                        Resumen general
                    </h3>
                    <p class="text-sm text-slate-500">
                        Estado de los registros sacramentales
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">

                {{-- BAUTISMOS --}}
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5 hover:shadow-md transition">
                    <div class="flex items-center justify-between">
                        <div class="w-11 h-11 rounded-xl bg-blue-50 flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M12 3v18M7 8h10M5 21h14M8 8v4a4 4 0 008 0V8"/>
                            </svg>
                        </div>
                        <span class="text-xs font-medium text-blue-600 bg-blue-50 px-2 py-1 rounded-full">
                            En preparación
                        </span>
                    </div>

                    <p class="text-3xl font-bold text-slate-800 mt-5">—</p>
                    <p class="text-sm font-semibold text-slate-700 mt-1">Bautismos</p>
                    <p class="text-xs text-slate-400 mt-1">Registros sacramentales</p>
                </div>

                {{-- CONFIRMACIONES --}}
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5 hover:shadow-md transition">
                    <div class="flex items-center justify-between">
                        <div class="w-11 h-11 rounded-xl bg-purple-50 flex items-center justify-center">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M12 3l2.5 5 5.5.8-4 3.9.9 5.5-4.9-2.6-4.9 2.6.9-5.5-4-3.9 5.5-.8L12 3z"/>
                            </svg>
                        </div>
                        <span class="text-xs font-medium text-purple-600 bg-purple-50 px-2 py-1 rounded-full">
                            En preparación
                        </span>
                    </div>

                    <p class="text-3xl font-bold text-slate-800 mt-5">—</p>
                    <p class="text-sm font-semibold text-slate-700 mt-1">Confirmaciones</p>
                    <p class="text-xs text-slate-400 mt-1">Registros sacramentales</p>
                </div>

                {{-- MATRIMONIOS --}}
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5 hover:shadow-md transition">
                    <div class="flex items-center justify-between">
                        <div class="w-11 h-11 rounded-xl bg-emerald-50 flex items-center justify-center">
                            <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M12 20s-7-4.4-7-10a4 4 0 017-2.6A4 4 0 0119 10c0 5.6-7 10-7 10z"/>
                            </svg>
                        </div>
                        <span class="text-xs font-medium text-emerald-600 bg-emerald-50 px-2 py-1 rounded-full">
                            En preparación
                        </span>
                    </div>

                    <p class="text-3xl font-bold text-slate-800 mt-5">—</p>
                    <p class="text-sm font-semibold text-slate-700 mt-1">Matrimonios</p>
                    <p class="text-xs text-slate-400 mt-1">Registros sacramentales</p>
                </div>

                {{-- DEFUNCIONES --}}
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5 hover:shadow-md transition">
                    <div class="flex items-center justify-between">
                        <div class="w-11 h-11 rounded-xl bg-rose-50 flex items-center justify-center">
                            <svg class="w-6 h-6 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M12 3v18M5 9h14M7 21h10"/>
                            </svg>
                        </div>
                        <span class="text-xs font-medium text-rose-600 bg-rose-50 px-2 py-1 rounded-full">
                            En preparación
                        </span>
                    </div>

                    <p class="text-3xl font-bold text-slate-800 mt-5">—</p>
                    <p class="text-sm font-semibold text-slate-700 mt-1">Defunciones</p>
                    <p class="text-xs text-slate-400 mt-1">Registros sacramentales</p>
                </div>

            </div>
        </section>

        {{-- ACCESOS RÁPIDOS --}}
        <section>

            <div class="mb-4">
                <h3 class="text-lg font-bold text-slate-800">
                    Accesos rápidos
                </h3>
                <p class="text-sm text-slate-500">
                    Accede directamente a las funciones del sistema
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-4">

                {{-- PRODUCTOS --}}
                <a href="{{ route('producto.index') }}"
                    class="flex items-center gap-4 bg-white border border-slate-200 rounded-xl p-5 shadow-sm hover:shadow-md hover:border-amber-300 transition group">

                    <div class="w-12 h-12 shrink-0 rounded-xl bg-amber-50 flex items-center justify-center">
                        <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                d="M4 7h16v13H4zM4 7l2-4h12l2 4M9 11h6"/>
                        </svg>
                    </div>

                    <div class="flex-1 min-w-0">
                        <h4 class="font-semibold text-slate-800 group-hover:text-amber-600">
                            Gestión de productos
                        </h4>
                        <p class="text-xs text-slate-500 mt-1">
                            Consultar y administrar productos.
                        </p>
                    </div>

                    <svg class="w-5 h-5 text-slate-400 group-hover:text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5l7 7-7 7"/>
                    </svg>
                </a>

                {{-- AGENDA --}}
                <div class="flex items-center gap-4 bg-white border border-slate-200 rounded-xl p-5 shadow-sm">
                    <div class="w-12 h-12 shrink-0 rounded-xl bg-blue-50 flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                d="M8 7V3m8 4V3M4 11h16M5 5h14v16H5z"/>
                        </svg>
                    </div>

                    <div>
                        <h4 class="font-semibold text-slate-800">Agenda parroquial</h4>
                        <p class="text-xs text-slate-500 mt-1">
                            Próximamente: actividades y fechas.
                        </p>
                    </div>
                </div>

                {{-- ARCHIVO --}}
                <div class="flex items-center gap-4 bg-white border border-slate-200 rounded-xl p-5 shadow-sm">
                    <div class="w-12 h-12 shrink-0 rounded-xl bg-emerald-50 flex items-center justify-center">
                        <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                d="M4 4h16v16H4zM8 8h8M8 12h8M8 16h5"/>
                        </svg>
                    </div>

                    <div>
                        <h4 class="font-semibold text-slate-800">Archivo digital</h4>
                        <p class="text-xs text-slate-500 mt-1">
                            Próximamente: documentos digitalizados.
                        </p>
                    </div>
                </div>

            </div>
        </section>

        {{-- ACTIVIDAD RECIENTE --}}
        <section class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">

            <div class="p-5 border-b border-slate-100">
                <h3 class="text-lg font-bold text-slate-800">
                    Actividad reciente
                </h3>
                <p class="text-sm text-slate-500 mt-1">
                    Últimos movimientos realizados en el sistema
                </p>
            </div>

            <div class="flex flex-col items-center justify-center text-center px-5 py-10">

                <div class="w-14 h-14 rounded-full bg-slate-100 flex items-center justify-center">
                    <svg class="w-7 h-7 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>

                <p class="font-semibold text-slate-700 mt-4">
                    No hay actividad para mostrar
                </p>

                <p class="text-sm text-slate-400 mt-1">
                    Aquí aparecerán los movimientos cuando implementemos
                    el registro de actividad.
                </p>

            </div>
        </section>

    </div>

</x-app-layout>
