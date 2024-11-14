<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-up</title>
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
                <li><a href="index.php">Login</a></li>
            </ul>
        </nav>
    </header>
 
    <main>
        <section class="login-container">
            <h1>Registrarse</h1>
            <form  method="POST">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="apellido">Apellido</label>
                <input type="text" id="apellido" name="apellido" required>

                <label for="usuario">Usuario</label>
                <input type="text" id="usuario" name="usuario" required>

                <label for="contraseña">Contraseña</label>
                <input type="password" name="contraseña" required>
                <label for="email">Correo electrónico</label>
                <input type="email"  name="email" required>

                <input type="submit" name="registro">
            </form>
            <?php 
        include("registraru.php");
        ?>
        </section>
    </main>

    <footer class="footer">
        <p>&copy; 2024 ZapStyle. Todos los derechos reservados.</p>
    </footer>
    <script src="/JS/script.js"></script>
</body>
</html>

