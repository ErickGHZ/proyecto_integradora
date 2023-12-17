<?php
// Iniciar la sesión
session_start();

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

// Obtener los datos del formulario de manera segura
if (isset($_POST['username']) && isset($_POST['password'])) {
  $username = $conn->real_escape_string($_POST['username']);
  $password = $conn->real_escape_string($_POST['password']);

  // Consulta para verificar el usuario en la base de datos
  $sql = "SELECT * FROM usuario WHERE username = '$username'";
  $result = $conn->query($sql);

  if ($result && $result->num_rows == 1) {
    $user = $result->fetch_assoc();
    $stored_password = $user['password1'];

    // Verificar la contraseña utilizando password_verify
    if ($stored_password === md5($password)) { // Corrección aquí
      // Usuario y contraseña válidos, se inicia la sesión
      $_SESSION['username'] = $username;
      echo "<script>alert('Bienvenido $username.');</script>";
      echo "<script>window.location.href = 'main_carrera.php';</script>";
      exit;
    } else {
      // Contraseña incorrecta
      echo "<script>alert('Contraseña incorrecta');</script>";
    }
  } else {
    // Usuario no encontrado
    echo "<script>alert('Usuario no encontrado');</script>";
  }
} else {
  // Datos de formulario incompletos
  echo "<script>alert('Por favor, complete todos los campos');</script>";
}

// Redireccionar en todos los casos
echo "<script>window.location.href = 'main.php';</script>";

$conn->close();
?>
