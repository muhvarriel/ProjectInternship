<?php
class Major extends Connection {
	public $idMajor = 0;
	public $nameMajor = '';
	public $id = '';

	public $hasil = false;
	public $message = '';

	public function AddMajor(){			
		$this->connect();

		$sql = "INSERT INTO major (nameMajor, id) VALUES ('$this->nameMajor', '$this->id')";

		$this->hasil = mysqli_query($this->connection, $sql);

		if($this->hasil) {
			$this->message ='Data berhasil ditambahkan!';					
		} else {
			$this->message ='Data gagal ditambahkan!';	
		}
	}

	public function UpdateMajor(){
		$sql = "UPDATE major SET nameMajor = '$this->nameMajor', id = '$this->id' WHERE idMajor = '$this->idMajor'";

		$this->hasil = mysqli_query($this->connection, $sql);			

		if($this->hasil)
			$this->message ='Data berhasil diubah!';								
		else
			$this->message ='Data gagal diubah!';								
	}

	public function DeleteMajor(){
		$sql = "DELETE FROM major WHERE idMajor = '$this->idMajor'";

		$this->hasil = mysqli_query($this->connection, $sql);

		if($this->hasil)
			$this->message ='Data berhasil dihapus!';								
		else
			$this->message ='Data gagal dihapus!';
	}

	public function SelectAllMajor(){
		$sql = "SELECT * FROM major";
		$result = mysqli_query($this->connection, $sql);
		
		$arrResult = Array();
		$cnt=0;			
		if(mysqli_num_rows($result) > 0){	
			while ($data = mysqli_fetch_array($result)){
				$objMajor = new Major(); 
				$objMajor->idMajor=$data['idMajor'];
				$objMajor->nameMajor=$data['nameMajor'];
				$objMajor->id=$data['id'];
				$arrResult[$cnt] = $objMajor;
				$cnt++;
			}   
		}
		return $arrResult;	
	}

	public function SelectOneMajor(){
		$this->connect();
		$sql = "SELECT * FROM major WHERE idMajor = '$this->idMajor'";

		$resultOne = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));	
		
		if(mysqli_num_rows($resultOne) == 1){
			$this->hasil = true;
			$data = mysqli_fetch_assoc($resultOne);
			$this->idMajor=$data['idMajor'];
			$this->nameMajor=$data['nameMajor'];
			$this->id =$data['id'];
		}		
	}
}
?>