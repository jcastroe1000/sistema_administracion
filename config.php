<?php
$mysqli = new mysqli("localhost", "root", "", "sistema_administracion");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
}
?>
