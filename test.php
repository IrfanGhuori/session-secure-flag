<!DOCTYPE html>
<html lang="en">
<head>
<?php 
include('vendor/autoload.php');
use app\Active_sessions;
$dn = new Active_sessions("private",0,'/','localhost','Strict');

$_SESSION["username"] = "Irfan";
$_SESSION["useremail"] = "Irfan@hotmail.com";



//$dn->SessionDestory();

?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
</head>
<body>
<?php 


echo "User name: ".@$_SESSION["username"]. " - user Email address: ". @$_SESSION["useremail"];




?>
</body>
</html>