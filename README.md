# Laravel API Test

Esta API ha sido desarrollado como prueba técnica pero se espera desarrollar un tutorial completo sobre como integrar documentación importante a nuestras APIs hechas en Laravel.


# Instalación 
El primer paso es instalar todas las dependencias del proyecto, para esto ejecutamos.

```
composer install
```

Luego, hay que crear un archivo .env, y colocar las configuraciones necesarias.

La configuración mas importante es la conexión a la base de datos.

```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
FORWARD_DB_PORT=3307
DB_DATABASE=laravel_api_test
DB_USERNAME=sail
DB_PASSWORD=password
```

El `FORWARD_DB_PORT` es opcional,  solo funciona para docker-compose ya que sirve para redireccionar el puerto del host principal.

Si no tienes un sistema de base de datos o web instalados puedes ocupar docker-compose para crear el contenedor, este proyecto de Laravel ya cuenta con la configuración necesaria .
 
### Usando Docker compose
 Para usar docker compose basta con ejecutar Laravel Sail

```
./vendor/bin/sail up
```

Esto descargará las imágenes y ejecutará los contenedores necesarios

### Usando instalación normal

Cuando se continua con la instalación normal se debe seguir estos pasos:

Ejecutar:

```
php artisan key:generate
```

Y luego encender el servidor:

```
php artisan serve
```

### Siguiendo con la instalación

Luego, es necesario configurar un servidor de mailing, para eso editamos nuestro archivo .env para configurarlo

```
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME=youremailaccount@gmail.com
MAIL_PASSWORD=provisionalpassword
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

Una vez tengamos todo configurado, ejecutamos las migracionnes y los seeders.


```
php artisan migrate
```

```
php artisan db:seed
```

Si se está usando docker primero debemos acceder al contenedor 

```
docker exec -it [container_id] bash
```

## API Documentation

La collección de request de la API estan en https://www.postman.com/bydavid1/workspace/laravel-api-test/overview

Para tener todos los requests disponibles a la api desplegada, primero debe cambiar el `Environment` a `Development` para tener acceso a la `BASE_URL` => http://146.190.113.66

Los responses de los request usan las especificaciones basicas de https://jsonapi.org/format/

Para ver la especificacion OPEN:API: http://146.190.113.66/openapi

Para ver la especificacion OPEN:API desde postman hay que ir a `API > Laravel API Test > Definition > index.json`

## Seguridad

Gitguard puede mostrar advertencias por el dump de sql, al ser solo un repositorio de prueba se pueden ignorar


