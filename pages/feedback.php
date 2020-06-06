<?php
require_once('./class/class.Task.php');
if (isset($_POST['btnAdd'])) {
	$objTask = new Task();

	$objTask->note = $_POST['note'];
	$objTask->idTask = $_GET['idTask'];
	$objTask->idInternship = $_GET['idInternship'];
	$objTask->AddNote();

	if($objTask->hasil){	
		echo "<script> alert('Data Berhasil Ditambah'); </script>";
		echo '<script> window.location="index.php?p=dosenhome"; </script>'; 				
	}	
}
?>
<div id="create">
	<form class="logincreate form-inline" action="" method="post">
		<h4 class="mb-4"><strong>Give Feedback</strong></h4>
		<div class="login0">
			<span>Feedback</span>
			<input class="log" type="text" name="note">
		</div>

		<div class="mt-4">
			<input type="submit" class="btn btn-success" value="Give" name="btnAdd">
			<button type="button" class="btn btn-danger ml-2" data-dismiss="modal">Cancel</button>
		</div>
	</form>
</div>