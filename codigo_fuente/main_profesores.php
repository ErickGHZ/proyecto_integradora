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
    <link rel="stylesheet" type="text/css" href="styles_main_profesores.css">
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
        <a href="main_materias.php">Materias</a>
        <a class="opcion-des">Profesores</a>
        <a href="crear.php">Crear</a>
      </div>
   

    <!-- Otras opciones del header -->
    <a class="opcion-destacada">Ingresar</a>
    <a href="modificar_profesores.php">Modificar</a>
    <a href="eliminar_profesores.php">Eliminar</a>
    <a href="crear.php">Crear</a>
    <a href="main.php">
        <img src="img/usuario.png" alt="Imagen" width="25" height="25">
      </a>
  </div>
</div>

<div id="titulo">SIGAMOS&nbsp; CREANDO</div>

<div id="contenedor1">
  <div id="titulo-contenedor1">
    <p id="p">Ingresa los Profesores</p>
  </div>

  <div id="ingreso-datos">
    <form action="insertar_profesor.php" method="post">
      <div> <input type="text" id="nombre_profesor" name="nombre_profesor" placeholder="Nombre del profesor" required autocomplete="off"></div>
      <div> <input type="text" id="apellidos" name="apellidos" placeholder="Apellido apellidos" required autocomplete="off"></div>
      <div> <input type="text" id="email" name="email" placeholder="Email" autocomplete="off" ></div>
      <div> <input type="tel" id="telefono" name="telefono" placeholder="Telefono" pattern="[0-9]{10}" maxlength="10"  oninput="validarTelefono(this)" autocomplete="off"></div>
      
    </div>

      <div id="boton-contenedor1">
        <input type="submit" value="Ingresar Informacion">
      </div>
      </form>  
    
</div>

<div id="contenedor2">
  <div id="titulo-contenedor2">
    <p id="p">Datos</p>
  </div>

<div id="tabla-contenedor" class="tabla-contenedor">
  <table>
    <thead>
      <tr>
        <th>Nombre del profesor</th>
        <th>Apellidos</th>
        <th>Email</th>
        <th>Telefono</th>
      </tr>
      <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr onclick='seleccionarFila(this)'>";
                echo "<td>" . $row["nombre_profesor"] . "</td>";
                echo "<td>" . $row["apellidos"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["telefono"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No hay datos almacenados en la tabla.</td></tr>";
        }
        ?>
  </table>
</div>  

<div id="boton-contenedor2">
  <form action="disponibilidad_profesores.php">
    <input type="submit" value="Agregar disponibilidad">
  </form>
  <form action="relacion.php">
    <input type="submit" value="Asigna Maestros">
  </form>
</div>


</div>

</body>
</html>
