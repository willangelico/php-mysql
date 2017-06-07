<?php 

require_once("User.php");
require_once("ServiceUser.php");

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

$user = new User();



// update
$user->setId(1)
	->setName("William Davidson Angélico")
 	->setEmail("will@teste.com");



$serviceUser = new ServiceUser($mysqli, $user);

echo $serviceUser->update()."<hr />";



$user->setName("Murilo")
	->setEmail("murilo@email.com");
echo $serviceUser->insert()."<hr />";


// list
$list = $serviceUser->listUser("id desc");

foreach ($list as $value) {
	echo $value['id']."<br />";
	echo $value['name']."<br />";
	echo $value['email']."<br /><hr />";
}


//find
$find = $serviceUser->find(1);
echo $find['name'];

