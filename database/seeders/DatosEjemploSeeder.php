<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Conductor;
use App\Models\Propietario;
use App\Models\Vehiculo;

class DatosEjemploSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear Conductores
        $conductores = [
            [
                'numero_cedula' => '1234567890',
                'primer_nombre' => 'Carlos',
                'segundo_nombre' => 'Alberto',
                'apellidos' => 'Gómez Pérez',
                'direccion' => 'Calle 123 #45-67',
                'telefono' => '3001234567',
                'ciudad' => 'Bogotá'
            ],
            [
                'numero_cedula' => '0987654321',
                'primer_nombre' => 'María',
                'segundo_nombre' => 'Fernanda',
                'apellidos' => 'Rodríguez López',
                'direccion' => 'Carrera 45 #12-34',
                'telefono' => '3109876543',
                'ciudad' => 'Medellín'
            ],
            [
                'numero_cedula' => '1122334455',
                'primer_nombre' => 'Jorge',
                'segundo_nombre' => null,
                'apellidos' => 'Martínez Silva',
                'direccion' => 'Avenida 68 #89-12',
                'telefono' => '3201122334',
                'ciudad' => 'Cali'
            ],
        ];

        foreach ($conductores as $conductor) {
            Conductor::create($conductor);
        }

        // Crear Propietarios
        $propietarios = [
            [
                'numero_cedula' => '5566778899',
                'primer_nombre' => 'Ana',
                'segundo_nombre' => 'Patricia',
                'apellidos' => 'Sánchez Castro',
                'direccion' => 'Transversal 23 #56-78',
                'telefono' => '3155667788',
                'ciudad' => 'Barranquilla'
            ],
            [
                'numero_cedula' => '9988776655',
                'primer_nombre' => 'Luis',
                'segundo_nombre' => 'Eduardo',
                'apellidos' => 'Torres Ramírez',
                'direccion' => 'Diagonal 34 #67-89',
                'telefono' => '3009988776',
                'ciudad' => 'Cartagena'
            ],
            [
                'numero_cedula' => '4455667788',
                'primer_nombre' => 'Sandra',
                'segundo_nombre' => null,
                'apellidos' => 'Vargas Moreno',
                'direccion' => 'Calle 90 #23-45',
                'telefono' => '3184455667',
                'ciudad' => 'Bogotá'
            ],
        ];

        foreach ($propietarios as $propietario) {
            Propietario::create($propietario);
        }

        // Crear Vehículos
        $vehiculos = [
            [
                'placa' => 'ABC123',
                'color' => 'Blanco',
                'marca' => 'Toyota',
                'tipo_vehiculo' => 'particular',
                'conductor_id' => 1,
                'propietario_id' => 1
            ],
            [
                'placa' => 'XYZ789',
                'color' => 'Negro',
                'marca' => 'Mazda',
                'tipo_vehiculo' => 'publico',
                'conductor_id' => 2,
                'propietario_id' => 2
            ],
            [
                'placa' => 'DEF456',
                'color' => 'Rojo',
                'marca' => 'Chevrolet',
                'tipo_vehiculo' => 'particular',
                'conductor_id' => 3,
                'propietario_id' => 3
            ],
            [
                'placa' => 'GHI789',
                'color' => 'Azul',
                'marca' => 'Renault',
                'tipo_vehiculo' => 'publico',
                'conductor_id' => 1,
                'propietario_id' => 2
            ],
            [
                'placa' => 'JKL012',
                'color' => 'Gris',
                'marca' => 'Nissan',
                'tipo_vehiculo' => 'particular',
                'conductor_id' => 2,
                'propietario_id' => 1
            ],
        ];

        foreach ($vehiculos as $vehiculo) {
            Vehiculo::create($vehiculo);
        }
    }
}
