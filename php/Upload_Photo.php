<?php
    include "../config.php";
    error_reporting(E_ALL);
    $title = $_GET['title'];
    $sd = $_GET['desc_short'];
    $ld = $_GET['desc_long'];
    $st = $_GET['status'];
    $cd = $_GET['creation_date'];
    $foto = trim($_FILES['foto']['name']);
    $ingresar = mysqli_query($mysqli, "INSERT INTO content (title,route, short_description,long_description,status,creation_date)"
                             . "VALUES('$title','$foto','$sd','$ld','$st','$cd')");
    move_uploaded_file($_FILES['foto']['tmp_name'], 'album/' . $foto);
    $mysqli->close(); //cerramos la conexió
?>