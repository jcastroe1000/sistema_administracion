<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Galerias</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<center>

<div id="header">
 <div id="content">
    <label>CRUD Galerias</label>
    </div>
</div>
<?php
include "config.php";
include "header.php";
?>
<p>
<a href="create.php" class="btn btn-primary btn-md"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Añadir Nueva Categoria</a><br/>
</p>
<table id="ghatable" class="display table table-bordered table-stripe" cellspacing="0" width="100%">
<thead>
     <tr>
          <th>ID</th>
          <th>Nombre de la galeria</th>
          <th>Descripcion Corta</th>
          <th>Descripcion Larga</th>
          <th>Estatus</th>
          <th>Fecha de Creación</th>
          <th>Fecha de Modificación</th>
          <th>Seccion a la que pertenece</th>
     </tr>
</thead>
<tbody>
<?php
$res = $mysqli->query("SELECT * FROM galeria");
while ($row = $res->fetch_assoc()):
?>
     <tr>
          <td><?php echo $row['id'] ?></td>
          <td><?php echo $row['titulo_galeria'] ?></td>
          <td><?php echo $row['descripcion_corta'] ?></td>
          <td><?php echo $row['descripcion_larga'] ?></td>
          <td><?php echo $row['estatus'] ?></td>
          <td><?php echo $row['fecha_creacion'] ?></td>
          <td><?php echo $row['fecha_modificacion'] ?></td>
          <td><?php echo $row['seccion_pertenece'] ?></td>
          <td>
          <a href="update.php?u=<?php echo $row['id'] ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</a>
          <a onclick="return confirm('Estas seguro de eliminar el contenido')" href="delete.php?d=<?php echo $row['id'] ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</a>
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