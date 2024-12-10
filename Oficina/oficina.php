<html>
    <hr>
    <h2>OFICINAS REGIONALES</h2>
    <hr>

    <body>
        <ul>
            <li><a href="../index.html">Home</a></li>
            <li><a href="../Postulante/postulante.php">Postulantes</a></li>
            <li><a href="../Postulacion/postulacion.php">Postulaciones</a></li>
            <li><a href="../Ejecutor/ejecutor.php">Ejecutores</a></li>
            <li><a href="../Consultor/consultor.php">Consultores</a></li>
        </ul>

    <form method="POST">
        <button type="submit" name="mostrar_oficinas">Mostrar Oficinas</button>
    </form>

    <?php
    include '../conexion.php';


    if (isset($_POST['mostrar_oficinas'])) {
        $query = "SELECT region, direccion, telefono , horario FROM oficina";
        $result = pg_query($coneccion, $query);

        if (pg_num_rows($result) > 0) {
            echo "<h2>Lista de Oficinas</h2>";
            echo "<table border='1'>
                    <tr>
                        <th>Region</th>
                        <th>Dirección</th>
                        <th>Telefono</th>
                        <th>Horario</th>
                    </tr>";

            while ($row = pg_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['region']}</td>
                        <td>{$row['direccion']}</td>
                        <td>{$row['telefono']}</td>
                        <td>{$row['horario']}</td>
                    </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No se encontraron oficinas.</p>";
        }

    }


    ?>
    </body>
</html>