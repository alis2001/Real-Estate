<?php
	function test_session(){
		if (empty($_SESSION['login'])) {
			header("location:signin.php");
		}
	}
?>