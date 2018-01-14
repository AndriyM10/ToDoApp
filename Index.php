<html> 

<?php
include("DatabasePHP.php"); 

$db = new dataBase();
$cSer = $db->conServer();
$db->create($cSer);
$cdb = $db->get_conDB($cSer);
if($cdb->connect_error){ 
echo "connection failed: ".$conServ->connect_error;
}
 
?>

<head>
<title> To Do Tasks </title> 
<link rel="stylesheet" type="text/css" href="todoCSS">

</head>
<body> 
<p class="emtpySpaceHeader"></p> 
<h1> To Do Tasks Application </h1>
<p class="emptySpace"></p> 

<div class="row">
	<div class="column1">
		<button type="button" class="status" > STARTED </button>
		<?php
		$numStr = 0; 
		$queryCntStr = "SELECT * FROM statustable WHERE statustable.status='started'";
		$strCnt = mysqli_query($cdb, $queryCntStr);
		while ($row = mysqli_fetch_assoc($strCnt)){ 
		$numStr++;
		}
		echo "(".$numStr.")"; 
        ?>		
		<button type="button" class="status"> PENDING </button>
		<?php
		$numPnd = 0; 
		$queryCntStr = "SELECT * FROM statustable WHERE statustable.status='pending'";
		$strCnt = mysqli_query($cdb, $queryCntStr);
		while ($row = mysqli_fetch_assoc($strCnt)){ 
		$numPnd++;
		}
		echo "(".$numPnd.")"; 
        ?>	
		<button type="button" class="status"> COMPLETED </button> 
		<?php
		$numCmp = 0; 
		$queryCntStr = "SELECT * FROM statustable WHERE statustable.status='completed'";
		$strCnt = mysqli_query($cdb, $queryCntStr);
		while ($row = mysqli_fetch_assoc($strCnt)){ 
		$numCmp++;
		}
		echo "(".$numCmp.")"; 
        ?>	
		<button type="button" class="status"> LATE </button>
		<?php
		$numLt = 0; 
		$queryCntStr = "SELECT * FROM statustable WHERE statustable.status='late'";
		$strCnt = mysqli_query($cdb, $queryCntStr);
		while ($row = mysqli_fetch_assoc($strCnt)){ 
		$numLt++;
		}
		echo "(".$numLt.")"; 
        ?>	
		<button type="button" class="status"> TOTAL </button>
		<?php
		$numTot = 0; 
		$queryCntStr = "SELECT * FROM statustable ";
		$strCnt = mysqli_query($cdb, $queryCntStr);
		while ($row = mysqli_fetch_assoc($strCnt)){ 
		$numTot++;
		}
		echo "(".$numTot.")"; 
        ?>	
		<br></br>
		<button type="button" class="green" onclick="window.location.href='insertPHP.php'"> ADD </a></button>
		<br></br> 
		<button type="button" class="blue" onclick="window.location.href='updatePHP.php'"> UPDATE </button> 
		<br></br> 
		<button type="button" class="red" onclick="window.location.href='deletePHP.php'"> DELETE </button> 
		<br></br> 
	</div> 
	<div class="column2"> 
		<table> 
			<tr class="status">
			<th> Task ID</th>
			<th> Task Name</th>
			<th> Status </th>
			<th> Due Date</th>	
			</tr>
			<?php
			
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
	</div>
</div> 

<br></br>	
	
		



</body>
</html> 