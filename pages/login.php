<?php 
require_once('./class/class.User.php'); 		

if(isset($_POST['btnLogin'])){		
    
	$email = $_POST['email'];
	$password = $_POST['password'];	

    $objUser = new User();
	$objUser->CheckRole($email);

	$role = $objUser->role;

	$objUser->ValidateEmail($email, $role);
		
	if($objUser->hasil){
		
		$ismatch = password_verify($password, $objUser->password);
		
		if($ismatch){
			if (!isset($_SESSION)) {
				session_start();
			}	
		
			$_SESSION["id"]= $objUser->id;
			$_SESSION["role"]= $objUser->role;
			$_SESSION["fname"]= $objUser->fname;
			$_SESSION["lname"]= $objUser->lname;
			$_SESSION["email"]= $objUser->email;	
			$_SESSION["idMajor"]= $objUser->idMajor;			
				
			if($objUser->role == 'student')
				echo '<script>window.location = "?p=studenthome";</script>';
			else if($objUser->role == 'supervisor')
				echo '<script>window.location = "?p=dosenhome";</script>';
			else if($objUser->role == 'head')
				echo '<script>window.location = "?p=headhome";</script>';
		}
		else{
			echo "<script>alert('Password tidak match');</script>";			
			echo '<script>window.location = "?p=home";</script>';						
		}
	}
	else{
		echo "<script>alert('Email tidak terdaftar');</script>";	
		echo '<script>window.location = "?p=home";</script>';						
	} 	
}  
?>