<?php
	require_once('./class/class.Task.php');
	
	if (isset($_GET['idTask'])) {
		$objTask = new Task();
		$objTask->idTask = $_GET['idTask'];		
		$objTask->SelectOneTask();
		
		$objTask->DeleteTask();

		echo "<script> alert('$objTask->message'); </script>";
		echo '<script> window.location="index.php?p=studentask&idInternship='.$objTask->idInternship.'"; </script>'; 
	} else {
		echo '<script> window.history.back() </script>';
	}
?>