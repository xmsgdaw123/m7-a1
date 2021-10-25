<?php
include_once './utils/session.php';
if (!isLoggedIn()) {
  header('Location: index.php');
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
      <div id="login-title" class="login-title">CEFP Núria<span id="breadcrumb" class="breadcrumb">/</span></div>
      <nav class="dashboard-nav">
        <div id="home" class="nav-item active">Inicio</div>
        <div id="profile" class="nav-item">Mi perfil</div>
      </nav>
      <div>
        <div id="home-container">
          <div>Hola <?php echo $_SESSION['username']; ?></div>
          <div>Tu id de usuario es: <?php echo $_SESSION['id']; ?></div>
          <div>Tu última visita fue el: <?php echo $_COOKIE['lastVisit']; ?></div>
        </div>
        <div id="profile-container" style="display: none;">
          <a href="./controllers/logout.php" id="btn-logout" class="btn-submit">Cerrar sesión</a>
        </div>
      </div>
    </div>
  </div>
  <script src="./public/app.js"></script>
</body>

</html>