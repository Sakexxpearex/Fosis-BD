<html>
    <hr>
    <h2>OFICINAS REGIONALES</h2>
    <hr>

    <body>

    <form method="POST">
        <button type="submit" name="mostrar_oficinas">Mostrar Oficinas</button>
    </form>

    <?php
    include '/conexion.php';


    if (isset($_POST['mostrar_oficinas'])) {
        $query = "SELECT ciudad, direccion, telefono , horario FROM oficinas regionales";
        $result = pg_query($coneccion, $query);

        if (pg_num_rows($result) > 0) {
            echo "<h2>Lista de Oficinas</h2>";
            echo "<table border='1'>
                    <tr>
                        <th>Ciudad</th>
                        <th>Dirección</th>
                        <th>telefono</th>
                        <th>Horario</th>
                    </tr>";

            while ($row = pg_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['ciudad']}</td>
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