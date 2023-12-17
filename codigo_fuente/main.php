<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="styles_main.css">
</head>
<body>
  <div id="logo">
    <div id="titulo">G&nbsp; H&nbsp; E&nbsp; U</div>
    <div id="inicio-sesion">
      <form id="loginForm" method="post" action="login.php">
        <div>
          <input type="text" id="usuario" name="username" placeholder="Usuario" class="user-icon" required>
        </div>
        <div>
          <input type="password" id="contrasena" name="password" placeholder="Contraseña" class="password-icon" required>
        </div>
        <div>
          <input type="submit" value="Iniciar sesión">
        </div>
      </form>
      <p id="p"><a href="registro.html">Crear Cuenta</a> 
      <a href="olvide_contraseña.php">Olvidé mi contraseña</a></p>
    </div>
    <img src="img/diseno.png" alt="Descripción de la imagen">
  </div>
</body>
</html>
