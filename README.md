<p align="center"><a href="https://www.backbonesystems.io/" target="_blank"><img src="https://assets.website-files.com/6318e08ac4910dc571c44f02/6318e2d9ffc55451438398bf_BackboneSystems_Blanco.svg" width="400"></a></p>
<br />

## Backbone systems challenge

Este proyecto esta hecho con fines de participar en un proceso de selección para la empresa backbone systems.

### Tecnologías utilizadas

- [Laravel 8+](https://laravel.com).
- Docker.

### Pasos para instalación local

Para hacer una instalación local se necesita tener instalado docker y docker-compose.

- Descargar el código fuente
- Ubicarse en la raíz del proyecto y duplicar y renombrar el archivo .env.example a .env
- Una vez renombrado el archivo debemos de modificar el valor de las siguientes variables de entorno, colocando las credenciales para la base de datos

```
    DB_DATABASE=
    DB_USERNAME=
    DB_PASSWORD=
```

- En la raíz del proyecto y ejecutar el siguiente comando:
  ```
  docker-compose up -d
  ```
  El comando anterior hará un pull de las imágenes a utilizar por lo que puede tardar unos minutos en ejecutarse
- Una vez estén levantados los servicios de docker, debemos de ejecutar el siguiente comando para ubicarnos en la terminal del servicio "app"

```
    docker-compose exec app bash
```

- Estando en la terminal dentro del contenedor "app" ejecutar el siguiente comando para instalar las dependencias

```
    composer install
```

Este comando descargará una serie de librerías por lo que puede tardar unos minutos

- Estando en la terminal dentro del contenedor "app" ejecutar el siguiente comando para generar la applicationkey

```
    php artisan key:generate
```

- Estando en la terminal dentro del contenedor "app" ejecutar el siguiente comando para correr las migraciones y hacer los inserts al base de datos

```
    php artisan migrate --seed
```

Este comando creará todas las tablas y ejecutará los seeders llenando la base de datos, por lo que puede tardar unos minutos en ejecutarse

- Para finalizar, siempre en la terminal del contenedor "app", ejecutaremos los test unitarios para verificar que todo este funcionando perfectamente

```
    php artisan test
```

## Extras del aplicativo

- Test unitarios
- Indexes en la base de datos para mejorar los tiempos de respuesta
- respuesta JSON 404 al no encontrar el zip-code
- Ambiente docker para test/desarrollo
