<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>Lista de clientes</h1>
    <a href="agregar.php">Nuevo cliente</a>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php
                include 'conexion.php';
                $sql = "SELECT * FROM clientes";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["ID_Cliente"]. "</td>
                                <td>" . $row["Nombre"]. "</td>
                                <td>" . $row["Apellidos"]. "</td>
                                <td>" . $row["Email"]. "</td>
                                <td>" . $row["Telefono"]. "</td>
                                <td>
                                    <a href='editar.php?id=" . $row["ID_Cliente"] . "'>Editar</a>
                                    <a href='eliminar.php?id=" . $row["ID_Cliente"] . "'>Eliminar</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No hay clientes registrados</td></tr>";
                }
                $conn->close();
        ?>
           
        </tbody>

    </table>
</body>
</html>