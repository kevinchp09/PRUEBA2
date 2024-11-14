<?php 
include("db_connection.php");

if (isset($_POST['registro'])) {
    if (strlen($_POST['usuario']) >= 1 && strlen($_POST['email']) >= 1) {
        $name = trim($_POST['nombre']);
        $surname = trim($_POST['apellido']);
        $user = trim($_POST['usuario']);
        $password = trim($_POST['contraseña']);
        $email = trim($_POST['email']);

        // Consulta para insertar el nuevo usuario en la base de datos
        $consulta = "INSERT INTO users(nombre, apellido, usuario, contraseña, email) 
                VALUES ('$name', '$surname', '$user', '$password', '$email')";
        $resultado = mysqli_query($conectaBD, $consulta);

        if ($resultado) {
            // Si el registro fue exitoso, redirige al login
            header('Location: login.php');
            exit(); // Asegúrate de usar exit() para terminar el script después de la redirección
        } else {
            // Si ocurrió un error en la consulta
            echo "<h3 class='mal'>¡Revise los campos!</h3>";
        }
    } else {
        // Si faltan campos requeridos
        echo "<h3 class='mal'>¡Algo FALTA!</h3>";
    }
}
?>
