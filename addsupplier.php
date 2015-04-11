<?php session_start();

if(!isset($_SESSION['logged']) || $_SESSION['logged'] != 'true') {
 header('location: login.php'); die();
}
//add info about suppliers 
$name=htmlspecialchars($_POST['name']);
$address=htmlspecialchars($_POST['address']);
$phone=htmlspecialchars($_POST['phone']);
$debts=htmlspecialchars($_POST['debts']);
$inputs = array("$name" , "$address" , "$phone" , "debts");
if (isset($_POST['submit'])) {
	foreach ($inputs as $key => $value) {
		if (empty($value)) {
			header("location: supplier.php?msg=empty_data"); die();
		}
	}
}
//connection with (application)
require 'connection.php';
//insert data in suppliers table 
$sql="INSERT INTO suppliers VALUES('',?,?,?,?) ";
$query=$conn->prepare($sql);
$query->bindValue(1,$name,PDO::PARAM_STR);
$query->bindValue(2,$address,PDO::PARAM_STR);
$query->bindValue(3,$phone,PDO::PARAM_INT);
$query->bindValue(4,$debts,PDO::PARAM_INT);
if ($query->execute()) {
	header("location: showsupplier.php?msg=data_inserted");die();
}
header("location: supplier.php?msg=error_data");die();



 ?>