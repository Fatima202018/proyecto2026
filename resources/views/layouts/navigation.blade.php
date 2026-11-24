
{{-- Fondo oscuro para dispositivos móviles --}}
<div
    x-show="sidebarOpen"
    @click="sidebarOpen = false"
    class="fixed inset-0 z-40 bg-black/50 lg:hidden"
    style="display: none;">
</div>

{{-- MENÚ LATERAL --}}
<aside
    class="fixed inset-y-0 left-0 z-50 w-80 bg-slate-900 text-slate-300 flex flex-col transform transition-transform duration-300 lg:translate-x-0"
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">

    {{-- IDENTIDAD DEL SISTEMA --}}
    <div class="h-20 shrink-0 flex items-center px-5 border-b border-slate-700">

        <div class="w-12 h-12 rounded-xl bg-amber-500 flex items-center justify-center mr-3">
            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="1.8"
                    d="M12 3v18M7 8h10M5 21h14M8 8v4a4 4 0 008 0V8"/>
            </svg>
        </div>

        <div>
            <h1 class="text-white font-bold text-sm tracking-wide">
                SISTEMA PARROQUIAL
            </h1>
            <p class="text-slate-400 text-xs mt-1">
                Gestión administrativa
            </p>
        </div>

        <button
            @click="sidebarOpen = false"
            class="ml-auto lg:hidden text-slate-400 hover:text-white"
            aria-label="Cerrar menú">

            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    {{-- NAVEGACIÓN --}}
    <nav class="flex-1 overflow-y-auto px-4 py-5 space-y-7">

        {{-- GENERAL --}}
        <div>
            <p class="px-3 mb-3 text-xs font-bold text-slate-500 uppercase tracking-widest">
                General
            </p>

            <a href="{{ route('dashboard') }}"
                @click="sidebarOpen = false"
                class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200
                {{ request()->routeIs('dashboard') ? 'bg-amber-500 text-white shadow-md shadow-amber-900/20' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">

                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M3 10.5L12 3l9 7.5M5 9v12h14V9M9 21v-7h6v7"/>
                </svg>

                <span class="text-sm font-semibold">Panel principal</span>
            </a>
        </div>

        {{-- GESTIÓN SACRAMENTAL --}}
        <div x-data="{ open: true }">

            <button
                @click="open = !open"
                class="w-full flex items-center justify-between px-3 mb-3 text-xs font-bold text-slate-500 uppercase tracking-widest hover:text-slate-300 transition">

                <span>Gestión sacramental</span>

                <svg class="w-4 h-4 transition-transform duration-200"
                    :class="open ? 'rotate-180' : ''"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </button>

            <div x-show="open" x-collapse class="space-y-2">

                
            {{-- BAUTISMOS --}}
            <a href="{{ route('bautismos.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl transition
            {{ request()->routeIs('bautismos.*')
                    ? 'bg-amber-500 text-slate-900'
                    : 'bg-slate-800/60 text-slate-300 hover:bg-slate-700 hover:text-white' }}">

                <svg class="w-5 h-5 shrink-0" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M12 3v18m-9-9h18M5 5l14 14M19 5L5 19"/>
                </svg>

                <span class="flex-1 text-sm font-medium">Bautismos</span>
            </a>


                {{-- CONFIRMACIONES --}}
                <div class="flex items-center gap-3 px-4 py-3 rounded-xl bg-slate-800/60">
                    <svg class="w-5 h-5 shrink-0 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M12 3l2.5 5 5.5.8-4 3.9.9 5.5-4.9-2.6-4.9 2.6.9-5.5-4-3.9 5.5-.8L12 3z"/>
                    </svg>
                    <span class="flex-1 text-sm font-medium">Confirmaciones</span>
                    <span class="text-[10px] text-slate-500">Próximamente</span>
                </div>

                {{-- MATRIMONIOS --}}
                <div class="flex items-center gap-3 px-4 py-3 rounded-xl bg-slate-800/60">
                    <svg class="w-5 h-5 shrink-0 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M12 20s-7-4.4-7-10a4 4 0 017-2.6A4 4 0 0119 10c0 5.6-7 10-7 10z"/>
                    </svg>
                    <span class="flex-1 text-sm font-medium">Matrimonios</span>
                    <span class="text-[10px] text-slate-500">Próximamente</span>
                </div>

                {{-- DEFUNCIONES --}}
                <div class="flex items-center gap-3 px-4 py-3 rounded-xl bg-slate-800/60">
                    <svg class="w-5 h-5 shrink-0 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M12 3v18M5 9h14M7 21h10"/>
                    </svg>
                    <span class="flex-1 text-sm font-medium">Defunciones</span>
                    <span class="text-[10px] text-slate-500">Próximamente</span>
                </div>

            </div>
        </div>

        {{-- ARCHIVO Y DOCUMENTACIÓN --}}
        <div>
            <p class="px-3 mb-3 text-xs font-bold text-slate-500 uppercase tracking-widest">
                Archivo y documentación
            </p>

            <div class="space-y-2">

                {{-- ARCHIVO DIGITAL --}}
                <div class="flex items-center gap-3 px-4 py-3 rounded-xl bg-slate-800/60">
                    <svg class="w-5 h-5 shrink-0 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M3 7h7l2 2h9v11H3V7z"/>
                    </svg>
                    <span class="flex-1 text-sm font-medium">Archivo digital</span>
                    <span class="text-[10px] text-slate-500">Próximamente</span>
                </div>

                {{-- GESTIÓN DE PARTIDAS --}}
                <div class="flex items-center gap-3 px-4 py-3 rounded-xl bg-slate-800/60">
                    <svg class="w-5 h-5 shrink-0 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M4 4h16v16H4zM8 8h8M8 12h8M8 16h5"/>
                    </svg>
                    <span class="flex-1 text-sm font-medium">Gestión de partidas</span>
                    <span class="text-[10px] text-slate-500">Próximamente</span>
                </div>

            </div>
        </div>

        {{-- ADMINISTRACIÓN --}}
        <div x-data="{ open: true }">

            <button
                @click="open = !open"
                class="w-full flex items-center justify-between px-3 mb-3 text-xs font-bold text-slate-500 uppercase tracking-widest hover:text-slate-300 transition">

                <span>Administración</span>

                <svg class="w-4 h-4 transition-transform duration-200"
                    :class="open ? 'rotate-180' : ''"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </button>

            <div x-show="open" x-collapse class="space-y-2">

                {{-- USUARIOS Y PERMISOS --}}
                <div class="flex items-center gap-3 px-4 py-3 rounded-xl bg-slate-800/60">
                    <svg class="w-5 h-5 shrink-0 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M16 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2m6-10a4 4 0 100-8 4 4 0 000 8zm7-3a4 4 0 010 8m3 5v-2a4 4 0 00-3-3.87"/>
                    </svg>
                    <span class="flex-1 text-sm font-medium">Usuarios y permisos</span>
                    <span class="text-[10px] text-slate-500">Próximamente</span>
                </div>

                {{-- REPORTES --}}
                <div class="flex items-center gap-3 px-4 py-3 rounded-xl bg-slate-800/60">
                    <svg class="w-5 h-5 shrink-0 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M4 19V5m0 14h16M8 15v-4m4 4V7m4 8v-6"/>
                    </svg>
                    <span class="flex-1 text-sm font-medium">Reportes e índices</span>
                    <span class="text-[10px] text-slate-500">Próximamente</span>
                </div>

                {{-- AGENDA --}}
                <div class="flex items-center gap-3 px-4 py-3 rounded-xl bg-slate-800/60">
                    <svg class="w-5 h-5 shrink-0 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M8 3v4m8-4v4M4 10h16M5 5h14v16H5z"/>
                    </svg>
                    <span class="flex-1 text-sm font-medium">Agenda y calendario</span>
                    <span class="text-[10px] text-slate-500">Próximamente</span>
                </div>

                {{-- AVISOS --}}
                <div class="flex items-center gap-3 px-4 py-3 rounded-xl bg-slate-800/60">
                    <svg class="w-5 h-5 shrink-0 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M18 9a6 6 0 00-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9m-8 12a2 2 0 004 0"/>
                    </svg>
                    <span class="flex-1 text-sm font-medium">Avisos parroquiales</span>
                    <span class="text-[10px] text-slate-500">Próximamente</span>
                </div>

               
            {{-- CONFIGURACIÓN --}}
            <a href="{{ route('configuracion.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl transition
            {{ request()->routeIs('configuracion.*')
                    ? 'bg-amber-500 text-slate-900'
                    : 'bg-slate-800/60 text-slate-300 hover:bg-slate-700 hover:text-white' }}">

                <svg class="w-5 h-5 shrink-0" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M12 8a4 4 0 100 8 4 4 0 000-8zm0-5v2m0 14v2m9-9h-2M5 12H3m15.36-6.36l-1.42 1.42M7.06 16.94l-1.42 1.42m12.72 0l-1.42-1.42M7.06 7.06L5.64 5.64"/>
                </svg>

                <span class="flex-1 text-sm font-medium">
                    Configuración
                </span>
            </a>


                {{-- PRODUCTOS --}}
                <a href="{{ route('producto.index') }}"
                    @click="sidebarOpen = false"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200
                    {{ request()->routeIs('producto.*') ? 'bg-amber-500 text-white shadow-md shadow-amber-900/20' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">

                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="1.8"
                            d="M4 7h16v13H4zM4 7l2-4h12l2 4M9 11h6"/>
                    </svg>

                    <span class="text-sm font-semibold">Productos</span>
                </a>

            </div>
        </div>

    </nav>

    {{-- PIE DEL MENÚ --}}
    <div class="shrink-0 px-5 py-4 border-t border-slate-700">
        <p class="text-xs text-slate-400">
            Sistema Parroquial
        </p>
        <p class="text-xs text-slate-600 mt-1">
            Versión de desarrollo
        </p>
    </div>

</aside>
