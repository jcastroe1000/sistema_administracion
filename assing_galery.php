<?php
    error_reporting(E_ALL);
        include "config.php";
            include "header.php";
            session_start();
            if (!isset($_SESSION['user_name'])) {
    
             header("Location: index.php");
    
}
    $mysqli = mysqli_connect('localhost', 'root', '', 'sistem_galery');
    $res = $mysqli->query("SELECT * FROM content WHERE id_content=" . $_GET['u']);
    $row = $res->fetch_assoc();
    $mysqli->close();
?>

<p><br/></p>
<div class="panel panel-default">
    <div class="panel-body">
        <form  action="Save_assing.php" method="post">
            <input type="hidden" value="<?php echo $row['id_content'] ?>" name="id_content"/>
            <div  style="height: "  >
            <?php echo '<img src="php/album/' . $row['route'] . '" class="img-subida" style="width:auto;height:auto">' ?>
            </div>    
            <br>
            <h4>Galerias Disponibles</h4>
            <select name="galery[]" multiple="multiple">
            <?php
                $mysqli2 = mysqli_connect('localhost', 'root', '', 'sistem_galery');
                $condition=activo;
                
                $sql = "SELECT * from galery WHERE status='".$condition."'";
                $result = $mysqli2->query($sql); //usamos la conexion para dar un resultado a la variable
                if ($result->num_rows > 0) { //si la variable tiene al menos 1 fila entonces seguimos con el codigo
                    $combobit = "";
                    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                    $combobit .=" <option value='" . $row['id_galery'] . "'>" . $row['title_galery'] . "</option>"; //concatenamos el los options para luego ser insertado en el HTML
                    }
                } else {
                    echo "No hubo resultados";
                       }
                    $mysqli2->close(); //cerramos la conexión
                    echo $combobit;
            ?>
            </select>
            <br>
            <button type="submit" name="bts" class="btn btn-default">Asignar Galeria (s)</button>
        </form>
    </div>
</div>
<?php
include "footer.php";
?>