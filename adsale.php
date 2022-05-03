<?php
	require_once('config.php');
	include "ad.php";
	test_session();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		if (isset($_POST['submit'])) {
			$about = $_POST['about'];
			if (!empty($_POST['address'])) {
				$address = $_POST['address'];
				if (!empty($_POST['city'])) {
					$city = $_POST['city'];
					if (!empty($_POST['zip'])) {
						$zip = $_POST['zip'];
						if (!empty($_POST['bedroom'])) {
							$bedroom = $_POST['bedroom'];
							if (!empty($_POST['bathroom'])) {
								$bathroom = $_POST['bathroom'];
								if (!empty($_POST['area'])) {
									$area = $_POST['area'];
									if (!empty($_POST['price'])) {
										$price = $_POST['price'];
										if (!$_FILES['fileToUpload']['size'] == 0) {
											$target_dir = "uploads/";
											$target_file = $target_dir . basename($_FILES['fileToUpload']['name']);
											$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
											$uploadOk = 1;
											$check = getimagesize($_FILES['fileToUpload']['tmp_name']);
											if ($check !== false) {
												echo "File is an image - " . $check['mime'] . ". <br>";
												$uploadOk = 1;
											}elseif (empty($check)) {
												echo "Please Choose a Photo first! <br>";
												$uploadOk = 0;
											}else{
												echo "File is not an image! <br>";
												$uploadOk = 0;
											}
											if ($_FILES["fileToUpload"]["size"] > 5000000) {
								  				echo "Sorry, your file is too large. <br>";
								 				$uploadOk = 0;
											}
											if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
												&& $imageFileType != "gif" ) {
											  	echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed. <br>";
								  				$uploadOk = 0;
											}
											if ($uploadOk == 0) {
												echo "Sorry, your file was not uploaded. <br>";
											
											}else{
												if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
												   	echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.<br>";
												   	$id = $_SESSION['id'];
												   	$insert = "INSERT INTO ad (userId,address,city,zip,bedroom,bathroom,area,price,about,imageDir) VALUES ('$id','$address','$city','$zip','$bedroom','$bathroom','$area','$price','$about','$target_file') ";
												   	$query = mysqli_query($conn,$insert);
												   	if (!$query) {
												   		echo "Connection Failed" . mysqli_connect_error();
												   	}else{
												   		echo "YOUR AD HAS BEEN SUCCESSFULLY MADE!";
												   	}
												}else{
											   	echo "Sorry, there was an error uploading your file.";
												}
											}
										}else{
											echo "Please choose at least one Image!";
										}
									}else{
										echo "Please Enter the Price!";
									}
								}else{
									echo "Please Enter The Area of your Property";
								}
							}else{
								echo "Please Enter the Number of Bathrooms";
							}
						}else{
							echo "Please Enter the Number of Bedrooms";
						}
					}else{
						echo "Please Enter the ZIP code of your address!";
					}
				}else{
					echo "Please Enter which city your property is located in!";
				}
			}else{
				echo "Please Enter your Address!";
			}
		}




	?>

	<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
		<input type="text" name="address" placeholder="Address"><br>
		<input type="text" name="city" placeholder="city"><br>
		<input type="text" name="zip" placeholder="zip"><br>
		<input type="text" name="bedroom" placeholder="Number of Bedrooms"><br>
		<input type="text" name="bathroom" placeholder="Number of Bathrooms"><br>
		<input type="text" name="area" placeholder="Area Surface in Square Metres"><br>
		<input type="text" name="price" placeholder="Price in $"><br>
		<input type="file" name="fileToUpload" id="fileToUpload"><br>
		<textarea name="about" placeholder="More about Your Property"></textarea><br>
		<input type="submit" name="submit">
	</form>




</body>
</html>