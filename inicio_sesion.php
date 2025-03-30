<?php
session_start(); // Inicia la sesión

if (isset($_SESSION['username'])) {
    // Redirige al usuario a la página correspondiente según su rol
    if ($_SESSION['role'] == 'administrador') {
        header("Location: admin.php");
    } else {
        header("Location: inicio.php");
    }
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Conectar a la base de datos
    include('./connect.php');

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Buscar al usuario en la base de datos
    $sql = "SELECT * FROM usuarios WHERE username = '$username' LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verificar la contraseña (asegúrate de usar password_verify si la contraseña está hasheada)
        if (password_verify($password, $user['password'])) {
            // Iniciar sesión
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role']; // Guardamos el rol

            // Redirigir al usuario a su página correspondiente según su rol
            if ($user['role'] == 'administrador') {
                header('Location: ./admin/admin.php'); // Administradores
            } else {
                header('Location: ./inicio.php'); // Usuarios comunes
            }
            exit();
        } else {
            $error = "Contraseña incorrecta.";
        }
    } else {
        $error = "Usuario no encontrado.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h2>Iniciar sesión</h2>
    <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
    <form method="post">
        <label for="username">Nombre de usuario:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit">Iniciar sesión</button>
    </form>
    <button class="login-button" onclick="window.location.href='./login_registrer.php'">¿na tienes una cuenta? Registrate</button>
</body>
</html>
