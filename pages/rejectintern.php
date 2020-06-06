<?php
	require_once('./class/class.Internship.php');
	
	if (isset($_GET['idInternship'])) {
		$objInternship = new Internship();
		$objInternship->idInternship = $_GET['idInternship'];
		$objInternship->RejectInternship();

		echo "<script> alert('$objInternship->message'); </script>";
		echo "<script> window.location = 'index.php?p=headhomeR'; </script>";
	} else {
		echo '<script> window.history.back() </script>';
	}
?>