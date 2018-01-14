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
<title> Update Task </title> 
<link rel="stylesheet" type="text/css" href="todoCSS">

</head>
<body> 
<h1> To DO Task Application</h1> 

<br></br>
<form action="updatePHP.php" method="POST">
<h3>
<legend > Update Task </legend> 
</h3>
<h4>Row To Be Changed Task ID:
<input type="text" required="required" name="taskID"
</h4>
<h4> New Task Name:
<input type="text" required="required" name="taskName" />
<h4> Task Description: </h4>
<textarea name="taskDescr" required="required" rows="5" cols="50"></textarea>
</h4>
<h4> New Status:
	<select name="status" required="required">
	<option value=""> </Option> 
	<option value="started">Started</option>
	<option value="pending">Pending</option>
	<option value="completed">Completed</option>
	<option value="late">Late</option>
	</select> 
</h4>
<h4> New Due Date: 
<input type="date" required="required" name="dDate" />
</h4>
<input type="submit" value="submit" />
<button type="button" onclick="window.location.href='Index.php'"> HOME PAGE </button>
</form>

<?php 

if((isset($_POST['taskID'])) &&(isset($_POST['taskDescr'])) && (isset($_POST['taskName'])) && (isset($_POST['status'])) && (isset($_POST['dDate']))){
		$taskN->set_taskID($_POST['taskID']);
		$taskN->set_taskName($_POST['taskName']);
		$taskN->set_taskDescr($_POST['taskDescr']);
		$status->set_status($_POST['status']); 
		$dDate->set_dueDate($_POST['dDate']); 
		
				
		$db->update($cSer, $taskN, $status, $dDate);
}
?>
<table> 
	<tr class="status">
	<th> Task ID</th>
	<th> Task Name</th>
	<th> Task Description</th>
	<th> Status </th>
	<th> Due Date</th>	
	</tr>
	<?php
	$cdb = $db->get_conDB($cSer);
	$queryT = "SELECT * FROM tasktable, statustable, duetable WHERE tasktable.taskId = statustable.taskId AND tasktable.taskId = duetable.taskId GROUP BY tasktable.taskId";
	$result = mysqli_query($cdb, $queryT);
	while ($row = mysqli_fetch_assoc($result)){
		echo "<tr>";
		echo "<td>".$row['taskId']."</td>";
		echo "<td>".$row['taskName']."</td>";
		echo "<td>".$row['taskDescription']."</td>";
		echo "<td>".$row['status']."</td>";
		echo "<td>".$row['dueDate']."</td>";
		echo "</tr>";
	}
	?>
</table>

<body>
</html> 