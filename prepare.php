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

$stmt = $mysqli->stmt_init();
$stmt->prepare("SELECT name,email FROM user WHERE id = ?");
$stmt->bind_param("i", $_GET["id"]);
$stmt->execute();
$stmt->bind_result($name,$email);
$stmt->fetch();

echo "name: ".$name."<br />";
echo "email: ".$email."<br />";





?>