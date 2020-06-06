<?php
class Task extends Connection {
	public $idTask = 0;
	public $list = '';
	public $startDate = '';
	public $endDate = '';
	public $status = '';
	public $note = '';
	public $id = '';
	public $idInternship = '';

	public $hasil = false;
	public $message = '';

	public function AddTask(){			
		$this->connect();

		$sql = "INSERT INTO task (list, startDate, endDate, status, id, idInternship) VALUES ('$this->list', '$this->startdate', '$this->enddate', '$this->status', '$this->id', '$this->idInternship')";

		$this->hasil = mysqli_query($this->connection, $sql);

		if($this->hasil) {
			$this->message ='Data berhasil ditambahkan!';					
		} else {
			$this->message ='Data gagal ditambahkan!';	
		}
	}

	public function UpdateTask(){
		$sql = "UPDATE task SET list = '$this->list', startDate = '$this->startDate', endDate = '$this->endDate', status = '$this->status' WHERE idTask = '$this->idTask'";

		$this->hasil = mysqli_query($this->connection, $sql);			

		if($this->hasil)
			$this->message ='Data berhasil diubah!';								
		else
			$this->message ='Data gagal diubah!';								
	}

	public function DeleteTask(){
		$sql = "DELETE FROM task WHERE idTask = '$this->idTask'";

		$this->hasil = mysqli_query($this->connection, $sql);

		if($this->hasil)
			$this->message ='Data berhasil dihapus!';								
		else
			$this->message ='Data gagal dihapus!';
	}

	public function SelectAllTask($id){
		$sql = "SELECT * FROM v_task WHERE idInternship = '$id'";
		$result = mysqli_query($this->connection, $sql);
		
		$arrResult = Array();
		$cnt=0;			
		if(mysqli_num_rows($result) > 0){	
			while ($data = mysqli_fetch_array($result)){
				$objTask = new Task(); 
				$objTask->idTask=$data['idTask'];
				$objTask->id=$data['id'];
				$objTask->list=$data['list'];
				$objTask->startDate=$data['startDate'];
				$objTask->endDate=$data['endDate'];
				$objTask->status =$data['status'];
				$objTask->note =$data['note'];
				$objTask->nameCompany =$data['nameCompany'];
				$arrResult[$cnt] = $objTask;
				$cnt++;
			}   
		}
		return $arrResult;	
	}

	public function SelectOneTask(){
		$this->connect();
		$sql = "SELECT * FROM v_task WHERE idTask = '$this->idTask'";

		$resultOne = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));	
		
		if(mysqli_num_rows($resultOne) == 1){
			$this->hasil = true;
			$data = mysqli_fetch_assoc($resultOne);
			$this->idTask=$data['idTask'];
			$this->id=$data['id'];
			$this->idInternship=$data['idInternship'];
			$this->list=$data['list'];
			$this->startDate=$data['startDate'];
			$this->endDate=$data['endDate'];
			$this->status =$data['status'];
			$this->note =$data['note'];
		}		
	}

	public function AddNote(){
		$sql = "UPDATE task SET note = '$this->note' WHERE idTask = '$this->idTask'";

		$this->hasil = mysqli_query($this->connection, $sql);

		if($this->hasil) {
			$this->message = 'Feedback Diberikan!';
		} else {
			$this->message = 'Feedback Gagal Diberikan!';
		}
	}
}
?>