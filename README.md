//-----------Configuración del Proyecto--------------//

Sigue estos pasos para configurar y ejecutar el proyecto:

1-Clona el repositorio: git clone https://github.com/didiereste/SoftwareCITAS.git

2-Ingresar a la carpeta del proyecto Instala las dependencias: composer install

3-Configuración del archivo de entorno: cp .env.example .env

4-Genera la clave de la aplicación: php artisan key:generate php artisan migrate --seed

5-Realiza las migracion tabla tipo_vehiculos: php artisan migrate --path=/database/migrations/2024_01_10_181529_create_citas_table.php

6-Migrar resto de tablas y los seeders: php artisan migrate --seed

7-Inciar proyecto php artisan serve


//USUARIO ADMIN 

correo: admin@example.com
contraseña: 123456


//USUARIO CLIENTE

correo:cliente@example.com
contraseña: 123456