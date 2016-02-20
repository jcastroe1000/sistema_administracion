<?php
     include "config.php";
     error_reporting(E_ALL);
     $id_image=1;
     $idgalery=$_POST['galery'];
     $idcontent=$_POST['id_content'];
     if ($idgalery){
        foreach ($idgalery as $g){
            mysqli_query($mysqli,"INSERT INTO content_galery (id_content,id_galery) 
                VALUES ('".$idcontent."',".mysqli_real_escape_string($mysqli,$g).")");
            }
            $mysqli->close(); 
        header('Location: Galery_Photos.php');
        }
?>