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

  // Consulta para obtener los datos de la tabla profesores
  $sql = "SELECT * FROM profesores";
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
            <a class="opcion-des">Profesores</a>
            <a href="main_materias.php">Materias</a>
            <a href="main_grupos.php">Grupos</a>
            <a href="crear.php">Crear</a>
        </div>


        <!-- Otras opciones del header -->
        <a href="main_profesores.php">Ingresar</a>
        <a class="opcion-destacada">Modificar</a>
        <a href="eliminar_profesores.php">Eliminar</a>
        <a href="crear.php">Crear</a>
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
        <form action="editar_profesor.php" method="post" onsubmit="return validarSeleccionProfesor();">
            <table>
                <tr>
                    <th>ID del profesor</th>
                    <th>Nombre del profesor</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th>Telefono</th>
                </tr>
                <?php
                    if ($_SERVER["REQUEST_METHOD"] === "POST") {
                        $terminoBusqueda = $_POST["termino"];

                        $conexion = new mysqli("localhost", "root", "", "bd_gheu");

                        if ($conexion->connect_error) {
                            die("Conexión fallida: " . $conexion->connect_error);
                        }

                        $sql = "SELECT * FROM profesores WHERE 
                            id_profesor LIKE '%$terminoBusqueda%' OR
                            nombre_profesor LIKE '%$terminoBusqueda%' OR
                            apellidos LIKE '%$terminoBusqueda%' OR
                            email LIKE '%$terminoBusqueda%' OR 
                            telefono LIKE '%$terminoBusqueda%'
                            ORDER BY id_profesor DESC";

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
                ?>
            </table>
    </div>   
            <div id="boton-contenedor2">
                <input type="hidden" name="id_profesor_seleccionada" id="id_profesor_seleccionada" value="">
                <input type="submit" value="Modificar">
            </div> 
        </form>
</div>   
</body>
</html>
