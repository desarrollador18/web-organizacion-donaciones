<?php

session_start();

// Verificar si hay una sesión activa (puedes personalizar esta lógica)
if (!isset($_SESSION['donation_cart'])) {
    $_SESSION['donation_cart'] = []; // Inicializa si no existe
}

$tiempo_inactividad = 900; // 15 minutos
if (isset($_SESSION['ultimo_acceso']) && (time() - $_SESSION['ultimo_acceso']) > $tiempo_inactividad) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
}

$_SESSION['ultimo_acceso'] = time();


?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Organización sin fines de lucro</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f6f8;
      color: #333;
      margin: 0;
      padding: 0;
    }
    .top-right-box {
      position: absolute;
      top: 10px;
      right: 10px;
      background-color: #27ae60;
      color: white;
      padding: 10px 15px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.2);
      font-family: Arial, sans-serif;
    }
    header {
      background-color: #2c3e50;
      color: white;
      padding: 20px 0;
      text-align: center;
    }
    h1 {
      margin: 0;
      font-size: 2em;
    }
    main {
      padding: 40px 20px;
      text-align: center;
    }
    ul {
      list-style: none;
      padding: 0;
    }
    li {
      margin: 20px 0;
    }
    a {
      text-decoration: none;
      background-color: #3498db;
      color: white;
      padding: 12px 24px;
      border-radius: 5px;
      font-size: 1.1em;
      transition: background-color 0.3s ease;
    }
    a:hover {
      background-color: #2980b9;
    }
    .logout {
      background-color: #e74c3c;
      position: absolute;
      top: 10px;
      right: 10px;
      padding: 10px 15px;
      border-radius: 5px;
      color: white;
      text-decoration: none;
    }
    .logout:hover {
      background-color: #c0392b;
    }
  </style>
</head>
<body>

  <a href="logout.php" class="logout">Cerrar Sesión</a>

  <header>
    <h1>Bienvenido a nuestra organización</h1>
  </header>

  <main>
    <ul>
      <li><a href="formulario_donacion.html">Realizar una donación</a></li>
      <li><a href="formulario_evento.html">Registrar un evento</a></li>
    </ul>
  </main>

</body>
</html>

