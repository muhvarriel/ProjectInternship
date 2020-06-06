<?php
	require_once('./class/class.Internship.php');
	
	if (isset($_GET['idInternship'])) {
		$objInternship = new Internship();
		$objInternship->idInternship = $_GET['idInternship'];
		$objInternship->AcceptInternship();

		echo "<script> alert('$objInternship->message'); </script>";
		echo "<script> window.location = 'index.php?p=headhomeA'; </script>";
	} else {
		echo '<script> window.history.back() </script>';
	}
?>