<?php
session_start(); // Iniciar la sesión

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["id_grupo"])) {
        $_SESSION["id_grupo"] = $_POST["id_grupo"]; // Almacenar el valor en la sesión
        
    }
}
?>
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
    <link rel="stylesheet" type="text/css" href="styles_crear_horario.css">
    <script src="script_main.js"></script>
    
</head>
<body>

  <div id="titulo">
        Crea tu horario
        <div id="verHorario">
          <form action="vista.php">
          <input type="submit" value="Ver Horario">
          </form>
        </div>
  </div>

  <div id="contenedor1">



        <div id="tabla-contenedor" class="tabla-contenedor">
    <form method="post">
        <table id="tabla1" class="tabla1">
            <thead>
                <tr>
                    <th>Materias</th>
                    <th>Profesores</th>
                    <th>Horas</th>
                </tr>
                </thead>
                <?php
    $id_grupo = $_SESSION["id_grupo"];

    // Configuración de la conexión a la base de datos
    $host = 'localhost';
    $usuario = 'root';
    $contraseña = '';
    $base_de_datos = 'bd_gheu';

    $conn = mysqli_connect($host, $usuario, $contraseña, $base_de_datos);

    $conexion = new mysqli("localhost", "root", "", "bd_gheu");

    if (!$conn) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    $query = "SELECT gmp.id_grupo_materia_profesor, m.nombre_materia, p.nombre_profesor, p.apellidos, m.hora_semanal, p.id_profesor, gmp.color, gmp.horas_asignadas
    FROM grupo_materia_profesor gmp
    JOIN materias m ON gmp.id_materia = m.id_materia
    JOIN profesores p ON gmp.id_profesor = p.id_profesor
    WHERE gmp.id_grupo = '$id_grupo'
    ORDER BY gmp.horas_asignadas DESC"; // Cambio en la cláusula ORDER BY


    $resultado = mysqli_query($conn, $query);

    if ($resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr onclick='seleccionarFilaProfesor(this, " . $fila["id_profesor"] . "), seleccionarFilaGrupoMateriaProfesor(this, " . $fila["id_grupo_materia_profesor"] . ")'";

            if ($fila["horas_asignadas"] == 0) {
                echo " style='pointer-events: none; background-color: " . $fila["color"] . ";'";
            } else {
                echo " style='background-color: " . $fila["color"] . ";'";
            }

            echo ">";
            echo "<td>" . $fila["nombre_materia"] . "</td>";
            echo "<td>" . $fila["nombre_profesor"] . " " . $fila["apellidos"] . "</td>";
            echo "<td>" . $fila["horas_asignadas"] . "</td>";
            echo "</tr>";
        }

    } else {
        echo "<tr><td colspan='5'>No se encontraron resultados.</td></tr>";
    }

    $conexion->close();
?>


            </table>
        </div>
        <div id="IngresarAlHorario">
            <input type="hidden" name="formulario" value="2">
            <input type="hidden" name="id_profesor_seleccionada" id="id_profesor_seleccionada" value="">
            <input type="hidden" name="id_GrupoMateriaProfesor_seleccionada" id="id_GrupoMateriaProfesor_seleccionada" value="">
            <input type="submit" value="Ingresar Al Horario">
        </div>
        </form>
  </div>  


  <div id="contenedor2">
 

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
            echo '<th id="hora">H</th>';
            echo '<th id="lunes">L</th>';
            echo '<th id="martes">M</th>';
            echo '<th id="miercoles">X</th>';
            echo '<th id="jueves">J</th>';
            echo '<th id="viernes">V</th>';
            echo '<th id="sabado">S</th>';
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
                echo '<td class="hora">' . $hora . ' - ' . ($hora + 1) . '</td>';
                for ($dia = 1; $dia <= 6; $dia++) {
                    $i = ($dia - 1) * 14 + $hora - 6; // Calcular el índice correcto
                    $estado = $estadoCeldas[$i];
                    echo '<td id="' . $i . '" class="' . $estado . '"></td>';
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
    <div id="titulo-contenedor3">
        Ingresa Materias
      </div>

      <div id="tabla-contenedor3" class="tabla-contenedor3">
      <?php
     $id_grupo = $_SESSION["id_grupo"];

     if (isset($_POST["id_GrupoMateriaProfesor_seleccionada"])) {
         $id_GrupoMateriaProfesor_seleccionada = $_POST["id_GrupoMateriaProfesor_seleccionada"];
         // Aquí puedes realizar otras operaciones con la variable si es necesario
     } else {
         echo "<p class='texto'>Selecciona un profesor</p>";
     }
              
       //echo "El valor de id_GrupoMateriaProfesor_seleccionada es: " . $id_GrupoMateriaProfesor_seleccionada;
        echo "<script>";
        echo "idGrupoMateriaProfesorGlobal = '{$id_GrupoMateriaProfesor_seleccionada}';";
        echo "paintSelectedCells3();";
        echo "</script>";

        
        $host = 'localhost';
        $usuario = 'root';
        $contraseña = '';
        $base_de_datos = 'bd_gheu';
            // Sanitizar el valor de id_profesor_seleccionada para evitar ataques de inyección de SQL
           
            $conn = mysqli_connect($host, $usuario, $contraseña, $base_de_datos);

            $conexion = new mysqli("localhost", "root", "", "bd_gheu");

            if (!$conn) {
                die("Error de conexión: " . mysqli_connect_error());
            }

            // Query the disponibilidad_profesores table
            $sql = "SELECT h.*, gmp.*
            FROM horarios h
            JOIN grupo_materia_profesor gmp ON h.id_grupo_materia_profesor = gmp.id_grupo_materia_profesor
            WHERE gmp.id_grupo = '$id_grupo'";
$result = mysqli_query($conn, $sql);

// Crear un arreglo para almacenar los datos de cada hora y su profesor correspondiente
$dataByHora = array();
while ($row = $result->fetch_assoc()) {
    $id_hora_horario = $row["id_hora_horario"];
    $dataByHora[$id_hora_horario] = array(
        "Profesor" => $row["id_grupo_materia_profesor"],
    );
}

// Crear la tabla HTML con los resultados de la consulta
echo '<table id="tabla3" class="tabla3">';
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

// Generar las filas y celdas de la tabla con los datos correspondientes
for ($hora = 7; $hora <= 20; $hora++) {
    echo '<tr>';
    echo '<td class="hora">' . $hora . ':00 - ' . ($hora + 1) . ':00</td>';
    for ($dia = 1; $dia <= 6; $dia++) {
        // Calcular los índices de acuerdo a la relación específica
        $i = ($hora - 6) + ($dia - 1) * 14;

        // Mostrar el nombre del profesor, apellidos y la materia en las celdas disponibles
        if (isset($dataByHora[$i]) && isset($dataByHora[$i]["Profesor"])) {
            $idProfesor = $dataByHora[$i]["Profesor"];

            // Obtener el ID de la materia, el nombre y apellidos del profesor desde la base de datos
            $queryInfo = "SELECT gmp.id_materia, p.nombre_profesor, p.apellidos, m.nombre_materia, gmp.color
            FROM grupo_materia_profesor gmp
            JOIN profesores p ON gmp.id_profesor = p.id_profesor
            JOIN materias m ON gmp.id_materia = m.id_materia
            WHERE gmp.id_grupo_materia_profesor = '$idProfesor'";       

            $resultInfo = mysqli_query($conn, $queryInfo);

            if ($rowInfo = mysqli_fetch_assoc($resultInfo)) {   
            $nombreProfesor = $rowInfo["nombre_profesor"];
            $apellidosProfesor = $rowInfo["apellidos"];
            $nombreMateria = $rowInfo["nombre_materia"];
            $color = $rowInfo["color"]; // Obtener el valor del color

            echo '<td id="' . $i . '" onmousedown="handleMouseDown(event)" onmouseover="handleMouseOver(event)" onmouseup="handleMouseUp(event)" class="' . $idProfesor . '" style="background-color: ' . $color . ';">' . $nombreProfesor . ' ' . $apellidosProfesor . '<br>' . $nombreMateria . '</td>';
            } else {
            // Manejo de error si no se encuentra la información
            echo '<td id="' . $i . '" onmousedown="handleMouseDown(event)" onmouseover="handleMouseOver(event)" onmouseup="handleMouseUp(event)" style="background-color: white;">Error: Información no encontrada</td>';
            }
        } else {
            // Si la celda no tiene datos de profesor, mostrar una celda vacía
            echo '<td id="' . $i . '" onmousedown="handleMouseDown(event)" onmouseover="handleMouseOver(event)" onmouseup="handleMouseUp(event)"></td>';
        }
    }
    echo '</tr>';
}


echo '</tbody>';
echo '</table>';

        
        

        
?>

      </div>  
</div>



<div id="contenedor4">
    <div id="botones-row">
        <div id="regresar">
            <form class="boton-form" action="main_carrera.php">
                <input type="submit" value="Volver">
            </form>
        </div>
        <div id="continuar">
            <form class="boton-form" action="h_aula.php">
                <input type="submit" value="Continuar">
            </form>
        </div>
    </div>
</div>

<div id="contenedor5">
    <div id="botones-row2">
    <form id="formulario" action="guardar_horarios.php" method="post">
    <div id="ingresar">
    <button  class="button" type="button" id="disponible" onclick="ejecutarPasos()">Disponible</button>
    <button class="button2"  type="button" id="disponible" onclick="ejecutarPasos2()">Eliminar</button>
    </div>
    </form>
    </div>
</div>



</body>
</html>
