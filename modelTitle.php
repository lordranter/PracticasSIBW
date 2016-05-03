<?php
class ModelTitle{
	
	function ModelTitle(){
		
	}
	
	function getGenericTitle(){
	include 'lang/' . $_SESSION['lang'] . '.php';
		return $lang['Hotel Plaza Nueva Granada ***'];
	}
	
	function getIndexTitle(){
		return $this->getGenericTitle();
	}
	
	function getPromocionesTitle(){
	include 'lang/' . $_SESSION['lang'] . '.php';
		return $lang['Promociones - '] . $this->getGenericTitle();
	}
	
	function getValoracionesTitle(){
	include 'lang/' . $_SESSION['lang'] . '.php';
		return $lang['Valoraciones - '] . $this->getGenericTitle();
	}
	
	function getImagenesTitle(){
	include 'lang/' . $_SESSION['lang'] . '.php';
		return $lang['Imagenes - '] . $this->getGenericTitle();
	}
	
}
?>