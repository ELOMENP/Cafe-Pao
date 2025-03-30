<?php
session_start();

// Verifica si el usuario está autenticado y tiene el rol de cliente
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'usuario') {
    header("Location: ./login_registrer.php"); // Si no está autenticado, redirige a la página de inicio de sesión
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafetería - Bienvenidos</title>
    <link rel="stylesheet" href="../css/styles.css">
    <style>
        /* Aseguramos que el body tenga posición relativa para elementos absolutamente posicionados */
        body {
            position: relative;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /* Estilos para el botón de inicio de sesión en la esquina superior derecha */
        .login-button {
            position: absolute;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            background-color: #d2691e;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .login-button:hover {
            background-color: #a0522d;
        }

        /* Sección de presentación */
        .intro-section {
            text-align: center;
            padding: 20px;
        }

        .intro-image {
            width: 200px;
            height: auto;
        }

        /* Estilos para el contenedor de botones */
        .button-container {
            text-align: center;
            margin-top: 20px;
        }

        .button-container button {
            margin: 5px;
            padding: 10px 20px;
            background-color: #d2691e;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .button-container button:hover {
            background-color: #a0522d;
        }

        /* Estilo para el botón de cerrar sesión */
        .logout-button {
            position: fixed;
            bottom: 20px;
            left: 20px;
            padding: 10px 20px;
            background-color: #d2691e;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .logout-button:hover {
            background-color: #a0522d;
        }
    </style>
</head>
<body class="main-content">
    <section class="intro-section">
        <h1>Bienvenidos a Nuestra Cafetería</h1>
        <p>En nuestra cafetería, nos dedicamos a ofrecerte la mejor experiencia con café de alta calidad, bebidas innovadoras y deliciosos pasteles. Disfruta de un ambiente cálido y acogedor, perfecto para compartir con amigos o disfrutar de un tiempo a solas. ¡Te esperamos!</p>
        <img src="../Logo.png" alt="Imagen de la cafetería" class="intro-image" style="width: 200px; height: auto;">
    </section>

    <!-- Contenedor de los botones -->
    <div class="button-container">
        <button onclick="window.location.href='./Menu.php'">Menú</button>
        <button onclick="window.location.href='./Reservaciones.php'">Reservaciones</button>
        <button onclick="window.location.href='./Ubicacion2.php'">Ubicación</button>
        <button onclick="window.location.href='./Pedidos.php'">Pedidos</button>
    </div>

    <!-- Botón de cerrar sesión -->
    <button class="logout-button" onclick="window.location.href='../index.php'">CERRAR SESIÓN</button>
</body>
</html>
