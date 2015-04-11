<?php  session_start();

if(!isset($_SESSION['logged']) || $_SESSION['logged'] != 'true') {
 header('location: login.php'); die();
}
if (isset($_POST['submit'])) {
$supplier=$_POST['supplier'];
$money=htmlspecialchars($_POST['money']);
$date=$_POST['date'];
}
if (empty($money) || empty($date)) {
	header("location: paysupplier.php?msg=empty_data");die();
}
require 'connection.php';
$check=$conn->query("SELECT debts FROM suppliers WHERE id=$supplier");
$result=$check->fetch(PDO::FETCH_ASSOC);
extract($result);
$query=$conn->prepare("INSERT INTO pay_supplier VALUES('',?,?,?,?)");
$query->bindValue(1,$supplier,PDO::PARAM_INT);
$query->bindValue(2,$money,PDO::PARAM_INT);
$query->bindValue(3,$date,PDO::PARAM_INT);
$query->bindValue(4,$debts,PDO::PARAM_INT);
$elbaky=bcsub($debts, $money);
if ($query->execute()) {
	$query2=$conn->prepare("UPDATE suppliers SET debts = $elbaky WHERE id=$supplier");
	if ($query2->execute()) {
		header("location: showpaysupplier.php?msg=data_inserted");die();
	}
	header("location: paysupplier.php?msg=error_data");die();

}
header("location: paysupplier.php?msg=error_data");die();






 ?>