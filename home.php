<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
	header("Location: index.php");
}
$res=mysqli_query("SELECT * FROM usuarios WHERE id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - <?php echo $userRow['user_email']; ?></title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<div id="header">
	<div id="left">
    <label>Coding Cage</label>
    </div>
    <div id="right">
    	<div id="content">
        	hi' <?php echo $userRow['nombre']; ?>&nbsp;<a href="logout.php?logout">Sign Out</a>
        </div>
    </div>
</div>

<div id="body">
	
    <p>Bienvenido</p>
</div>

</body>
</html>