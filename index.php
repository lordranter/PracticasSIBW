<!DOCTYPE html>
<html>
<head>
<header>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="index_css.css" />
<link rel="shortcut icon" href="Imagenes/favicon.ico" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>


<?php
require 'core/init.php';
include 'controller.php';

session_start();


if(isset($_GET["secc"])){
	$section = $_GET["secc"];
}else{
	$section = "";
}
if(isset($_GET["fechaIn"]))
{
	$fechaIn = $_GET["fechaIn"];
	$_SESSION["fechaIn"] = $fechaIn;
	
}
if(isset($_GET["fechaOut"]))
{
	$fechaIn = $_GET["fechaOut"];
	$_SESSION["fechaOut"] = $fechaOut;
	
}
$controller = new Controller($section);
$controller->createTitle();
?>

</header>
</head>

<body>
			
<?php
$controller->openMainContainer();
$controller->createHeader();
$controller->createSidebar();
$controller->createContent();
$controller->createFooter();
$controller->closeMainContainer();
?>

</body>
</html> 