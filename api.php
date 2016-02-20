<?php
    include "config.php";
    header("Content-Type: application/json; charset=UTF-8");
    $result = $mysqli->query("SELECT id_galery,title_galery,short_description,long_description,creation_date,modification_date, "
            . "status FROM galery WHERE id_galery = 17");
    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $response ['galery'] = array(
        //'id_gallery' => $row['id_galery'],
        'title' => $row['title_galery'],
        'short_description' => $row['short_description'],
        'long_description' => $row['long_description'],
        'status' => $row['status'],
        'creation_date' => $row['creation_date'],
        'modification_date' => $row['modification_date'],
        );  
    }
    $result2 = $mysqli2->query("SELECT route,title,short_description,long_description from 
        content left join content_galery on content.id_content = content_galery.id_content where 
        content_galery.id_galery = 17");
    while($row = $result2->fetch_array(MYSQLI_ASSOC)) {
      $partialImage = array(
          
          'path' => $row['route'],
          'short_description' => $row['short_description'],
          'long_description' => $row['long_description'],
          
        );
    array_push($response['galery'], $partialImage);

    }
    $json2 = json_encode($response['galery']);
    echo $json2;
//    $json2 = json_encode($response);
//    echo $json2;



    
    ?>
        
        