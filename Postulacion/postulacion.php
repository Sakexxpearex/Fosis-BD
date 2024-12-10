<html>
    <hr>
    <h2>POSTULACIONES</h2>
    <hr>    

    <body>
        
        <ul>
            <li><a href="../index.html">Home</a></li>
            <li><a href="../Postulante/postulante.php">Postulantes</a></li>
            <li><a href="../Oficina/oficina.php">Oficinas</a></li>
            <li><a href="../Ejecutor/ejecutor.php">Ejecutores</a></li>
            <li><a href="../Consultor/consultor.php">Consultores</a></li>
       </ul>
       
            <b><h3>Busqueda de postulacion</h3></b> 
            <p>Ingrese la rut del postulante</p>
            <form id="consultaPostulacion"  method="post">
                Rut: <input type = "text" name="rutPostulacion">
                <button type="submit" name="ver_postulaciones">Ver postulaciones</button>
            </form>

    <?php
    include '../conexion.php';


    if (isset($_POST['ver_postulaciones'])) 
    {
        $rut = $_POST['rutPostulacion'];
        $query = "SELECT id, ciudad, fecha , estado, codigo_programa FROM postulacion WHERE rut_postulante = '$rut'";
        $result = pg_query($coneccion, $query);

        if (pg_num_rows($result) > 0) {
            echo "<h2>Lista de Oficinas</h2>";
            echo "<table border='1'>
                    <tr>
                        <th>ID</th>
                        <th>Ciudad</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Codigo Programa</th>
                    </tr>";

            while ($row = pg_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['ciudad']}</td>
                        <td>{$row['fecha']}</td>
                        <td>{$row['estado']}</td>
                        <td>{$row['codigo_programa']}</td>
                    </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No se encontraron postulaciones.</p>";
        }

    }


    ?>   
    
           
       </body>
</html>