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

Si no tienes un sistema de base de datos instalados puedes ocupar docker-compose para crear el contenedor, este proyecto de Laravel ya cuenta con la configuración necesaria .
 
 ### Usando Docker compose
 Para usar docker compose basta con ejecutar Laravel Sail

```
./vendor/bin/sail up
```

Esto descargará las imágenes y ejecutará los contenedores necesarios

### Siguiendo con la instalación

Luego, es necesario configurar un servidor de mailing, para eso editamos nuestro archivo .env para configurarlo

```
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME=byronjimenez9911@gmail.com
MAIL_PASSWORD=zauysbcyrdbsjwdx
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

Una vez tengamos todo configurado, ejecutamos las migracionnes y los seeders

```
php artisan migrate
```

```
php artisan  db:seed
```
