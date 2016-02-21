<?php
    include "config.php";
    include "header.php";
    session_start();
    if (!isset($_SESSION['user_name'])) {
        header("Location: index.php");
    }

    if (isset($_GET['u'])):
        $id = $_GET['u'];
        if (isset($_POST['bts'])):
        $stmt = $mysqli->prepare("UPDATE content SET title=?,short_description=?, long_description=?, status=?,modification_date=? WHERE id_content=?");
        $stmt->bind_param('ssssss', $title, $short_d, $long_d, $status_photo, $m_date_photo, $id_content);
        $title = $_POST['title'];
        $short_d = $_POST['sd'];
        $long_d = $_POST['ld'];
        $status_photo = $_POST['st'];
        $m_date_photo = $_POST['md'];
        $id_content = $_POST['id_content'];
        if ($stmt->execute()):
            echo "<script>location.href='Galery_Photos.php'</script>";
        else:
            echo "<script>alert('" . $stmt->error . "')</script>";
        endif;
    endif;
        $res = $mysqli->query("SELECT * FROM content WHERE id_content=" . $_GET['u']);
        $row = $res->fetch_assoc();
        $mysqli->close();
    endif;
?>

    <p><br/></p>
    <a href="Galery_Photos.php" class="btn btn-success btn-md"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Regresar</a>
    <div class="panel panel-default">
        <div class="panel-body">
            <form  role="form" method="post">
                <input type="hidden" value="<?php echo $row['id_content'] ?>" name="id_content"/>
                <div class="form-group">
                    <label for="nm">Nombre de la Galeria</label>
                    <input type="text" class="form-control" name="title" id="title" value="<?php echo $row['title'] ?>">
                </div>
                
                <div class="form-group">
                    <label for="tl">Descripcion Corta</label>
                    <input type="tel" class="form-control" name="sd" id="sd" value="<?php echo $row['short_description'] ?>">
                </div>
                <div class="form-group">
                    <label for="ar">Descripcion Larga</label>
                    <textarea class="form-control" name="ld" id="ar" rows="3" id="lg"><?php echo $row['long_description'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="gd">Estatus de la galeria</label>
                        <?php if ($row['status'] == 'true') { ?>
                            <select class="form-control" id="st" name="st">
                                <option value="true"><?php echo 'activo' ?></option>
                                <option value="false">Inactivo</option>
                            </select>
                        <?php } else {?>
                        <select class="form-control" id="st" name="st">
                            <option value="false"><?php echo 'inactivo' ?></option>
                            <option value="true">activo</option>
                        </select>
                         <?php } ?>
                </div>
                <div class="form-group">
                    <label for="ar">Fecha de Creacion</label>
                    <input type="text" class="form-control" name="cd" id="tl" value="<?php echo $row['creation_date'] ?>" disabled="">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" name="md" id="tl" value="<?php echo date("Y/m/d") ?>">
                </div>
                <button type="submit" name="bts" class="btn btn-default">Guardar Cambios</button>
            </form>
        </div>
    </div>
<?php
    include "footer.php";
?>