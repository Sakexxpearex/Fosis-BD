<?php
//------------Variables para conexion---------
$equipo= "localhost";
$namebd= "Fosis";
$puerto= "5433" //ingresar el puerto correcto;
$usuario= "postgres"; //ingresar usuario correcta
$clave= "pemuco18"; //ingresar password correcto

//------------Aqui la conexion----------------
$coneccion = pg_connect("host= $equipo
                        dbname= $namebd
                        port= $puerto
                        user= $usuario
                        password= $clave
                        ");
?>
