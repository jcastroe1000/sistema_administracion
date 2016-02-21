<?php

include "config.php";
header("Content-Type: application/json; charset=UTF-8");
error_reporting(0);

$id = mysql_real_escape_string($_GET["id"]);
$st = mysql_real_escape_string($_GET["st"]);
$sc = mysql_real_escape_string($_GET["sc"]);


//query only by id
if ($id!=null && empty($st) && empty($sc)) {
    echo 'by id';
    echo $st;
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
}   //query only by id and status
    elseif($id!=null && $st!=null && empty ($sc)) {
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
    
    
}   //query with id,status and section
    elseif($id!=null && $st!=null && $sc!=null){
    echo 'los 3';
    $result = $mysqli->query("SELECT id_galery,title_galery,short_description,long_description,creation_date,modification_date, "
            . "status FROM galery WHERE id_galery = '" . $id . "' and status ='" . $st . "' and section= '".$sc."'");
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
}   //query with id and section
    elseif ($id!=null && empty ($st) && $sc!=null) {
    echo 'id y seccion';
    $result = $mysqli->query("SELECT id_galery,title_galery,short_description,long_description,creation_date,modification_date, "
            . "status FROM galery WHERE id_galery ='" . $id . "' and section= '".$sc."'");
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
} //query with status and section
    elseif (empty ($id) && $st!=null && $sc!=null) {
    echo 'section and status';
    $result = $mysqli->query("SELECT id_galery,title_galery,short_description,long_description,creation_date,modification_date, "
            . "status FROM galery WHERE status ='" . $st . "' and section= '".$sc."'");
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $id2=$row['id_galery'];
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
        content_galery.id_galery = '" . $id2 . "'");
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
}//query with section
    elseif (empty ($id) && empty ($st) && $sc!=null) {
    echo 'section';
    $result = $mysqli->query("SELECT id_galery,title_galery,short_description,long_description,creation_date,modification_date, "
            . "status FROM galery WHERE section= '".$sc."'");
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $id2=$row['id_galery'];
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
        content_galery.id_galery = '" . $id2 . "'");
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
}
//query with status
    elseif (empty ($id) && $st!==null && empty ($sc)) {
    
    $result = $mysqli->query("SELECT id_galery,title_galery,short_description,long_description,creation_date,modification_date, "
            . "status FROM galery WHERE status= '".$st."'");
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $id2=$row['id_galery'];
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
        content_galery.id_galery = '" . $id2 . "'");
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
}
    else {

    echo  'no';
}

    


//if () {
//    echo 'las 3';
//} else {
//    

?>
        
