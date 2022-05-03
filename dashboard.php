<?php
	require_once('config.php');
	test_session();
	if (isset($_GET['action'])) {
		if ($_GET['action'] == "logout") {
			unset($_SESSION['login']);
			unset($_SESSION['email']);
			unset($_SESSION['id']);
			header("location:signin.php");
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Dashboard</h1>
	<?php
		echo "Welcome " . $_SESSION['email'] . "<br>";
	?>
	<a href="adsale.php">Post a new property for Sale</a><br>
	<a href="">Post a new property for Rent</a><br>
	<a href="history.php">Modify your previous ads</a><br>
	<a href="dashboard.php?action=logout">Log Out</a>
</body>
</html>