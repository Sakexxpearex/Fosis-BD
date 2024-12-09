<html>
     <hr>
     <h2>POSTULANTES</h2>
     <hr> 

   <body>

     <ul>
            <li><a href="../index.html">Home</a></li>
            <li><a href="../Postulacion/postulacion.html">Postulaciones</a></li>
            <li><a href="../Oficina/oficina.html">Oficinas</a></li>
            <li><a href="../Ejecutor/ejecutor.html">Ejecutores</a></li>
            <li><a href="../Consultor/consultor.html">Consultores</a></li>

     </ul>


        <b><h3>Consultar Programas</h3></b>
        <p>Ingrese los datos</p>

        <form id="ingreso_postulante"  action = "" method="post" >
               <table>
    
               <tr>
                    <td>Region</td>
                    <td> <input type = "text" name="region"> </td>
               </tr>

               <tr>
       

               <td>Tipo de Programa: </td>
               <td>
                    <select name="tipoPrograma">
                         <option value="Cohesion Social">Cohesion Social</option>
                         <option value="Autonomia Economica">Autonomia Economica</option>
                         <option value="Familias">Familias</option>
                         <option value="Habitat saludable">Habitat saludable</option>
                    </select> 
               </td>
          </tr>


               <td> <input type="submit" value="Buscar"> </td>



               </table>

        </form>

        <?php

               include '../conexion.php';

               $tipoPrograma = "";
               $region = "";

               if($_SERVER['REQUEST_METHOD'] === 'POST')
               {
                    $tipoPrograma = $_POST['tipoPrograma'] ?? "";
                    $region = $_POST['region'] ?? "";
               }    
                
               $query = "SELECT codigo, nombre, tipo, fecha_inicio
               FROM programa
               WHERE fecha_termino IS NULL 
               AND tipo = '$tipoPrograma' 
               AND region = '$region'";
               
               $result = pg_query($coneccion, $query);

               if (pg_num_rows($result) > 0) {
                   echo "<h2>Programas Disponibles</h2>";
                   echo "<table border='1' style='margin: 20px;'>
                           <tr>
                               <th>Codigo</th>
                               <th>Nombre</th>
                               <th>Fecha</th>
                               <th>Tipo</th>
                           </tr>";
       
                   while ($row = pg_fetch_assoc($result)) {
                       echo "<tr>
                               <td>{$row['codigo']}</td>
                               <td>{$row['nombre']}</td>
                               <td>{$row['fecha_inicio']}</td>
                               <td>{$row['tipo']}</td>
                           </tr>";
                   }
                   echo "</table>";
               } 
               else 
               {
                   echo "<p>No se encontraron programas coincidentes</p>";
               }     


          ?>

          <b><h3>Ingrese los datos del postulante</h3></b>


          <form id="ingreso_postulante"  action = "" method="post" >
               <table>
               <tr>
                    <td>Rut: </td>
                    <td> <input type = "number" name="rutPostulante"> </td>
               </tr>

               <tr>
                    <td>Nombre: </td>
                    <td> <input type = "text" name="nombrePostulante"> </td>
               </tr>

               <tr>
                    <td>Telefono: </td>
                    <td> <input type = "number" name="telefonoPostulante"> </td>
               </tr>

               <tr>
                    <td>Direccion: </td>
                    <td> <input type = "text" name="direccionPostulante"> </td>
               </tr>

               <tr>
                    <td>Tipo de postulante: </td>
                    <td>
                         <select name="tipoPostulante">
                              <option value="Persona"> Persona </option>
                              <option value="Familia"> Familia </option>
                              <option value="Comunidad"> Comunidad </option>
                              <option value="Organizacion"> Organizacion </option>
                         </select> 
                    </td>
               </tr>
             
        </tr>
               
                <tr>
                    <td>Codigo programa a postular: </td>
                    <td> <input type = "text" name="codigoPrograma"> </td>
               </tr>


               <td> <input type="submit" value="Postular"> </td>



               </table>

        </form>


   </body>
</html>