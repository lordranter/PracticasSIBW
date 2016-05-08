<?php 
session_start();

$lenguas_permitidas = array('es_ES','en_EN');

if( isset($_GET['lang'])===true && in_array($_GET['lang'],$lenguas_permitidas) === true){
	include 'lang/' . $_GET['lang'] .  '.php';
	$_SESSION['lang'] = $_GET['lang'];
	
}else
{
	$_SESSION['lang'] = "es_ES";
	
	
}

	include 'lang/' . $_SESSION['lang'] .  '.php';


?>