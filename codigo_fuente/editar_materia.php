<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles_modificar_materias.css">
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
        <a href="main_profesores.php">Profesores</a>
        <a href="main_materias.php">Materias</a>
        <a href="main_grupos.php">Grupos</a>
        <a href="crear.php">Crear</a>
      </div>
   

    <!-- Otras opciones del header -->
    <a href="main_carrera.php">Ingresar</a>
    <a class="opcion-destacada">Modificar</a>
    <a href="Eliminar_carrera.php">Eliminar</a>
    <a href="crear.php">Crear</a>
    <a href="perfil.php">
        <img src="img/usuario.png" alt="Imagen" width="25" height="25">
      </a>
  </div>
</div>
<div id="titulo">
  Te equivocaste? Edita tu Informacion
</div>

  <div id="contenedor2">
    <div id="titulo-contenedor2">
      <p id="p">Nueva Informacion</p>
    </div>
      <div id="ingreso-datos2">
        <form action="editar_materia1.php" method="post" >            
        <?php
        $conexion = new mysqli("localhost", "root", "", "bd_gheu");
        // Obtener la información de la carrera seleccionada
        $idMateriaSeleccionada = $_POST["id_materia_seleccionada"];
        $sqlObtenerMateria = "SELECT * FROM materias WHERE id_materia = '$idMateriaSeleccionada'";
        $resultadoMateria = $conexion->query($sqlObtenerMateria);
        
        if ($resultadoMateria->num_rows > 0) {
            $filaMateria = $resultadoMateria->fetch_assoc();
            $idMateria = $filaMateria["id_materia"];
            $nombreMateria = $filaMateria["nombre_materia"];
            $horasTotales = $filaMateria["horas_totales"];
            $horaSemanal = $filaMateria["hora_semanal"];
            // ... (obtener los valores de otros campos)
        }
        ?>
    
            <div> <input type="text" id="id_materia" name="id_materia" placeholder="ID de la Materia" required value="<?php echo $idMateria; ?>"></div>
            <div> <input type="text" id="nombre_materia" name="nombre_materia" placeholder="Nombre del materia" required value="<?php echo $nombreMateria; ?>"></div>
            <div> <input type="number" id="horas_totales" name="horas_totales" placeholder="Horas totales" min="10" max="200" oninput="valorMaximo(this)"  required value="<?php echo $horasTotales; ?>"></div>
            <div> <input type="number" id="hora_semanal" name="hora_semanal" placeholder="Horas semanales" min="1" max="14" oninput="valorMaximo1(this)" required value="<?php echo $horaSemanal; ?>"></div>
            </div>
                    <div id="boton-contenedor2">
                    <input type="submit" value="Ingresar Informacion">
                </div>
            </form>
  </div>
</body>
</html>
