<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use App\Models\Conductor;
use App\Models\Propietario;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    /**
     * Mostrar listado de vehículos
     */
    public function index()
    {
        $vehiculos = Vehiculo::with(['conductor', 'propietario'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        
        return view('vehiculos.index', compact('vehiculos'));
    }

    /**
     * Mostrar formulario de creación
     */
    public function create()
    {
        $conductores = Conductor::orderBy('primer_nombre')->get();
        $propietarios = Propietario::orderBy('primer_nombre')->get();
        
        return view('vehiculos.create', compact('conductores', 'propietarios'));
    }

    /**
     * Guardar nuevo vehículo
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'placa' => 'required|string|max:10|unique:vehiculos,placa',
            'color' => 'required|string|max:50',
            'marca' => 'required|string|max:50',
            'tipo_vehiculo' => 'required|in:particular,publico',
            'conductor_id' => 'required|exists:conductores,id',
            'propietario_id' => 'required|exists:propietarios,id',
        ], [
            'placa.required' => 'La placa es obligatoria',
            'placa.unique' => 'Esta placa ya está registrada',
            'conductor_id.required' => 'Debe seleccionar un conductor',
            'propietario_id.required' => 'Debe seleccionar un propietario',
        ]);

        Vehiculo::create($validated);

        return redirect()->route('vehiculos.index')
            ->with('success', 'Vehículo registrado exitosamente');
    }

    /**
     * Mostrar detalles de un vehículo
     */
    public function show(Vehiculo $vehiculo)
    {
        $vehiculo->load(['conductor', 'propietario']);
        return view('vehiculos.show', compact('vehiculo'));
    }

    /**
     * Mostrar formulario de edición
     */
    public function edit(Vehiculo $vehiculo)
    {
        $conductores = Conductor::orderBy('primer_nombre')->get();
        $propietarios = Propietario::orderBy('primer_nombre')->get();
        
        return view('vehiculos.edit', compact('vehiculo', 'conductores', 'propietarios'));
    }

    /**
     * Actualizar vehículo
     */
    public function update(Request $request, Vehiculo $vehiculo)
    {
        $validated = $request->validate([
            'placa' => 'required|string|max:10|unique:vehiculos,placa,' . $vehiculo->id,
            'color' => 'required|string|max:50',
            'marca' => 'required|string|max:50',
            'tipo_vehiculo' => 'required|in:particular,publico',
            'conductor_id' => 'required|exists:conductores,id',
            'propietario_id' => 'required|exists:propietarios,id',
        ]);

        $vehiculo->update($validated);

        return redirect()->route('vehiculos.index')
            ->with('success', 'Vehículo actualizado exitosamente');
    }

    /**
     * Eliminar vehículo
     */
    public function destroy(Vehiculo $vehiculo)
    {
        $vehiculo->delete();

        return redirect()->route('vehiculos.index')
            ->with('success', 'Vehículo eliminado exitosamente');
    }
}
