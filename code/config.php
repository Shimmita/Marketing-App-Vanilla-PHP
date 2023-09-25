<?php 

$servername="127.0.0.1";
$username='root';
$password="";
$dbName='commercedb';


$connection= new mysqli($servername,$username,$password,$dbName) or
die("connection failed".$connection->error);

?>
