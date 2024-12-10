<html>
     <hr>
     <h2>POSTULANTES</h2>
     <hr> 

   <body>

     <ul>
            <li><a href="../index.html">Home</a></li>
            <li><a href="../Postulacion/postulacion.php">Postulaciones</a></li>
            <li><a href="../Oficina/oficina.php">Oficinas</a></li>
            <li><a href="../Ejecutor/ejecutor.php">Ejecutores</a></li>
            <li><a href="../Consultor/consultor.php">Consultores</a></li>

     </ul>


        <b><h3>Consultar Programas</h3></b>
        <p>Ingrese los datos</p>

        <form id="ingreso_postulante"  action = "" method="post" >
               <table>
    
               <tr>
                    <td>Region</td>
                    <td>
                    <select name="region">
                         <option value="Bio Bio">Bio Bio</option>
                         <option value="Ñuble">Ñuble</option>
                         <option value="Metropolitana">Metropolitana</option>
                         <option value="Magallanes">Magallanes</option>
                         <option value="Arica y Parinacota">Arica y Parinacota</option>
                    </select> 
               </td>
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
                
               $query = "SELECT codigo, nombre, tipo
               FROM programa
               WHERE tipo = '$tipoPrograma' 
               AND region = '$region'";
               
               $result = pg_query($coneccion, $query);

               if (pg_num_rows($result) > 0) {
                   echo "<h2>Programas Disponibles</h2>";
                   echo "<table border='1' style='margin: 20px;'>
                           <tr>
                               <th>Codigo</th>
                               <th>Nombre</th>
                               <th>Tipo</th>
                           </tr>";
       
                   while ($row = pg_fetch_assoc($result)) {
                       echo "<tr>
                               <td>{$row['codigo']}</td>
                               <td>{$row['nombre']}</td>
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


          <form id="ingreso_postulante" method="post" >
               <table>
               <tr>
                    <td>Rut: </td>
                    <td> <input type = "text" name="rutPostulante"> </td>
               </tr>

               <tr>
                    <td>Nombre: </td>
                    <td> <input type = "text" name="nombrePostulante"> </td>
               </tr>

               <tr>
                    <td>Telefono: </td>
                    <td> <input type = "text" name="telefonoPostulante"> </td>
               </tr>

               <tr>
                    <td>Ciudad: </td>
                    <td> <input type = "text" name="ciudadPostulante"> </td>
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

          <?php
          include '../conexion.php';

          if($_SERVER['REQUEST_METHOD'] === 'POST')
          {

               if (isset($_POST['rutPostulante']) && !empty($_POST['rutPostulante'])) 
               {
                    
                    $rut = $_POST['rutPostulante'];
                    $nombre = $_POST['nombrePostulante'];
                    $telefono = $_POST['telefonoPostulante'];
                    $ciudad = $_POST['ciudadPostulante'];
                    $direccion = $_POST['direccionPostulante'];
                    $tipo = $_POST['tipoPostulante'];
                    $codigo = $_POST['codigoPrograma'];
            
                    
                    $sql = "INSERT INTO postulante (rut, nombre, telefono, direccion, tipo) 
                            VALUES ('$rut', '$nombre', '$telefono', '$direccion', '$tipo');";

                    $sql2 = "INSERT INTO postulacion (ciudad, fecha, rut_postulante, codigo_programa, rut_ejecutor)
                              VALUES ('$ciudad', NOW(), '$rut', '$codigo', (SELECT rut FROM ejecutor WHERE ocupado = false LIMIT 1))";

                   $sql3 = "INSERT INTO ejecucion (codigo_programa, fecha_inicio, rut_ejecutor)
                              VALUES ('$codigo', NOW(), (SELECT rut FROM ejecutor WHERE ocupado = false LIMIT 1))";
          

                    $sql4 = "UPDATE ejecutor SET ocupado = true WHERE rut = (SELECT rut FROM ejecutor WHERE ocupado = false LIMIT 1)";
                    

            
                    $insercion = pg_query($coneccion, $sql);

                    $insercion3 = pg_query($coneccion, $sql3);

                    $insercion2 = pg_query($coneccion, $sql2);

                    $insercion4 = pg_query($coneccion, $sql4);

                    if ($insercion) 
                    {
                        if($insercion2)
                        {
                              if($insercion3)
                              {
                                   echo "Postulacion realizada con éxito";
                              }
                        }
                    } else 
                    {
                        echo "Se ha producido un error al postular";
                    }
                } 
                else 
                {
                    echo "Por favor, completa todos los campos obligatorios.";
                }
          }




          ?>

               </table>

        </form>


   </body>
</html>