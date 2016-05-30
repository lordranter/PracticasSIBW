<!DOCTYPE html>
<html>
<head>
<header>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="index_css.css" />
<link rel="shortcut icon" href="Imagenes/favicon.ico" />


<?php
require 'core/init.php';
include 'controller.php';


if(isset($_GET["secc"])){
	$section = $_GET["secc"];
}else{
	$section = "";
}
if($section=="testReservations"){
	include 'reservationController.php';

	$reservationController = new ReservationController() ;
	$test1 = $reservationController->escogerFecha("2016-05-01" , "2016-05-03");
	$test2 = $reservationController->escogerFecha("2016-05-05" , "2016-05-06");
	$test3 = $reservationController->escogerFecha("2016-05-02" , "2016-05-06");
	$test4 = $reservationController->escogerFecha("2016-04-29" , "2016-05-22");
	$test4 = $reservationController->escogerFecha("2016-01-29" , "2016-03-22");
	$reservationController->payReservation(1);
}else{
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
<?php
}
?>
</html> 
