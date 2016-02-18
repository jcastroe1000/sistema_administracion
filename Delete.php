<?php
include "config.php";
    if (isset($_GET['d'])):
        $stmt = $mysqli->prepare("DELETE FROM galery WHERE id_galery=?");
        $stmt->bind_param('s', $id);
        $id = $_GET['d'];
        if ($stmt->execute()):
            $mysqli->close();
            echo "<script>location.href='Galery.php'</script>";
        else:
            echo "<script>alert('" . $stmt->error . "')</script>";
        endif;
    endif;
?>
