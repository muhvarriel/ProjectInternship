<?php

include 'class.Student.php';
include 'class.Lecturer.php';

class User extends Connection{
	public $id='';
	public $email='';
	public $password='';	
	public $role='';	
	public $fname='';	
	public $lname='';	
	
	public $hasil= false;
	public $message ='';

	public function GetID(){
		$this->connect();

		$sql = "SELECT MAX(id) AS max FROM user";

		$result = mysqli_query($this->connection, $sql);

		if (mysqli_num_rows ($result) == 1){
			$this->hasil = true;			
			$data = mysqli_fetch_assoc($result);
			$this->id=$data['max'];
		}	
	}	

	public function AddUser(){
		$this->connect();
		$sql = "INSERT INTO user(id, email, password, role) values ('$this->id', '$this->email', '$this->password', '$this->role')";

		if($this->role == 'student') {
			$sql1 = "INSERT INTO student (fname, lname, id) VALUES ('$this->fname', '$this->lname', '$this->id');";
		} else {
			$sql1 = "INSERT INTO lecturer (fname, lname, id) VALUES ('$this->fname', '$this->lname', '$this->id');";
		}

		$this->hasil = mysqli_query($this->connection, $sql);
		$this->hasil = mysqli_query($this->connection, $sql1);

		if($this->hasil) {
			$this->message ='Data berhasil ditambahkan!';					
		} else {
			$this->message ='Data gagal ditambahkan!';	
		}
	}
	
	public function UpdateUser(){
		$this->connect();
		$sql = "UPDATE user 
		SET	password='$this->password'
		WHERE email = '$this->email'";					

		$this->hasil = mysqli_query($this->connection, $sql);			

		if($this->hasil)
			$this->message ='Data berhasil diubah!';								
		else
			$this->message ='Data gagal diubah!';								
	}


	public function DeleteUser(){
		$this->connect();
		$sql = "DELETE FROM user WHERE id=$this->id";
		$this->hasil = mysqli_query($this->connection, $sql);
		if($this->hasil)
			$this->message ='Data berhasil dihapus!';								
		else
			$this->message ='Data gagal dihapus!';
	}

	public function CheckRole($email){
		$this->connect();

		$sql = "SELECT role FROM user WHERE email = '$email'";

		$result = mysqli_query($this->connection, $sql);

		if (mysqli_num_rows ($result) == 1){
			$this->hasil = true;			
			$data = mysqli_fetch_assoc($result);
			$this->role=$data['role'];
		}	
	}	

	public function ValidateEmail($email, $role){
		$this->connect();

		if ($role == 'student') {
			$sql = "SELECT * FROM v_student WHERE email = '$email'";
		} else {
			$sql = "SELECT * FROM v_lecturer WHERE email = '$email'";
		}				

		$result = mysqli_query($this->connection, $sql);

		if (mysqli_num_rows ($result) == 1){
			$this->hasil = true;			
			$data = mysqli_fetch_assoc($result);	
			$this->id = $data['id'];					
			$this->email = $data['email'];
			$this->password = $data['password'];		
			$this->fname = $data['fname'];
			$this->lname = $data['lname'];
			$this->role=$data['role'];
			$this->idMajor=$data['idMajor'];
		}	
	}	
}
?>