<?php


setlocale(LC_TIME, 'ita', 'it_IT');
date_default_timezone_set('Europe/Rome');
ini_set("error_reporting","55");
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);


$host = 'localhost';
$user = 'root';
$psw = 'root';
$db = 'test_candidati';


$connect=mysqli_connect($host, $user, $psw, $db);
mysqli_query($connect,"SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");


//Funzione per la connessione
function MyDbConnect($host, $user, $psw, $db){
	setlocale(LC_TIME, 'ita', 'it_IT');
	date_default_timezone_set('Europe/Rome');
	$connect=mysqli_connect($host, $user, $psw, $db);
	mysqli_query($connect,"SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
	return($connect);
};


//mysqli_close($connect);

?>