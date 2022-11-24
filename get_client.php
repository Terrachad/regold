<?php

include 'config.php';


$array = array(
	"http_code" => http_response_code(),
	"client_id" => "123456"
);

$json = json_encode($array);

echo $json;


mysqli_close($connect);

?>