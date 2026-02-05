@extends('layouts.app')

@section('title', 'Informe de Vehículos - ACME Transportes')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-800">Informe de Vehículos</h1>
    <p class="text-gray-600 mt-2">Consulta la información completa de vehículos registrados</p>
</div>

<!-- Filtros -->
<div class="bg-white rounded-lg shadow-md p-6 mb-6">
    <form method="GET" action="{{ route('informes.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div>
            <label for="placa" class="block text-sm font-medium text-gray-700 mb-2">Placa</label>
            <input type="text" name="placa" id="placa" value="{{ request('placa') }}" 
                   class="input-field" placeholder="Buscar por placa...">
        </div>
        
        <div>
            <label for="marca" class="block text-sm font-medium text-gray-700 mb-2">Marca</label>
            <input type="text" name="marca" id="marca" value="{{ request('marca') }}" 
                   class="input-field" placeholder="Buscar por marca...">
        </div>
        
        <div>
            <label for="tipo_vehiculo" class="block text-sm font-medium text-gray-700 mb-2">Tipo</label>
            <select name="tipo_vehiculo" id="tipo_vehiculo" class="input-field">
                <option value="">Todos</option>
                <option value="particular" {{ request('tipo_vehiculo') == 'particular' ? 'selected' : '' }}>Particular</option>
                <option value="publico" {{ request('tipo_vehiculo') == 'publico' ? 'selected' : '' }}>Público</option>
            </select>
        </div>
        
        <div class="flex items-end">
            <button type="submit" class="btn-primary w-full">
                <svg class="inline-block h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                Filtrar
            </button>
        </div>
    </form>
</div>

<!-- Tabla de Informe -->
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gradient-to-r from-blue-600 to-blue-700 text-white">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Placa</th>
                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Marca</th>
                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Conductor</th>
                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider">Propietario</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($vehiculos as $vehiculo)
                <tr class="hover:bg-blue-50 transition">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="font-bold text-blue-600 text-lg">{{ $vehiculo->placa }}</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">
                        {{ $vehiculo->marca }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-700">
                        {{ $vehiculo->conductor->nombre_completo }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-700">
                        {{ $vehiculo->propietario->nombre_completo }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-12 text-center text-gray-500">
                        <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <p class="text-lg font-medium">No se encontraron vehículos</p>
                        <p class="mt-2 text-sm">Intenta con otros criterios de búsqueda</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@if($vehiculos->hasPages())
<div class="mt-6">
    {{ $vehiculos->appends(request()->query())->links() }}
</div>
@endif

<!-- Resumen -->
@if($vehiculos->count() > 0)
<div class="mt-6 bg-blue-50 border-l-4 border-blue-500 p-4 rounded">
    <p class="text-blue-700 font-medium">
        <svg class="inline-block h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
        Mostrando {{ $vehiculos->count() }} vehículo(s) de {{ $vehiculos->total() }} en total
    </p>
</div>
@endif
@endsection
