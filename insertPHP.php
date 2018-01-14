<html> 

<?php
include("DatabaseClass.php");
include("TaskNameClass.php"); 
include("StatusClass.php"); 
include("DueDateClass.php");


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
<h1> To Do Task Application </h1>

<form action="insertPHP.php" method="POST">
<h3>
<legend class="legend"> New Task Information</legend> 
</h3>
<h4> Task Name: 
<input type="text" required="required" name="taskName" />
</h4>
<h4> Task Description: </h4>
<textarea name="taskDescr" required="required" rows="5" cols="50"></textarea>
<h4> Status:
	<select name="status" required="required">
	<option value=""> </option>
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

	if((isset($_POST['taskName'])) && (isset($_POST['taskDescr'])) &&  (isset($_POST['status'])) && (isset($_POST['dDate']))){
		$taskN->set_taskName($_POST['taskName']);
		$taskN->set_taskDescr($_POST['taskDescr']);
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