<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Paratodos.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Agregar juego</title>
</head>
<body>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ev4";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error al conectar con la base de datos: " . $conn->connect_error);
    }

    $sql2 = "SELECT * FROM categoria";
    $resul2 = $conn->query($sql2);

    if (isset($_POST["nombre"])) {
        $id = $_POST["nombre"];

        $sql = "SELECT * FROM juego WHERE nom_jug = '$id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $nombre = $row["nom_jug"];
            $descripcion = $row["des_jug"];
            $precio = $row["pre_jug"];
            $descuento = $row["dsc_jug"];
            $stock = $row["stk_jug"];
            $categoria = $row["cat_jug"];
            echo "<script>
            function mostrar() {
                swal('Completado', 'Juego Encontrado', 'success').then(function() {
                
                });
            }
            mostrar();
            </script>";

        } else {
            echo "<script>
            function mostrar() {
                swal('ERROR', 'Juego no existente', 'error').then(function() {
                    window.location.href = 'adminstrador.php';
                });
            }
            mostrar();
            </script>";
        }
    }

    if (isset($_POST["registrar"])) {
        $nombre = $_POST["nombre"];
        $descripcion = $_POST["descripcion"];
        $precio = $_POST["precio"];
        $descuento = $_POST["descuento"];
        $stock = $_POST["stock"];
        $categoria = $_POST["categoria"];

        $sql3 = "INSERT INTO juego (nom_jug, des_jug, pre_jug, dsc_jug, stk_jug, cat_jug) VALUES ('$nombre', '$descripcion', '$precio', '$descuento', '$stock', '$categoria')";
        if ($conn->query($sql3) === TRUE) {
            echo "<script>
            function mostrar() {
                swal('Completado', 'Juego registrado', 'success').then(function() {
                    window.location.href = 'adminstrador.php';
                });
            }
            mostrar();
            </script>";
        } else {
            echo "<script>
            function mostrar() {
                swal('ERROR', 'Error al registrar el juego', 'error').then(function() {
                    window.location.href = 'adminstrador.php';
                });
            }
            mostrar();
            </script>";
        }
    }


    if (isset($_POST["MODIFICAR"])) {
        $nombre = $_POST["nombre"];
        $precio = $_POST["precio"];
        $descuento = $_POST["descuento"];
        
        $sql4 = "UPDATE juego SET pre_jug='$precio', dsc_jug='$descuento' WHERE nom_jug='$nombre'";
        if ($conn->query($sql4) === TRUE) {
            echo "<script>
            function mostrar() {
                swal('Completado', 'Juego modificado', 'success').then(function() {
                    window.location.href = 'adminstrador.php';
                });
            }
            mostrar();
            </script>";
        } else {
            echo "<script>
            function mostrar() {
                swal('ERROR', 'Error al modificar el juego', 'error').then(function() {
                    window.location.href = 'adminstrador.php';
                });
            }
            mostrar();
            </script>";
        }
    }

    $conn->close();
?>

<h1 id="titulo">OPCIONES DE ADMINISTRADOR</h1>

<div class="agregar">
    <form id="aa" action="adminstrador.php" method="post">
        <input id="nombre" type="text" name="nombre" placeholder="Por favor ingrese el nombre del juego" value="<?php echo isset($nombre) ? $nombre :''; ?>">
<input id="iniciarsesion2" type="submit" value="Buscar">
<br>
<br>
<textarea id="descripcion" name="descripcion" placeholder="Por favor ingrese una descripción del juego"><?php echo isset($descripcion) ? $descripcion : ''; ?></textarea>
<br>
<br>
<input id="precio" type="number" name="precio" placeholder="Por favor ingrese el valor del juego" value="<?php echo isset($precio) ? $precio : ''; ?>">
<input id="descuento" type="number" name="descuento" placeholder="Por favor ingrese el valor del descuento" value="<?php echo isset($descuento) ? $descuento : ''; ?>">
<br>
<br>
<input id="stock" type="number" name="stock" placeholder="Por favor ingrese el stock" value="<?php echo isset($stock) ? $stock : ''; ?>">
<select id="categoria2" name="categoria">
<option value="" disabled selected>Categorías</option>
<?php
             if ($resul2->num_rows > 0) {
                 while ($fila2 = $resul2->fetch_assoc()) {
                     $idCat = $fila2['id_cat'];
                     $nombreCat = $fila2['nom_cat'];
                     $selected = ($idCat == $categoria) ? 'selected' : '';
                     echo "<option value='$idCat' $selected>$nombreCat</option>";
                 }
             }
         ?>
</select>
<br>
    <br>
    <input id="iniciarsesion2" type="submit" name="registrar" value="Registrar Videojuego">
    <input id="iniciarsesion2" type="submit" name="MODIFICAR" value="Modificar">
    <br>
    <br>
    <input id="iniciarsesion2" type="button" value="Limpiar Campos" onclick="limpiarCampos()">
</form>
<script>
    function limpiarCampos() {
        document.getElementById("nombre").value = "";
        document.getElementById("descripcion").value = "";
        document.getElementById("precio").value = "";
        document.getElementById("descuento").value = "";
        document.getElementById("stock").value = "";
        document.getElementById("categoria2").selectedIndex = 0;
    }
</script>
</div>
</body>
</html>