<?php
include '../conexion.php';

if($_POST['idPostulacion'] != "" )
{
    $id = $_POST['idPostulacion'];
    $estado = $_POST['EstadoPostulacion'];
    $region = $_POST['regionPostulacion'];
    $ciudad = $_POST['ciudadPostulacion'];
    $fecha = $_POST['fechaPostulacion'];

    $sql = "INSERT INTO postulacion VALUES (".$id.",'".$estado."','".$region."','".$ciudad."','".$fecha."');";
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