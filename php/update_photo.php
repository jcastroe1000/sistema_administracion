<?php
error_reporting(E_ALL);

$mysqli = mysqli_connect('localhost', 'root', '', 'sistem_galery');
$tl = $_GET['title'];
$sd = $_GET['sd'];
$ld = $_GET['lg'];
$st = $_GET['st'];
$md = $_GET['md'];
$id_cont = $_GET['id_content'];

$sust_foto = trim($_FILES['sust_foto']['name']);

$stmt = $mysqli->prepare("UPDATE content SET title=?,route=?,short_description=?, long_description=?, status=?,modification_date=? WHERE id_content=?");
$stmt->bind_param('sssssss', $tl, $sust_foto, $sd, $ld, $st, $md, $id_cont);


move_uploaded_file($_FILES['sust_foto']['tmp_name'], 'album/' . $sust_foto);
?>