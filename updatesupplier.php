<?php 
if (isset($_GET['id'])) {
	$id=$_GET['id'];
}
$name=htmlspecialchars($_POST['name']);
$address=htmlspecialchars($_POST['address']);
$phone=htmlspecialchars($_POST['phone']);
$debts=htmlspecialchars($_POST['debts']);
$inputs = array("$name" , "$address" , "$phone" , "debts");
if (isset($_POST['submit'])) {
	foreach ($inputs as $key => $value) {
		if (empty($value)) {
			header("location: editsupplier.php?id=$id&msg=empty_data"); die();
		}
	}
}
extract($inputs);
require 'connection.php';
$sql="UPDATE suppliers set supplier_name='$name',address='$address',phone='$phone',debts='$debts' where id=$id ";
$query=$conn->prepare($sql);
if ($query->execute()) {
	header("location: showsupplier.php?msg=data_updated");die();
}
header("location: editsupplier.php?msg=error_data");die;



 ?>