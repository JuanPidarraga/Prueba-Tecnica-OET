@extends('layouts.app')

@section('title', 'Detalles del Vehículo - ACME Transportes')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-6 flex justify-between items-center">
        <a href="{{ route('vehiculos.index') }}" class="text-blue-600 hover:text-blue-800 font-medium">
            ← Volver a vehículos
        </a>
        <div class="space-x-2">
            <a href="{{ route('vehiculos.edit', $vehiculo) }}" class="btn-primary">
                Editar
            </a>
            <form action="{{ route('vehiculos.destroy', $vehiculo) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Está seguro de eliminar este vehículo?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-danger">Eliminar</button>
            </form>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-8 mb-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Detalles del Vehículo</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-500 mb-1">Placa</label>
                <p class="text-2xl font-bold text-blue-600">{{ $vehiculo->placa }}</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-500 mb-1">Tipo de Vehículo</label>
                <p class="text-lg">
                    <span class="px-3 py-1 inline-flex text-sm font-semibold rounded-full 
                        {{ $vehiculo->tipo_vehiculo == 'particular' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                        {{ ucfirst($vehiculo->tipo_vehiculo) }}
                    </span>
                </p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-500 mb-1">Marca</label>
                <p class="text-lg font-semibold text-gray-900">{{ $vehiculo->marca }}</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-500 mb-1">Color</label>
                <p class="text-lg text-gray-900 flex items-center">
                    <span class="h-4 w-4 rounded-full mr-2" style="background-color: {{ strtolower($vehiculo->color) }}"></span>
                    {{ $vehiculo->color }}
                </p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Información del Conductor -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                <svg class="h-6 w-6 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
                Conductor
            </h2>
            <div class="space-y-3">
                <div>
                    <label class="block text-sm font-medium text-gray-500">Nombre</label>
                    <p class="text-lg font-semibold text-gray-900">{{ $vehiculo->conductor->nombre_completo }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-500">Cédula</label>
                    <p class="text-gray-900">{{ $vehiculo->conductor->numero_cedula }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-500">Teléfono</label>
                    <p class="text-gray-900">{{ $vehiculo->conductor->telefono }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-500">Ciudad</label>
                    <p class="text-gray-900">{{ $vehiculo->conductor->ciudad }}</p>
                </div>
                <a href="{{ route('conductores.show', $vehiculo->conductor) }}" class="text-blue-600 hover:text-blue-800 font-medium inline-block mt-2">
                    Ver detalles completos →
                </a>
            </div>
        </div>

        <!-- Información del Propietario -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                <svg class="h-6 w-6 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
                Propietario
            </h2>
            <div class="space-y-3">
                <div>
                    <label class="block text-sm font-medium text-gray-500">Nombre</label>
                    <p class="text-lg font-semibold text-gray-900">{{ $vehiculo->propietario->nombre_completo }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-500">Cédula</label>
                    <p class="text-gray-900">{{ $vehiculo->propietario->numero_cedula }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-500">Teléfono</label>
                    <p class="text-gray-900">{{ $vehiculo->propietario->telefono }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-500">Ciudad</label>
                    <p class="text-gray-900">{{ $vehiculo->propietario->ciudad }}</p>
                </div>
                <a href="{{ route('propietarios.show', $vehiculo->propietario) }}" class="text-blue-600 hover:text-blue-800 font-medium inline-block mt-2">
                    Ver detalles completos →
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
