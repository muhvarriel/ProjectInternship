<div class="container-fluid">
	
	<section>
		<nav class="col-12 navbar navbar-expand-sm bg-dark navbar-dark">
		  <ul class="navbar-nav">
		    <li class="nav-item active">
		      <a class="nav-link disabled" href="#">Head of Undergraduate Program</a>
		    </li>
		    <li class="nav-item active">
		      <a class="nav-link" href="?p=headhome">Home</a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link" href="?p=headhomeA">Accepted</a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link" href="?p=headhomeR">Rejected</a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link" href="?p=profilehead&id=<?php echo $_SESSION["id"];?>">Account</a>
		    </li>
		  </ul>
		  <ul class="navbar-nav signout">		  	
		    <li class="nav-item">
		      <a class="nav-link" href="?p=logout">Sign Out</a>
		    </li>
		  </ul>
		</nav>

		<article class="col-10 student thin">
			<p class="h4 mb-4">Mahasiswa Yang Mendaftar</p>
			
			<div class="col-4 input-group md-form form-sm form-1 pl-0">
			  <div class="input-group-prepend">
			    <span class="input-group-text" id="basic-text1"><i class="fas fa-search text-white" aria-hidden="true"></i></span>
			  </div>
			  <input class="form-control my-0 py-1" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search" aria-label="Search">
			</div>
			
			<table id="myTable">
			  <tr class="header">
			    <th onclick="sortTable(0)">Nama</th>
			    <th onclick="sortTable(1)">Tahun</th>
			    <th onclick="sortTable(2)">Angkatan</th>
			    <th onclick="sortTable(3)">Jurusan</th>
			    <th onclick="sortTable(4)">Topik</th>
			    <th>Action</th>
			  </tr>
		  	<?php
		  		require_once('./class/class.Internship.php'); 		
		  		$objInternship = new Internship(); 

		  		$idMajor = $_SESSION["idMajor"];

		  		$arrayResult = $objInternship->SelectInternshipWaiting($idMajor);

		  		if(count($arrayResult) == 0){
		  			echo '<tr><td colspan="5">Tidak ada data!</td></tr>';			
		  		}else{	
		  			$no = 1;	
		  			foreach ($arrayResult as $dataInternship) {
		  				echo '<tr>';
		  					
		  					echo '<td>'.$dataInternship->name.'</td>';	
		  					echo '<td>'.$dataInternship->tahun.'</td>';
		  					echo '<td>'.$dataInternship->angkatan.'</td>';
		  					echo '<td>'.$dataInternship->nameMajor.'</td>';
		  					echo '<td>'.$dataInternship->topik.'</td>';
		  					echo '<td><a class="btn btn-success btn-sm"  href="?p=acceptintern&idInternship='.$dataInternship->idInternship.'">Accept</a> ';					
		  					echo ' <a class="btn btn-danger btn-sm"  href="?p=rejectintern&idInternship='.$dataInternship->idInternship.'">Reject</a> ';	
		  					echo ' <a class="btn btn-primary btn-sm"  href="?p=report_internship&idInternship='.$dataInternship->idInternship.'">Download</a></td>';									
		  				echo '</tr>';				
		  				$no++;	
		  			}
		  		}
		  		?>
			</table>

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