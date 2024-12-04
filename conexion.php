<?php
//------------Variables para conexion---------
$equipo= "localhost";
$namebd= "planetario";
$puerto= "0000" //ingresar el puerto correcto;
$usuario= "postgres"; //ingresar usuario correcta
$clave= "0000"; //ingresar password correcto

//------------Aqui la conexion----------------
$coneccion = pg_connect("host= $equipo
                        dbname= $namebd
                        port= $puerto
                        user= $usuario
                        password= $clave
                        ");
?>
