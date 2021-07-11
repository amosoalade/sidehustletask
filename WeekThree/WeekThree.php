<?php
/*
Write a Todo list program that uses mySQL
to store user’s data

*/

$nameErr = "";

// Database Connection

$conn = new mysqli("localhost", "root", "", "shtodo");
 
if(!$conn){
    die("Error: Cannot connect to the database");
}

//Function to clean supplied Data

function CleanData($field) {
    $cleanField = trim($field);
    $cleanField = stripslashes($cleanField);
    $cleanField = htmlspecialchars($cleanField);
    return $cleanField;
  }


  // When Create Task button is clicked
  if (isset($_POST['submit']) and $_POST['submit'] == "Create Task") 
  {
	 //Clean the date supplied and also prevent malicious inputs
	 $tn = CleanData($_POST["task"]);
	 $st = CleanData($_POST["status"]);

	 if (empty($tn)) {
		$nameErr = "Task Name is required";
	  } 
	  elseif (!preg_match("/^[a-zA-Z-' ]*$/",$tn)) {
		$nameErr = "Only letters and white space allowed";
	  }
	  else
	  {
		$conn->query("INSERT INTO `task` VALUES(NULL, '$tn', '$st')");
			header('location:'.$_SERVER["PHP_SELF"]);
	  }
  }


  // When Delete link is clicked

  if (isset($_GET['status']) and $_GET['status'] == "delet")
  {
	$conn->query("DELETE FROM `task` WHERE `taskID` = ".CleanData($_GET['task_id'])) or die(mysqli_errno($conn));
		header('location:'.$_SERVER["PHP_SELF"]);

  }

  //When Edit link is clicked
  if (isset($_GET['status']) and $_GET['status'] == "edit")
  {
	$query2 = $conn->query("SELECT * FROM `task` WHERE `taskID`=".CleanData($_GET['task_id']));
  }

//When Edit Task button is clicked
  if (isset($_POST['submit']) and $_POST['submit'] == "Edit Task") 
  {  
	//Clean the date supplied and also prevent malicious inputs
	$et = CleanData($_POST["etask"]);
	$est = CleanData($_POST["estatus"]);

	$conn->query("UPDATE `task` SET `task` = '$et', `remark` = '$est' WHERE `taskID` = ".CleanData($_POST['id'])) or die(mysqli_errno($conn));
	header('location:'.$_SERVER["PHP_SELF"]);
  }

// Query to display list of task
  $query1 = $conn->query("SELECT * FROM `task` ORDER BY `taskID` ASC");
  $count = 1;
  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To DO App</title>
	<style>
        span{
            color:red;
        }

        em{
            color:green;
        }
    </style>
</head>
<body>
<h3>To Do List</h3>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

<?php // When the edit link is clicked.

if (isset($_GET['status']) and $_GET['status'] == "edit"){

	$row = $query2->fetch_array();
?>
	Task: <input type="text" name="etask" value="<?php echo $row['task'];?>"> 
<br><br>
Status:
<select name="estatus" id="status">
	<option value="<?php if(isset($row['remark'])){echo $row['remark'];}else{echo '';}?>"><?php if(isset($row['remark'])){echo $row['remark'];}else{echo "---Select Task---";}?></option>
    <option value="Done">Done</option>
    <option value="Pending">Pending</option>
    <option value="Cancelled">Cancelled</option>
</select>
<br><br><input type="hidden" value="<?php echo $row['taskID'];?>" name="id">
<input type="submit" name="submit" value="Edit Task">
<?php }else{?>
Task: <input type="text" name="task" value=""> 
<span class="error">* <?php echo $nameErr;?></span>
<br><br>
Status:
<select name="status" id="status">
    <option value="Done">Done</option>
    <option value="Pending">Pending</option>
    <option value="Cancelled">Cancelled</option>
</select>
<br><br>
<input type="submit" name="submit" value="Create Task">
<h3>My Tasks</h3>
		
		<table class="table">
			<thead>
				<tr>
					<th>SN</th>
					<th>Task</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					while($fetch = $query1->fetch_array()){
				?>
				<tr>
					<td><?php echo $count++?></td>
					<td><?php echo $fetch['task']?></td>
					<td><?php echo $fetch['remark']?></td>
					<td colspan="2">
						<center>
							
                              
								<a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])."?task_id=".$fetch['taskID']."&status=edit";?>">Edit</a> |  							
							
							 <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])."?task_id=".$fetch['taskID']."&status=delet";?>">Delete</a>
						</center>
					</td>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
		<?php }?>
</form>

</body>
</html>
