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
  $sql = "SELECT * FROM carreras";
  $result = $conn->query($sql);
  ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles_eliminar_carrea.css">
    <script src="script_main.js"></script>
</head>
<body>
<div id="header">
    <!-- Botón desplegable -->
  <div class="dropdown">
      <img class="dropbtn" onclick="toggleMenu()" src="img/menu.png" alt="Imagen" width="25" height="25"></img>
      <div class="dropdown-content" id="menuContent">
        <img class="close-button" onclick="toggleMenu()" src="img/menu.png" alt="Imagen" width="25" height="25"></img>
        <!-- Opciones del botón desplegable -->
        <a class="opcion-des">Carreras</a>
        <a href="main_grupos.php">Grupos</a>
        <a href="main_materias.php">Materias</a>
        <a href="main_profesores.php">Profesores</a>
        <a href="crear.php">Crear</a>
      </div>
   

    <!-- Otras opciones del header -->
    <a href="main_carrera.php">Ingresar</a>
    <a href="modificar_carrera.php">Modificar</a>
    <a class="opcion-destacada">Eliminar</a>
    <a href="crear.php">Crear</a>
    <a href="perfil.php">
        <img src="img/usuario.png" alt="Imagen" width="25" height="25">
      </a>
  </div>
</div>
<div id="titulo">
  Eliminando?
</div>



<div id="contenedor1">
    <div id="buscador">
        <form action="" method="post">
            <input type="text" name="termino" placeholder="Ingrese un término" required>
            <br>
            <input type="submit" value="Buscar">
        </form>
    </div>
</div>

<div id="contenedor2">
    <div id="titulo-contenedor2">
        <p id="p">Datos</p>
    </div>

    <div id="tabla-contenedor" class="tabla-contenedor">
        <form action="drop_carrera.php" method="post" onsubmit="return confirm('¿Estás seguro de eliminar esta carrera, todos los datos relacionados con esta carrera se eliminaran?');">
            <table>
                <tr>
                    <th>Id carrera</th>
                    <th>Nombre de la carrera</th>
                    <th>Tipo</th>
                    <th>Modelo</th>
                    <th>Duracion</th>
                </tr>
                <?php
                    if ($_SERVER["REQUEST_METHOD"] === "POST") {
                        $terminoBusqueda = $_POST["termino"];

                        $conexion = new mysqli("localhost", "root", "", "bd_gheu");

                        if ($conexion->connect_error) {
                            die("Conexión fallida: " . $conexion->connect_error);
                        }

                        $sql = "SELECT * FROM carreras WHERE 
                                id_carrera LIKE '%$terminoBusqueda%' OR
                                nombre_carrera LIKE '%$terminoBusqueda%' OR
                                tipo LIKE '%$terminoBusqueda%' OR
                                modelo LIKE '%$terminoBusqueda%' OR
                                duracion LIKE '%$terminoBusqueda%'";

                        $resultado = $conexion->query($sql);

                        if ($resultado->num_rows > 0) {
                            while ($fila = $resultado->fetch_assoc()) {
                                echo "<tr onclick='seleccionarFilaCarrera(this, " . $fila["id_carrera"] . ")'>";
                                echo "<td>" . $fila["id_carrera"] . "</td>";
                                echo "<td>" . $fila["nombre_carrera"] . "</td>";
                                echo "<td>" . $fila["tipo"] . "</td>";
                                echo "<td>" . $fila["modelo"] . "</td>";
                                echo "<td>" . $fila["duracion"] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>No se encontraron resultados.</td></tr>";
                        }

                        $conexion->close();
                    }
                ?>
            </table>
    </div>   
            <div id="boton-contenedor2">
                <input type="hidden" name="id_carrera_seleccionada" id="id_carrera_seleccionada" value="">
                <input type="submit" value="Eliminar">
            </div> 
    </form>
</div>   
</body>
</html>
