<?php session_start();

if(!isset($_SESSION['logged']) || $_SESSION['logged'] != 'true') {
 header('location: login.php'); die();
}
if (isset($_GET['msg'])) {
	$id=$_GET['msg'];
	//get the id of row we need to delete an put it variable ($id)
}
include 'connection.php';
//connection with database (met)
$sql="DELETE FROM admin WHERE id='$id' ";
$query=$conn->query($sql);
//prepare sql request
$num=$query->rowCount();
//this function return the number of rows deleted
// var_dump($num); die();
if ($num==1) {
	//if exist row delete 
	//go to gellery (admins)
	header('location: showadmin.php?msg=deleted'); die();
}
else
{
	header('location: showadmin.php?msg=error_delete'); die();
}
 ?>