<?php
require_once('./class/class.User.php');
require_once('./class/class.Mail.php');

if (isset($_POST['btnAdd'])) {
	$email = $_POST['email'];
	$role = $_POST['role'];
	
	$objUser = new User();

	$objUser->ValidateEmail($email, $role);		
	$objUser->hasil = false;

	if ($objUser->hasil) {
		echo "<script>alert('Email sudah terdaftar');</script>";
	} else {
		$objUser->GetID();

		$x = $objUser->id;
		$y = 1;

		$objUser->id = $x + $y;

		$objUser->email = $_POST['email'];
		$password = $_POST['password'];
		$objUser->password = password_hash($password, PASSWORD_DEFAULT);
		$objUser->role = $_POST['role'];
		$objUser->fname = $_POST['fname'];
		$objUser->lname = $_POST['lname'];
		$objUser->AddUser();

		if($objUser->hasil){			
			$message =  file_get_contents('templateemail.html');  					 
			$header = "Registrasi berhasil";
			$body = '<span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
			Selamat <b>' .$objUser->fname.' ' .$objUser->lname.'</b>, anda telah terdaftar pada sistem company online ESQ Business School.<br>
			Berikut ini informasi account anda:<br>
			</span>
			<span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
			Username : '.$objUser->email.'<br>
			Password : '.$password.'
			</span>';
			$footer ='Silakan login untuk mengakses sistem';

			$message = str_replace("#header#",$header,$message);
			$message = str_replace("#body#",$body,$message);
			$message = str_replace("#footer#",$footer,$message);

			$objMail = new Mail();
			$objMail->SendMail($objUser->email, $objUser->fname, $objUser->lname, 'Registrasi berhasil', $message);		
			echo "<script> alert('Registrasi berhasil'); </script>";
			echo '<script> window.location="index.php?p=home"; </script>'; 				
		}	
	}
}
?>

<div id="create">
	<form class="logincreate form-inline" action="" method="post">
		<h4 class="mb-4"><strong>Create An Account</strong></h4>
		<div class="login0">
			<span>Username</span>
			<input class="log" type="text" name="email">
		</div>
		<div class="login0">
			<span>Password</span>
			<input class="log" type="text" name="password">
		</div>
		<select class="col-12 browser-default custom-select my-3" name="role">
			<option value="student">Student</option>
			<option value="supervisor">Supervisor</option>
		</select>
		<div class="login0">
			<span>First Name</span>
			<input class="log" type="text" name="fname">
		</div>
		<div class="login0">
			<span>Last Name</span>
			<input class="log" type="text" name="lname">
		</div>

		<div>
			<input type="submit" class="btn btn-success" value="Register" name="btnAdd">
			<a href="index.php?p=home"><button type="button" class="btn btn-danger ml-2">Cancel</button></a>
		</div>
	</form>
</div>