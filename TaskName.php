<?php
	class TaskName{
		var $taskID; 
		var $taskName; 
		
		
		function set_taskID($new_taskID){
			$this->taskID = $new_taskID;
		}
		function set_taskName($new_taskName){
			$this->taskName = $new_taskName;
		}
		
		function get_taskID(){
			return $this->taskID;
		}
		function get_taskName(){
			return $this->taskName;
		}
		
		/*function insert($cdb){
			
			echo $this->$taskName;
			$insTT = "INSERT INTO tasktable (taskName) VALUES ('$task')";
			if($row=mysqli_query($cdb, $insTT) === TRUE){
				echo "Successfully inserted"; 
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