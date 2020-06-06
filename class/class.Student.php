<?php 

class Student extends Connection{
	public $nim='';
	public $fname = '';
	public $lname = '';
	public $address = '';
	public $bdate = '';
	public $gender = '';
	public $telp = '';
	public $tahun = '';
	public $angkatan = '';
	public $id=0;
	public $idMajor=0;
	public $hasil = false;
	public $message ='';

	public function AddStudent(){
		$this->connect();

		$sql = "INSERT INTO student (nim,  fname, lname, address, bdate, gender, telp, tahun, angkatan)
		VALUES ('$this->nim', '$this->fname' '$this->lname', '$this->address', '$this->bdate', '$this->gender', '$this->telp', '$this->tahun', '$this->angkatan')";
		$this->hasil = mysqli_query($this->connection, $sql);

		if($this->hasil)
			$this->message ='Data berhasil ditambahkan!';					
		else
			$this->message ='Data gagal ditambahkan!';	
	}

	public function UpdateStudent(){
		$sql = "UPDATE student SET nim = '$this->nim', fname ='$this->fname', lname = '$this->lname', address = '$this->address', bdate = '$this->bdate', gender = '$this->gender', telp = '$this->telp', tahun = $this->tahun, angkatan = '$this->angkatan',	idMajor = $this->idMajor WHERE id = '$this->id'";

		$this->hasil = mysqli_query($this->connection, $sql);			

		if($this->hasil)
			$this->message ='Data berhasil diubah!';								
		else
			$this->message ='Data gagal diubah!';								
	}

	public function DeleteStudent(){
		$sql = "DELETE FROM student WHERE id = '$this->id'";

		$this->hasil = mysqli_query($this->connection, $sql);

		if($this->hasil)
			$this->message ='Data berhasil dihapus!';								
		else
			$this->message ='Data gagal dihapus!';
	}

	public function SelectOneStudent(){
		$this->connect();
		$sql = "SELECT * FROM v_student WHERE id = '$this->id'";

		$resultOne = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));	
		
		if(mysqli_num_rows($resultOne) == 1){
			$this->hasil = true;
			$data = mysqli_fetch_assoc($resultOne);
			$this->id = $data['id'];					
			$this->email=$data['email'];
			$this->password = $data['password'];
			$this->role=$data['role'];						
			$this->fname = $data['fname'];				
			$this->lname = $data['lname'];					
			$this->nim = $data['nim'];				
			$this->address = $data['address'];					
			$this->gender = $data['gender'];				
			$this->bdate = $data['bdate'];					
			$this->telp = $data['telp'];				
			$this->tahun = $data['tahun'];					
			$this->angkatan = $data['angkatan'];				
			$this->idMajor = $data['idMajor'];	
		}		
	}
}	 
?>
