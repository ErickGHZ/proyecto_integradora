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
  $sql = "SELECT * FROM materias";
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
        <a href="main_carrera.php">Carreras</a>
        <a href="main_grupos.php">Grupos</a>
        <a class="opcion-des">Materias</a>
        <a href="main_profesores.php">Profesores</a>
        <a href="crear.php">Crear</a>
      </div>
   

    <!-- Otras opciones del header -->
    <a href="main_carrera.php">Ingresar</a>
    <a class="opcion-destacada">Modificar</a>
    <a href="eliminar_carrera.php">Eliminar</a>
    <a href="crear.">Crear</a>
    <a href="perfil.php">
        <img src="img/usuario.png" alt="Imagen" width="25" height="25">
      </a>
  </div>
</div>
<div id="titulo">
  Te equivocaste? Edita tu Informacion
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
        <form action="editar_materia.php" method="post" onsubmit="return validarSeleccionMateria();">
            <table>
                <tr>
                <tr>
                  <th>ID Materia</th>
                  <th>Nombre de la Materia</th>
                  <th>Horas Totales</th>
                  <th>Horas Semanales</th>
                  </tr>
                </tr>
                <?php
                    if ($_SERVER["REQUEST_METHOD"] === "POST") {
                        $terminoBusqueda = $_POST["termino"];

                        $conexion = new mysqli("localhost", "root", "", "bd_gheu");

                        if ($conexion->connect_error) {
                            die("Conexión fallida: " . $conexion->connect_error);
                        }

                        $sql = "SELECT * FROM materias WHERE 
                            id_materia LIKE '%$terminoBusqueda%' OR
                            nombre_materia LIKE '%$terminoBusqueda%' OR
                            horas_totales LIKE '%$terminoBusqueda%' OR
                            hora_semanal LIKE '%$terminoBusqueda%'
                            ORDER BY id_materia DESC";

                        $resultado = $conexion->query($sql);

                        if ($resultado->num_rows > 0) {
                            while ($fila = $resultado->fetch_assoc()) {
                              echo "<tr onclick='seleccionarFilaMaterias(this, " . $fila["id_materia"] . ")'>";
                              echo "<td>" . $fila["id_materia"] . "</td>";
                              echo "<td>" . $fila["nombre_materia"] . "</td>";
                              echo "<td>" . $fila["horas_totales"] . "</td>";
                              echo "<td>" . $fila["hora_semanal"] . "</td>";
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
                <input type="hidden" name="id_materia_seleccionada" id="id_materia_seleccionada" value="">
                <input type="submit" value="Modificar">
            </div> 
        </form>
</div>   
</body>
</html>

