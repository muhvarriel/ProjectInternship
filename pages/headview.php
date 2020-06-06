<div class="container-fluid">
	
	<section>
		<nav class="col-12 navbar navbar-expand-sm bg-dark navbar-dark">
		  <ul class="navbar-nav">
		    <li class="nav-item active">
		      <a class="nav-link disabled" href="#">Head of Undergraduate Program</a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link" href="?p=headhome">Home</a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link" href="?p=headhomeA">Accepted</a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link" href="?p=headhomeR">Rejected</a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link" href="?p=profilelecturer&id=<?php echo $_SESSION["id"];?>">Account</a>
		    </li>
		  </ul>
		  <ul class="navbar-nav signout">		  	
		    <li class="nav-item">
		      <a class="nav-link" href="?p=logout">Sign Out</a>
		    </li>
		  </ul>
		</nav>

		<article class="col-10 student thin">
			<div class="col-12">
			<table id="myTable">
			  <tr class="header">
			    <th onclick="sortTable(0)">Nama</th>
			    <th onclick="sortTable(1)">Jadwal</th>
			    <th onclick="sortTable(2)">Status</th>
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
			  				echo '</tr>';				
			  				$no++;	
			  			}
			  		}
			  		?>
			</table>

			</div>
		</article>

		<aside class="col-2">
			<img class="user my-4" src="images/user.png">
			<p class="user">
				<?php echo $_SESSION['fname']; ?>
				<?php echo $_SESSION['lname']; ?>
			</p>
			<span class="user"><?php echo $_SESSION['email']; ?></span>
		</aside>
	</section>
</div>