<?php
include 'conexion.php';
$row = null;

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); 
    // Linea de datos del cliente
    $sql = "SELECT * FROM clientes WHERE ID_Cliente = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "<script>alert('Cliente no encontrado');
            location.assign('index.php'); </script>";
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']); 
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellidos'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    // Linea para actualizar los datos del cliente
    $sql = "UPDATE clientes SET Nombre='$nombre', Apellidos='$apellidos', Email='$email', Telefono='$telefono' WHERE ID_Cliente=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Cliente actualizado exitosamente');
            location.assign('index.php'); </script>";
    } else {
        echo "<script>alert('Error al actualizar el cliente');
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
    <title>Editar Cliente</title>
</head>
<body>
    <h1>Editar Cliente</h1>
    <?php if ($row) { ?>
    <form action="editar.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['ID_Cliente']; ?>">
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo $row['Nombre']; ?>" required>
        </div>
        <div>
            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" value="<?php echo $row['Apellidos']; ?>" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $row['Email']; ?>" required>
        </div>
        <div>
            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" value="<?php echo $row['Telefono']; ?>" required>
        </div>
        <button type="submit">Actualizar Cliente</button>
    </form>
    <?php } else { ?>
        <p>Cliente no encontrado.</p>
    <?php } ?>
    <a href="index.php">Volver a la lista de clientes</a>
</body>
</html>