<?php
	require_once('config.php');
	test_session();
	include "ad.php";
?>
<!DOCTYPE html>
<html>
<head>

	<title></title>
</head>
<body>
	<?php
		$id = $_SESSION['id'];
		$select = "SELECT * FROM ad LEFT JOIN user ON 'ad.userId' = 'user.$id' WHERE userId='$id' ";
		$query = mysqli_query($conn,$select);
		$row = mysqli_num_rows($query);
		if ($row > 0) {
			while ($res = mysqli_fetch_assoc($query)) {
	?>
				<img style="width: 100px;height: 100px;" src="<?= $res['imageDir'] ?>">
	<?php
				foreach ($res as $key => $value) {
					echo $key . " " . $value . "<br>";
				}
			}
		}
	?>
</body>
</html>