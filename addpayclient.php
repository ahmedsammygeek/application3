<?php  session_start();

if(!isset($_SESSION['logged']) || $_SESSION['logged'] != 'true') {
 header('location: login.php'); die();
}
if (isset($_POST['submit'])) {
$client=$_POST['client'];
$money=htmlspecialchars($_POST['money']);
$date=$_POST['date'];
}
if (empty($money) || empty($date)) {
	header("location: payclient.php?msg=empty_data");die();
}
require 'connection.php';
$check=$conn->query("SELECT deserved FROM clients WHERE id=$client");
$result=$check->fetch(PDO::FETCH_ASSOC);
extract($result);
$query=$conn->prepare("INSERT INTO pay_client VALUES('',?,?,?,?)");
$query->bindValue(1,$client,PDO::PARAM_INT);
$query->bindValue(2,$money,PDO::PARAM_INT);
$query->bindValue(3,$date,PDO::PARAM_INT);
$query->bindValue(4,$deserved,PDO::PARAM_INT);
$elbaky=bcsub($deserved, $money);
if ($query->execute()) {
	$query2=$conn->prepare("UPDATE clients SET deserved = $elbaky WHERE id=$client");
	if ($query2->execute()) {
		header("location: showpayclient.php?msg=data_inserted");die();
	}
	header("location: payclient.php?msg=error_data");die();

}
header("location: payclient.php?msg=error_data");die();






 ?>