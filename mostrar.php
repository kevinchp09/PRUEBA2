<?php
include("db_connection.php");

// Consulta para obtener todos los usuarios
$consulta = "SELECT * FROM users";
$resultado = mysqli_query($conectaBD, $consulta);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios Registrados</title>
    <link rel="stylesheet" href="ms.css">
    <link rel="stylesheet" href="st.css">
</head>
<header class="header">
        <div class="logo">ZapStyle</div>
        <div class="bars">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
        <nav class="nav-bar">
            <ul>
                <li><a href="index.html" class="active">Inicio</a></li>
                <li><a href="productos.html">Productos</a></li>
                <li><a href="contactenos.html">Contáctenos</a></li>
                <li><a href="login.php">Login</a></li>
                <br>
            </ul>
        </nav>
    </header>
    
<body>

<?php
if ($resultado && mysqli_num_rows($resultado) > 0) {
    echo "<h3>Usuarios registrados:</h3>";
    echo "<table>";
    echo "<tr><th>Nombre</th><th>Apellido</th><th>Usuario</th><th>Email</th><th>Acciones</th></tr>";

    while ($usuario = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td>" . $usuario['nombre'] . "</td>";
        echo "<td>" . $usuario['apellido'] . "</td>";
        echo "<td>" . $usuario['usuario'] . "</td>";
        echo "<td>" . $usuario['email'] . "</td>";
        echo "<td>
                <a href='gestionar_usuario.php?id=" . $usuario['id'] . "'>Actualizar/Eliminar</a>
            </td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p class='no-usuarios'>No hay usuarios registrados.</p>";
}
?>

</body>
</html>