# Proyecto CRUD API en Laravel

Este repositorio contiene una API CRUD desarrollada con el framework Laravel (utiliza SQLite como Base de Datos). A continuación, se explican los pasos para clonar y ejecutar este proyecto localmente.

## Requisitos previos

Antes de ejecutar este proyecto, asegúrate de tener instalado lo siguiente en tu máquina:

- [Git](https://git-scm.com/)
- [Composer](https://getcomposer.org/) (Para gestionar dependencias de PHP)
- PHP 8.0+ con las siguientes extensiones habilitadas:
  - OpenSSL
  - PDO
  - Mbstring
  - Tokenizer
  - XML

## Instrucciones para clonar y ejecutar el proyecto

### 1. Clonar el repositorio

Abre una terminal y ejecuta el siguiente comando para clonar el repositorio:

git clone https://github.com/[tu-usuario]/[nombre-del-repo].git

### 2. Instalar dependencias

Ejecuta el siguiente comando para instalar las dependencias de Laravel:

composer install

### 3. Ejecutar migraciones
Crea las tablas de la base de datos necesarias para la API ejecutando las migraciones:

php artisan migrate

### 4. Configurar variables de entorno (.env)

Configurar el servidor de desarrollo de Laravel con los siguientes pasos:

- Copiar el archivo .env.example y renombrarlo como .env
- Usar el comando: php artisan key:generate

### 4. Iniciar el servidor de desarrollo
Inicia el servidor de desarrollo de Laravel con el siguiente comando:

php artisan serve

### 5. Pruebas de la API
Puedes probar los endpoints de la API utilizando herramientas como Postman o la extensión ThunderClient de Visual Studio Code. A continuación, algunos ejemplos de los endpoints disponibles:

Obtener todos los productos: 
- GET /api/products
- URL: http://127.0.0.1:8000/api/products/

Obtener un producto por ID: 
- GET /api/products/{id}
- URL: http://127.0.0.1:8000/api/products/{id}

Crear un nuevo producto: 
- POST /api/products
- URL: http://127.0.0.1:8000/api/products/

Actualizar un producto existente: 
- PUT /api/products/{id}
- URL: http://127.0.0.1:8000/api/products/{id}

Eliminar un producto: 
- DELETE /api/products/{id}
- URL: http://127.0.0.1:8000/api/products/{id}

## Decisiones tomadas durante el desarrollo

- Se siguió el modelo MVC que ofrece el framework Laravel para una organización modular
- Se validaron los datos utilizando las funciones integradas de Laravel
- Se hizo uso del try-catch para manejar los posibles errores del programa
- Se utilizo el ORM integrado de Laravel, Eloquent, para realizar las consultas SQL
- Se utilizo la base de datos por defecto que viene al crear un proyecto Laravel, SQLite
