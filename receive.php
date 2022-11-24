<?php

include 'config.php';

$table_name = "anagrafica";


$posted = json_decode(file_get_contents('php://input'), true);
$data = $posted;


//Funzione per la composizione dinamica della query
function InsertInto($host=null, $user=null, $psw=null, $db=null, $table=null, $data=null){
	$my_query='';
	$count = count($data);
	$connect = MyDbConnect($host, $user, $psw, $db);
	$i=1;
	foreach($data as $key => $value){
		if(gettype($value) != 'array' and gettype($value) != 'object'){
			$sql="SELECT column_name FROM information_schema.columns WHERE table_schema = '".$db."' AND table_name = '".$table."' AND column_name = '".$key."'";
			$query=mysqli_query($connect,$sql);
			if(!$query){
				echo mysqli_error($connect);
			}
			if(mysqli_num_rows($query)>0){
				
				$find_num = str_replace(".","",$value);
				$find_num = str_replace(",",".",$find_num);
				
				if(is_numeric($find_num)){
					$value = $find_num;
				};
			
				if($value == ''){
					$value = 'NULL';
				} else {
					$value = "'".mysqli_real_escape_string($connect,$value)."'";
				}
				
				$my_query .= $key."=".$value;
				if($i < $count){
					$my_query .=",";
				}
			}
		}
		$i++;
	};
	return $my_query;	
}



$my_query = InsertInto($host, $user, $psw, $db, $table_name, $data);


$sql="INSERT INTO $table_name SET $my_query";
$query=mysqli_query($connect,$sql);


if(!$query){
	
	die(mysqli_error($connect));
}
echo(mysqli_insert_id($connect));



mysqli_close($connect);

?>