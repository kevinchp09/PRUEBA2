<?php
include("db_connection.php");

// Verifica si se pasó un id en la URL para gestionar el usuario
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta para obtener los datos del usuario
    $consulta = "SELECT * FROM users WHERE id = $id";
    $resultado = mysqli_query($conectaBD, $consulta);
    $usuario = mysqli_fetch_assoc($resultado);

    if (!$usuario) {
        echo "<h3 class='mal'>¡Usuario no encontrado!</h3>";
        exit();
    }

    // Si el formulario de actualización fue enviado
    if (isset($_POST['actualizar'])) {
        $nombre = trim($_POST['nombre']);
        $apellido = trim($_POST['apellido']);
        $password = trim($_POST['contraseña']);
        $usuario_actualizado = trim($_POST['usuario']);
        $email = trim($_POST['email']);

        // Consulta para actualizar los datos del usuario
        $consulta_update = "UPDATE users SET nombre = '$nombre', apellido = '$apellido', usuario = '$usuario_actualizado', contraseña = '$password', email = '$email' WHERE id = $id";
        $resultado_update = mysqli_query($conectaBD, $consulta_update);

        if ($resultado_update) {
            echo "<h3 class='ok'>¡Datos actualizados correctamente!</h3>";
        } else {
            echo "<h3 class='mal'>¡Error al actualizar los datos!</h3>";
        }
    }

    // Si el formulario de eliminación fue enviado
    if (isset($_POST['eliminar'])) {
        // Consulta para eliminar el usuario
        $consulta_delete = "DELETE FROM users WHERE id = $id";
        $resultado_delete = mysqli_query($conectaBD, $consulta_delete);

        if ($resultado_delete) {
            echo "<h3 class='ok'>¡Usuario eliminado correctamente!</h3>";
            // Redirigir a otra página después de la eliminación
            header("Location: mostrar_usuarios.php"); // Redirige a la página donde se listan los usuarios
            exit();
        } else {
            echo "<h3 class='mal'>¡Error al eliminar el usuario!</h3>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Usuario</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="container">
        <h2>Gestionar Usuario</h2>

        <!-- Formulario de actualización de usuario -->
    
        <form action="" method="POST">
            <div class="input-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" value="<?php echo $usuario['nombre']; ?>" required>
            </div>

            <div class="input-group">
                <label for="apellido">Apellido:</label>
                <input type="text" name="apellido" id="apellido" value="<?php echo $usuario['apellido']; ?>" required>
            </div>

            <div class="input-group">
                <label for="usuario">Usuario:</label>
                <input type="text" name="usuario" id="usuario" value="<?php echo $usuario['usuario']; ?>" required>
            </div>

            <div class="input-group">
                <label for="contraseña">Contraseña:</label>
                <input type="password" name="contraseña" id="contraseña" value="<?php echo $usuario['contraseña']; ?>" required>
            </div>

            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="<?php echo $usuario['email']; ?>" required>
            </div>

            <div class="button-group">
                <input type="submit" name="actualizar" value="Actualizar Usuario">
            </div>
        </form>

        <!-- Formulario de eliminación de usuario -->
        <form action="" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este usuario?');">
            <div class="button-group">
                <input type="submit" name="eliminar" value="Eliminar Usuario" class="delete-btn">
            </div>
        </form>
    </div>
    <div class="button-group">
            <button onclick="window.history.back()">Volver</button>
        </div>
</body>
</html>
