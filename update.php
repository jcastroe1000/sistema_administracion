<?php
include "config.php";
include "header.php";
if(isset($_GET['u'])):
     if(isset($_POST['bts'])):
          $stmt = $mysqli->prepare("UPDATE galeria SET name=?, gender=?, telp=?, address=? WHERE id_personal=?");
          $stmt->bind_param('sssss', $nm, $gd, $tl, $ar, $id);

          $nm = $_POST['nm'];
          $gd = $_POST['gd'];
          $tl = $_POST['tl'];
          $ar = $_POST['ar'];
          $id = $_POST['id'];

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
		  <input type="hidden" value="<?php echo $row['id_galeria'] ?>" name="id"/>
		  <div class="form-group">
		    <label for="nm">Nombre de la Galeria</label>
		    <input type="text" class="form-control" name="nm" id="nm" value="<?php echo $row['titulo_galeria'] ?>">
		  </div>
                  <div class="form-group">
		    <label for="nm"> Descripción Corta</label>
		    <input type="text" class="form-control" name="nm" id="nm" value="<?php echo $row['descripcion_corta'] ?>">
		  </div>
                  <div class="form-group">
		    <label for="ar">Descripción Larga</label>
		    <textarea class="form-control" name="ar" id="ar" rows="3"><?php echo $row['descripcion_larga'] ?></textarea>
		  </div>
		  <div class="form-group">
		    <label for="gd">Estatus</label>
		    <select class="form-control" id="gd" name="gd">
		      <option><?php echo $row['estatus'] ?></option>
		      <option>Male</option>
		      <option>Female</option>
		    </select>
		  </div>
                  <div class="form-group">
		    <label for="ar">Fecha de Creación</label>
		    <input type="tel" class="form-control" name="tl" id="tl" value="<?php echo $row['fecha_creacion'] ?>">
		  </div>
		  <div class="form-group">
		    <label for="tl">Fecha Modificación</label>
		    <input type="tel" class="form-control" name="tl" id="tl" value="<?php echo $row['fecha_modificacion'] ?>">
		  </div>
                  <div class="form-group">
		    <label for="tl">Sección a la que pertence</label>
		    <input type="tel" class="form-control" name="tl" id="tl" value="<?php echo $row['seccion_pertenece'] ?>">
		  </div>
		  
		  <button type="submit" name="bts" class="btn btn-default">Modificar</button>
		</form>
<?php
endif;
include "footer.php";
?>
