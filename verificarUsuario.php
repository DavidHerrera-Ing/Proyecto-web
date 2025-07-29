<?php
session_start();

// Verificar si se enviaron los campos "Correo" y "Contraseña" desde el formulario
if (isset($_POST['Correo']) && isset($_POST['Contraseña'])) {
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ev4";

    //Se crea la coneccion con la base de datos 
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error en la conexión a la base de datos: " . $conn->connect_error);
    }

    $correo = $_POST['Correo'];
    $contraseña = $_POST['Contraseña'];

    //crea un consulta para recuperar el correo y la contraseña 
    $sql = "SELECT * FROM usuario WHERE cor_usu = '$correo' AND con_usu = '$contraseña'";
    $resultado = $conn->query($sql);


    if($correo=="admin@hth.cl" and $contraseña=="abc123"){
        echo "<script>
        function mostrar() {
            swal('Completado', 'Inicio de session completado', 'success').then(function() {
                window.location.href = 'adminstrador.php';
            });;
        }
        mostrar();
    
        </script>";

        
    }else{

        if ($resultado->num_rows > 0) {
            
            // Iniciar la sesión y guardar el correo y la contraseña en variables de sesión
            $_SESSION['correo'] = $correo;
            $_SESSION['contraseña'] = $contraseña;

            // Redireccionar al archivo "index.php"
            echo "<script>
                        function mostrar() {
                            swal('Completado', 'Inicio de session completado', 'success').then(function() {
                                window.location.href = 'index.php';
                            });;
                        }
                        mostrar();
                    
                    </script>";
        
            exit();
        } else {
            // Mostrar un mensaje de error y redireccionar de nuevo a la página login
            echo "<script>
                    function mostrar() {
                        swal('Error', 'Datos erroneos,porfavor intentar de nuevo', 'error').then(function() {
                            window.location.href = 'login.php';
                        });;
                    }
                    mostrar();
                
                </script>";
        }
    }
}
?>