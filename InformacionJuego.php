<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>InformacionJuego</title>
    <link rel="stylesheet" href="informacion.css">
</head>
<body>
<?php
session_start();
if (isset($_POST['correo'])) {
    $_SESSION['correo'] = $_POST['correo'];
}
?>

<div class="fondo1">
    <form action="detalleJuego.php" method="post">
        
        <?php
        $juego = $_GET['juego'];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ev4";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Error al conectar con la base de datos: " . $conn->connect_error);
        }
        $sql = "SELECT 
                    juego.nom_jug,
                    ROUND(COALESCE(NULLIF(juego.pre_jug - (juego.pre_jug * (juego.dsc_jug) / 100), 0), ''), 0) AS ValorDescuento,
                    categoria.nom_cat, juego.dsc_jug,juego.pre_jug,juego.des_jug,juego.stk_jug FROM juego INNER JOIN 
                    categoria ON juego.cat_jug = categoria.id_cat WHERE nom_jug = '$juego'";

        $resultado = $conn->query($sql);

        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                $nombre = $row['nom_jug'];
                $descripcion = $row['des_jug'];
                $precio = $row['ValorDescuento'];
                $stock = $row['stk_jug'];

                ?>
                <style>
                    body {
                        margin: 0;
                        padding: 0;
                    }

                    .fondo1 {
                        background-image: url('imagenes/fondos/<?php echo rawurlencode($row['nom_jug']); ?>.JPG');
                        background-size: cover;
                        background-repeat: no-repeat;
                        object-fit: cover;
                        width: 100%;
                        height: 100vw;
                        color: white;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                    }
                </style>

                <h2><?php echo $nombre; ?></h2>
                <p><?php echo $descripcion; ?></p>
                <p>Precio: <?php echo $precio; ?></p>
                <p>Stock: <?php echo $stock; ?></p>
                <?php
            }
        } else {
            echo "No se encontró el juego especificado.";
        }
        ?>

        <br>
        <br>
        <br>
        <br>
        <?php
        
        $nuevo_juego = array(
            'nombre' => $nombre,
            'precio' => $precio,
            'descripcion' => $descripcion,
            'stock' => $stock
        );

       
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = array();
            }

            $_SESSION['carrito'][] = $nuevo_juego;
            ?>
        
            <input id="comprar" type="submit" value="Agregar al Carrito">
        </form>
        </div>
        <script>
            document.getElementById('comprar').addEventListener('click', function (event) {
                event.preventDefault();
        
                var confirmacion = confirm("¿Desea ir al carrito de compras?");
        
                if (confirmacion) {
                    window.location.href = "detalleJuego.php";
                } else {
                    window.location.href = "index.php";
                }
            });
        </script>
</body>
</html>
