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
            echo "<script>location.href='galeria_subir_archivos.php'</script>";
        else:
            echo "<script>alert('" . $stmt->error . "')</script>";
        endif;
    endif;
    $res = $mysqli->query("SELECT * FROM content WHERE id_content=" . $_GET['u']);
    $row = $res->fetch_assoc();
    ?>

    <p><br/></p>
    <div class="panel panel-default">
        <div class="panel-body">

            <form  id="subida">
                <input type="hidden" value="<?php echo $row['id_content'] ?>" name="id_content"/>
                <div class="form-group">
                    <label for="nm">Nombre de la Galeria</label>
                    <input type="text" class="form-control" name="title" id="title" value="<?php echo $row['title'] ?>">
                </div>
                <div class="form-group">
                    <label for="name_galery">Imagen</label>
                    <input type="file" id="sust_foto" name="sust_foto"/> 
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
                    <select class="form-control" id="st" name="st">
                        <option><?php echo $row['status'] ?></option>
                        <option>Activo</option>
                        <option>Inactivo</option>
                    </select>
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
        endif;
        include "footer.php";
        ?>