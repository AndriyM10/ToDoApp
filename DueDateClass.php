<?php
	class DueDate{
		var $ddID; 
		var $dueDate; 
		
		
		function set_ddID($new_ddID){
			$this->ddID = $new_ddID;
		}
		function set_dueDate($new_dueDate){
			$this->dueDate = $new_dueDate;
		}
		
		function get_ddID(){
			return $this->ddID;
		}
		function get_dueDate(){
			return $this->dueDate;
		}
	}

?>