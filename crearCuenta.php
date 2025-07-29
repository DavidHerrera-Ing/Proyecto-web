

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear cuenta</title>
    <link rel ="stylesheet" href="Paratodos.css">
    <link rel="stylesheet" href="style-crearcuenta.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <?php
        require "IngresarDatos.php";
    ?>
    <div class="fondo">
        <div class="mover">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <p>Comienza tu aventura con una cuenta Blizzard</p>
                <div class="color">

                    <select style="width: 550px;" name="nacionalidad">
                        <?php
                            if ($pais->num_rows > 0) {
                                while ($fila2 = $pais->fetch_assoc()) {
                                    $id = $fila2['id_pas'];
                                    $nombre = $fila2['nom_pas'];
                                    echo "<option value='$id'>$nombre</option>";
                                }
                            }
                        ?>
                    </select>

                    <br>
                    <br>
                    <input style="width: 265px;" type="text" id="nombre" name="nombre" placeholder="Nombre" required>
                    <input style="width: 265px;" type="text" id="apellido" name="apellido" placeholder="Apellido" required>
                    <br>
                    <br>
                    <input style="width: 175px;" type="number" id="diNa" name="dia" placeholder="Día de nacimiento" min= 1 max= 31  required>               
                    <select style="width:175px ;" id = "mes" name="mes" onchange="updateMax()">
                        <option  value="enero">Enero</option>
                        <option id= "Febrero" value="febrero">Febrero</option>
                        <option value="marzo">Marzo</option>
                        <option value="abril">Abril</option>
                        <option value="mayo">Mayo</option>
                        <option value="junio">Junio</option>
                        <option value="julio">Julio</option>
                        <option value="agosto">Agosto</option>
                        <option value="septiembre">Septiembre</option>
                        <option value="octubre">Octubre</option>
                        <option value="noviembre">Noviembre</option>
                        <option value="diciembre">Diciembre</option>
                    </select>
                    

                    <input style="width: 175px;" type="number" id="año" name="año" placeholder="A&ntilde;o" min= 1999 max= 2023 required>
                    <br>
                    <br>

                    <input style="width: 541px;" type="email" name="correo" id="correo" placeholder="Dirección de correo electrónico" required>
                    <br>
                    <br>
                    <input style="width: 541px;" type="password" id="Contraseña" name="contraseña" placeholder="Contrase&ntilde;a" required >
                    <br>
                    <br>
                    <select style="width: 548px;" name="pregunta_secreta">
                        <?php
                            if ($pregunta->num_rows > 0) {
                                while ($fila2 = $pregunta->fetch_assoc()) {
                                    $id = $fila2['id_pre'];
                                    $nombre = $fila2['val_pre'];
                                    echo "<option value='$id'>$nombre</option>";
                                }
                            }
                        ?>
                    </select>
                    <br>
                    <br>

                    <input style="width: 541px;" type="text" id="respuesta" name="respuesta_secreta" placeholder="Respuesta secreta" required >
                    <br>
                    <br>
                    <input type="checkbox" id="checkbox" required>
                    <label  for="checkbox">Recibir noticias y ofertas especiales de Blizzard Entertainment por email.</label>
                    
                    <p style="margin-bottom: -1%;" id="noticia">Noticias cuidadosamente seleccionados y ofertas especiales de productos y </p>
                    <p>servicios de Blizzard por email.</p>
                
                    
                </div>

                <input type="submit" id="Crear" value="Crear una cuenta gratuita">
                
            </form>
            <br>

            <form action="login.php" method="post">

                <input  type="submit" id="existente"  value="¿Ya tienes una cuenta?">

            </form>
        </div>
    </div>
    <script>
        //me verifica lo que selecione en el select de mes , si elijo por ejemplo podre ingresar solo 28 
        function updateMax() {
            var monthSelect = document.getElementById("mes");
            var dayInput = document.getElementById("diNa");
            
            var month = monthSelect.value.toLowerCase();
            var maxDay = 31;
            
            if (month === "febrero") {
                maxDay = 28;
            } else if (month === "abril" || month === "junio" || month === "septiembre" || month === "noviembre") {
                maxDay = 30;
            }
            
            dayInput.setAttribute("max", maxDay);
        }
    </script>
</body>
</html>