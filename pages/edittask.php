<?php
require_once('./class/class.Task.php');

$objTask = new Task();

if (isset($_POST['btnEdit'])) {

	$objTask->idTask = $_GET['idTask'];
	$objTask->list = $_POST['list'];
	$objTask->startDate = $_POST['startDate'];
	$objTask->endDate = $_POST['endDate'];
	$objTask->status = $_POST['status'];

	$objTask->UpdateTask();
	$objTask->SelectOneTask();

	if($objTask->hasil){	
		echo "<script> alert('Data Berhasil Ditambah'); </script>";
		echo '<script> window.location="index.php?p=studentask&idInternship='.$objTask->idInternship.'"; </script>'; 				
	}	
} else if (isset($_GET['idTask'])) {
	$objTask->idTask = $_GET['idTask'];
	$objTask->SelectOneTask();
}
?>
<div id="create">
	<form class="logincreate form-inline" action="" method="post">
		<h4 class="mb-4"><strong>Edit Task</strong></h4>
		<div class="login0">
			<span>Name</span>
			<input class="log" type="text" name="list" value="<?php echo $objTask->list; ?>">
		</div>
		<div class="login0">
			<span>Start Date</span>
			<input class="log" type="date" name="startDate" value="<?php echo $objTask->startDate; ?>">
		</div>
		<div class="login0">
			<span>End Date</span>
			<input class="log" type="date" name="endDate" value="<?php echo $objTask->endDate; ?>">
		</div>
		<div class="login0">
			<span>Status</span>
			<input class="log" type="text" name="status" value="<?php echo $objTask->status; ?>">
		</div>

		<div class="mt-4">
			<input type="submit" class="btn btn-success" value="Edit" name="btnEdit">
			<button type="button" class="btn btn-danger ml-2" onclick="goBack()">Cancel</button>
		</div>
	</form>
</div>

<script>
function goBack() {
  window.history.back();
}
</script>