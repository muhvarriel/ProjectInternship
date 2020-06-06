<div class="container-fluid">

	<section>
		<nav class="col-12 navbar navbar-expand-sm bg-dark navbar-dark">
		  <ul class="navbar-nav">
		    <li class="nav-item active">
		      <a class="nav-link disabled" href="#">Student</a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link" href="?p=studenthome">Home</a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link" href="?p=studentcreate2">Create Proposal</a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link" href="?p=profile&id=<?php echo $_SESSION["id"];?>">Account</a>
		    </li>
		  </ul>
		  <ul class="navbar-nav signout">		  	
		    <li class="nav-item">
		      <a class="nav-link" href="?p=logout">Sign Out</a>
		    </li>
		  </ul>
		</nav>

		<article class="col-10 student thin">
			<p class="student h4"></p>

			<div class="col-12">
			<table id="myTable">
			  <tr class="header">
			    <th onclick="sortTable(0)">Nama</th>
			    <th onclick="sortTable(1)">Jadwal</th>
			    <th onclick="sortTable(2)">Status</th>
			    <th>Action</th>
			    <th>Note</th>
			  </tr>
		    	<?php
					require_once('./class/class.Task.php'); 		
					$objTask = new Task(); 
					
					$id = $_GET['idInternship'];

					$arrayResult = $objTask->SelectAllTask($id);
		    		if(count($arrayResult) == 0){
		    			echo '<tr><td colspan="5">Tidak ada data!</td></tr>';			
		    		}else{	
		    			$no = 1;	
		    			foreach ($arrayResult as $dataTask) {
		    				echo '<tr>';			  					
		    					echo '<td>'.$dataTask->list.'</td>';	
		    					echo '<td>'.$dataTask->startDate.' - '.$dataTask->endDate.'</td>';
		    					echo '<td>'.$dataTask->status.'</td>';
		    					echo '<td><a class="btn btn-warning btn-sm" href="?p=edittask&idTask='.$dataTask->idTask.'">Edit</a>
	                				<a class="btn btn-danger btn-sm" href="?p=deletetask&idTask='.$dataTask->idTask.'">Delete</a></td>';
		    					echo '<td>'.$dataTask->note.'</td>';
		    				echo '</tr>';				
		    				$no++;	
		    			}
		    		}
		    		?>
			</table>

			<button class="btn btn-success btn-add mt-3" type="button">				
				<a class="login5" data-toggle="modal" data-target="#add" href=""><i class="fas fa-plus"></i></a>
			</button>

			</div>
			
		</article>

		<aside class="col-2">
			<img class="user my-4" src="images/user.png">
			<p class="user">
				<?php echo $_SESSION["fname"];?>
				<?php echo $_SESSION["lname"];?>
			</p>
			<span class="user"><?php echo $_SESSION["email"]; ?></span>
		</aside>
	</section>
</div>
			

<?php
require_once('./class/class.Task.php');

if (isset($_POST['btnAdd'])) {
	$objTask = new Task();

	$objTask->list = $_POST['list'];
	$objTask->startdate = $_POST['startdate'];
	$objTask->enddate = $_POST['enddate'];
	$objTask->status = $_POST['status'];
	$objTask->id = $_SESSION['id'];
	$objTask->idInternship = $_GET['idInternship'];
	
	$objTask->AddTask();

	if($objTask->hasil){	
		echo "<script> alert('Data Berhasil Ditambah'); </script>";
		echo '<script> window.location="index.php?p=studentask&idInternship='.$objTask->idInternship.'"; </script>'; 				
	}	
}
?>
<div id="add" class="rounded modal fade" role="dialog">
	<div class="modal-dialog">

		<div class="modal-content">
			<form class="login form-inline" action="" method="post">
				<h4 class="mb-4"><strong>Add Task</strong></h4>
				<div class="login0">
					<span>Name</span>
					<input class="log" type="text" name="list">
				</div>
				<div class="login0">
					<span>Start Date</span>
					<input class="log" type="date" name="startdate">
				</div>
				<div class="login0">
					<span>End Date</span>
					<input class="log" type="date" name="enddate">
				</div>
				<div class="login0">
					<span>Status</span>
					<input class="log" type="text" name="status">
				</div>

				<div class="mt-4">
					<input type="submit" class="btn btn-success" value="Add" name="btnAdd">
					<button type="button" class="btn btn-danger ml-2" data-dismiss="modal">Cancel</button>
				</div>
			</form>
		</div>
	</div>
</div>	