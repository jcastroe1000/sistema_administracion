<?php

$host="localhost";
$user="root";
$password="";
$dbname="sistema_administracion";

$con=  mysqli_connect($host, $user, $password, $dbname);

if (mysqli_connect_errno())
{
    echo "Error al conectarse a Mysql". mysqli_error();
}