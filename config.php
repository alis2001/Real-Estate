<?php
	session_start();
	require_once('functions.php');
		$server = "localhost";
		$username = "root";
		$password = "";
		$dbname = "realestate";
		$conn = mysqli_connect($server,$username,$password,$dbname);
		if (!$conn) {
			die("Connection Failed" . mysqli_connect_error());
		}
?>