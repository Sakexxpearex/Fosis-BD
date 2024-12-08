<html>
    <hr>
    <h2>Lista Consultores</h2>
    <hr>

    <body>

    <form method="POST" >
        <button type="submit" name="mostrar_consultores">Mostrar Ejecutores</button>
    </form>

    <?php
    include '../conexion.php';


    if (isset($_POST['mostrar_consultores'])) {
        $query = "SELECT rut, nombre, domicilio, web FROM consultor";
        $result = pg_query($coneccion, $query);

        if (pg_num_rows($result) > 0) {
            echo "<h2>Lista de Consultores</h2>";
            echo "<table border='1'>
                    <tr>
                        <th>Rut</th>
                        <th>Nombre</th>
                        <th>Domicilio</th>
                        <th>Web</th>
                    </tr>";

            while ($row = pg_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['rut']}</td>
                        <td>{$row['nombre']}</td>
                        <td>{$row['domicilio']}</td>
                        <td>{$row['web']}</td>
                    </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No se encontraron consultores.</p>";
        }

    }


    ?>

        <p>Ingrese el rut del consultor que desea modificar</p>
            <form method="post">
                <table>
                    <tr>
                        <td>Rut: </td>
                        <td><input type = "number" name="rutConsultor"></td>
                    </tr>

                    <tr>
                        <td>Nombre: </td>
                        <td><input type = "text" name="nombreConsultor"></td>
                    </tr>

                    <tr>
                        <td>Domicilio: </td>
                        <td><input type = "text" name="domicilioConsultor"></td>
                    </tr>

                    <tr>
                        <td>Web: </td>
                        <td><input type="radio"  name="webConsultor" value="1"> Si </td>
                        <td><input type="radio"  name="webConsultor" value="0"> No </td>
                    </tr>
                    
                   
                </table>   
                <input type = "submit" value= "Modificar"> 
            </form>

            <?php

            include '../conexion.php';

            if (!empty($_POST['rutConsultor']) && is_numeric($_POST['rutConsultor'])) {
        
                $rutConsultor = (int)$_POST['rutConsultor'];

                $nombreConsultor = $_POST['nombreConsultor'];

                $domicilioConsultor = $_POST['domicilioConsultor'];

                $webConsultor = isset($_POST['webConsultor']) && $_POST['webConsultor'] == '1' ? 'TRUE' : 'FALSE';
            
                
                $upgrade = "UPDATE consultor SET nombre = '$nombreConsultor', domicilio = '$domicilioConsultor', web ='$webConsultor' WHERE rut = $rutConsultor";
            
                
                $insercion = pg_query($coneccion, $upgrade);
            
                
                if ($insercion) {
                    echo "Modificacion con éxito";
                } else {
                    echo "Se ha producido un error al modificar";
                }
            }

            ?>
    
   
    </body>
</html>
