
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Galeria de fotos</title>
        <link href="css/estilo.css" rel="stylesheet">
        <script src="../js/jquery.js"></script>
        <script src="../js/myjava.js"></script>
    </head>
    <body>
        <fieldset><legend>Album de Fotos Publicadas</legend>
            <ul class="fotos" id="fotos">
                <?php
                    include "config.php";
                    session_start();
                    if (!isset($_SESSION['user_name'])) {
                        header("Location: index.php");
                    }
                    $query = "SELECT * FROM content";
                    $comprobar = mysqli_query($mysqli, $query)or die(mysqli_error());
                    $num_row = mysqli_num_rows($comprobar);
                    if ($num_row >= 1) {
                        $fotos = mysqli_query($mysqli, "SELECT * FROM content ORDER BY id_content ASC");
                        $mysqli->close(); //cerramos la conexió
                        while ($fotos2 = mysqli_fetch_array($fotos)) {
                        echo '<li><a href="php/album/' . $fotos2['route'] . '" target="_blank"><img src="php/album/' . $fotos2['route'] . '" class="img-subida" title="' . $fotos2['short_description'] . '"></a></li>';
                        }
                    }
                ?>
            </ul>
        </fieldset>
    </body>
</html>
