<?php
if (isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['precio']) && isset($_POST['descuento']) && isset($_POST['stock']) && isset($_POST['categoria'])) {
    
    $nombre = $_POST['nom_jug'];
    $descripcion = $_POST['des_jug'];
    $precio = $_POST['pre_jug'];
    $descuento = $_POST['dsc_jug'];
    $stock = $_POST['stk_jug'];
    $categoria = $_POST['cat_jug'];


    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ev4";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error en la conexión a la base de datos: " . $conn->connect_error);
    }

    $sql = "INSERT INTO juegos (nom_jug,des_jug,pre_jug,dsc_jug,stk_jug,cat_jug)
    VALUES ($nombre,$descripcion,$precio,$descuento,$stock,$categoria);";
    $agregar = $conn->query($sql);
}



?>