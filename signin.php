<?php
	require_once('config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Real Estate</title>
</head>
<body>
	<h1>Sign In</h1>
	<?php
		$error = array();
		if (isset($_POST['signin'])) {
			$email = $_POST['email'];
			$password = $_POST['password'];
			if (empty($email)) {
				$error[0] = "Please Enter your Email address";
			}elseif (empty($password)) {
				$error[1] = "Please Enter your Password";
			}else{
				$select = "SELECT * FROM user WHERE email='$email' AND password='$password' ";
				$query = mysqli_query($conn,$select);
				$count = mysqli_num_rows($query);
				$result = mysqli_fetch_assoc($query);
				if ($count > 0) {
					$_SESSION['login'] = "true";
					$_SESSION['email'] = $result['email'];
					$_SESSION['id'] = $result['id'];
					header("location:dashboard.php");
				}else{
					$error[2] = "Email and Password do not match";
				}

			}
			
		}
		if (isset($_POST['signUp'])) {
			header("location:signup.php");
		}
	?>




	<div>

		<form method="post" action="signin.php">
			<button type="submit" name="signIn" disabled="">Sign In</button><button type="submit" name="signUp">Sign Up</button><br>
			<input type="text" name="email" placeholder="Email"><br>
			<input type="password" name="password" placeholder="password"><br>
			<input type="submit" name="signin">
		</form>
	</div>
	
	<?php
		if ($error) {
			for ($i=0; $i < count($error) ; $i++) { 
				if (empty($error[$i])) {
					if (empty($error[$i + 1])) {
						echo $error[$i + 2];
					}else{
						echo $error[$i + 1];
					}
				}else{
					echo $error[$i];
				}
			}
		}
	?>
</body>
</html>