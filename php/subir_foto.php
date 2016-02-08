<?php
error_reporting(E_ALL);

$mysqli = mysqli_connect('localhost', 'root', '', 'sistema_administracion');
$title=$_GET['title'];
$sd=$_GET['desc_short'];
$ld=$_GET['desc_long'];
$st=$_GET['status'];
$cd=$_GET['creation_date'];
$descripcion = $_GET['desc'];

$foto = trim($_FILES['foto']['name']);

$ingresar = mysqli_query($mysqli, "INSERT INTO content (title,route, short_description,long_description,status,creation_date)VALUES('$title','$foto','$sd','$ld','$st','$cd')");

move_uploaded_file($_FILES['foto']['tmp_name'], 'album/' . $foto);

//$subida = mysqli_query($mysqli, "SELECT * FROM personales ORDER BY id_foto DESC LIMIT 1");
//
//while ($subida2 = mysqli_fetch_array($subida)) {
//
//    echo '<li><a href="php/album/' . $subida2['ruta_foto'] . '" target="_blank"><img src="php/album/' . $subida2['ruta_foto'] . '" class="img-subida" title="' . $subida2['desc_foto'] . '"></a><li>';
//}
?>