
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style-Login.css">
    <link rel ="stylesheet" href="Paratodos.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
</head>
<body>
    <?php
        require "verificarUsuario.php";
    ?>

    <div class="fondo">
        <form action="login.php" method="post">
            <div class="form1">
                <img id="imagen" style= "width: 35%; height: 35%;margin-left: 3%;margin-bottom: 5%;" src="imagenes/logo2.png" alt="error">
                
                <br>
                <br>
                <input type="email" name="Correo" id="Correo" placeholder="Correo electr&oacute;nico" required><br><br>
                <input type="password" name="Contraseña" id="Contraseña" placeholder="Contrase&ntilde;a" required>
            </div>

            <br>
            <input type="submit" id="iniciarsesion" value="Iniciar Sesi&oacute;n">
            <a href="crearCuenta.php">
                <p style="margin-left: -60%;">Crear cuenta</p>
            </a>
        </form>
    </div>
</body>
</html>





