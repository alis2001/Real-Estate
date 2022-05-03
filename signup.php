<?php
	require_once('config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		$error = array();
		if (isset($_POST['signUp'])) {
			$email = $_POST['email'];
			$password = $_POST['password'];
			if (empty($email)) {
				$error[0] = "Please Enter Your Email";
			}elseif (empty($password)) {
				$error[1] = "Please Enter Your Password";
			}else{
				$insert = "INSERT INTO user (email,password) VALUES ('$email','$password') ";
				$query = mysqli_query($conn,$insert);
				if (!$query) {
					echo "Connection Failed" . mysqli_connect_error();
				}else{
					$select = "SELECT email FROM user WHERE email='$email' ";
					$querySelect = mysqli_query($conn,$select);
					$fetch = mysqli_fetch_assoc($querySelect);
					echo $fetch['email'] . ": Your account has been created successfully. Now you can <a href='signin.php'>Sign In</a>";
				}
			}
		}


		if (isset($_POST['signIn'])) {
			header("location:signin.php");
		}
	?>
	<div>
		<form method="post" action="signup.php">
			<h1>Sign Up</h1>
			<button type="submit" name="signIn">Sign In</button><button type="submit" disabled="">Sign Up</button><br>
			<input type="text" name="email" placeholder="Email"><br>
			<input type="password" name="password" placeholder="password"><br>
			<input type="submit" name="signUp">
		</form>
	</div>
	<?php
		if ($error) {
			for ($i=0; $i < count($error) ; $i++) { 
				if (empty($error[$i])) {
					echo $error[$i + 1];
				}else{
					echo $error[$i];
				}
			}
		}
	?>
</body>
</html>