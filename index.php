<?php


$server 	= "localhost";
$user 		= "root";
$pass 		= "";
$database 	= "test";

// Connect Mysql
@$mysqli = new mysqli($server,$user,$pass,$database);


//Error
if(mysqli_connect_errno()){
	echo "Failed to connect to MySQL:(".$mysqli->connect_errno.")".$mysqli->connect_error;
	exit;
}

// Change character set to utf8
mysqli_set_charset($mysqli,"utf8");


$sql = "SELECT * FROM user WHERE id = {$_GET["id"]}";
if($query = $mysqli->query($sql)){
	
	$user = $query->fetch_all();

	#fetch_all
		#MYSQL_NUM
		#MYSQL_NUM
		#MYSQLI_BOTH
	#fetch_array
		#MYSQL_NUM
		#MYSQL_NUM
		#MYSQLI_BOTH
	#fetch_row
	#fetch_object


	var_dump($user);
	//echo "name: ".$user[0]["email"];
}

// while($data = $query->fetch_assoc()){
// 	echo "Id: ".$data['id']."<br />";
// 	echo "Name: ".$data['name']."<br />";
// 	echo "E-mail: ".$data['email']."<br /><hr />";
// }



?>