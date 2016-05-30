<!DOCTYPE html>
<html>
<head>
<header>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="index_css.css" />
<link rel="shortcut icon" href="Imagenes/favicon.ico" />
<script type="text/javascript" src="/scripts/pickDate.js"></script>


<?php
require 'core/init.php';
include 'controller.php';


if(isset($_GET["secc"])){
	$section = $_GET["secc"];
}else{
	$section = "";
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