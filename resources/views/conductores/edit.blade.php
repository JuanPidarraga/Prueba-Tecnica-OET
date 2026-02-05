@extends('layouts.app')

@section('title', 'Editar Conductor - ACME Transportes')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('conductores.index') }}" class="text-blue-600 hover:text-blue-800 font-medium">
            ← Volver a conductores
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-md p-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Editar Conductor</h1>

        <form action="{{ route('conductores.update', $conductor) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label for="numero_cedula" class="block text-sm font-medium text-gray-700 mb-2">Número de Cédula *</label>
                    <input type="text" name="numero_cedula" id="numero_cedula" value="{{ old('numero_cedula', $conductor->numero_cedula) }}" 
                           class="input-field @error('numero_cedula') border-red-500 @enderror" required>
                    @error('numero_cedula')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="primer_nombre" class="block text-sm font-medium text-gray-700 mb-2">Primer Nombre *</label>
                    <input type="text" name="primer_nombre" id="primer_nombre" value="{{ old('primer_nombre', $conductor->primer_nombre) }}" 
                           class="input-field @error('primer_nombre') border-red-500 @enderror" required>
                    @error('primer_nombre')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="segundo_nombre" class="block text-sm font-medium text-gray-700 mb-2">Segundo Nombre</label>
                    <input type="text" name="segundo_nombre" id="segundo_nombre" value="{{ old('segundo_nombre', $conductor->segundo_nombre) }}" 
                           class="input-field @error('segundo_nombre') border-red-500 @enderror">
                    @error('segundo_nombre')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="md:col-span-2">
                    <label for="apellidos" class="block text-sm font-medium text-gray-700 mb-2">Apellidos *</label>
                    <input type="text" name="apellidos" id="apellidos" value="{{ old('apellidos', $conductor->apellidos) }}" 
                           class="input-field @error('apellidos') border-red-500 @enderror" required>
                    @error('apellidos')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="md:col-span-2">
                    <label for="direccion" class="block text-sm font-medium text-gray-700 mb-2">Dirección *</label>
                    <textarea name="direccion" id="direccion" rows="3" 
                              class="input-field @error('direccion') border-red-500 @enderror" required>{{ old('direccion', $conductor->direccion) }}</textarea>
                    @error('direccion')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="telefono" class="block text-sm font-medium text-gray-700 mb-2">Teléfono *</label>
                    <input type="text" name="telefono" id="telefono" value="{{ old('telefono', $conductor->telefono) }}" 
                           class="input-field @error('telefono') border-red-500 @enderror" required>
                    @error('telefono')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="ciudad" class="block text-sm font-medium text-gray-700 mb-2">Ciudad *</label>
                    <input type="text" name="ciudad" id="ciudad" value="{{ old('ciudad', $conductor->ciudad) }}" 
                           class="input-field @error('ciudad') border-red-500 @enderror" required>
                    @error('ciudad')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-8 flex justify-end space-x-3">
                <a href="{{ route('conductores.index') }}" class="btn-secondary">Cancelar</a>
                <button type="submit" class="btn-primary">Actualizar Conductor</button>
            </div>
        </form>
    </div>
</div>
@endsection
