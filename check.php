<?php session_start() ;
if (isset($_POST['submit'])) {
	$args = array('userid' =>FILTER_SANITIZE_STRING ,'password' =>FILTER_SANITIZE_STRING);
	$inputs=filter_input_array(INPUT_POST,$args);
	foreach ($inputs as $key_input => $value_input) {
		if (empty($value_input)) {
			header('location: login.php?msg=data_empty'); die();
		}
	}
	extract($inputs);
	$password=hash('ripemd160', "$password");
	include 'connection.php';
	$sql="SELECT * FROM admin WHERE name = '$userid' && password= '$password' " ;
	$query=$conn->query($sql);
	while ($result=$query->fetch(PDO::FETCH_ASSOC)) {
		extract($result);
	}

	$query->execute();
	$num=$query->rowCount();
// var_dump($num); die();
	if ($num == 1) {
		$_SESSION['logged']='true';

		header("location: showproduct.php?id=$id");
		die();
	}
	else
	{
		header('location: login.php?msg=data_error'); die();
	}

}





?>