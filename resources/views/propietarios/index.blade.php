@extends('layouts.app')

@section('title', 'Propietarios - ACME Transportes')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <h1 class="text-3xl font-bold text-gray-800">Gestión de Propietarios</h1>
    <a href="{{ route('propietarios.create') }}" class="btn-primary">
        <svg class="inline-block h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
        </svg>
        Nuevo Propietario
    </a>
</div>

<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cédula</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre Completo</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ciudad</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Teléfono</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Vehículos</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($propietarios as $propietario)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">{{ $propietario->numero_cedula }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $propietario->nombre_completo }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $propietario->ciudad }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $propietario->telefono }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">
                            {{ $propietario->vehiculos_count }} vehículo(s)
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="{{ route('propietarios.show', $propietario) }}" class="text-blue-600 hover:text-blue-900 mr-3">Ver</a>
                        <a href="{{ route('propietarios.edit', $propietario) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Editar</a>
                        <form action="{{ route('propietarios.destroy', $propietario) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Está seguro de eliminar este propietario?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                        <p class="text-lg font-medium">No hay propietarios registrados</p>
                        <p class="mt-2">
                            <a href="{{ route('propietarios.create') }}" class="text-blue-600 hover:text-blue-800 font-medium">
                                Registre el primer propietario →
                            </a>
                        </p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@if($propietarios->hasPages())
<div class="mt-6">
    {{ $propietarios->links() }}
</div>
@endif
@endsection
