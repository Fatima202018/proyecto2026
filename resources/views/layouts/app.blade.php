
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sistema Parroquial') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-slate-100">

    <div x-data="{ sidebarOpen: false }" class="min-h-screen">

        {{-- Menú lateral --}}
        @include('layouts.navigation')

        {{-- Área principal --}}
        <div class="min-h-screen lg:ml-80">
            {{-- Barra superior --}}
            <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-4 sm:px-6">

                <div class="flex items-center gap-3">

                    {{-- Botón para abrir menú en móviles --}}
                    <button
                        @click="sidebarOpen = true"
                        class="lg:hidden p-2 rounded-lg text-slate-600 hover:bg-slate-100"
                        aria-label="Abrir menú">

                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>

                    <div>
                 <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            Sistema de Gestión Parroquial
                        </p>
                <p class="text-sm text-gray-500 mt-1">
                            Administración y control de registros
                        </p>
                    </div>
                </div>

                {{-- Usuario conectado --}}
                <div class="flex items-center gap-3">

                    <div class="hidden sm:block text-right">
                        <p class="text-sm font-semibold text-slate-700">
                            {{ Auth::user()->name }}
                        </p>
                        <p class="text-xs text-slate-400">
                            Usuario del sistema
                        </p>
                    </div>

                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="w-10 h-10 rounded-full bg-slate-200 text-slate-700 font-semibold hover:bg-slate-300">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                Mi perfil
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link
                                    :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    Cerrar sesión
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>

                </div>
            </header>

            {{-- Título de cada página --}}
            @isset($header)
                <div class="px-4 sm:px-6 lg:px-8 pt-6">
                    {{ $header }}
                </div>
            @endisset

            {{-- Contenido de cada módulo --}}
            <main class="p-4 sm:p-6 lg:p-8">
                {{ $slot }}
            </main>

        </div>
    </div>

</body>
</html>
