<?php
session_start();
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verificamos si el usuario existe en la base de datos
    $sql = "SELECT * FROM clientes WHERE Email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verificamos la contraseña
        if (password_verify($password, $row['Password'])) {
            // Iniciamos sesión
            $_SESSION['user_id'] = $row['ID_Cliente'];
            $_SESSION['user_name'] = $row['Nombre'];
            echo "<script>alert('Inicio de sesión exitoso');
                location.assign('index.php'); </script>";
        } else {
            echo "<script>alert('Contraseña incorrecta');
                location.assign('login.php'); </script>";
        }
    } else {
        echo "<script>alert('Usuario no encontrado');
            location.assign('login.php'); </script>";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
</head>
<body>
    <h1>Inicio de Sesión</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Iniciar Sesión</button>
    </form>
    <a href="registro.php">Registrarse</a>
</body>
</html>