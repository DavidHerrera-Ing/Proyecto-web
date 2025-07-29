<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle de Juego</title>
    <link rel="stylesheet" href="detalle.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <?php
        session_start();

       
        if (!isset($_SESSION['correo'])) {
            echo "<script>
                function mostrar() {
                    swal('ERROR', 'Profavor ingresar con correo', 'error').then(function() {
                        window.location.href = 'login.php';
                    });;
                }
                mostrar();
            
                </script>";
            exit(); 
        }
    ?>
    <h1>Detalle de compra</h1>

    <table>
        <tr>
            <th>Producto</th>
            <th>Precio</th>
        </tr>
        
        <?php
        

        if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0) {
            foreach ($_SESSION['carrito'] as $juego) {
                $nombre = $juego['nombre'];
                $precio = $juego['precio'];

                echo "<tr>";
                echo "<td>$nombre</td>";
                echo "<td>$$precio</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr>";
            echo "<td colspan='2'>No se han agregado juegos al carrito.</td>";
            echo "</tr>";
        }
        ?>
        
        <tr>
            <td class="total">Total:$ <span id="total"></span></td>
        </tr>
    </table>

    <div class="checkout">
        <form action="pago.php" method="post">
            <button type="submit" name="pago">Realizar Pago</button>
        </form>
    </div>

        <a href="index.php">Seguir navegando</a>

    <script>
        function calcularTotal() {
            var carrito = <?php echo json_encode($_SESSION['carrito']); ?>; 

            var total = 0;

           
            carrito.forEach(function(juego) {
                total += parseInt(juego.precio);
            });

            document.getElementById("total").textContent = total; 
        }
        calcularTotal(); 
    </script>
</body>
</html>
