<html> 

<?php
include("DatabaseClass.php");
include("TaskNameClass.php"); 
include("StatusClass.php"); 
include("DueDateClass.php");

$db = new dataBase();
$cSer = $db->conServer();

$taskN = new TaskName(); 

?>

<head>

</head>
<body> 
<title> Delete Task </title> 
<link rel="stylesheet" type="text/css" href="todoCSS">
<h1> Deleting A Task</h1>

<form action="deletePHP.php" method="POST">
<h4> Task ID: 
<input type="text" name="taskID" />
<input type="submit" value="submit" />
</h4>
<button type="button" onclick="window.location.href='Index.php'"> HOME PAGE </button>

</form> 
	
<?php 
if(isset($_POST['taskID'])){
	$taskN->set_taskID($_POST['taskID']);
	//echo $taskId; 
	$db->remove($cSer, $taskN);
}
?>
<table> 
	<tr class="status">
	<th> Task ID</th>
	<th> Task Name</th>
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
		echo "<td>".$row['status']."</td>";
		echo "<td>".$row['dueDate']."</td>";
		echo "</tr>";
	}
	?>
</table>
	
<body>
</html> 