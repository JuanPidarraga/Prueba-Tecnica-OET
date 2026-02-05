<?php

namespace App\Http\Controllers;

use App\Models\Propietario;
use Illuminate\Http\Request;

class PropietarioController extends Controller
{
    /**
     * Mostrar listado de propietarios
     */
    public function index()
    {
        $propietarios = Propietario::withCount('vehiculos')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        
        return view('propietarios.index', compact('propietarios'));
    }

    /**
     * Mostrar formulario de creación
     */
    public function create()
    {
        return view('propietarios.create');
    }

    /**
     * Guardar nuevo propietario
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'numero_cedula' => 'required|string|max:20|unique:propietarios,numero_cedula',
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

        Propietario::create($validated);

        return redirect()->route('propietarios.index')
            ->with('success', 'Propietario registrado exitosamente');
    }

    /**
     * Mostrar detalles de un propietario
     */
    public function show(Propietario $propietario)
    {
        $propietario->load('vehiculos');
        return view('propietarios.show', compact('propietario'));
    }

    /**
     * Mostrar formulario de edición
     */
    public function edit(Propietario $propietario)
    {
        return view('propietarios.edit', compact('propietario'));
    }

    /**
     * Actualizar propietario
     */
    public function update(Request $request, Propietario $propietario)
    {
        $validated = $request->validate([
            'numero_cedula' => 'required|string|max:20|unique:propietarios,numero_cedula,' . $propietario->id,
            'primer_nombre' => 'required|string|max:100',
            'segundo_nombre' => 'nullable|string|max:100',
            'apellidos' => 'required|string|max:100',
            'direccion' => 'required|string',
            'telefono' => 'required|string|max:20',
            'ciudad' => 'required|string|max:100',
        ]);

        $propietario->update($validated);

        return redirect()->route('propietarios.index')
            ->with('success', 'Propietario actualizado exitosamente');
    }

    /**
     * Eliminar propietario
     */
    public function destroy(Propietario $propietario)
    {
        $propietario->delete();

        return redirect()->route('propietarios.index')
            ->with('success', 'Propietario eliminado exitosamente');
    }
}
