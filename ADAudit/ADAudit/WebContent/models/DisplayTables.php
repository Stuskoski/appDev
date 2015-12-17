<?php
session_start();
require_once 'Database.class.php';

//Get the GET value table from the url
$value = $_GET['table'];

//Get database connection
$dbh = Database::getDB();

//Create the intial SQL query
$qry = "SELECT * FROM ";

//Concat the string with the value from table
$qry .= $value;

//Prepare the query
$stmt=$dbh->prepare($qry);

//execute the query
$stmt->execute ();

//Create the 2nd SQL query for count
$qry2 = "SELECT COUNT(*) AS NumberOfRows FROM ";

//Concat the string with the value from table
$qry2 .= $value;

//Prepare the query
$stmt2=$dbh->prepare($qry2);

//execute the query
$stmt2->execute ();

// set the fetch mode to both array.  Can reference by numbers and by column names.
$stmt->setFetchMode(PDO::FETCH_BOTH);
$stmt2->setFetchMode(PDO::FETCH_BOTH);
$row2 = $stmt2->fetch();

//Prepopulate array with table names, subtract the table name that exists already.
//This prevents the user from moving the user to the same table they already are in.
if ($value!=='nousers'){
	$optionsVal[]=('nousers');
	$options[]=('Move To: Users That Should Be Disabled');
}
if ($value!=='serviceusers'){
	$optionsVal[]=('serviceusers');
	$options[]=('Move To: Service Accounts');
}
if ($value!=='undeterminedusers'){
	$optionsVal[]=('undeterminedusers');
	$options[]=('Move To: Undetermined Users');
}
if ($value!=='yesusers'){
	$optionsVal[]=('yesusers');
	$options[]=('Move To: Users That Should Be Kept Enabled');
}

//Create the table dynamically
?>
<style>
	table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
	}
	th, td {
    padding: 5px;
    text:center;
    }
	</style>
<a href="../home">Home </a>
<a href="../viewResults"> | Back</a><br><br><br>

<form action="MakeChanges.php" method="post">
<input type="submit" value="Submit">
<table border="1" style="width:65%">
<caption><?php if($value=='nousers'){echo "Users That Should Be Disabled";}
			   if($value=='serviceusers'){echo "Service Accounts";}
			   if($value=='undeterminedusers'){echo "Undetermined Users";}
			   if($value=='yesusers'){echo "Users That Should Be Kept Enabled";}
		 ?><br>Number of Records = <?php echo $row2[0]; ?></caption>

  <tr>
    <th>Name</th>
    <th>Probability</th> 
    <th>Index Found At</th>
    <th>Matched Names</th>
    <th>Options</th>
  </tr>
  <?php 
  $count=0;
  while($row = $stmt->fetch()){
  ?>
  <tr>
    <td><?php echo $row['fullName'];?></td>
    <td><?php echo $row['probability'];?></td> 
    <td><?php echo $row['indexFound'];?></td>
    <td><?php echo $row['namesFound'];?></td>
    <td>
    <select class="form-control" id="sel1" onchange="showReview(this.value)" name="select<?php echo $count;?>">
    	<option value="">- - Select An Option - -</option>
    	<?php for($i=0; $i<3; $i++){?>
    		<option value="option=<?php echo $optionsVal[$i] . "&id=" . $row[0];?>"><?php echo $options[$i];?></option>
    	<?php }?>
    	<option value="option=delete&id=<?php echo $row[0];?>">Delete User From Table</option>
    </select>
    <?php // echo '<a href="test?id=' . $row[0] . '&table=' . $value . '"> DeleteUser</a>'?></td>
  </tr>
  <?php 
  $count++;
   }
   //Send number of rows so you know how many forms you have to handle
   $_SESSION['numOfRows'] = $row2[0];
   $_SESSION['tableName'] = $value;
  ?>
</table>
<input type="submit" value="Submit">
</form>

