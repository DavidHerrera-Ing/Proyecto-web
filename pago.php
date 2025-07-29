<?php
session_start();


if (isset($_POST['pago'])) {
   
    $fecha_venta = date('Y-m-d H:i:s'); 
    $total_venta = calcularTotal($_SESSION['carrito']); 
    $usuario_venta = $_SESSION['correo']; 

   
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ev4";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error al conectar con la base de datos: " . $conn->connect_error);
    }

    $sql1 = "SELECT usuario.id_usu FROM usuario WHERE usuario.cor_usu = '$usuario_venta'";
    $resultado = $conn->query($sql1);
    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        $id_usuario = $fila['id_usu'];
    
        $sql = "INSERT INTO venta (fch_ven, tot_ven, usu_ven) VALUES ('$fecha_venta', '$total_venta', '$id_usuario')";

        if ($conn->query($sql) === TRUE) {
            
            unset($_SESSION['carrito']);3
    
            echo "<script>
                    alert('Pago realizado exitosamente.');
                    window.location.href = 'detalleJuego.php';
                </script>";
        } else {
            echo "Error al procesar el pago: " . $conn->error;
        }    
    
    } else {
        echo "";
    }

    
    $conn->close();
}
function calcularTotal($carrito) {
    $total = 0;

    foreach ($carrito as $juego) {
        $total += $juego['precio'];
    }

    return $total;
}
?>