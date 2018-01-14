<?php
	class Status{
		var $statusID; 
		var $status; 
		
		
		function set_statusID($new_statusID){
			$this->statusID = $new_statusID;
		}
		function set_status($new_status){
			$this->status = $new_status;
		}
		
		function get_statusID(){
			return $this->statusID;
		}
		function get_status(){
			return $this->status;
		}
		/*
		function insert($cdb, $lastID){
			$insStat = "INSERT INTO statustable (taskId, status) VALUES ('$lastID','$stat')";
			if($row=mysqli_query($cdb, $insStat) === TRUE){
				echo "Successfully inserted into status"; 
			}
			else{
					echo "Error: " .$cdb->error; 
			}
		}
		
		function remove(){
			
		}
		
		function update(){
		
		}
		*/
	}

?>