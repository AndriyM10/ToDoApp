<?php
$srvName = "localhost"; 
$usrName = "root"; 
$psWrd = ''; 

//create connection 
$conDB = new mysqli($srvName, $usrName, $psWrd); 
//check connection 
/*if($conDB->connect_error){ 
	die("connection failed: " );
}
else{
	die("connection successful");
}
*/
$tdtDB = "CREATE DATABASE IF NOT EXISTS tododatabase";
if($conDB->query($tdtDB)===TRUE){
	echo "Successfully created database<br>"; 
}
else{ 
	echo "Error creating database" .$conn->error; 
}

$conTb = new mysqli($srvName, $usrName, $psWrd, "tododatabase");

if($conTb->connect_error)
		die ("Connection failed: " . $conTb->connect_error);  
	
$tTbl = "CREATE TABLE IF NOT EXISTS taskTable
			(taskId INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
			 taskName VARCHAR(40) NOT NULL 
			 )";
if($conTb->query($tTbl) === TRUE){
	echo "Successfully created table taskTable<br>";
}

$sTbl = "CREATE TABLE IF NOT EXISTS statusTable
		(statusId INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		 taskId INT,
		 FOREIGN KEY (taskId) REFERENCES taskTable(taskId),
		 status VARCHAR(10) NOT NULL
		)";
if($conTb->query($sTbl) === TRUE){
	echo "Successfully created table statusTable<br>";
}


$dueTbl = "CREATE TABLE IF NOT EXISTS dueTable
			(dueDateId INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
			 dueDate TIMESTAMP NOT NULL
			 )";
if($conTb->query($dueTbl) === TRUE){
	echo "Successfully created table dueTable<br>";
}


$conTb->close();
$conDB->close();
?>