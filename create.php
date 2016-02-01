<?php
include "config.php";
include "header.php";
?>
<a href="galeria.php" class="btn btn-success btn-md"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Regresar</a>
<?php
if(isset($_POST['bts'])):
  if($_POST['name_galery']!=null && $_POST['short_description']!=null && $_POST['status']!=null  && $_POST['section']!=null){
     $stmt = $mysqli->prepare("INSERT INTO galeria(titulo_galeria,descripcion_corta,descripcion_larga,estatus,seccion_pertenece) VALUES (?,?,?,?,?)");
     $stmt->bind_param('sssss', $name_galery, $short_desc, $long_desc, $status,$section);

     $name_galery = $_POST['name_galery'];
     $short_desc  = $_POST['short_description'];
     $long_desc   = $_POST['long_description'];
     $status      = $_POST['status'];
     $section     = $_POST['section'];

     if($stmt->execute()):
?>
<p></p>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <strong>Éxito!</strong><a href="index.php">Home</a>.
</div>
<?php
     else:
?>
<p></p>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <strong>Error!</strong> <?php echo $stmt->error; ?>
</div>
<?php
     endif;
  } else{
?>
<p></p>
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <strong>Error!</strong>Llena los campos
</div>
<?php
  }
endif;
?>

	    <p><br/></p>
	    <div class="panel panel-default">
	      <div class="panel-body">
	      
		<form role="form" method="post">
		  <div class="form-group">
		    <label for="name_galery">Nombre de la galeria</label>
		    <input type="text" class="form-control" name="name_galery" id="nm" placeholder="Enter Name">
		  </div>
                  <div class="form-group">
		    <label for="short_description">Descripción Corta</label>
		    <input type="text" class="form-control" name="short_description" id="nm" placeholder="Enter Name">
		  </div>  
                  <div class="form-group">
		    <label for="long_description">Descripcion Larga</label>
		    <textarea class="form-control" name="long_description" id="ar" rows="3"></textarea>
		  </div>  
		  <div class="form-group">
		    <label for="estatus">Estatus</label>
		    <select class="form-control" id="gd" name="status">
                        <option value="true">Activa</option>
                        <option value="false">Descativa</option>
		    </select>
		  </div>
		  <div class="form-group">
		    <label for="section">Seccion a la que pertenece</label>
		    <input type="text" class="form-control" name="section" id="">
		  </div>
		  
		  <button type="submit" name="bts" class="btn btn-default">Guardar</button>
		</form>
<?php
include "footer.php";
?>