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
$sql = "SELECT grupos.*, carreras.nombre_carrera
FROM grupos
JOIN carreras ON grupos.id_carrera = carreras.id_carrera;";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles_main_grupos.css">
    <script src="script_main.js"></script>
</head>
<body>
<div id="header">
    <!-- Botón desplegable -->
  <div class="dropdown">
      <img class="dropbtn" onclick="toggleMenu()" src="img/menu.png" alt="Imagen" width="25" height="25">
      <div class="dropdown-content" id="menuContent">
        <img class="close-button" onclick="toggleMenu()" src="img/menu.png" alt="Imagen" width="25" height="25">
        <!-- Opciones del botón desplegable -->
        <a href="main_carrera.php">Carreras</a>
        <a class="opcion-des">Grupos</a>
        <a href="main_materias.php">Materias</a>
        <a href="main_profesores.php">Profesores</a>
        <a href="crear.php">Crear</a>
      </div>
   

    <!-- Otras opciones del header -->
    <a class="opcion-destacada">Ingresar</a>
    <a href="modificar_grupos.php">Modificar</a>
    <a href="eliminar_grupos.php">Eliminar</a>
    <a href="crear.php">Crear</a>
    <a href="perfil.php">
        <img src="img/usuario.png" alt="Imagen" width="25" height="25">
      </a>
  </div>
</div>

<div id="titulo">SIGAMOS&nbsp; CREANDO</div>

<div id="contenedor1">
  <div id="titulo-contenedor1">
    <p id="p">Ingresa los Grupos</p>
  </div>

  <div id="ingreso-datos">
    <form action="insertar_grupos.php" method="post">
      <div> <input type="text" id="nombre_grupo" name="nombre_grupo" placeholder="Nombre del grupo" required></div>
      <div>
        <select id="carrera" name="id_carrera" required>
          <option value="" disabled selected>Selecciona una carrera</option>
          <!-- PHP code for populating dropdown options -->
          <?php
          // Configuración de la conexión a la base de datos
          $host = 'localhost';
          $usuario = 'root';
          $contraseña = '';
          $base_de_datos = 'bd_gheu';

          // Conexión a la base de datos
          $conn = mysqli_connect($host, $usuario, $contraseña, $base_de_datos);

          // Verifica la conexión
          if (!$conn) {
              die("Error de conexión: " . mysqli_connect_error());
          }

          // Consulta para obtener las carreras
          $query = "SELECT id_carrera, nombre_carrera FROM carreras";
          $resultado = mysqli_query($conn, $query);

          // Muestra las carreras como opciones en el menú desplegable
          while ($fila = mysqli_fetch_assoc($resultado)) {
              echo "<option value='" . $fila['id_carrera'] . "'>" . $fila['nombre_carrera'] . "</option>";
          }

          // Cierra la conexión a la base de datos
          mysqli_close($conn);
          ?>
        </select>
      </div>

      <div> <input type="number" id="numero_estudiantes" name="numero_estudiantes" placeholder="Número de estudiantes" min="5" max="99" oninput="valorMaximoAlumnos(this)" required></div>
      <div> <input type="number" id="grado_academico" name="grado_academico" placeholder="Grado académico" min="1" max="14" oninput="valorMaximo1(this)" required></div>

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
            <th>Nombre del Grupo</th>
            <th>Nombre de la carrera</th>
            <th>Numero de estudiantes</th>
            <th>Grado Academico</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["nombre_grupo"] . "</td>";
                echo "<td>" . $row["nombre_carrera"] . "</td>";
                echo "<td>" . $row["numero_estudiantes"] . "</td>";
                echo "<td>" . $row["grado_academico"] . "</td>";
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

