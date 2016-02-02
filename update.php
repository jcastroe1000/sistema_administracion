<?php
include "config.php";
include "header.php";
if(isset($_GET['u'])):
     if(isset($_POST['bts'])):
          $stmt = $mysqli->prepare("UPDATE galeria SET titulo_galeria=?, descripcion_corta=?, descripcion_larga=?,estatus=?, seccion_pertenece=? WHERE id_galeria=?");
          $stmt->bind_param('ssssss', $nombre_galeria, $desc_corta, $desc_larga, $estatus,$sec_pertenece,$id_galeria);

          $nombre_galeria = $_POST['name_galery'];
          $desc_corta     = $_POST['short_desc'];
          $desc_larga     = $_POST['long_desc'];
          $estatus        = $_POST['status'];
          $sec_pertenece  = $_POST['section'];
          $id_galeria     = $_POST['id_galeria'];
          
          if($stmt->execute()):
               echo "<script>location.href='index.php'</script>";
          else:
               echo "<script>alert('".$stmt->error."')</script>";
          endif;
     endif;
     $res = $mysqli->query("SELECT * FROM galeria WHERE id_galeria=".$_GET['u']);
     $row = $res->fetch_assoc();
?>

	  <p><br/></p>
	    <div class="panel panel-default">
	      <div class="panel-body">
	      
		<form role="form" method="post">
		  <input type="hidden" value="<?php echo $row['id_galeria'] ?>" name="id_galeria"/>
		  <div class="form-group">
		    <label for="name_galerys">Nombre de la Galeria</label>
		    <input type="text" class="form-control" name="name_galery" id="nm" value="<?php echo $row['titulo_galeria'] ?>">
		  </div>
                  <div class="form-group">
		    <label for="shor_desc"> Descripción Corta</label>
		    <input type="text" class="form-control" name="short_desc" id="nm" value="<?php echo $row['descripcion_corta'] ?>">
		  </div>
                  <div class="form-group">
		    <label for="long_desc">Descripción Larga</label>
		    <textarea class="form-control" name="long_desc" id="ar" rows="3"><?php echo $row['descripcion_larga'] ?></textarea>
		  </div>
		  <div class="form-group">
		    <label for="status">Estatus</label>
		    <select class="form-control" id="gd" name="status">
		      <option><?php echo $row['estatus'] ?></option>
                      <option value="activo">Activo</option>
                      <option value="inactivo">Inactivo</option>
		    </select>
		  </div>
                  <div class="form-group">
		    <label for="creation_date">Fecha de Creación</label>
                    <input type="date" class="form-control" name="creation_date" id="tl" value="<?php echo $row['fecha_creacion'] ?>">
		  </div>
		  <div class="form-group">
		    <label for="modification_date">Fecha Modificación</label>
                    <input type="date" class="form-control" name="modification_date" id="tl" value="<?php echo $row['fecha_modificacion'] ?>">
		  </div>
                  <div class="form-group">
		    <label for="section">Sección a la que pertence</label>
		    <input type="text" class="form-control" name="section" id="tl" value="<?php echo $row['seccion_pertenece'] ?>">
		  </div>
		  
		  <button type="submit" name="bts" class="btn btn-default">Modificar</button>
		</form>
<?php
endif;
include "footer.php";
?>
