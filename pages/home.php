<div class="container-fluid">
	<section class="col-4 login justify-content-center">
		<div class="lo0">
			<p>Internship VG System</p>
		</div>
		<form class="login form-inline" action="?p=login" method="post">
			<?php 
			if(isset($_GET['pesan'])){
				if($_GET['pesan']=="gagal"){
					echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
				}
			}
			?>
			<div class="login0">
				<span>Username</span>
				<input class="log" type="text" name="email" required="required">
			</div>
			<div class="login0">
				<span>Password</span>
				<div>
					<input id="password-field" class="log" type="password" name="password" required="required">
				</div>
			</div>

			<a class="login5 col-6" href="?p=register"><span class="create">Create An Account</span></a>
			<a class="login5 col-6" data-toggle="modal" data-target="#forgot" href=""><span class="forgot">Forgot Password</span></a>

			<input class="log submit1" type="submit" name="btnLogin" value="Sign In">
		</form>
	</section>

	<?php
	require_once('./class/class.User.php');
	$objUser = new User();

	if (isset($_POST['btnUpdate'])) {
		$objUser->email = $_POST['email'];
		$password = $_POST['password'];
		$objUser->password = password_hash($password, PASSWORD_DEFAULT);

		$objUser->UpdateUser();

		echo "<script> alert('$objUser->message'); </script>";

		if ($objUser->hasil) {
			echo '<script> window.location = "index.php?p=home"; </script>';
		}
	}
	?>
	<div id="forgot" class="rounded modal fade" role="dialog">
		<div class="modal-dialog">

			<div class="modal-content">
				<form class="login form-inline" action="" method="post">
					<h4 class="mb-4"><strong>Forgot Password</strong></h4>
					<div class="login0">
						<span>Username</span>
						<input class="log" type="text" name="email">
					</div>
					<div class="login0">
						<span>Password</span>
						<input class="log" type="text" name="password">
					</div>

					<div class="mt-4">
						<input type="submit" class="btn btn-success" value="Edit" name="btnUpdate">
						<button type="button" class="btn btn-danger ml-2" data-dismiss="modal">Cancel</button>
					</div>
				</form>
			</div>
		</div>
	</div>

</div>