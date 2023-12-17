<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['username'])) {
    header("Location: main.php");
    exit();
}

// Conexión a la base de datos (ajusta los valores de acuerdo a tu configuración)
$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "bd_gheu";

$conn = new mysqli($servername, $username_db, $password_db, $dbname);

// Verificar si la conexión fue exitosa
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

$username = $_SESSION['username'];

if (isset($_POST['reset_table'])) {
    // Consulta para truncar (reiniciar) la tabla disponibilidad_aulas
    $reset_query_profesores = "TRUNCATE TABLE disponibilidad_profesores";
    $reset_query_horarios = "TRUNCATE TABLE horarios";

    if ($conn->query($reset_query_profesores) === TRUE &&
        $conn->query($reset_query_horarios) === TRUE) {
        echo "Tablas reiniciadas exitosamente.";
    } else {
        echo "Error al reiniciar las tablas: " . $conn->error;
    }
}

// Obtener los datos del usuario desde la base de datos
$sql = "SELECT * FROM usuario WHERE username = '$username'";
$result = $conn->query($sql);

$nombre = $correo = "";

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $nombre = $row['username'];
    $correo = $row['email'];
}

// Cerrar la conexión a la base de datos
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles_perfil.css">
</head>
<body>
<div id="header">
    <!-- Botón desplegable -->
    <div class="dropdown">
        <form action="<?php echo $_SERVER['HTTP_REFERER']; ?>" method="post">
            <button type="submit"><img class="dropbtn" src="img/menu.png" alt="Imagen" width="25" height="25"></button>
        </form>
    </div>
</div>

<div id="titulo">
    Perfil
</div>

<div id="contenedor2">
    <div id="tabla-contenedor" class="tabla-contenedor">
        <div><p id="h">Bienvenido <?php echo $nombre; ?> <br> Tu correo es: <?php echo $correo; ?></p></div>
        <div id="titulo-contenedor2">
            <div><p id="p">¿Deseas Modificar?</p></div>
        </div>
        <br>
        <form action="perfil_modificar.php" method="post">
            <div>
                <div><input type="text" name="nuevo_nombre" placeholder="Nuevo nombre" required></div>
                <div><input type="password" name="password" placeholder="Nueva Contraseña" required></div>
                <div><input type="email" name="nuevo_correo" placeholder="Nuevo correo" required></div>
            </div>
    </div>
            <div><input type="submit" value="Actualizar"></div>
        </form>
        <br>
        <form method="post" action="" onsubmit="return confirm('¿Estás seguro de reiniciar las tablas Horarios, Disponibilidad_professores?');">
        <input type="submit" name="reset_table" value="Reiniciar Tablas">
        </form>
        <br>
        <form action="cerrar.php" method="post">
            <input type="submit" value="Cerrar Sesión">
        </form>
</div>
</body>
</html>
