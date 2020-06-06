<?php
	class Internship extends Connection {
		public $idInternship = 0;
		public $idCompany = 0;
		public $topik = '';
		public $start = '';
		public $end = '';
		public $duration = '';
		public $background = '';
		public $goal = '';
		public $ruangLingkup = '';
		public $jobDesc = '';
		public $position = '';
		public $id = '';
		public $nameCompany = '';
		public $address = '';
		public $supervisor = '';
		public $profile = '';

		public $hasil = false;
		public $message = '';
		
		public function SelectInternshipWaiting($idMajor){
			$this->connect();
			$sql = "SELECT * FROM v_internship WHERE idMajor = '$idMajor' AND status = 'Waiting'";			
			$result = mysqli_query($this->connection, $sql);	
			
			$arrResult = Array();
			$cnt=0;			
			if(mysqli_num_rows($result) > 0){	
				while ($data = mysqli_fetch_array($result)){
					$objInternship = new Internship(); 
					$objInternship->idInternship=$data['idInternship'];
					$objInternship->name=$data['name'];
					$objInternship->tahun=$data['tahun'];
					$objInternship->angkatan=$data['angkatan'];
					$objInternship->nameMajor =$data['nameMajor'];
					$objInternship->topik =$data['topik'];
					$objInternship->ruangLingkup =$data['ruangLingkup'];
					$objInternship->nameCompany =$data['nameCompany'];
					$arrResult[$cnt] = $objInternship;
					$cnt++;
				}   
			}
			return $arrResult;	
		}

		public function AddCompany(){			
			$this->connect();
			$sql = "INSERT INTO company (nameCompany, address, supervisor, profile) VALUES ('$this->nameCompany', '$this->address', '$this->supervisor', '$this->profile')";

			$this->hasil = mysqli_query($this->connection, $sql);

			if($this->hasil) {
				$this->message ='Company Data berhasil ditambahkan!';					
			} else {
				$this->message ='Company Data gagal ditambahkan!';	
			}
		}


		public function AddInternship(){			
			$this->connect();

			$sql = "INSERT INTO internship (topik, startTime, endTime, duration, background, goal, ruangLingkup, jobDesc, position, status, id, idCompany) VALUES ('$this->topik', '$this->stime', '$this->send', '$this->duration', '$this->background', '$this->goal', '$this->ruangLingkup', '$this->jobDesc', '$this->position', 'Waiting', '$this->id', '$this->idCompany')";

			$this->hasil = mysqli_query($this->connection, $sql);

			if($this->hasil) {
				$this->message ='Internship Data berhasil ditambahkan!';					
			} else {
				$this->message ='Internship gagal ditambahkan!';	
			}
		}

		public function UpdateInternship(){
			$sql = "UPDATE Internship SET password ='$this->password' WHERE email = '$this->email'";

			$this->studenthome = mysqli_query($this->connection, $sql);

			if($this->studenthome) {
				$this->message = 'Password Berhasil Diubah!';
			} else {
				$this->message = 'Password Gagal Diubah!';
			}
		}

		public function DeleteInternship(){
			$sql = "DELETE FROM Internship WHERE idInternship = '$this->idIntership'";

			$this->studenthome = mysqli_query($this->connection, $sql);

			if($this->studenthome) {
				$this->message = 'Data berhasil dihapus!';
			} else {
				$this->message = 'Data gagal dihapus!';
			}
		}
		
		public function SelectAllCompany(){
			$this->connect();
			$sql = "SELECT * FROM company";			
			$result = mysqli_query($this->connection, $sql);	
			
			$arrResult = Array();
			$cnt=0;			
			if(mysqli_num_rows($result) > 0){	
				while ($data = mysqli_fetch_array($result)){
					$objInternship = new Internship(); 
					$objInternship->idCompany=$data['idCompany'];
					$objInternship->nameCompany =$data['nameCompany'];
					$objInternship->address=$data['address'];
					$objInternship->supervisor=$data['supervisor'];
					$objInternship->profile=$data['profile'];
					$arrResult[$cnt] = $objInternship;
					$cnt++;
				}   
			}
			return $arrResult;	
		}

		public function SelectOneCompany(){
			$this->connect();
			$sql = "SELECT * FROM company WHERE nameCompany = '$this->nameCompany'";

			$resultOne = mysqli_query($this->connection, $sql) or die(mysqli_error($this->connection));	
			
			if(mysqli_num_rows($resultOne) == 1){
				$this->hasil = true;
				$data = mysqli_fetch_assoc($resultOne);
				$this->idCompany=$data['idCompany'];
				$this->nameCompany=$data['nameCompany'];
				$this->address=$data['address'];
				$this->supervisor=$data['supervisor'];
				$this->profile=$data['profile'];
			}		
		}

		public function SelectStudentAccept($id){
			$sql = "SELECT * FROM v_internship WHERE id = '$id' AND status = 'Accept'";				
			$result = mysqli_query($this->connection, $sql);	
			
			$arrResult = Array();
			$cnt=0;			
			if(mysqli_num_rows($result) > 0){	
				while ($data = mysqli_fetch_array($result)){
					$objInternship = new Internship(); 
					$objInternship->idInternship=$data['idInternship'];
					$objInternship->name=$data['name'];
					$objInternship->tahun=$data['tahun'];
					$objInternship->angkatan=$data['angkatan'];
					$objInternship->nameMajor =$data['nameMajor'];
					$objInternship->topik =$data['topik'];
					$objInternship->ruangLingkup =$data['ruangLingkup'];
					$objInternship->nameCompany =$data['nameCompany'];
					$arrResult[$cnt] = $objInternship;
					$cnt++;
				}   
			}
			return $arrResult;	
		}

		public function SelectInternshipAccept($idMajor){
			$sql = "SELECT * FROM v_internship WHERE idMajor = '$idMajor' AND status = 'Accept'";				
			$result = mysqli_query($this->connection, $sql);	
			
			$arrResult = Array();
			$cnt=0;			
			if(mysqli_num_rows($result) > 0){	
				while ($data = mysqli_fetch_array($result)){
					$objInternship = new Internship(); 
					$objInternship->idInternship=$data['idInternship'];
					$objInternship->name=$data['name'];
					$objInternship->tahun=$data['tahun'];
					$objInternship->angkatan=$data['angkatan'];
					$objInternship->nameMajor =$data['nameMajor'];
					$objInternship->topik =$data['topik'];
					$objInternship->ruangLingkup =$data['ruangLingkup'];
					$objInternship->nameCompany =$data['nameCompany'];
					$arrResult[$cnt] = $objInternship;
					$cnt++;
				}   
			}
			return $arrResult;	
		}

		public function SelectInternshipReject($idMajor){
			$sql = "SELECT * FROM v_internship WHERE idMajor = '$idMajor' AND status = 'Reject'";				
			$result = mysqli_query($this->connection, $sql);	
			
			$arrResult = Array();
			$cnt=0;			
			if(mysqli_num_rows($result) > 0){	
				while ($data = mysqli_fetch_array($result)){
					$objInternship = new Internship(); 
					$objInternship->idInternship=$data['idInternship'];
					$objInternship->name=$data['name'];
					$objInternship->tahun=$data['tahun'];
					$objInternship->angkatan=$data['angkatan'];
					$objInternship->nameMajor =$data['nameMajor'];
					$objInternship->topik =$data['topik'];
					$objInternship->ruangLingkup =$data['ruangLingkup'];
					$objInternship->nameCompany =$data['nameCompany'];
					$arrResult[$cnt] = $objInternship;
					$cnt++;
				}   
			}
			return $arrResult;	
		}

		public function AcceptInternship(){
			$sql = "UPDATE internship SET status = 'Accept' WHERE idInternship = '$this->idInternship'";

			$this->hasil = mysqli_query($this->connection, $sql);

			if($this->hasil) {
				$this->message = 'Internship Diterima!';
			} else {
				$this->message = 'Internship Gagal Diterima!';
			}
		}

		public function RejectInternship(){
			$sql = "UPDATE internship SET status = 'Reject' WHERE idInternship = '$this->idInternship'";

			$this->hasil = mysqli_query($this->connection, $sql);

			if($this->hasil) {
				$this->message = 'Internship Ditolak!';
			} else {
				$this->message = 'Internship Gagal Ditolak!';
			}
		}
		
		public function SelectInternshipDownload(){
			$this->connect();
			$sql = "SELECT * FROM v_internship WHERE idInternship = '$this->idInternship'";			
			$resultOne = mysqli_query($this->connection, $sql);	
			
			if(mysqli_num_rows($resultOne) == 1){
				$this->hasil = true;
				$data = mysqli_fetch_assoc($resultOne);
				$this->idInternship=$data['idInternship'];
				$this->topik=$data['topik'];
				$this->startTime=$data['startTime'];
				$this->endTime=$data['endTime'];
				$this->duration =$data['duration'];
				$this->background =$data['background'];
				$this->goal=$data['goal'];
				$this->ruangLingkup=$data['ruangLingkup'];
				$this->jobDesc =$data['jobDesc'];
				$this->position=$data['position'];
				$this->status =$data['status'];
				$this->id=$data['id'];
				$this->idCompany=$data['idCompany'];
				$this->name=$data['name'];
				$this->address =$data['address'];
				$this->bdate =$data['bdate'];
				$this->gender=$data['gender'];
				$this->tahun =$data['tahun'];
				$this->angkatan =$data['angkatan'];
				$this->nameMajor =$data['nameMajor'];
				$this->nameCompany =$data['nameCompany'];
				$this->supervisor =$data['supervisor'];
				$this->profile =$data['profile'];
			}		
		}
	}
?>