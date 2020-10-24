# Prueba20201024

Pasos para el despliegue de la prueba

1- Clonar el repositorio

    $ git clone https://github.com/matc04/Prueba20201024

Una vez creado el directorio con el repositorio, dirigirse a el

    $ cd Prueba20201024

Ejecutar el composer

    $ composer update

Despues de la ejecucion del composer editar el archivo .env si este no existe ejecutar la siguiente instruccion

    $ cp .env.example .env

Editar el archivo .env

    $ vi .env

Y cambiar las siguientes lineas

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1           ----> DB_HOST=IP DE BASE DE DATOS
    DB_PORT=3306                
    DB_DATABASE=homestead       ----> DB_DATABASE=NOMBRE_BASE_DATOS
    DB_USERNAME=homestead       ----> DB_USERNAME=USUARIO_MYSQL
    DB_PASSWORD=secret          ----> DB_PASSWORD=PASS_USUARIO_MYSQL

(SI LAS TABLAS factura, detalle_factura, producto, NO EXSITEN, CREARLAS )

Una vez actualizado el archivo, ejecutar

    $ php artisan migrate

Despues de actualizar la Base de datos, ejecutar

    $ php artisan serve

Y con un browser ver la siguiente direccion

    http://localhost:8000/listaFactura

Se vera una lista con las facturas existentes, si se quiere ver el detalle hacer click sobre el numero de factura


