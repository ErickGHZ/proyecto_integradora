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
    <link rel="stylesheet" type="text/css" href="styles_main_materias.css">
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
    <a class="opcion-destacada">Ingresar</a>
    <a href="modificar_materias.php">Modificar</a>
    <a href="eliminar_materias.php">Eliminar</a>
    <a href="crear.php">Crear</a>
    <a href="perfil.php">
        <img src="img/usuario.png" alt="Imagen" width="25" height="25">
      </a>
  </div>
</div>

<div id="titulo">SIGAMOS&nbsp; CREANDO</div>

<div id="contenedor1">
  <div id="titulo-contenedor1">
    <p id="p">Ingresa las Materias</p>
  </div>

  <div id="ingreso-datos">
    <form action="insertar_materias.php" method="post">
      <div> <input type="text" id="nombre_materia" name="nombre_materia" placeholder="Nombre de la materia" required autocomplete="off"></div>
      <div> <input type="number" id="horas_totales" name="horas_totales" placeholder="Horas totales" min="10" max="200" oninput="valorMaximo(this)" ></div>
      <div> <input type="number" id="hora_semanal" name="hora_semanal" placeholder="Horas semanales" min="1" max="14" oninput="valorMaximo1(this)" required></div>
  </div>
      <div id="boton-contenedor1">
        <input type="submit" value="Ingresar Informacion">
      </div>
    </form>  
</div>

<div id="contenedor2">
  <div id="titulo-contenedor2">
    <p>Datos</p>
  </div>

<div id="tabla-contenedor" class="tabla-contenedor">
<table>
        <tr>
            <th>Id materia</th>
            <th>Nombre de la materia</th>
            <th>Horas totales</th>
            <th>Horas semanales</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id_materia"] . "</td>";
                echo "<td>" . $row["nombre_materia"] . "</td>";
                echo "<td>" . $row["horas_totales"] . "</td>";
                echo "<td>" . $row["hora_semanal"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No hay datos almacenados en la tabla.</td></tr>";
        }
        ?>
    </table>
</div>  

<div id="boton-contenedor2">
  <form action="disponibilidad_aulas.php">
    <input type="submit" value="Agregar disponibilidad">
  </form>
</div>
</div>

</body>
</html>
