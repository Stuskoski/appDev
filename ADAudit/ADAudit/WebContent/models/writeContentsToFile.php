<?php
/**
 * This function will write all 4 tables to a file name ADAudit.html and
 * save them on the clients computer.  The function asks if the client
 * would like to save the file to their computer.  Using some past code
 * in the DisplayTables.php file just minus the options.  An alternative
 * is to use MYSQL native function and download date or just save the web
 * page.  Whichever you prefer really...
 */
include 'Database.class.php';

$filename = "ADAudit.html";
header("Content-disposition: attachment;filename=$filename");

$tableNames = array('nousers', 'serviceusers', 'undeterminedusers', 'yesusers');
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
<?php 
foreach($tableNames as $singleName){
	
	//Get the GET value table from the url
	$value = $singleName;
	
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
	
	?>
	
	<table border="1" style="width:50%">
<caption><?php if($value=='nousers'){echo "Users That Should Be Disabled";}
			   if($value=='serviceusers'){echo "Service Accounts";}
			   if($value=='undeterminedusers'){echo "Undetermined Users";}
			   if($value=='yesusers'){echo "Users That Should Be Kept Enabled";}
		 ?><br>Number of Records = <?php echo $row2[0]; ?></caption>

  <tr>
    <th>Name</th>
    <th>Probability</th> 
    <th>Index Found At</th>
  </tr>
  <?php 
  while($row = $stmt->fetch()){
  ?>
  <tr>
    <td><?php echo $row['fullName'];?></td>
    <td><?php echo $row['probability'];?></td> 
    <td><?php echo $row['indexFound'];?></td>
  </tr>
  <?php 
   }
  ?>
</table>
<br><br><br><br>	
	
	<?php 
	}
?>