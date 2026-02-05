<?php

namespace App\Http\Controllers;

use App\Models\Conductor;
use Illuminate\Http\Request;

class ConductorController extends Controller
{
    /**
     * Mostrar listado de conductores
     */
    public function index()
    {
        $conductores = Conductor::withCount('vehiculos')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        
        return view('conductores.index', compact('conductores'));
    }

    /**
     * Mostrar formulario de creación
     */
    public function create()
    {
        return view('conductores.create');
    }

    /**
     * Guardar nuevo conductor
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'numero_cedula' => 'required|string|max:20|unique:conductores,numero_cedula',
            'primer_nombre' => 'required|string|max:100',
            'segundo_nombre' => 'nullable|string|max:100',
            'apellidos' => 'required|string|max:100',
            'direccion' => 'required|string',
            'telefono' => 'required|string|max:20',
            'ciudad' => 'required|string|max:100',
        ], [
            'numero_cedula.required' => 'El número de cédula es obligatorio',
            'numero_cedula.unique' => 'Este número de cédula ya está registrado',
            'primer_nombre.required' => 'El primer nombre es obligatorio',
            'apellidos.required' => 'Los apellidos son obligatorios',
        ]);

        Conductor::create($validated);

        return redirect()->route('conductores.index')
            ->with('success', 'Conductor registrado exitosamente');
    }

    /**
     * Mostrar detalles de un conductor
     */
    public function show(Conductor $conductor)
    {
        $conductor->load('vehiculos');
        return view('conductores.show', compact('conductor'));
    }

    /**
     * Mostrar formulario de edición
     */
    public function edit(Conductor $conductor)
    {
        return view('conductores.edit', compact('conductor'));
    }

    /**
     * Actualizar conductor
     */
    public function update(Request $request, Conductor $conductor)
    {
        $validated = $request->validate([
            'numero_cedula' => 'required|string|max:20|unique:conductores,numero_cedula,' . $conductor->id,
            'primer_nombre' => 'required|string|max:100',
            'segundo_nombre' => 'nullable|string|max:100',
            'apellidos' => 'required|string|max:100',
            'direccion' => 'required|string',
            'telefono' => 'required|string|max:20',
            'ciudad' => 'required|string|max:100',
        ]);

        $conductor->update($validated);

        return redirect()->route('conductores.index')
            ->with('success', 'Conductor actualizado exitosamente');
    }

    /**
     * Eliminar conductor
     */
    public function destroy(Conductor $conductor)
    {
        $conductor->delete();

        return redirect()->route('conductores.index')
            ->with('success', 'Conductor eliminado exitosamente');
    }
}
