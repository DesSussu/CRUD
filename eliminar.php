<?php
include 'conexion.php';

// Eliminar todos los registros de la tabla
$sql = "DELETE FROM clientes";
if ($conn->query($sql) === TRUE) {
    $sql = "ALTER TABLE clientes AUTO_INCREMENT = 1";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Todos los clientes eliminados y AUTO_INCREMENT reiniciado');
            location.assign('index.php'); </script>";
    } else {
        echo "<script>alert('Error al reiniciar AUTO_INCREMENT');
            location.assign('index.php'); </script>";
    }
} else {
    echo "<script>alert('Error al eliminar los clientes');
        location.assign('index.php'); </script>";
}

$conn->close();
?>