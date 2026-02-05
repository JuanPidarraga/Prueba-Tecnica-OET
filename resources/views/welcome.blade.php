@extends('layouts.app')

@section('title', 'Inicio - ACME Transportes')

@section('content')
<div class="text-center py-12">
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-blue-600 to-blue-800 rounded-xl shadow-2xl p-12 mb-12 text-white">
        <h1 class="text-5xl font-bold mb-4">Bienvenido a ACME Transportes</h1>
        <p class="text-xl opacity-90 mb-8">Sistema de Gestión Integral de Vehículos, Conductores y Propietarios</p>
        <div class="flex justify-center space-x-4">
            <a href="{{ route('vehiculos.create') }}" class="bg-white text-blue-600 hover:bg-blue-50 px-8 py-3 rounded-lg font-bold shadow-lg transition transform hover:scale-105">
                Registrar Vehículo
            </a>
            <a href="{{ route('informes.index') }}" class="bg-blue-500 text-white hover:bg-blue-400 px-8 py-3 rounded-lg font-bold shadow-lg transition transform hover:scale-105">
                Ver Informes
            </a>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
        <div class="bg-white rounded-xl shadow-lg p-8 transform hover:scale-105 transition">
            <div class="text-blue-600 mb-4">
                <svg class="h-16 w-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <h3 class="text-3xl font-bold text-gray-800 mb-2">{{ \App\Models\Vehiculo::count() }}</h3>
            <p class="text-gray-600 font-semibold">Vehículos Registrados</p>
            <a href="{{ route('vehiculos.index') }}" class="text-blue-600 hover:text-blue-800 font-medium mt-3 inline-block">Ver todos →</a>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-8 transform hover:scale-105 transition">
            <div class="text-green-600 mb-4">
                <svg class="h-16 w-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
            </div>
            <h3 class="text-3xl font-bold text-gray-800 mb-2">{{ \App\Models\Conductor::count() }}</h3>
            <p class="text-gray-600 font-semibold">Conductores Activos</p>
            <a href="{{ route('conductores.index') }}" class="text-green-600 hover:text-green-800 font-medium mt-3 inline-block">Ver todos →</a>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-8 transform hover:scale-105 transition">
            <div class="text-purple-600 mb-4">
                <svg class="h-16 w-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
            </div>
            <h3 class="text-3xl font-bold text-gray-800 mb-2">{{ \App\Models\Propietario::count() }}</h3>
            <p class="text-gray-600 font-semibold">Propietarios Registrados</p>
            <a href="{{ route('propietarios.index') }}" class="text-purple-600 hover:text-purple-800 font-medium mt-3 inline-block">Ver todos →</a>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white rounded-xl shadow-lg p-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Acciones Rápidas</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <a href="{{ route('conductores.create') }}" class="bg-green-50 hover:bg-green-100 border-2 border-green-200 rounded-lg p-6 transition">
                <div class="text-green-600 mb-2">
                    <svg class="h-8 w-8 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                    </svg>
                </div>
                <p class="text-gray-700 font-semibold">Registrar Conductor</p>
            </a>

            <a href="{{ route('propietarios.create') }}" class="bg-purple-50 hover:bg-purple-100 border-2 border-purple-200 rounded-lg p-6 transition">
                <div class="text-purple-600 mb-2">
                    <svg class="h-8 w-8 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                    </svg>
                </div>
                <p class="text-gray-700 font-semibold">Registrar Propietario</p>
            </a>

            <a href="{{ route('vehiculos.create') }}" class="bg-blue-50 hover:bg-blue-100 border-2 border-blue-200 rounded-lg p-6 transition">
                <div class="text-blue-600 mb-2">
                    <svg class="h-8 w-8 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                </div>
                <p class="text-gray-700 font-semibold">Registrar Vehículo</p>
            </a>
        </div>
    </div>
</div>
@endsection
