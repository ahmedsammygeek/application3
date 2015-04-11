<?php session_start();

if(!isset($_SESSION['logged']) || $_SESSION['logged'] != 'true') {
 header('location: login.php'); die();
}
//info about clints 
$name=htmlspecialchars($_POST['name']);
$address=htmlspecialchars($_POST['address']);
$phone=htmlspecialchars($_POST['phone']);
$deserved=htmlspecialchars($_POST['deserved']);
//this array to be sure about no inputs empty
$inputs = array("$name" , "$address" , "$phone" , "deserved");
if (isset($_POST['submit'])) {
	foreach ($inputs as $key => $value) {
		if (empty($value)) {
			header("location: client.php?msg=empty_data"); die();
		}
	}
}
//connection db (application)
require 'connection.php';
//insert data about client in client table 
$sql="INSERT INTO clients VALUES('',?,?,?,?,NOW()) ";
$query=$conn->prepare($sql);
$query->bindValue(1,$name,PDO::PARAM_STR);
$query->bindValue(2,$address,PDO::PARAM_STR);
$query->bindValue(3,$phone,PDO::PARAM_INT);
$query->bindValue(4,$deserved,PDO::PARAM_INT);
if ($query->execute()) {
	header("location: showclient.php?msg=data_inserted");die();
}
header("location: client.php?msg=error_data");die();



 ?>