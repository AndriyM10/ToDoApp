

<?php

class dataBase{ 
		
	function conServer(){
		$srvName = "localhost"; 
		$usrName = "root"; 
		$psWrd = ''; 
		
		//create connection 
		$conServ = new mysqli($srvName, $usrName, $psWrd); 
		//check connection 
		if($conServ->connect_error){ 
			echo "connection failed: ".$conServ->connect_error;
		}
		else{
		//	echo "connection successful<br>";
		}
		
		return $conServ;
		
	}
	function create($conServ){
		
		$tdDB = "CREATE DATABASE IF NOT EXISTS tododatabase";
		if($conServ->query($tdDB) === TRUE){
			//echo "Successfully created database<br>"; 
		}
		else{ 
			echo "Error creating database" .$conServ->error; 
		}

		//create a connection 
		if($conServ->query("use tododatabase") === TRUE){
			//echo "connection was successful";
		}
		else{
			echo "Connection failed: " . $conServ->connect_error;  
		}
		//creating tables and relationships 
		$tTbl = "CREATE TABLE IF NOT EXISTS taskTable
				(taskId INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
				 taskName VARCHAR(30) NOT NULL, 
				 taskDescription VARCHAR(200) NOT NULL
				 )";
		if($conServ->query($tTbl) === TRUE){
			//echo "Successfully created table taskTable<br>";
		}
		else{
			echo "Error creating database" .$conDB->error; 
		}

		$sTbl = "CREATE TABLE IF NOT EXISTS statusTable
				(statusId INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				 taskId INT,
				 FOREIGN KEY (taskId) REFERENCES taskTable(taskId),
				 status VARCHAR(10) NOT NULL
				)";
		if($conServ->query($sTbl) === TRUE){
			//echo "Successfully created table statusTable<br>";
		}
		else{
			echo "Error creating database" .$conDB->error; 
		}


		$dueTbl = "CREATE TABLE IF NOT EXISTS dueTable
				(dueDateId INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
				 taskId INT,
				 FOREIGN KEY (taskId) REFERENCES taskTable(taskId),
				 dueDate TIMESTAMP NOT NULL
				 )";
		if($conServ->query($dueTbl) === TRUE){
			//echo "Successfully created table dueTable<br>";
		}
		else{
			echo "Error creating database" .$conDB->error; 
		}
	}
	function get_conDB($conServ){
				if($conServ->query("use tododatabase") === TRUE){
			//echo "connection was successful";
		}
		else{
			echo "Connection failed: " . $conServ->connect_error;  
		}
		return $conServ; 
	}
	
	function insert($conServ, $taskN, $status, $dDate){
		
		$task = $taskN->get_taskName(); 
		$taskDescr = $taskN->get_taskDescr(); 
		$stat = $status->get_status(); 
		$date = $dDate->get_dueDate();
		
		$cdb = $this->get_conDB($conServ); 
		$insTT = "INSERT INTO tasktable (taskName, taskDescription) VALUES ('$task', '$taskDescr')";

		if($row=mysqli_query($cdb, $insTT) === TRUE){
			$lastID = $cdb->insert_id; 
			//echo "Inserted into table, last ID: ".$lastID; 
			
			$insStat = "INSERT INTO statustable (taskId, status) VALUES ('$lastID','$stat')";
			$insTime = "INSERT INTO duetable (taskId, dueDate) VALUES ('$lastID','$date')";
			
			if(($row=mysqli_query($cdb, $insStat) === TRUE) && ($row=mysqli_query($cdb, $insTime) === TRUE)){
			//	echo "<br>"; 
			//	echo "Successfully inserted into other two table" ;
			}
			else{ 
			echo "Error: " .$cdb->error;  
			}
		}
		else{ 
			echo "Error: " .$cdb->error;  
		} 
	}
	
	
	function remove($conServ, $taskN){
		$cdb = $this->get_conDB($conServ);
		$taskID = $taskN->get_taskID();
		$checkT = "SELECT * FROM tasktable WHERE tasktable.taskId = '$taskID' "; 
		$delRowT = "DELETE FROM tasktable WHERE tasktable.taskId = '$taskID' ";
		$delRowS = "DELETE FROM statustable WHERE statustable.taskId = '$taskID' ";
		$delRowD = "DELETE FROM duetable WHERE duetable.taskId = '$taskID' ";
		$check = 0; 
		$strCnt = mysqli_query($cdb, $checkT);
		while ($row = mysqli_fetch_assoc($strCnt)){ 
		$check++;
		}
		if($check == 0){
			echo "<h2>Task ID: ".$taskID. " Is Invalid</h2>";
		}	
		else{
			if(($row=mysqli_query($cdb, $delRowT) === TRUE)&& ($row=mysqli_query($cdb, $delRowS) === TRUE) && ($row=mysqli_query($cdb, $delRowD) === TRUE)){ 
				echo "<h4>Task ID: ".$taskID. " Item Deleted</h4>";
			}
		}
	}
	
	function update($conServ, $taskN, $status, $dDate ){
		$cdb = $this->get_conDB($conServ); 
		$taskID = $taskN->get_taskID();
		$task = $taskN->get_taskName();
		$taskDescr = $taskN->get_taskDescr();
		$stat = $status->get_status(); 
		$date = $dDate->get_dueDate();
		
		$checkT = "SELECT * FROM tasktable WHERE tasktable.taskId = '$taskID' "; 
		$delRowT = "UPDATE tasktable SET tasktable.taskName = '$task', tasktable.taskDescription = '$taskDescr' WHERE tasktable.taskId = '$taskID' ";
		$delRowS = "UPDATE statustable SET statustable.status = '$stat' WHERE statustable.taskId = '$taskID' ";
		$delRowD = "UPDATE duetable SET duetable.dueDate = '$date' WHERE duetable.taskId = '$taskID' ";
		
		$check = 0; 
		$strCnt = mysqli_query($cdb, $checkT);
		while ($row = mysqli_fetch_assoc($strCnt)){ 
		$check++;
		}
		if($check == 0){
			echo "<h2>Task ID: ".$taskID. " Is Invalid</h2>";
		}	
		else{
			if(($row=mysqli_query($cdb, $delRowT) === TRUE)&& ($row=mysqli_query($cdb, $delRowS) === TRUE) && ($row=mysqli_query($cdb, $delRowD) === TRUE)){ 
				echo "<h4>Task ID: ".$taskID. " Items Updated</h4>";
			}
		}
	}
}


?>