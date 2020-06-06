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
				<p class="h4 mb-4">Create Proposal</p>
			</div>

			<?php
			require_once('./class/class.Internship.php');
			require_once('./class/class.Mail.php');

			if (isset($_POST['btnAdd'])) {
				$objInternship = new Internship();

				$objInternship->topik = $_POST['topik'];
				$objInternship->duration = $_POST['duration'];
				$objInternship->position = $_POST['position'];
				$objInternship->stime = $_POST['stime'];
				$objInternship->send = $_POST['send'];
				$objInternship->background = $_POST['background'];
				$objInternship->goal = $_POST['goal'];
				$objInternship->ruangLingkup = $_POST['ruangLingkup'];
				$objInternship->jobDesc = $_POST['jobDesc'];
				$objInternship->id = $_SESSION['id'];
				$objInternship->idCompany = $_POST['idCompany'];

				$objInternship->AddInternship();

				if($objInternship->hasil){	
					$message =  file_get_contents('templateemail.html');  					 
					$header = "Pengajuan Berhasil";
					$body = '<span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
					Salah satu mahasiswa Anda mengajukan proposal magang, silahkan dicek.<br>
					Berikut ini informasi account mahasiswa:<br>
					</span>
					<span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
					Nama : '.$_SESSION["fname"].' '.$_SESSION["lname"].'<br>
					Topik : '.$objInternship->topik.'
					</span>';
					$footer ='Silakan login untuk mengakses sistem';

					$message = str_replace("#header#",$header,$message);
					$message = str_replace("#body#",$body,$message);
					$message = str_replace("#footer#",$footer,$message);

					$objMail = new Mail();
					$objMail->SendMail('fear.haz16@gmail.com', $objInternship->topik, $_SESSION["fname"], 'Pengajuan Baru', $message);	
					echo "<script> alert('Internship Berhasil'); </script>";
					echo '<script> window.location="index.php?p=studenthome"; </script>'; 				
				}	
				
			}
			?>

			<form class="proposal" method="POST">
				<div class="col-6">

					<input type="text" class="form-control mb-4" placeholder="Topik" name="topik">

					<input type="text" class="form-control mb-4" placeholder="Durasi Magang" name="duration">

					<input type="text" class="form-control mb-4" placeholder="Posisi Magang" name="position">

					<div class="form-row mb-4">
						<div class="col">
							<input type="date" class="form-control" placeholder="Mulai Magang" name="stime">
						</div>
						<div class="col">
							<input type="date" class="form-control" placeholder="Selesai Magang" name="send">
						</div>
					</div>

					<div class="form-group">
						<textarea class="form-control rounded-0" rows="3" placeholder="Latar Belakang" name="background"></textarea>
					</div>
				</div>
				<div class="col-6">
					<div class="col-12 login0 mb-4">
						<select class="col-10 browser-default custom-select" name="idCompany">
							<option value="" disabled selected>Choose Company</option>
							<?php
								require_once('./class/class.Internship.php'); 		
								$objInternship = new Internship(); 

								$arrayResult = $objInternship->SelectAllCompany();

								if(count($arrayResult) == 0){
									echo '<option value="" disabled>Tidak ada datay</option>';			
								}else{	
									$no = 1;	
									foreach ($arrayResult as $dataInternship) {
										echo '<option value="'.$dataInternship->idCompany.'">'.$dataInternship->nameCompany.'</option>';
										$no++;	
									}
								}
							?>
						</select>
						<a class="login5" href="?p=studentcreate">
							<button class="btn btn-success" type="button">				
								<i class="fas fa-plus"></i>
							</button>
						</a>
					</div>
					<div class="form-group">
						<textarea class="form-control rounded-0" rows="3" placeholder="Tujuan" name="goal"></textarea>
					</div>

					<div class="form-group">
						<textarea class="form-control rounded-0" rows="3" placeholder="Ruang Lingkup" name="ruangLingkup"></textarea>
					</div>

					<div class="form-group">
						<textarea class="form-control rounded-0" rows="3" placeholder="Deskripsi Magang" name="jobDesc"></textarea>
					</div>

					<button class="btn btn-warning my-4 btn-block" type="submit" name="btnAdd">Submit</button>
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