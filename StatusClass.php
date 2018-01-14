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
	}

?>