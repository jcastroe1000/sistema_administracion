  <?php
     include "config.php";
     error_reporting(E_ALL);
     $id_image=1;
    // $galery =$_POST['galery'];
     $gal=$_POST['galery'];
    
     
     if ($gal){
       foreach ($gal as $g){
            mysqli_query($mysqli,"INSERT INTO content_galery (id_content,id_galery) 
                  VALUES ('".$id_image."',".mysqli_real_escape_string($mysqli,$g).")");
      }
      header('Location: Galery_Photos.php');
    }
    
    ?>