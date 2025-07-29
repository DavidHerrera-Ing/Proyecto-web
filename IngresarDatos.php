<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ev4";

// Crea una conexión con la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

$sql = "SELECT id_pas, nom_pas FROM pais;";
$pais = $conn->query($sql);

$sql2 = "SELECT id_pre, val_pre FROM pregunta;";
$pregunta = $conn->query($sql2);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los valores del formulario
    $nacionalidad = $_POST['nacionalidad'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $dia = $_POST['dia'];
    $mes = $_POST['mes'];
    $año = $_POST['año'];
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];
    $pregunta_secreta = $_POST['pregunta_secreta'];
    $respuesta_secreta = $_POST['respuesta_secreta'];

    $sql3 = "SELECT cor_usu FROM usuario where cor_usu = '$correo' ";
    $resultado = $conn->query($sql3);

    if ($resultado->num_rows > 0) {
        echo "<script>
                function mostrar() {
                    swal('Error', 'Correo Existente', 'error').then(function() {
                        window.location.href = 'crearCuenta.php';
                    });;
                }
                mostrar();
            
            </script>";
        
    } else {
        $sql = "INSERT INTO usuario (pas_usu, nom_usu, apl_usu, dia_usu, mes_usu, aio_usu, cor_usu, con_usu, pre_usu, res_usu) VALUES ('$nacionalidad', '$nombre', '$apellido', '$dia', '$mes', '$año', '$correo', '$contraseña', '$pregunta_secreta', '$respuesta_secreta')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>
                    function mostrar() {
                        swal('Completado', 'Cuenta creada con éxito', 'success').then(function() {
                            window.location.href = 'login.php';
                        });;
                    }
                    mostrar();
                
                </script>";
            
        } else {
            echo "Error al insertar los datos: " . $conn->error;
        }
    }
    $conn->close();
}
?>

