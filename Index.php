<?php
$srvName = "localhost"; 
$usrName = "root"; 
$psWrd = ''; 
$tdtDB = "tododatabase";


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
	echo "Successfully created database"; 
}
else{ 
	echo "Error creating database" .$conn->error; 
}

$conTb = new mysqli($srvName, $usrName, $psWrd, $tdtDB);

if($conTb->connect_error)
		die ("Connection failed: " . $conTb->connect_error);  
	
$tdtTbl = "CREATE TABLE IF NOT EXISTS todotable
			(id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
			 taskName VARCHAR(30) NOT NULL, 
			 status VARCHAR(10) NOT NULL, 
			 dueDate TIMESTAMP NOT NULL
			 )";
if($conTb->query($tdtTbl) === TRUE){
	echo "Successfully created table";
}

$conTb->close();
$conDB->close();
?>