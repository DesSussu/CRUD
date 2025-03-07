<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'conexion.php';

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellidos'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    $sql = "INSERT INTO clientes (Nombre, Apellidos, Email, Telefono) VALUES ('$nombre', '$apellidos', '$email', '$telefono')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Cliente agregado exitosamente');
            location.assign('index.php'); </script>";
    } else {
        echo "<script>alert('Cliente NO se ha agregado exitosamente');
            location.assign('index.php'); </script>";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Cliente</title>
</head>
<body>
    <h1>Agregar Cliente</h1>
    <form action="agregar.php" method="POST">
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
            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" required>
        </div>
        <button type="submit">Agregar Cliente</button>
    </form>
    <a href="index.php"></a>
</body>
</html>