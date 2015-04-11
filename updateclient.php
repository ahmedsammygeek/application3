<?php session_start();

if(!isset($_SESSION['logged']) || $_SESSION['logged'] != 'true') {
 header('location: login.php'); die();
}
if (isset($_GET['id'])) {
	$id=$_GET['id'];
}
//new data we want to update
$name=htmlspecialchars($_POST['name']);
$address=htmlspecialchars($_POST['address']);
$phone=htmlspecialchars($_POST['phone']);
$deserved=htmlspecialchars($_POST['deserved']);
$inputs = array("$name" , "$address" , "$phone" , "deserved");
if (isset($_POST['submit'])) {
	foreach ($inputs as $key => $value) {
		if (empty($value)) {
			header("location: editclient.php?id=$id&msg=empty_data"); die();
		}
	}
}
//connection with db (application)
require 'connection.php';
//update data in client table
$sql="UPDATE clients set client_name='$name',address='$address',phone='$phone',deserved='$deserved' where id=$id ";
$query=$conn->prepare($sql);
if ($query->execute()) {
	header("location: showclient.php?msg=data_updated");die();
}
header("location: editclient.php?msg=error_data");die;



 ?>