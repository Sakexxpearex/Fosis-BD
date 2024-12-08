<html>
    <hr>
    <h2>OFICINAS REGIONALES</h2>
    <hr>

    <body>
        <ul>
            <li><a href="../Postulante/postulante.html">Postulantes</a></li>
            <li><a href="../Postulacion/postulacion.html">Postulaciones</a></li>
            <li><a href="../Programa/programa.html">Programas</a></li>
            <li><a href="../Ejecutor/ejecutor.html">Ejecutores</a></li>
            <li><a href="../Consultor/consultor.html">Consultores</a></li>
        </ul>

    <form method="POST">
        <button type="submit" name="mostrar_oficinas">Mostrar Oficinas</button>
    </form>

    <?php
    include '../conexion.php';


    if (isset($_POST['mostrar_oficinas'])) {
        $query = "SELECT ciudad, direccion, telefono , horario FROM oficinas";
        $result = pg_query($coneccion, $query);

        if (pg_num_rows($result) > 0) {
            echo "<h2>Lista de Oficinas</h2>";
            echo "<table border='1'>
                    <tr>
                        <th>Ciudad</th>
                        <th>Dirección</th>
                        <th>Telefono</th>
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