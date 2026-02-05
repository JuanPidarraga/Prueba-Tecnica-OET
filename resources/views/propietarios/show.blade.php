@extends('layouts.app')

@section('title', 'Detalles del Propietario - ACME Transportes')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-6 flex justify-between items-center">
        <a href="{{ route('propietarios.index') }}" class="text-blue-600 hover:text-blue-800 font-medium">
            ← Volver a propietarios
        </a>
        <div class="space-x-2">
            <a href="{{ route('propietarios.edit', $propietario) }}" class="btn-primary">
                Editar
            </a>
            <form action="{{ route('propietarios.destroy', $propietario) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Está seguro de eliminar este propietario?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-danger">Eliminar</button>
            </form>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-8 mb-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Detalles del Propietario</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-500 mb-1">Número de Cédula</label>
                <p class="text-lg font-semibold text-gray-900">{{ $propietario->numero_cedula }}</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-500 mb-1">Nombre Completo</label>
                <p class="text-lg font-semibold text-gray-900">{{ $propietario->nombre_completo }}</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-500 mb-1">Ciudad</label>
                <p class="text-lg text-gray-900">{{ $propietario->ciudad }}</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-500 mb-1">Teléfono</label>
                <p class="text-lg text-gray-900">{{ $propietario->telefono }}</p>
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-500 mb-1">Dirección</label>
                <p class="text-lg text-gray-900">{{ $propietario->direccion }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Vehículos de su Propiedad</h2>
        
        @if($propietario->vehiculos->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Placa</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Marca</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Color</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tipo</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($propietario->vehiculos as $vehiculo)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap font-bold text-blue-600">{{ $vehiculo->placa }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $vehiculo->marca }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $vehiculo->color }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    {{ $vehiculo->tipo_vehiculo == 'particular' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                                    {{ ucfirst($vehiculo->tipo_vehiculo) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('vehiculos.show', $vehiculo) }}" class="text-blue-600 hover:text-blue-900">Ver detalles</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-gray-500 text-center py-8">No hay vehículos registrados a nombre de este propietario</p>
        @endif
    </div>
</div>
@endsection
