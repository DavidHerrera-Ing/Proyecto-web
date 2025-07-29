<?php
session_start();
if (isset($_POST['correo'])) {
    $_SESSION['correo'] = $_POST['correo'];
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Blizzard Entertainment</title>
    <link rel="stylesheet" href="Paratodos.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="fondo">
        <div class="cabezera">
            <img class="imagenlogo" src="imagenes/logoBlizzard.png" alt="imagenLogo" width="150" height="40">

            <?php
                if (isset($_SESSION['correo'])) {
                    echo '<a href="cerrarsesion.php" id="micuenta"><h3 id="cerrarsession">Cerrar Sesión</h3></a>';
                } else {
                    echo '<a href="login.php"><h3 id="micuenta">Mi cuenta</h3></a>';
                }
            ?>

            
        </div>

        <h1 class="juegos">Juegos</h1>
        <?php
        
        if (isset($_SESSION['correo'])) {
            echo '<h3 style="margin-left:86%;margin-top:-4%;">' . $_SESSION['correo'] . '</h3>';
        }
        
        ?>
        <a href="detalleJuego.php">
            <img  style="margin-left:86%;margin-top:4%;height: 100px; width: 100px;" src="imagenes/cart2.png" alt="error">
        </a>
        <br>
        <br>
        <h2 class="blizzard">Blizzard</h2>

        <div id="contenedor-imagenes" class="imagenes">
            <script>
                function ordenarPorNombre() {
                    var orden = document.getElementById("orden").value;
                    var tipoOrdenamiento = (orden === 'ValorDescuento') ? 'DESC' : 'ASC';
                    window.location.href = "index.php?orden=" + orden + "&tipo=" + tipoOrdenamiento;

                }
            </script>
            <Script>
                function FiltrarCategoria() {
                    var categoria = document.getElementById("categoria").value;
                    window.location.href = "index.php?categoria=" + encodeURIComponent(categoria);
                }


            </Script>

            <br>

            <?php

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "ev4";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Error al conectar con la base de datos: " . $conn->connect_error);
            }

            
            $orden = isset($_GET['orden']) ? $_GET['orden'] : 'nom_jug';
            $tipoOrdenamiento = isset($_GET['tipo']) ? $_GET['tipo'] : 'ASC';
            $categoria = isset($_GET['categoria']) ? $_GET['categoria'] : '';

            if (!empty($categoria)) {
                $sql = "SELECT juego.nom_jug, ROUND(COALESCE(NULLIF(juego.pre_jug - (juego.pre_jug * (juego.dsc_jug) / 100), 0), ''), 0) AS ValorDescuento
                        , categoria.nom_cat,juego.dsc_jug,juego.pre_jug
                        FROM juego 
                        INNER JOIN categoria ON juego.cat_jug = categoria.id_cat 
                        WHERE categoria.nom_cat = '$categoria' 
                        ORDER BY $orden $tipoOrdenamiento";
            } else {
                
                        $sql= "SELECT 
                        juego.nom_jug,
                        ROUND(COALESCE(NULLIF(juego.pre_jug - (juego.pre_jug * (juego.dsc_jug) / 100), 0), ''), 0) AS ValorDescuento,
                        categoria.nom_cat, juego.dsc_jug,juego.pre_jug FROM juego INNER JOIN 
                        categoria ON juego.cat_jug = categoria.id_cat ORDER BY $orden $tipoOrdenamiento";
            }


            $result = $conn->query($sql);

            $sql2 = "SELECT * FROM categoria";
            $resul2 = $conn->query($sql2);

           

            ?>
            <select id="orden" style="width:15.3%;" onchange="ordenarPorNombre()">
                <option value="" disabled selected>ORDENAR POR</option>
                <option value="ValorDescuento">Mayor Precio</option>
                <option value="nom_jug">Ordenar por nombre</option>
                            
            </select>
            <select id="categoria" onchange="FiltrarCategoria()">
            <option value="" disabled selected>Filtrar por Categoría</option>
                <?php
                if ($resul2->num_rows > 0) {
                    while ($fila2 = $resul2->fetch_assoc()) {
                        echo "<option value='".$fila2['nom_cat']."'>".$fila2['nom_cat']."</option>";

                    }
                }
                ?>
            </select>

            <br><br>
            <?php


            if ($result->num_rows > 0) {
                $contador = 0;
                while ($row = $result->fetch_assoc()) {
                ?>
                        <div style="display: inline-block; margin-right:3%;">
                        <a href="Informacionjuego.php?juego=<?= rawurlencode($row['nom_jug']) ?>">
                            <img style="height: 100%; width: 100%; object-fit: cover;" src="imagenes/imagenes-inicio/<?= rawurlencode($row['nom_jug']) ?>.PNG" alt="error">
                        </a>
                        <div>
                            <?php
                            $descuentoinicial = $row['dsc_jug'];
                            $nombre = $row['nom_jug'];
                            $precio = $row['ValorDescuento'];
                            $categoria = $row['nom_cat'];
                            $valor = $row['pre_jug'];
                            echo "<p>".$nombre."</p>";
                            echo "<p>-".$descuentoinicial.'%'.' '.' '.'$'.$precio."</p>";
                            echo "<p>CATEGORÍA: ".$categoria."</p>";
                            echo "<p class='valor1'>$".$valor."</p>";
                            ?>
                        
                        </div>
                    </div>
        <?php 
            }
        }
        ?>
    </div>
</div>
</body>
</html>
