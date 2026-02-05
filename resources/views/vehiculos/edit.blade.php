@extends('layouts.app')

@section('title', 'Editar Vehículo - ACME Transportes')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('vehiculos.index') }}" class="text-blue-600 hover:text-blue-800 font-medium">
            ← Volver a vehículos
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-md p-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Editar Vehículo</h1>

        <form action="{{ route('vehiculos.update', $vehiculo) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Placa -->
                <div>
                    <label for="placa" class="block text-sm font-medium text-gray-700 mb-2">Placa *</label>
                    <input type="text" name="placa" id="placa" value="{{ old('placa', $vehiculo->placa) }}" 
                           class="input-field @error('placa') border-red-500 @enderror" 
                           placeholder="ABC-123" required>
                    @error('placa')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Marca -->
                <div>
                    <label for="marca" class="block text-sm font-medium text-gray-700 mb-2">Marca *</label>
                    <input type="text" name="marca" id="marca" value="{{ old('marca', $vehiculo->marca) }}" 
                           class="input-field @error('marca') border-red-500 @enderror" 
                           placeholder="Toyota" required>
                    @error('marca')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Color -->
                <div>
                    <label for="color" class="block text-sm font-medium text-gray-700 mb-2">Color *</label>
                    <input type="text" name="color" id="color" value="{{ old('color', $vehiculo->color) }}" 
                           class="input-field @error('color') border-red-500 @enderror" 
                           placeholder="Blanco" required>
                    @error('color')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tipo de Vehículo -->
                <div>
                    <label for="tipo_vehiculo" class="block text-sm font-medium text-gray-700 mb-2">Tipo de Vehículo *</label>
                    <select name="tipo_vehiculo" id="tipo_vehiculo" 
                            class="input-field @error('tipo_vehiculo') border-red-500 @enderror" required>
                        <option value="">Seleccione...</option>
                        <option value="particular" {{ old('tipo_vehiculo', $vehiculo->tipo_vehiculo) == 'particular' ? 'selected' : '' }}>Particular</option>
                        <option value="publico" {{ old('tipo_vehiculo', $vehiculo->tipo_vehiculo) == 'publico' ? 'selected' : '' }}>Público</option>
                    </select>
                    @error('tipo_vehiculo')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Conductor -->
                <div>
                    <label for="conductor_id" class="block text-sm font-medium text-gray-700 mb-2">Conductor *</label>
                    <select name="conductor_id" id="conductor_id" 
                            class="input-field @error('conductor_id') border-red-500 @enderror" required>
                        <option value="">Seleccione un conductor...</option>
                        @foreach($conductores as $conductor)
                            <option value="{{ $conductor->id }}" {{ old('conductor_id', $vehiculo->conductor_id) == $conductor->id ? 'selected' : '' }}>
                                {{ $conductor->nombre_completo }} ({{ $conductor->numero_cedula }})
                            </option>
                        @endforeach
                    </select>
                    @error('conductor_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Propietario -->
                <div>
                    <label for="propietario_id" class="block text-sm font-medium text-gray-700 mb-2">Propietario *</label>
                    <select name="propietario_id" id="propietario_id" 
                            class="input-field @error('propietario_id') border-red-500 @enderror" required>
                        <option value="">Seleccione un propietario...</option>
                        @foreach($propietarios as $propietario)
                            <option value="{{ $propietario->id }}" {{ old('propietario_id', $vehiculo->propietario_id) == $propietario->id ? 'selected' : '' }}>
                                {{ $propietario->nombre_completo }} ({{ $propietario->numero_cedula }})
                            </option>
                        @endforeach
                    </select>
                    @error('propietario_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-8 flex justify-end space-x-3">
                <a href="{{ route('vehiculos.index') }}" class="btn-secondary">
                    Cancelar
                </a>
                <button type="submit" class="btn-primary">
                    Actualizar Vehículo
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
