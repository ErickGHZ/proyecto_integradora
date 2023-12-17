<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "bd_gheu";

  // Crear una conexión
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Verificar la conexión
  if ($conn->connect_error) {
      die("Conexión fallida: " . $conn->connect_error);
  }

  // Consulta para obtener los datos de la tabla aulas
  $sql = "SELECT * FROM profesores";
  $result = $conn->query($sql);
  ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles_disponibilidad_profesores.css">
    <script src="script_main.js"></script>
</head>
<body>

  <div id="titulo">
        Disponibilidad Profesores
  </div>

  <div id="contenedor1">
        <div id="buscador">
      <form method="post">
              <input type="hidden" name="formulario" value="1">
              <input type="text" id="termino" name="termino" placeholder="Ingrese" required>
              <input type="submit" value="Buscar">
      </form>
        </div>

        <div id="tabla-contenedor" class="tabla-contenedor">
        <form method="post">
        <table id="tabla1" class="tabla1">
                <tr>
                    <th>Id Profesor </th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th>Telefono</th>
                </tr>
                <?php
                    if ($_SERVER["REQUEST_METHOD"] === "POST") {
                    if (isset($_POST["formulario"]) && $_POST["formulario"] === "1") {
                      
                        $terminoBusqueda = $_POST["termino"];

                        $conexion = new mysqli("localhost", "root", "", "bd_gheu");

                        if ($conexion->connect_error) {
                            die("Conexión fallida: " . $conexion->connect_error);
                        }

                        $sql = "SELECT * FROM profesores WHERE 
                                id_profesor   LIKE '%$terminoBusqueda%' OR
                                nombre_profesor  LIKE '%$terminoBusqueda%' OR
                                apellidos  LIKE '%$terminoBusqueda%' OR
                                email LIKE '%$terminoBusqueda%' OR
                                telefono LIKE '%$terminoBusqueda%'";

                        $resultado = $conexion->query($sql);

                        if ($resultado->num_rows > 0) {
                            while ($fila = $resultado->fetch_assoc()) {
                                echo "<tr onclick='seleccionarFilaProfesor(this, " . $fila["id_profesor"] . ")'>";
                                echo "<td>" . $fila["id_profesor"] . "</td>";
                                echo "<td>" . $fila["nombre_profesor"] . "</td>";
                                echo "<td>" . $fila["apellidos"] . "</td>";
                                echo "<td>" . $fila["email"] . "</td>";
                                echo "<td>" . $fila["telefono"] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>No se encontraron resultados.</td></tr>";
                        }

                        $conexion->close();
                    }
                  }
                ?>
            </table>
        </div>

        <div id="editar">
            <input type="hidden" name="formulario" value="2">
            <input type="hidden" name="id_profesor_seleccionada" id="id_profesor_seleccionada" value="">
            <input type="submit" value="Editar">
        </div>
      </form>
  </div>  


    <div id="contenedor2">
      <div id="titulo-contenedor2">
        <p id="p">Disponibilidad</p>
      </div>

      <div id="tabla-contenedor2" class="tabla-contenedor2">
      <?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["formulario"]) && $_POST["formulario"] === "2") {
        
        // Verificar si el valor de id_profesor_seleccionada está definido y no es vacío
        if (isset($_POST["id_profesor_seleccionada"]) && !empty($_POST["id_profesor_seleccionada"])) {
            $terminoBusqueda = $_POST["id_profesor_seleccionada"];

            $conexion = new mysqli("localhost", "root", "", "bd_gheu");

            if ($conexion->connect_error) {
                die("Conexión fallida: " . $conexion->connect_error);
            }

            // Sanitizar el valor de id_profesor_seleccionada para evitar ataques de inyección de SQL
            $terminoBusqueda = mysqli_real_escape_string($conexion, $terminoBusqueda);

            // Query the disponibilidad_profesores table
            $sql = "SELECT id_profesor, id_hora_profesor FROM disponibilidad_profesores WHERE id_profesor=$terminoBusqueda";
            $result = $conexion->query($sql);

            echo '<table id="tabla2" class="tabla2">';
            echo '<thead>';
            echo '<tr>';
            echo '<th id="hora">Hora</th>';
            echo '<th id="lunes">Lunes</th>';
            echo '<th id="martes">Martes</th>';
            echo '<th id="miercoles">Miércoles</th>';
            echo '<th id="jueves">Jueves</th>';
            echo '<th id="viernes">Viernes</th>';
            echo '<th id="sabado">Sábado</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            
            // Definir un arreglo para almacenar el estado de cada celda (available o occupied)
            $estadoCeldas = array();
            
            // Inicializar todas las celdas como occupied
            for ($i = 1; $i <= 84; $i++) {
                $estadoCeldas[$i] = "occupied";
            }
            
            // Actualizar el estado de las celdas a available si corresponden a la disponibilidad del profesor
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $id_hora_profesor = $row["id_hora_profesor"];
                    $estadoCeldas[$id_hora_profesor] = "available";
                }
            }
            
            // Generar las filas y celdas de la tabla con los estados correspondientes
            for ($hora = 7; $hora <= 20; $hora++) {
                echo '<tr>';
                echo '<td class="hora">' . $hora . ':00 - ' . ($hora + 1) . ':00</td>';
                for ($dia = 1; $dia <= 6; $dia++) {
                    $i = ($dia - 1) * 14 + $hora - 6; // Calcular el índice correcto
                    $estado = $estadoCeldas[$i];
                    echo '<td id="' . $i . '" class="' . $estado . '" onmousedown="handleMouseDown(event)" onmouseover="handleMouseOver(event)" onmouseup="handleMouseUp(event)"></td>';
                }
                echo '</tr>';
            }
            
            echo '</tbody>';
            echo '</table>';
            
            
        } else {
            // El valor de id_profesor_seleccionada no está definido o es vacío, hacer algo para manejar este caso
            echo "Por favor, selecciona un profesor válido.";
        }
    }
}
?>

      </div>  
    </div>    


    <div id="contenedor3">
  <div id="boton-contenedor3">
    <button id="disponible" onclick="paintSelectedCells(),showAvailableCells()">Disponible</button>
    <button id="nodisponible" onclick="paintSelectedCells2(),showAvailableCells()">No Disponible</button>

    <form id="formulario" action="guardar_disponibilidad_profesor.php" method="post">
      <div id="profesor-seleccionado">
       <p >ID profesor</p>
        <?php
          if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["formulario"]) && $_POST["formulario"] === "2") {
            // Verificar si el valor de id_profesor_seleccionada está definido y no es vacío
            if (isset($_POST["id_profesor_seleccionada"]) && !empty($_POST["id_profesor_seleccionada"])) {
              $id_profesor_seleccionado = $_POST["id_profesor_seleccionada"];
              echo '<input type="text" id="id_profesor" name="id_profesor" value="' . $id_profesor_seleccionado . '" readonly>';
 
            }
          }
        ?>

      </div>



      <!-- Input oculto para identificar el formulario -->
      <input type="hidden" name="formulario" value="2">
     
      <!-- Botón para guardar y enviar el formulario por POST -->
      <button type="submit" >Guardar</button>
    </form>
  </div>
</div>



    <div id="contenedor4">

 
        <div id="volver">
          <form action="main_profesores.php">
          <input type="submit" value="Volver">
          </form>
        </div>
        
    </div>  

</body>
</html>