<?php
class ControllerContent{
	public $NumHabit;
	public $resquestRooms;
	
	function ControllerContent(){
			include 'imageData.php';
			$requestRooms = false;
	}
	
	
	
	function createContent($section){		
		if($section=="valoraciones"){
			include 'viewContentValoraciones.php';
			include 'modelContentValoraciones.php';
			$modelContentValoraciones = new ModelContentValoraciones();
			$viewContentValoraciones = new ViewContentValoraciones();
			$viewContentValoraciones->createContentValoraciones($modelContentValoraciones->getContentValoraciones());
		}elseif($section=="imagenes"){
			include 'viewContentImagenes.php';
			include 'modelContentImagenes.php';
			$modelContentImagenes = new ModelContentImagenes();
			$viewContentImagenes = new ViewContentImagenes();
			$viewContentImagenes->createContentImagenes($modelContentImagenes->getContentImagenes());
		}elseif($section=="promociones"){
			include 'viewContentPromociones.php';
			include 'modelContentPromociones.php';
			$modelContentPromociones = new ModelContentPromociones();
			$viewContentPromociones = new ViewContentPromociones();
			$viewContentPromociones->createContentPromociones($modelContentPromociones->getContentPromociones());
		}elseif($section=="reserva"){
			include 'viewContentReservation.php';
			include 'modelContentReservation.php';
			
			$modelContentReservation = new modelContentReservation();
			$viewContentReservation = new viewContentReservation();
			$modelContentReservation->prueba1();
			$viewContentReservation->createReservation1($modelContentReservation->dateContent,$modelContentReservation->habitaciones,$modelContentReservation->prices,$modelContentReservation->cantidades);
			
			//$viewContentReservation->createContentPromociones($modelContentReservation->getContentPromociones());
	
		}elseif($section=="reservaS"){
			include 'viewContentReservation.php';
			include 'modelContentReservation.php';
					/*include 'reservationController.php';
		include 'reservations.php';*/
			
			
			$serialized = $_SESSION['rooms'];
			
			//$this->NumHabit = unserialize($_SESSION['result']);
			$rooms = unserialize($serialized);
			
			
			$modelContentReservation = new modelContentReservation();
			$viewContentReservation = new viewContentReservation();
			
				$modelContentReservation->crearHabitaciones($rooms);
				$viewContentReservation->createReservation1($modelContentReservation->dateContent,$modelContentReservation->habitaciones,$modelContentReservation->prices,$modelContentReservation->cantidades);

			//$viewContentReservation->createContentPromociones($modelContentReservation->getContentPromociones());
	
		}elseif($section=="reserva2"){
			include 'viewContentReservation.php';
			include 'modelContentReservation.php';
			
			$modelContentReservation = new modelContentReservation();
			$viewContentReservation = new viewContentReservation();
			$modelContentReservation->prueba2();
			$viewContentReservation->createReservation2($modelContentReservation->dateContent,$modelContentReservation->promociones);
			//$viewContentReservation->createContentPromociones($modelContentReservation->getContentPromociones());
	
		}elseif($section=="reserva3"){
			include 'viewContentReservation.php';

			$viewContentReservation = new viewContentReservation();
			$viewContentReservation->createFormSection();
			//$viewContentReservation->createContentPromociones($modelContentReservation->getContentPromociones());
	
		}else{
			include 'viewContentIndex.php';
			include 'modelContentIndex.php';
			$modelContentIndex = new ModelContentIndex();
			$viewContentIndex = new ViewContentIndex();
			$viewContentIndex->createContentIndex($modelContentIndex->getContentIndex());
		}
	}
}
?>