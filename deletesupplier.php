<?php session_start();

if(!isset($_SESSION['logged']) || $_SESSION['logged'] != 'true') {
 header('location: login.php'); die();
}
if (isset($_GET['id'])) {
	$id=$_GET['id'];
}
//conn with db (application)
require 'connection.php';
//delete supplier 
$sql="DELETE FROM suppliers WHERE id=$id";
$query=$conn->prepare($sql);
if ($query->execute()) {
	header("location: showsupplier.php?msg=data_deleted");die();
}
header("lcocation: showsupplier.php?msg=error_data");die();
 ?>