<?php
include 'conexion.php';

if($_POST['rutPostulante'] != "" )
{
    $rut = $_POST['rutPostulante'];
    $nombre = $_POST['nombrePostulante'];
    $telefono = $_POST['telefonoPostulante'];
    $direccion = $_POST['direccionPostulante'];
    $tipo = $_POST['tipoPostulante'];

    $sql = "INSERT INTO postulante VALUES (".$rut.",".$nombre.",".$telefono.",".$direccion.",".$tipo.");";
    $insercion = pg_query($coneccion,$sql);

    if($insercion)
    {
        echo "Guardado con exito";
    }
    else
    {
        echo "Se ha producido un error al guardar";
    }

}
else
{
    echo "Datos incompletos";
}


?>