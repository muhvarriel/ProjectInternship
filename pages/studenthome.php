<div class="container-fluid">

	<section>
		<nav class="col-12 navbar navbar-expand-sm bg-dark navbar-dark">
		  <ul class="navbar-nav">
		    <li class="nav-item active">
		      <a class="nav-link disabled" href="#">Student</a>
		    </li>
		    <li class="nav-item active">
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
			<p class="student h4">Your Internship</p>

		  	<?php
		  		require_once('./class/class.Internship.php'); 		
		  		$objInternship = new Internship(); 

		  		$id = $_SESSION["id"];

		  		$arrayResult = $objInternship->SelectStudentAccept($id);

		  		if(count($arrayResult) == 0){
		  			echo '<div class="card" style="width: 18rem;">
  							<div class="card-body">
    							<h5 class="card-title">Tidak Ada Data</h5>
  							</div>
						</div>';			
		  		}else{	
		  			$no = 1;	
		  			foreach ($arrayResult as $dataInternship) {
			  			echo '<div class="card" style="width: 18rem;">
	  							<div class="card-body">
				    				<h5 class="card-title">'.$dataInternship->nameCompany.'</h5>
				    				<p class="card-text">'.$dataInternship->ruangLingkup.'</p>
				    				<a class="btn btn-warning" href="?p=studentask&idInternship='.$dataInternship->idInternship.'">View</a>
	  							</div>
							</div>';		
		  				$no++;	
		  			}
		  		}
		  		?>

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