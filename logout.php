<?php session_start();



unset($_SESSION['logged']);
if(session_destroy())
	{include 'login.php';
}
?>
