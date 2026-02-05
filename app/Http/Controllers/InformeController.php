<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;

class InformeController extends Controller
{
    /**
     * Mostrar informe de vehículos
     */
    public function index(Request $request)
    {
        $query = Vehiculo::with(['conductor', 'propietario']);

        // Filtros opcionales
        if ($request->filled('placa')) {
            $query->where('placa', 'like', '%' . $request->placa . '%');
        }

        if ($request->filled('marca')) {
            $query->where('marca', 'like', '%' . $request->marca . '%');
        }

        if ($request->filled('tipo_vehiculo')) {
            $query->where('tipo_vehiculo', $request->tipo_vehiculo);
        }

        $vehiculos = $query->orderBy('placa')->paginate(15);

        return view('informes.index', compact('vehiculos'));
    }
}
