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
		    <li class="nav-item active">
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
			<div class="col-12">
				<p class="h4 mb-4">Add Company</p>
			</div>

			<?php
			require_once('./class/class.Internship.php');

			if (isset($_POST['btnAdd'])) {
				$objInternship = new Internship();

				$objInternship->nameCompany = $_POST['nameCompany'];
				$objInternship->address = $_POST['address'];
				$objInternship->supervisor = $_POST['supervisor'];
				$objInternship->profile = $_POST['profile'];
				$objInternship->AddCompany();

				if($objInternship->hasil){	
					echo "<script> alert('Company Berhasil'); </script>";
					echo '<script> window.location="index.php?p=studentcreate2"; </script>'; 				
				}	
				
			}
			?>

			<form class="proposal" method="POST">
				<div class="col-6">
					<input type="text" class="form-control mb-4" placeholder="Nama Perusahaan" name="nameCompany">

					<input type="text" class="form-control mb-4" placeholder="Alamat Perusahaan" name="address">

					<input type="text" class="form-control mb-4" placeholder="Supervisor Perusahaan" name="supervisor">

					<div class="form-group">
						<textarea class="form-control rounded-0" rows="3" placeholder="Profil Perusahaan" name="profile"></textarea>
					</div>

					<button class="btn btn-warning my-4 btn-block" type="submit" name="btnAdd">Next</button>
				</div>
			</form>
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