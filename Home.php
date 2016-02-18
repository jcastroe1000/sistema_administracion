<?php
    include "config.php";
    error_reporting(E_ALL);
    session_start();
    if (!isset($_SESSION['user_name'])) {
        header("Location: index.php");
    }       
    $mail = $_SESSION['user_name'];
    $query2 = "SELECT nombre FROM Users WHERE user='$mail'";
    $res = mysqli_query($mysqli, $query2);
    $mysqli->close(); //cerramos la conexió
    $num_row = mysqli_num_rows($res);
    $row = mysqli_fetch_array($res);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Bienvenido</title>
        <link rel="stylesheet" href="style.css" type="text/css" />
    </head>
    <body>
        <div id="header">
            <div id="left">
                <label>Sistema administrador de imagenes</label>
            </div>
            <div id="right">
                <div id="content">
                    hola <?php echo $row['nombre']; ?>&nbsp;<a href="logout.php?logout">Cerrar Sesión</a>
                </div>
            </div>
        </div>
        <div id="body">
            <p>Aqui podras subir todas la imagenes para que puedas visualizar en una galeria</p>
            <br/>
        </div>
        <a href="Galery.php"><p style="text-align: center">Galerias</p></a>
        <br></br>
        <a href="Galery_Photos.php"><p style="text-align: center">Imagenes</p></a>
        <br></br>
        <a href="Photos_Published.php"><p style="text-align: center">Fotos Publicadas</p></a>
    </body>
</html>