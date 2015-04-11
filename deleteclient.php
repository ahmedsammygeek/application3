<?php session_start();

if(!isset($_SESSION['logged']) || $_SESSION['logged'] != 'true') {
 header('location: login.php'); die();
} 
if (isset($_GET['id'])) {
	$id=$_GET['id'];
}
//cnnect with (application)
require 'connection.php';
//delete this client
$sql="DELETE FROM clients WHERE id=$id";
$query=$conn->prepare($sql);
if ($query->execute()) {
	header("location: showclient.php?msg=data_deleted");die();
}
header("lcocation: showclient.php?msg=error_data");die();
 ?>