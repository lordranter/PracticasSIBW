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
if($section=="test"){
	include 'clientController.php';
	include 'reservationController.php';

	$reservationController = new ReservationController();
	$clients = new ClientController();

	$testSearch = $reservationController->getReservationByClientID(1);
	if ($testSearch->num_rows > 0) {
		while($row = $testSearch->fetch_assoc()) {
			echo $row["id"] . "\n";
		}
	}

	$testSearch = $reservationController->getReservationByPromotionID(0);
	if ($testSearch->num_rows > 0) {
		while($row = $testSearch->fetch_assoc()) {
			echo $row["id"] . "\n";
		}
	}

	$testSearch = $clients->getClientByMatchingPattern("7654");
	if ($testSearch->num_rows > 0) {
		while($row = $testSearch->fetch_assoc()) {
			echo $row["name"] . "\n";
		}
	}

	$testSearch = $clients->getClientByMatchingPattern("s");
	if ($testSearch->num_rows > 0) {
		while($row = $testSearch->fetch_assoc()) {
			echo $row["name"] . "\n";
		}
	}

	$testSearch = $clients->getClientByMatchingPattern("5");
	if ($testSearch->num_rows > 0) {
		while($row = $testSearch->fetch_assoc()) {
			echo $row["name"] . "\n";
		}
	}

	$testSearch = $clients->getClientByID("1");
	echo $testSearch["name"] . "\n";

	//$clients->updateClient(2, "aasdadacxzsd", "qwe", "asddqw", "adsxcz", "12311231221", "132123");
	//$clients->deleteClient(2);

	$testSearch = $clients->getClientByExactMatch("aasdadacxzsd", "qwe", "asddqw", "adsxcz", "12311231221", "132123");
	if ($testSearch->num_rows > 0) {
		while($row = $testSearch->fetch_assoc()) {
			echo $row["name"] . "\n";
		}
	}
}else{
	$controller = new Controller($section);
	$controller->createTitle();
	?>

	</header>
	</head>

	<body>
				
	<?php
	if($section!="admin")
	{
		$controller->openMainContainer();
		$controller->createHeader();
		$controller->createSidebar();
		$controller->createContent();
		$controller->createFooter();
		$controller->closeMainContainer();
	}else{
		$controller->openMainContainer();
		$controller->createContent();
		$controller->closeMainContainer();
	}
	?>

	</body>
<?php
}
?>
</html> 
