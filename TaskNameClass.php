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
	}

?>