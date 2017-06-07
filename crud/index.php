<?php 

require_once("User.php");

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

$user = new User($mysqli);

// create
// $user->setName("Murilo")
// 	->setEmail("murilo@email.com");
//echo $user->insert();


// update
$user->setId(1)
	->setName("William Angélico")
 	->setEmail("will@teste.com");
//echo $user->update()."<br />";


//delete
// echo "delete".$user->delete(6)."<br />";


// list
// $list = $user->listUser("id desc");

// foreach ($list as $value) {
// 	echo $value['id']."<br />";
// 	echo $value['name']."<br />";
// 	echo $value['email']."<br /><hr />";
// }


//find
$find = $user->find(1);
echo $find['name'];

