<?php

class DateContent{
	
	
	function DateContent()
	{
			require 'core/init.php';
		$this->dateIn = $lang['Fecha de entrada'];
		$this->dateOut = $lang['Fecha de salida'];
	}
	
}

class Promotion{
	
	function Promotion($title,$description,$imageSource){
		$this->title = $title;
		$this->description = $description;
		$this->imageSource = $imageSource;	
	}
}

class Rtypes{
	
}
/*
class roomContent{
	
	public $habitaciones;
		
	function roomContent($tipo)
	{
		if($tipo == 0)
		{
			
		}
	}
}
*/
class modelContentReservation{

	
	public $habitaciones;
	public $promociones;
	
	function modelContentReservation(){
	/*
		$this->habitaciones = array( new RoomContent($lang[' Habitación doble o twin '],
		$lang[' En nuestras habitaciones standard disfrutará de todo el equipamiento y comodidades que su estancia en Granada merece. '],
		$lang['Imagenes/habitacion1.jpg']),new RoomContent($lang[' Habitación superior '],
		$lang[' Disfrute de una magnifica vista de Plaza Nueva y el centro de Granada desde nuestras habitaciones superiores. '],
		$lang['Imagenes/habitacion2.jpg']),new RoomContent($lang[' Habitación triple '],
		$lang[' En nuestras habitaciones triples podrá disfrutar de sus vacaciones en familia o con amigos en el centro de Granada. '],
		$lang['Imagenes/habitacion3.jpg']));
		*/
	}
	
	function noRooms()
	{
		$this->dateContent = new DateContent(); 
	}
	
	function prueba1()
	{
			require 'modelContentIndex.php';
			
		$this->dateContent = new DateContent();
		
		$this->prices = array("120,00","140,00","180,00");
		
		$this->cantidades = array("50","25","3");
		require 'core/init.php';
		$this->habitaciones = array( new RoomContent($lang[' Habitación doble o twin '],
		$lang[' En nuestras habitaciones standard disfrutará de todo el equipamiento y comodidades que su estancia en Granada merece. '],
		$lang['Imagenes/habitacion1.jpg']),new RoomContent($lang[' Habitación superior '],
		$lang[' Disfrute de una magnifica vista de Plaza Nueva y el centro de Granada desde nuestras habitaciones superiores. '],
		$lang['Imagenes/habitacion2.jpg']),new RoomContent($lang[' Habitación triple '],
		$lang[' En nuestras habitaciones triples podrá disfrutar de sus vacaciones en familia o con amigos en el centro de Granada. '],
		$lang['Imagenes/habitacion3.jpg']));
	}
	
	
	function crearHabitaciones($RoomsTypeNum)
	{
		require 'core/init.php';
		require 'modelContentIndex.php';
		
		$this->dateContent = new DateContent();
		$this->cantidades = array();
		
		$this->habitaciones = array();
		$this->ids = array();
		
		for($i = 0; $i < count($RoomsTypeNum); $i++)
		{
			if($RoomsTypeNum[$i]->idTypeRoom == 4){
				$this->habitaciones[] = new RoomContent($lang[' Habitación individual '],
				$lang[' En nuestras habitaciones individuales podrá disfrutar de sus vacaciones o pasar una estancia acomodada. '],
				$lang['Imagenes/habitacion1.jpg']);
				
			}elseif($RoomsTypeNum[$i]->idTypeRoom == 1)
			{
				$this->habitaciones[] = new RoomContent($lang[' Habitación doble o twin '],
				$lang[' En nuestras habitaciones standard disfrutará de todo el equipamiento y comodidades que su estancia en Granada merece. '],
				$lang['Imagenes/habitacion1.jpg']);
				
			}elseif($RoomsTypeNum[$i]->idTypeRoom == 2)
			{
				$this->habitaciones[] = new RoomContent($lang[' Habitación superior '],
				$lang[' Disfrute de una magnifica vista de Plaza Nueva y el centro de Granada desde nuestras habitaciones superiores. '],
				$lang['Imagenes/habitacion2.jpg']);
			}elseif($RoomsTypeNum[$i]->idTypeRoom == 3){
				$this->habitaciones[] = new RoomContent($lang[' Habitación triple '],
				$lang[' En nuestras habitaciones triples podrá disfrutar de sus vacaciones en familia o con amigos en el centro de Granada. '],
				$lang['Imagenes/habitacion3.jpg']);
			}
			$this->ids[] = $RoomsTypeNum[$i]->idTypeRoom;
			$this->cantidades[] = $RoomsTypeNum[$i]->numRooms;
			
		}
		
				$this->prices = array("120,00","140,00","180,00","120,00");
	}
	
	function prueba2()
	{
		require 'modelContentIndex.php';
			
		$this->dateContent = new DateContent();
		require 'core/init.php';
		$this->promociones = array(new Promotion($lang['Habitacion doble + visita guiada al Alhambra'],$lang['Descubrirá con nostros la única Ciudad Medieval Musulmana mejor conservada del mundo, la Alhambra; visitando sus palacios, Mexuar, Comares, Leones, Generalife; paseando por sus patios, de los Arrayenes, la Reja, la Acequia, la Sultana; y disfrutando de sus jardines, de Partal, de la Medina y por suspuesto del Generalife con sus gracioso juegos de agua, y su laberintico diseño.'],
		$lang['Imagenes/PromocionAlhambraj.jpg']),new Promotion($lang['OFERTA 10% descuento'],
																			$lang['Disfrute de un 10% de descuento en su estancia.'],
																			$lang['Imagenes/PromocionDosNoches.jpg']));
	}
	
	/*
	function getContentReservation()
	{
		$
	}*/
	
}
?>