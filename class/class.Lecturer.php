<?php 

class Lecturer extends Connection{
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

	public function AddLecturer(){
		$this->connect();

		$sql = "INSERT INTO lecturer (nidn,  fname, lname, address, gender, telp)
		VALUES ('$this->nidn', '$this->fname' '$this->lname', '$this->address', '$this->gender')";
		$this->hasil = mysqli_query($this->connection, $sql);

		if($this->hasil)
			$this->message ='Data berhasil ditambahkan!';					
		else
			$this->message ='Data gagal ditambahkan!';	
	}

	public function UpdateLecturer(){
		$sql = "UPDATE lecturer SET nidn = '$this->nidn', fname ='$this->fname', lname = '$this->lname', address = '$this->address', gender = '$this->gender', telp = '$this->telp', idMajor = $this->idMajor WHERE id = '$this->id'";

		$this->hasil = mysqli_query($this->connection, $sql);			

		if($this->hasil)
			$this->message ='Data berhasil diubah!';								
		else
			$this->message ='Data gagal diubah!';								
	}

	public function DeleteLecturer(){
		$sql = "DELETE FROM lecturer WHERE id = '$this->id'";

		$this->hasil = mysqli_query($this->connection, $sql);

		if($this->hasil)
			$this->message ='Data berhasil dihapus!';								
		else
			$this->message ='Data gagal dihapus!';
	}

	public function SelectOneLecturer(){
		$this->connect();
		$sql = "SELECT * FROM v_lecturer WHERE id = '$this->id'";

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
			$this->nidn = $data['nidn'];				
			$this->address = $data['address'];					
			$this->gender = $data['gender'];				
			$this->telp = $data['telp'];						
			$this->idMajor = $data['idMajor'];	
		}		
	}
}	 
?>
