<?php
include("db_connection.php");

if (isset($_POST['login'])) {
    $usuario = trim($_POST['usuario']);
    $password = trim($_POST['contraseña']);

    // Consulta para verificar si el usuario y la contraseña existen
    $consulta = "SELECT * FROM users WHERE usuario = '$usuario' AND contraseña = '$password'";
    $resultado = mysqli_query($conectaBD, $consulta);
    if ($resultado && mysqli_num_rows($resultado) > 0) {
        // El usuario ha iniciado sesión correctamente
        header('Location: mostrar.php'); // Redirige a mostrar.php
        exit(); // Termina el script para evitar que se ejecute más código
    } else {
        echo "<h3 class='mal'>¡Usuario o contraseña incorrectos!</h3>";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="st.css">
    <link rel="stylesheet" href="cr.css">
</head>
<body>
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
            </ul>
        </nav>
    </header>

    <main>
        <section class="login-container">
            <h1>Iniciar Sesión</h1>
            <form method="POST">
        <label for="usuario">Nombre de usuario:</label><br>
        <input type="text" id="usuario" name="usuario" required><br><br>

        <label for="contraseña">Contraseña:</label><br>
        <input type="password" name="contraseña" required><br><br>

    <button type="submit" name="login">Iniciar sesión</button>
</form>
    
        </section>
    </main>

    <footer class="footer">
        <p>&copy; 2024 ZapStyle. Todos los derechos reservados.</p>
    </footer>
    <script src="/JS/script.js"></script>
</body>
</html>

</html>

    <footer class="footer">
        <p>&copy; 2024 ZapStyle. Todos los derechos reservados.</p>
    </footer>
    <script src="/JS/scrip.js"></script>
</body>
</html>
