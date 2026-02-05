# Script de Setup para ACME Transportes
# Ejecutar en PowerShell

Write-Host "🚗 Iniciando configuración de ACME Transportes..." -ForegroundColor Cyan
Write-Host ""

# 1. Instalar dependencias PHP
Write-Host "📦 Instalando dependencias PHP con Composer..." -ForegroundColor Yellow
composer install
Write-Host "✅ Dependencias PHP instaladas" -ForegroundColor Green
Write-Host ""

# 2. Instalar dependencias Node.js
Write-Host "📦 Instalando dependencias Node.js..." -ForegroundColor Yellow
npm install
Write-Host "✅ Dependencias Node.js instaladas" -ForegroundColor Green
Write-Host ""

# 3. Copiar archivo .env
if (!(Test-Path .env)) {
    Write-Host "📄 Creando archivo .env..." -ForegroundColor Yellow
    Copy-Item .env.example .env
    Write-Host "✅ Archivo .env creado" -ForegroundColor Green
} else {
    Write-Host "⚠️  Archivo .env ya existe" -ForegroundColor Yellow
}
Write-Host ""

# 4. Generar clave de aplicación
Write-Host "🔑 Generando clave de aplicación..." -ForegroundColor Yellow
php artisan key:generate
Write-Host "✅ Clave generada" -ForegroundColor Green
Write-Host ""

# 5. Recordatorio de configuración de base de datos
Write-Host "⚠️  IMPORTANTE: Configurar base de datos" -ForegroundColor Red
Write-Host "1. Abrir XAMPP y activar MySQL" -ForegroundColor White
Write-Host "2. Crear base de datos 'acme_transportes' en phpMyAdmin" -ForegroundColor White
Write-Host "3. Editar archivo .env con las credenciales de MySQL" -ForegroundColor White
Write-Host ""
$continue = Read-Host "¿Ya configuraste la base de datos? (s/n)"

if ($continue -eq "s") {
    # 6. Ejecutar migraciones
    Write-Host "🗄️  Ejecutando migraciones..." -ForegroundColor Yellow
    php artisan migrate
    Write-Host "✅ Migraciones ejecutadas" -ForegroundColor Green
    Write-Host ""
    
    # 7. Cargar datos de ejemplo
    $seedData = Read-Host "¿Deseas cargar datos de ejemplo? (s/n)"
    if ($seedData -eq "s") {
        Write-Host "📊 Cargando datos de ejemplo..." -ForegroundColor Yellow
        php artisan db:seed --class=DatosEjemploSeeder
        Write-Host "✅ Datos de ejemplo cargados" -ForegroundColor Green
        Write-Host ""
    }
    
    # 8. Compilar assets
    Write-Host "🎨 Compilando Tailwind CSS..." -ForegroundColor Yellow
    npm run dev
    Write-Host "✅ Assets compilados" -ForegroundColor Green
    Write-Host ""
    
    # 9. Finalización
    Write-Host "🎉 ¡Configuración completada!" -ForegroundColor Green
    Write-Host ""
    Write-Host "Para iniciar el servidor ejecuta:" -ForegroundColor Cyan
    Write-Host "php artisan serve" -ForegroundColor White
    Write-Host ""
    Write-Host "Y en otra terminal:" -ForegroundColor Cyan
    Write-Host "npm run watch" -ForegroundColor White
    Write-Host ""
    Write-Host "Luego visita: http://localhost:8000" -ForegroundColor Green
    
} else {
    Write-Host ""
    Write-Host "⚠️  Por favor configura la base de datos y luego ejecuta:" -ForegroundColor Yellow
    Write-Host "php artisan migrate" -ForegroundColor White
    Write-Host "php artisan db:seed --class=DatosEjemploSeeder" -ForegroundColor White
    Write-Host "npm run dev" -ForegroundColor White
    Write-Host "php artisan serve" -ForegroundColor White
}
