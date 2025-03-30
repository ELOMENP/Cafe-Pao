<?php

session_start();
include('./connect.php');

// Si el usuario ya está logueado, redirige a la página de inicio
if (isset($_SESSION['username'])) {
    header("Location: ../inicio.php");  // O la página que desees
    exit();
}

// Variables de errores
$login_error = '';
$register_error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Registrar nuevo usuario
    if (isset($_POST['register'])) {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role']; // Obtener el tipo de usuario

        $sql = "SELECT * FROM usuarios WHERE username = '$username'";
        $result = $conn->query($sql);  // Esto solo funcionará si $conn está correctamente definida
        
        if ($result->num_rows > 0) {
            $register_error = "El nombre de usuario ya está en uso. Por favor, elige otro.";
        } else {
            // Hashear la contraseña antes de almacenarla
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insertar usuario en la base de datos con el rol (cliente o administrador)
            $sql = "INSERT INTO usuarios (nombre, apellido, email, username, password, role) 
                    VALUES ('$nombre', '$apellido', '$email', '$username', '$hashed_password', '$role')";

            if ($conn->query($sql) === TRUE) {
                // Redirigir al inicio de sesión después de un registro exitoso
                header("Location: ./login_registrer.php");
                exit();
            } else {
                $register_error = "Error al registrar el usuario: " . $conn->error;
            }
        }
    }

    // Iniciar sesión
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Verificar las credenciales
        $sql = "SELECT * FROM usuarios WHERE username = '$username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];  // Guardar el rol para controlar acceso a diferentes páginas
                header("Location: ./inicio.php");
                exit();
            } else {
                $login_error = "Contraseña incorrecta.";
            }
        } else {
            $login_error = "El nombre de usuario no existe.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión / Registrarse</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <!-- Errores de registro -->
    <?php if ($register_error): ?>
        <p style="color:red;"><?php echo $register_error; ?></p>
    <?php endif; ?>

    <form action="./login_registrer.php" method="POST">
        <h2>Registrarse</h2>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="username">Nombre de usuario:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>

        <label for="role">Tipo de usuario:</label>
        <select name="role" id="role" required>
            <option value="usuario">Cliente</option>
            <option value="administrador">Administrador</option>
        </select>

        <button type="submit" name="register">Registrarse</button>
    </form>
    <button class="login-button" onclick="window.location.href='./inicio_sesion.php'">¿Ya tienes una cuenta? Inicia Sesion</button>
</body>
</html>
