//-----------Configuración del Proyecto--------------//

Sigue estos pasos para configurar y ejecutar el proyecto:

1-Clona el repositorio: git clone https://github.com/didiereste/SoftwareCITAS.git

2-Ingresar a la carpeta del proyecto Instala las dependencias: composer install

3-Ingresar al proyecto

4-Configuración del archivo de entorno en la terminal: cp .env.example .env

5-Genera la clave de la aplicación: php artisan key:generate

6-Ir al archivo .env y .env poner nombre a la base de datos para poder hacer las migraciones

7-Migrar las tablas y los seeders : php artisan migrate --seed

8-Inciar proyecto php artisan serve


//USUARIO ADMIN 

correo: admin@example.com
contraseña: 123456


//USUARIO CLIENTE

correo:cliente@example.com
contraseña: 123456
