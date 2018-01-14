<?php
	class TaskName{
		var $taskID; 
		var $taskName; 
		var $taskDescr;
		
		
		function set_taskID($new_taskID){
			$this->taskID = $new_taskID;
		}
		function set_taskName($new_taskName){
			$this->taskName = $new_taskName;
		}
		function set_taskDescr($new_taskDescr){
			$this->taskDescr = $new_taskDescr;
		}
		
		function get_taskID(){
			return $this->taskID;
		}
		function get_taskName(){
			return $this->taskName;
		}
		function get_taskDescr(){
			return $this->taskDescr;
		}
	}

?>