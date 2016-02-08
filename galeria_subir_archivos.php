<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Galerias</title>
<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" href="css/estilo.css" type="text/css" />
</head>
<body>
<center>

<div id="header">
 <div id="content">
    <label>CRUD Archivoss</label>
    </div>
</div>
<?php
include "config.php";
include "header.php";
?>
<p>
    <a href="create_file.php" class="btn btn-primary btn-md"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Añadir Nuevo Archivo</a><br/>
</p>
<table id="ghatable" class="display table table-bordered table-stripe" cellspacing="0" width="100%">
<thead>
     <tr>
          <th>ID</th>
          <th>Titulo</th>
          <th>Descripcion Corta</th>
          <th>Descripcion Larga</th>
          <th>Estatus</th>
          <th>Fecha de Creación</th>
          <th>Fecha de Modificación</th>
          <th>Galeria pertenece</th>
     </tr>
</thead>
<tbody>
<?php
$res = $mysqli->query("SELECT * FROM content");
while ($row = $res->fetch_assoc()):
?>
     <tr>
          <td><?php echo $row['id_content'] ?></td>
          <td><?php echo $row['title'] ?></td>
          <td><?php echo '<img src="php/album/' . $row['route'] . '" class="img-subida" >'?></img></td>
          <td><?php echo $row['short_description'] ?></td>
          <td><?php echo $row['long_description'] ?></td>
          <td><?php echo $row['status'] ?></td>
          <td><?php echo $row['creation_date'] ?></td>
          <td><?php echo $row['modification_date'] ?></td>
          
          <td>
          <a href="update_file.php?u=<?php echo $row['id_content'] ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</a>
          </td>
          <td>
              <a onclick="return confirm('Estas seguro de eliminar el contenido')" href="delete_file.php?d=<?php echo $row['id_content'] ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Borrar</a>
          </td>
     </tr>
<?php
endwhile;
?>
</tbody>
</table>	    
<?php
include "footer.php";
?>
</body>
</html>    