<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // De esta forma se encripta la contraseña

    $sql = "INSERT INTO clientes (Nombre, Apellidos, Email, Password) VALUES ('$nombre', '$apellido', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Usuario registrado exitosamente');
            location.assign('login.php'); </script>";
    } else {
        echo "<script>alert('Error al registrar el usuario');
            location.assign('registro.php'); </script>";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
</head>
<body>
    <h1>Registro de Usuario</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>
        <div>
            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Registrar</button>
    </form>
    <a href="login.php">Volver al inicio de sesión</a>
</body>
</html>