# 🚀 INSTRUCCIONES RÁPIDAS - ACME Transportes

## ⚡ Inicio Rápido (5 minutos)

### Paso 1️⃣: Asegúrate que XAMPP esté corriendo
- Abre XAMPP Control Panel
- Inicia **Apache** y **MySQL**

### Paso 2️⃣: Crear la base de datos
1. Abre tu navegador: `http://localhost/phpmyadmin`
2. Clic en "Nueva" base de datos
3. Nombre: `acme_transportes`
4. Cotejamiento: `utf8mb4_unicode_ci`
5. Clic en "Crear"

### Paso 3️⃣: Ejecutar el setup automático

**Opción A - Script Automático (Recomendado):**
```powershell
.\setup.ps1
```

**Opción B - Manual:**
```bash
# 1. Instalar dependencias
composer install
npm install

# 2. Configurar entorno
Copy-Item .env.example .env
php artisan key:generate

# 3. Editar .env (asegúrate que tenga):
DB_DATABASE=acme_transportes
DB_USERNAME=root
DB_PASSWORD=

# 4. Migrar base de datos
php artisan migrate

# 5. (Opcional) Cargar datos de ejemplo
php artisan db:seed --class=DatosEjemploSeeder

# 6. Compilar CSS
npm run dev
```

### Paso 4️⃣: Iniciar la aplicación

**Terminal 1 - Servidor Laravel:**
```bash
php artisan serve
```

**Terminal 2 - Compilar Tailwind CSS:**
```bash
npm run watch
```

### Paso 5️⃣: Abrir en el navegador
```
http://localhost:8000
```

---
---

## 📊 Estructura de la Base de Datos

```
┌─────────────────┐       ┌──────────────┐       ┌─────────────────┐
│  conductores    │       │  vehiculos   │       │  propietarios   │
├─────────────────┤       ├──────────────┤       ├─────────────────┤
│ id              │◄──────┤ conductor_id │       │ id              │
│ numero_cedula   │       │ propietario_id├──────►│ numero_cedula   │
│ primer_nombre   │       │ placa        │       │ primer_nombre   │
│ segundo_nombre  │       │ color        │       │ segundo_nombre  │
│ apellidos       │       │ marca        │       │ apellidos       │
│ direccion       │       │ tipo_vehiculo│       │ direccion       │
│ telefono        │       └──────────────┘       │ telefono        │
│ ciudad          │                              │ ciudad          │
└─────────────────┘                              └─────────────────┘
```

---

## 🎨 Vistas Creadas

1. **Dashboard (Home)**
   - Estadísticas en tiempo real
   - Tarjetas con animaciones
   - Accesos rápidos

2. **Vehículos**
   - Lista con tabla profesional
   - Formulario de registro/edición
   - Indicadores de tipo (particular/público)

3. **Conductores**
   - Gestión completa
   - Contador de vehículos asignados
   - Formularios validados

4. **Propietarios**
   - CRUD completo
   - Visualización de relaciones
   - Diseño consistente

5. **Informes**
   - Filtros avanzados
   - Tabla de resultados
   - Paginación incluida

---

## 💡 Tips para Impresionar

### 1. Muestra el código limpio
- Controladores con métodos descriptivos
- Modelos con relaciones claras
- Vistas organizadas en carpetas

### 2. Destaca las validaciones
- Unicidad de placas y cédulas
- Mensajes de error personalizados
- Validación de relaciones

### 3. Explica la arquitectura
- Separación de responsabilidades
- Uso de Eloquent ORM
- Blade components y layouts

### 4. Demuestra el diseño
- Responsive design
- Tailwind utilities
- Componentes reutilizables
- Animaciones profesionales

### 5. Funcionalidades extras
- Seeders con datos de ejemplo
- Paginación automática
- Búsqueda y filtros
- Mensajes flash elegantes

---
