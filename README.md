# 🚗 ACME Transportes - Sistema de Gestión

Sistema profesional de gestión de vehículos, conductores y propietarios desarrollado con Laravel 9 y Tailwind CSS.

## ✨ Características

- ✅ **Gestión Completa de Vehículos**: Registro, edición y eliminación de vehículos
- 👤 **Gestión de Conductores**: Administración de información completa de conductores
- 👥 **Gestión de Propietarios**: Control de propietarios con datos detallados
- 📊 **Informes Profesionales**: Consulta de información con filtros avanzados
- 🎨 **Interfaz Moderna**: Diseño profesional con Tailwind CSS
- 🏗️ **Arquitectura MVC**: Separación clara de capas (Modelos, Vistas, Controladores)
- 🔗 **Relaciones Eloquent**: Relaciones bien definidas entre entidades
- ✔️ **Validaciones Robustas**: Validación completa de datos en servidor
- 📱 **Diseño Responsive**: Adaptable a dispositivos móviles y desktop

## 🛠️ Tecnologías Utilizadas

- **Laravel 9**: Framework PHP moderno y robusto
- **PHP 8.x**: Lenguaje de programación backend
- **MySQL**: Base de datos relacional
- **Tailwind CSS 3**: Framework CSS utility-first
- **Blade**: Motor de plantillas de Laravel
- **Eloquent ORM**: ORM para interacción con base de datos

## 📋 Requisitos Previos

- PHP >= 8.0
- Composer
- MySQL / MariaDB
- Node.js >= 14.x
- NPM >= 6.x
- XAMPP (recomendado para desarrollo local)

## 🚀 Instalación

### 1. Instalar dependencias PHP

```bash
composer install
```

### 2. Instalar dependencias Node.js

```bash
npm install
```

### 3. Configurar archivo de entorno

```bash
# En Windows (PowerShell)
Copy-Item .env.example .env

# Generar la clave de aplicación
php artisan key:generate
```

### 4. Configurar Base de Datos

Editar el archivo `.env` con tu configuración de MySQL:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=acme_transportes
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Crear la base de datos

En phpMyAdmin (XAMPP) crear la base de datos:

```sql
CREATE DATABASE acme_transportes CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### 6. Ejecutar migraciones

```bash
php artisan migrate
```

### 7. (Opcional) Cargar datos de ejemplo

```bash
php artisan db:seed --class=DatosEjemploSeeder
```

### 8. Compilar assets (Tailwind CSS)

```bash
# Para desarrollo
npm run dev

# O para desarrollo con watch
npm run watch

# Para producción
npm run prod
```

### 9. Iniciar el servidor

```bash
php artisan serve
```

La aplicación estará disponible en: `http://localhost:8000`

## 📁 Estructura del Proyecto

```
acme-transportes/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── VehiculoController.php
│   │       ├── ConductorController.php
│   │       ├── PropietarioController.php
│   │       └── InformeController.php
│   └── Models/
│       ├── Vehiculo.php
│       ├── Conductor.php
│       └── Propietario.php
├── database/
│   ├── migrations/
│   │   ├── 2024_02_04_000001_create_propietarios_table.php
│   │   ├── 2024_02_04_000002_create_conductores_table.php
│   │   └── 2024_02_04_000003_create_vehiculos_table.php
│   └── seeders/
│       └── DatosEjemploSeeder.php
├── resources/
│   ├── css/
│   │   └── app.css (Tailwind CSS)
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php
│       ├── vehiculos/
│       ├── conductores/
│       ├── propietarios/
│       ├── informes/
│       └── welcome.blade.php
└── routes/
    └── web.php
```

## 🎯 Funcionalidades

### Vehículos
- Registro de nuevos vehículos con placa, color, marca, tipo
- Asignación de conductor y propietario
- Validación única de placas
- Edición y eliminación de registros

### Conductores
- Registro completo de información personal
- Número de cédula único
- Visualización de vehículos asignados
- CRUD completo

### Propietarios
- Gestión de datos de propietarios
- Identificación única por cédula
- Relación con vehículos
- Operaciones CRUD

### Informes
- Listado completo de vehículos
- Filtros por placa, marca y tipo
- Información de conductor y propietario
- Paginación y búsqueda

## 🎨 Diseño

El sistema cuenta con:
- Dashboard principal con estadísticas en tiempo real
- Tarjetas interactivas con hover effects
- Tablas responsivas con diseño moderno
- Formularios con validación visual
- Mensajes de éxito/error elegantes
- Navegación intuitiva

## 📊 Base de Datos

### Tablas principales:
- `vehiculos`: Información de vehículos
- `conductores`: Datos de conductores
- `propietarios`: Información de propietarios

### Relaciones:
- Un conductor puede tener múltiples vehículos
- Un propietario puede tener múltiples vehículos
- Un vehículo pertenece a un conductor y un propietario

## 🔒 Validaciones

- Placas únicas en el sistema
- Números de cédula únicos
- Campos obligatorios validados
- Tipos de datos correctos
- Relaciones existentes verificadas

## 📝 Comandos Útiles

```bash
# Limpiar caché
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Ver rutas disponibles
php artisan route:list

# Reiniciar base de datos
php artisan migrate:fresh --seed
```

## 🤝 Contribuciones

Este proyecto fue desarrollado como prueba técnica para ACME Transportes S.A.

## 👨‍💻 Desarrollador

Sistema desarrollado con dedicación y profesionalismo usando las mejores prácticas de Laravel y diseño moderno con Tailwind CSS.

---

**Hecho con ❤️ y Laravel + Tailwind CSS**
