Sistema de Inventario Web - Laravel + MySQL

Sistema web de inventario desarrollado con Laravel, PHP y MySQL, orientado a la gestión de categorías, productos, movimientos de stock y control de productos con bajo inventario.

Este proyecto fue desarrollado para practicar y profundizar el desarrollo web backend con Laravel, arquitectura MVC, autenticación, operaciones CRUD, relaciones entre tablas, validaciones y manejo de base de datos relacional.

---

Tecnologías utilizadas

 -- PHP 8.2
 -- Laravel 12
 -- MySQL
 -- Laravel Breeze
 -- Blade
 -- Tailwind CSS
 -- Composer
 -- Node.js / NPM
 -- XAMPP
 -- phpMyAdmin
 -- Git / GitHub


Funcionalidades principales

Autenticación

 -- Registro de usuarios.
 -- Inicio de sesión.
 -- Cierre de sesión.
 -- Dashboard protegido por autenticación.
 
Categorías

 -- Listado de categorías.
 -- Registro de nuevas categorías.
 -- Edición de categorías.
 -- Eliminación de categorías.
 -- Estado activo/inactivo.

Productos

 -- Listado de productos.
 -- Registro de productos.
 -- Edición de productos.
 -- Eliminación de productos.
 -- Relación producto-categoría.
 -- Precio, stock actual y stock mínimo.
 -- Estado activo/inactivo.
 -- Detección visual de productos con bajo stock.

Movimientos de stock

 -- Registro de entradas de stock.
 -- Registro de salidas de stock.
 -- Actualización automática del stock del producto.
 -- Validación para evitar salidas mayores al stock disponible.
 -- Historial de movimientos.
 -- Asociación del movimiento con el usuario que lo registró.

Dashboard administrativo

 -- Total de categorías.
 -- Total de productos.
 -- Productos activos. 
 -- Productos con bajo stock
 -- Total de movimientos de stock.
 -- Últimos movimientos registrados.
 --Accesos rápidos a módulos principales.

Productos con bajo stock

 -- Vista especial para productos cuyo stock actual es menor o igual al stock mínimo.
 -- Acceso rápido para registrar movimientos de reposición.

---

Capturas del sistema

 Login

(public/screenshots/login.png)

 Dashboard

(public/screenshots/dashboard.png)

 Categorías 

(public/screenshots/categories.png)

 Productos

(public/screenshots/products.png)

 Bajo stock

(public/screenshots/low-stock.png)

 Movimientos de stock

(public/screenshots/stock-movements.png)


 Instalación del proyecto

 1. Clonar el repositorio

```bash
git clone URL_DEL_REPOSITORIO
cd inventario-laravel
```

2. Instalar dependencias de PHP

```bash
composer install
```

Si Composer no está instalado globalmente en Windows, también se puede usar:

```bash
php C:\composer\composer.phar install
```

 3. Instalar dependencias de Node (Node.js y NPM para instalación y compilación de assets frontend mediante Vite.)

```bash
npm install
```

 4. Crear archivo de entorno

Copiar el archivo `.env.example` y renombrarlo como `.env`.

```bash
copy .env.example .env
```

5. Configurar base de datos

Crear una base de datos en MySQL llamada:

```txt
inventario_laravel
```

Luego configurar el archivo `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=inventario_laravel
DB_USERNAME=root
DB_PASSWORD=
```

 6. Generar clave de aplicación

```bash
php artisan key:generate
```

 7. Ejecutar migraciones y seeders

```bash
php artisan migrate --seed
```

 8. Compilar assets

```bash
npm run build
```

9. Levantar servidor local

```bash
php artisan serve
```

Abrir en el navegador:

```txt
http://127.0.0.1:8000
```

---

 Usuario demo

```txt
Email: demo@inventario.com
Password: password
```

-
 Conceptos aplicados

* Arquitectura MVC.
* Migraciones de base de datos.
* Modelos Eloquent.
* Relaciones uno a muchos.
* Controladores resource.
* Validaciones de formularios.
* Autenticación con Laravel Breeze.
* Vistas Blade.
* Manejo de sesiones.
* Seeders.
* Control de inventario.
* Lógica de negocio para entradas y salidas de stock.
* Dashboard administrativo.

---



 Autor

Desarrollado por Johan Rosales como proyecto de práctica en desarrollo web con Laravel.