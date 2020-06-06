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
		    <li class="nav-item active">
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
			<?php
				require_once('./class/class.Student.php');

				$objStudent = new Student();

				if (isset($_POST['btnSubmit'])) {
					$objStudent->nim = $_POST['nim'];
					$objStudent->fname = $_POST['fname'];
					$objStudent->lname = $_POST['lname'];
					$objStudent->address = $_POST['address'];
					$objStudent->gender = $_POST['gender'];
					$objStudent->bdate = $_POST['bdate'];
					$objStudent->telp = $_POST['telp'];
					$objStudent->tahun = $_POST['tahun'];
					$objStudent->angkatan = $_POST['angkatan'];
					$objStudent->idMajor = $_POST['idMajor'];

					$objStudent->id = $_GET['id'];
					$objStudent->UpdateStudent();

					echo "<script> alert('$objStudent->message'); </script>";

					if ($objStudent->hasil) {
						echo '<script> window.location = "index.php?p=studenthome"; </script>';
					}
				} else if (isset($_GET['id'])) {
					$objStudent->id = $_GET['id'];
					$objStudent->SelectOneStudent();
				}
			?>

			<form action="" method="post">
				<div class="col-6">
					<div class="login0">
						<span>NIM</span>
						<input type="text" class="form-control mb-4" name="nim" value="<?php echo $objStudent->nim; ?>">
					</div>
					<div class="login0">
						<span>First Name</span>
						<input type="text" class="form-control mb-4" name="fname" value="<?php echo $objStudent->fname; ?>">
					</div>
					<div class="login0">
						<span>Last Name</span>
						<input type="text" class="form-control mb-4" name="lname" value="<?php echo $objStudent->lname; ?>">
					</div>
					<div class="login0">
						<span>Address</span>
						<input type="text" class="form-control mb-4" name="address" value="<?php echo $objStudent->address; ?>">
					</div>
					<div class="login0">
						<span>Gender</span>
						<select class="col-12 browser-default custom-select mb-4" name="gender" value="<?php echo $objStudent->gender; ?>">
							<option value="" disabled>Choose Gender</option>
							<option value="male">Male</option>
							<option value="female">Female</option>
						</select>
					</div>
				</div>
				<div class="col-6">
					<div class="login0">
						<span>Birth Date</span>
						<input type="date" class="form-control mb-4" name="bdate" value="<?php echo $objStudent->bdate; ?>">
					</div>
					<div class="login0">
						<span>Phone Number</span>
						<input type="text" class="form-control mb-4" name="telp" value="0<?php echo $objStudent->telp; ?>">
					</div>
					<div class="login0">
						<span>Year</span>
						<input type="text" class="form-control mb-4" name="tahun" value="<?php echo $objStudent->tahun; ?>">
					</div>
					<div class="login0">
						<span>Generation</span>
						<input type="text" class="form-control mb-4" name="angkatan" value="<?php echo $objStudent->angkatan; ?>">
					</div>
					<div class="login0">
						<span>Program</span>
						<select class="col-12 browser-default custom-select mb-4" name="idMajor" value="<?php echo $objStudent->idMajor; ?>">
							<option value="" disabled>Choose Program</option>
							<?php
								require_once('./class/class.Major.php'); 		
								$objMajor = new Major(); 

								$arrayResult = $objMajor->SelectAllMajor();

								if(count($arrayResult) == 0){
									echo '<option value="" disabled>Tidak ada data</option>';			
								}else{	
									$no = 1;	
									foreach ($arrayResult as $dataMajor) {
										echo '<option value="'.$dataMajor->idMajor.'">'.$dataMajor->nameMajor.'</option>';
										$no++;	
									}
								}
							?>
						</select>
					</div>
				</div>				
				<div class="col-6 mb-4">
					<input type="submit" class="btn btn-success" value="Save" name="btnSubmit">
					<a href="index.php?p=studenthome"><button type="button" class="btn btn-danger ml-2">Cancel</button></a>
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