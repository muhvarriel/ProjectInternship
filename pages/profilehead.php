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
		    <li class="nav-item active">
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
			<?php
				require_once('./class/class.Lecturer.php');

				$objLecturer = new Lecturer();

				if (isset($_POST['btnSubmit'])) {
					$objLecturer->nidn = $_POST['nidn'];
					$objLecturer->fname = $_POST['fname'];
					$objLecturer->lname = $_POST['lname'];
					$objLecturer->address = $_POST['address'];
					$objLecturer->gender = $_POST['gender'];
					$objLecturer->telp = $_POST['telp'];
					$objLecturer->idMajor = $_POST['idMajor'];

					$objLecturer->id = $_GET['id'];
					$objLecturer->UpdateLecturer();

					echo "<script> alert('$objLecturer->message'); </script>";

					if ($objLecturer->hasil) {
						echo '<script> window.location = "index.php?p=headhome"; </script>';
						
					}
				} else if (isset($_GET['id'])) {
					$objLecturer->id = $_GET['id'];
					$objLecturer->SelectOneLecturer();
				}
			?>

			<form action="" method="post">
				<div class="col-6">
					<div class="login0">
						<span>NIDM</span>
						<input type="text" class="form-control mb-4" name="nidn" value="<?php echo $objLecturer->nidn; ?>">
					</div>
					<div class="login0">
						<span>First Name</span>
						<input type="text" class="form-control mb-4" name="fname" value="<?php echo $objLecturer->fname; ?>">
					</div>
					<div class="login0">
						<span>Last Name</span>
						<input type="text" class="form-control mb-4" name="lname" value="<?php echo $objLecturer->lname; ?>">
					</div>
					<div class="login0">
						<span>Gender</span>
						<select class="col-12 browser-default custom-select mb-4" name="gender" value="<?php echo $objLecturer->gender; ?>">
							<option value="" disabled>Choose Gender</option>
							<option value="male">Male</option>
							<option value="female">Female</option>
						</select>
					</div>
				</div>
				<div class="col-6 mb-4">
					<div class="login0">
						<span>Address</span>
						<input type="text" class="form-control mb-4" name="address" value="<?php echo $objLecturer->address; ?>">
					</div>
					<div class="login0">
						<span>Phone Number</span>
						<input type="text" class="form-control mb-4" name="telp" value="0<?php echo $objLecturer->telp; ?>">
					</div>
					<div class="login0">
						<span>Program</span>
						<select class="col-12 browser-default custom-select mb-4" name="idMajor" value="<?php echo $objLecturer->idMajor; ?>">
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
					<a href="index.php?p=Lecturerhome"><button type="button" class="btn btn-danger ml-2">Cancel</button></a>
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