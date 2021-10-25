<?php
  include_once './utils/session.php';
  if (isLoggedIn()) {
    header('Location: dashboard.php');
  }
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CEFP Núria</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./public/style.css">
</head>

<body>
  <div class="index-app">
    <div class="login-form">
      <div id="login-title" class="login-title">CEFP Núria</div>
      <form>
        <div>
          <div class="login-info">Nombre de usuario</div>
          <input id="username" class="text-input mb" type="text" placeholder="Usuario...">
          <div class="login-info">Contraseña</div>
          <input id="password" class="text-input mb" type="password" placeholder="Contraseña...">
          <button id="btn-auth" class="btn-submit" type="submit">Enviar</button>
          <button id="login-switch" class="login-switch">Crear una nueva cuenta</button>
        </div>
      </form>
    </div>
  </div>
  <script src="./public/app.js"></script>
</body>

</html>