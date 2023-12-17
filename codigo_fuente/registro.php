<?php
// Verificamos si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibimos los datos del formulario
    $username = $_POST["username"];
    $password = $_POST["password1"];
    $email = $_POST["email"];

    // En este ejemplo, utilizaremos MD5 para almacenar la contraseña.
    // Como mencionado anteriormente, esto no es seguro y se recomienda
    // utilizar algoritmos más seguros en un entorno de producción.

    // Hash de la contraseña utilizando MD5
    $hashedPassword = md5($password);

    // Conexión a la base de datos (cambia las credenciales según tu configuración)
    $servername = "localhost";
    $usernameDB = "root";
    $passwordDB = "";
    $dbname = "bd_gheu";

    // Crear conexión
    $conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Insertar los datos del usuario en la base de datos
    $sql = "INSERT INTO usuario (username, password1, email) VALUES ('$username', '$hashedPassword', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Registro exitoso. El usuario ha sido registrado.');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    echo "<script>window.location.href = 'main.php';</script>";
    // Cerrar la conexión
    $conn->close();
}
?>
