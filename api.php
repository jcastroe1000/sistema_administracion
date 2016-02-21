<?php

include "config.php";
header("Content-Type: application/json; charset=UTF-8");
error_reporting(0);

$id = mysql_real_escape_string($_GET["id"]);
$st = mysql_real_escape_string($_GET["st"]);
$sc = mysql_real_escape_string($_GET["sc"]);


//search only by id
if ($id!=null && $st==null) {
    echo 'by id';
    $result = $mysqli->query("SELECT id_galery,title_galery,short_description,long_description,creation_date,modification_date, "
            . "status FROM galery WHERE id_galery = '" . $id . "'");
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $sh = mysql_real_escape_string();
        $response ['galery'] = array(
            'id_gallery' => $row['id_galery'],
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
        content_galery.id_galery = '" . $id . "'");
    while ($row = $result2->fetch_array(MYSQLI_ASSOC)) {
        $sh_des_im = mysql_real_escape_string($row['short_description']);
        $partialImage = array(
            'path' => 'php/album/' . $row['route'],
            'title' => $row ['title'],
            'short_description' => $sh_des_im,
            'long_description' => $row['long_description'],
        );
        array_push($response['galery'], $partialImage);
    }
    $json2 = json_encode($response['galery']);
    echo $json2;
} elseif($id!=null && $st!=null) {
    echo 'by id and status';
    $result = $mysqli->query("SELECT id_galery,title_galery,short_description,long_description,creation_date,modification_date, "
            . "status FROM galery WHERE id_galery = '" . $id . "' and status ='" . $st . "'");
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $sh = mysql_real_escape_string();
        $response ['galery'] = array(
            'id_gallery' => $row['id_galery'],
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
        content_galery.id_galery = '" . $id . "'");
    while ($row = $result2->fetch_array(MYSQLI_ASSOC)) {
        $sh_des_im = mysql_real_escape_string($row['short_description']);
        $partialImage = array(
            'path' => 'php/album/' . $row['route'],
            'title' => $row ['title'],
            'short_description' => $sh_des_im,
            'long_description' => $row['long_description'],
        );
        array_push($response['galery'], $partialImage);
    }
    $json2 = json_encode($response['galery']);
    echo $json2;
}  else {
    echo  'no';
}

    


//if (!isset($id) || !isset($st)) {
//    
//} else {
//    $result = $mysqli->query("SELECT id_galery,title_galery,short_description,long_description,creation_date,modification_date, "
//            . "status FROM galery WHERE id_galery = '" . $id . "' and status ='" . $st . "'");
//    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
//        $sh = mysql_real_escape_string();
//        $response ['galery'] = array(
//            'id_gallery' => $row['id_galery'],
//            'title' => $row['title_galery'],
//            'short_description' => $row['short_description'],
//            'long_description' => $row['long_description'],
//            'status' => $row['status'],
//            'creation_date' => $row['creation_date'],
//            'modification_date' => $row['modification_date'],
//        );
//    }
//
//    $result2 = $mysqli2->query("SELECT route,title,short_description,long_description from 
//        content left join content_galery on content.id_content = content_galery.id_content where 
//        content_galery.id_galery = '" . $id . "'");
//    while ($row = $result2->fetch_array(MYSQLI_ASSOC)) {
//        $sh_des_im = mysql_real_escape_string($row['short_description']);
//        $partialImage = array(
//            'path' => 'php/album/' . $row['route'],
//            'title' => $row ['title'],
//            'short_description' => $sh_des_im,
//            'long_description' => $row['long_description'],
//        );
//        array_push($response['galery'], $partialImage);
//    }
//    $json2 = json_encode($response['galery']);
//    echo $json2;
//}





//    if($response!=null){
//        $json2 = json_encode($response['galery']);
//        echo $json2;
//    }  else {
//        echo 'no se encontraron resultados';
//    }
//    
//    
?>
        
