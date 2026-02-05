<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'ACME Transportes - Sistema de Gestión')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('styles')
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        body {
            display: flex;
            flex-direction: column;
        }
        main {
            flex: 1 0 auto;
        }
        footer {
            flex-shrink: 0;
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-gradient-to-r from-blue-600 to-blue-800 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="/" class="flex items-center">
                        <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                        <span class="ml-3 text-white text-xl font-bold">ACME Transportes</span>
                    </a>
                </div>
                
                <div class="flex items-center space-x-4">
                    <a href="{{ route('vehiculos.index') }}" class="text-white hover:bg-blue-700 px-3 py-2 rounded-md text-sm font-medium transition">
                        Vehículos
                    </a>
                    <a href="{{ route('conductores.index') }}" class="text-white hover:bg-blue-700 px-3 py-2 rounded-md text-sm font-medium transition">
                        Conductores
                    </a>
                    <a href="{{ route('propietarios.index') }}" class="text-white hover:bg-blue-700 px-3 py-2 rounded-md text-sm font-medium transition">
                        Propietarios
                    </a>
                    <a href="{{ route('informes.index') }}" class="text-white hover:bg-blue-700 px-3 py-2 rounded-md text-sm font-medium transition">
                        Informes
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Mensajes Flash -->
    @if(session('success'))
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded shadow-md" role="alert">
                <p class="font-bold">¡Éxito!</p>
                <p>{{ session('success') }}</p>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded shadow-md" role="alert">
                <p class="font-bold">Error</p>
                <p>{{ session('error') }}</p>
            </div>
        </div>
    @endif

    <!-- Contenido Principal -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="text-center">
                <p>&copy; 2026 ACME Transportes S.A. - Sistema de Gestión de Vehículos</p>
                <p class="text-sm text-gray-400 mt-2">Desarrollado con Laravel y Tailwind CSS</p>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
