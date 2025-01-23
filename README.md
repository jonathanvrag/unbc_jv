## Sobre el Proyecto

Este proyecto es una resolución de una prueba técnica para desarrolladores Full Stack. El objetivo era crear un ABM/CRUD (Alta, Baja y Modificación) de registros de Usuarios utilizando Laravel, Livewire y Tailwind CSS. Los usuarios pueden registrarse, iniciar sesión y administrar los datos de otros usuarios.

## Requisitos

- PHP >= 8.0
- Composer
- Node.js y npm
- MySQL

## Instalación

1. Clona el repositorio:

    ```sh
    git clone https://github.com/jonathanvrag/unbc_jv.git
    cd unbc_jv
    ```

2. Instala las dependencias de PHP:

    ```sh
    composer install
    ```

3. Instala las dependencias de JavaScript:

    ```sh
    npm install
    ```

4. Copia el archivo [.env.example](http://_vscodecontentref_/1) a [.env](http://_vscodecontentref_/2) y configura tus variables de entorno:

    ```sh
    cp .env.example .env
    ```

5. Genera la clave de la aplicación:

    ```sh
    php artisan key:generate
    ```

6. Configura la base de datos en el archivo [.env](http://_vscodecontentref_/3):

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nombre_de_tu_base_de_datos
    DB_USERNAME=tu_usuario
    DB_PASSWORD=tu_contraseña
    ```

7. Ejecuta las migraciones y los seeders:

    ```sh
    php artisan migrate --seed
    ```

8. Compila los assets de frontend:

    ```sh
    npm run dev
    ```

## Uso

1. Inicia el servidor de desarrollo:

    ```sh
    php artisan serve
    ```

2. Abre tu navegador y ve a [http://localhost:8000](http://_vscodecontentref_/4).

## Estructura del Proyecto

El proyecto está organizado de la siguiente manera:

- `app/Http/Livewire`: Contiene los componentes Livewire.
- `app/Models`: Contiene los modelos de Eloquent.
- `config`: Contiene los archivos de configuración.
- `database/migrations`: Contiene las migraciones de la base de datos.
- `resources/views`: Contiene las vistas Blade.
- `routes`: Contiene los archivos de rutas.


## Información Adicional

La aplicación está desplegada en  [unbc-jonathanvera.up.railway.app](https://unbc-jonathanvera.up.railway.app).

Este proyecto ha sido desarrollado por Jonathan Vera Gómez como parte de una prueba técnica para la empresa UNBC.
