<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Galerias</title>
        <link rel="stylesheet" href="style.css" type="text/css" />
        <link rel="stylesheet" href="css/estilo.css" type="text/css" />
    </head>
    <body>
        <div id="header">
            <div id="content">
                <label>CRUD Archivoss</label>
            </div>
        </div>
            <?php
                include "config.php";
                include "header.php";
                session_start();
                    if (!isset($_SESSION['user_name'])) {
                        header("Location: index.php");
                    }
            ?>
            <p>
                <a href="Create_File.php" class="btn btn-primary btn-md"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Añadir Nuevo Archivo</a><br/>
            </p>
            <table id="ghatable" class="display table table-bordered table-stripe" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titulo</th>
                        <th>Imagen</th>
                        <th>Descripcion Corta</th>
                        <th>Descripcion Larga</th>
                        <th>Estatus</th>
                        <th>Fecha de Creación</th>
                        <th>Fecha de Modificación</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $res = $mysqli->query("SELECT * FROM content");
                        $mysqli->close();
                        while ($row = $res->fetch_assoc()):
                    ?>
                        <tr>
                            <td><?php echo $row['id_content'] ?></td>
                            <td><?php echo $row['title'] ?></td>
                            <td><?php echo '<img src="php/album/' . $row['route'] . '" class="img-subida" >' ?></img></td>
                            <td><?php echo $row['short_description'] ?></td>
                            <td><?php echo $row['long_description'] ?></td>
                            <td>
                                <?php 
                                        if ($row['status']=='true'){
                                            echo 'acitvo';
                                        }elseif($row['status']=='false') {
                                            echo 'inactivo';
                                        }    
                                    
                                        
                                ?>
                            </td>
                            <td><?php echo $row['creation_date'] ?></td>
                            <td><?php echo $row['modification_date'] ?></td>
                            <td>
                                <a class="btn btn-lg btn-success" href="Update_Photo.php?u=<?php echo $row['id_content'] ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</a>
                            </td>
                            <td>
                                <a class="btn btn-lg btn-danger" data-toggle="modal" data-target="#basicModal" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Borrar</a>
                            </td>
                            
                        </tr>
                    <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Atención</h4>
                                </div>
                                <div class="modal-body">
                                    <h3>¿Estas seguro de eliminar el contenido?</h3>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrrar</button>
                                    <a href="Delete_Photo.php?d=<?php echo $row['id_content'] ?>"><button type="button" class="btn btn-primary">Aceptar</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
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