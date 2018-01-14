<html> 

<?php
include("DatabasePHP.php");
include("TaskName.php"); 
include("Status.php"); 
include("DueDate.php"); 


$db = new dataBase();
$cSer = $db->conServer();


$taskN = new TaskName(); 
$status = new Status(); 
$dDate = new DueDate(); 

?>
<head>
<title> Insert Task </title> 
<link rel="stylesheet" type="text/css" href="todoCSS">

</head>
<body> 
<h1> Adding A Task </h1>

<form action="insertPHP.php" method="POST">
<h4> Task Name: 
<input type="text" required="required" name="taskName" />
</h4>
<h4> Status:
	<select name="status" required="required">
	<option value="started">Started</option>
	<option value="pending">Pending</option>
	<option value="completed">Completed</option>
	<option value="late">Late</option>
	</select> 
</h4>
<h4> Due Date: 
<input type="date" required="required" name="dDate" />
</h4>
<input type="submit" value="submit" />
<button type="button" onclick="window.location.href='Index.php'"> HOME PAGE </button>

<?php

	if((isset($_POST['taskName']))&&(isset($_POST['status'])) && (isset($_POST['dDate']))){
		$taskN->set_taskName($_POST['taskName']);
		$status->set_status($_POST['status']); 
		$dDate->set_dueDate($_POST['dDate']); 
		
		$cdb = $db->get_conDB($cSer);

		$db->insert($cSer, $taskN, $status, $dDate); 
		header("refresh:0; url=Index.php");
	}

else{ 

}
?>
</form> 


<body>
</html> 