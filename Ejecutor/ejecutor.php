<html>
    <hr>
    <h2>EJECUTORES</h2>
    <hr>

    <body>
        <ul>
            <li><a href="../index.html">Home</a></li>
            <li><a href="../Postulante/postulante.html">Postulantes</a></li>
            <li><a href="../Postulacion/postulacion.html">Postulaciones</a></li>
            <li><a href="../Programa/programa.html">Programas</a></li>
            <li><a href="../Oficina/oficina.php">Oficinas</a></li>
            <li><a href="../Consultor/consultor.php">Consultores</a></li>

        </ul>

    <form method="POST" >
        <button type="submit" name="mostrar_ejecutores">Mostrar Ejecutores</button>
    </form>

    <?php
    include '../conexion.php';


    if (isset($_POST['mostrar_ejecutores'])) {
        $query = "SELECT rut, nombre, tipo , domicilio FROM ejecutor";
        $result = pg_query($coneccion, $query);

        if (pg_num_rows($result) > 0) {
            echo "<h2>Lista de Ejecutores</h2>";
            echo "<table border='1'>
                    <tr>
                        <th>Rut</th>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Domicilio</th>
                    </tr>";

            while ($row = pg_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['rut']}</td>
                        <td>{$row['nombre']}</td>
                        <td>{$row['tipo']}</td>
                        <td>{$row['domicilio']}</td>
                    </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No se encontraron ejecutores.</p>";
        }

    }


    ?>

        <p>Ingrese el rut del consultor que desea eliminar</p>
            <form method="post">
                Rut: <input type = "number" name="rutEjecutor">
                <input type = "submit" value= "Eliminar">
            </form>
    
    <?php

    include '../conexion.php';

    if (!empty($_POST['rutEjecutor']) && is_numeric($_POST['rutEjecutor'])) {
        
        $rutEjecutor = (int)$_POST['rutEjecutor'];
    
        
        $delete = "DELETE FROM ejecutor WHERE rut = $rutEjecutor";
    
        
        $insercion = pg_query($coneccion, $delete);
    
        
        if ($insercion) {
            echo "Eliminación con éxito";
        } else {
            echo "Se ha producido un error al eliminar";
        }
    }
    ?>
    </body>
</html>
