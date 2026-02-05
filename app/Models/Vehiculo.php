<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $fillable = [
        'placa',
        'color',
        'marca',
        'tipo_vehiculo',
        'conductor_id',
        'propietario_id'
    ];

    /**
     * Relación: Un vehículo pertenece a un conductor
     */
    public function conductor()
    {
        return $this->belongsTo(Conductor::class);
    }

    /**
     * Relación: Un vehículo pertenece a un propietario
     */
    public function propietario()
    {
        return $this->belongsTo(Propietario::class);
    }

    /**
     * Scopes para filtros
     */
    public function scopeParticular($query)
    {
        return $query->where('tipo_vehiculo', 'particular');
    }

    public function scopePublico($query)
    {
        return $query->where('tipo_vehiculo', 'publico');
    }
}
