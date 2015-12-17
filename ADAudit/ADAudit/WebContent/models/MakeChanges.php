<?php
session_start();
include 'Database.class.php';

echo "coming from " . $_SESSION['tableName'] . "<br>";

//Determine table id key from the name.  Slow way to do it but it made sense at the time...
if($_SESSION['tableName'] == "nousers"){
	$keyName = "nuid";
}
if($_SESSION['tableName'] == "serviceusers"){
	$keyName = "suid";
}
if($_SESSION['tableName'] == "undeterminedusers"){
	$keyName = "uuid";
}
if($_SESSION['tableName'] == "yesusers"){
	$keyName = "yuid";
}

//Loop through all the values in the post form
for($i=0; $i<$_SESSION['numOfRows']; $i++){
	//Only handle those that have a value
	if(($_POST['select'.$i]!=='')){
		//triffers for the nousers actions
		if(fnmatch("option=nousers*", $_POST['select'.$i])){
			//Parse the POST string.  Gets the action and the id of the value.
			parse_str($_POST['select'.$i]);
			moveUser("nousers", $id, $keyName);
		}
		//triggers for yesusers actions
		elseif(fnmatch("option=yesusers*", $_POST['select'.$i])){
			parse_str($_POST['select'.$i]);
			moveUser("yesusers", $id, $keyName);
			
		}
		//triggers for the undeterminedusers actions
		elseif(fnmatch("option=undeterminedusers*", $_POST['select'.$i])){
			parse_str($_POST['select'.$i]);
			moveUser("undeterminedusers", $id, $keyName);
			
		}
		//Triggers for the serviceuser actions
		elseif(fnmatch("option=serviceusers*", $_POST['select'.$i])){
			parse_str($_POST['select'.$i]);
			moveUser("serviceusers", $id, $keyName);
			
		}
		//Triggers for delete
		elseif(fnmatch("option=delete*", $_POST['select'.$i])){
			parse_str($_POST['select'.$i]);
			moveUser("delete", $id, $keyName);
		}
		//Triggers for invalid input
		else{
			echo "Invalid Options, Please Try Again.<br>";
		}
	}	
}

unset($_SESSION['numOfRows']);
unset($_POST);

//Redirect to viewResults page after completion
header("location:../viewResults");


function moveUser($action, $id, $keyName){
	echo $keyName . "<br>";
	
	//Make connection to database
	$dbh = Database::getDB();
	if($action == "delete"){
		//Construct the SQL query with variables
		$qry = "DELETE FROM ";
		$qry .= $_SESSION['tableName'];
		$qry .= " WHERE " .$keyName . "=" . $id;
		
		//Prepare the query
		$stmt=$dbh->prepare($qry);
		
		//execute the query
		$stmt->execute ();
		
		//Unset the qry once finished
		unset($qry);
		unset($stmt);
	}
	else{
		/**
		 * This one is a little trickier.  First create SQL query to get the values of the primary key.
		 * Then delete the object from the DB.  After you delete, you insert into the new table with
		 * the values obtained earlier.  Might be a faster way to do this, but this is fine for now.
		 */
		$qry = "SELECT * FROM " . $_SESSION['tableName'] . " WHERE " . $keyName;
		$qry .= "=" . $id;
	
		//Prepare the query
		$stmt=$dbh->prepare($qry);
		
		//execute the query
		$stmt->execute ();
		
		//Set the fetch mode.  BOTH means its named keys and by numbers.
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		
		//Put the results into an array
		$row=$stmt->fetch();
	
		//Unset the qry once finished
		unset($qry);
		unset($stmt);
		
		//Construct the 2nd SQL query with variables
		$qry = "DELETE FROM ";
		$qry .= $_SESSION['tableName'];
		$qry .= " WHERE " .$keyName . "=" . $id;
		
		//Prepare the query
		$stmt=$dbh->prepare($qry);
		
		//execute the query
		$stmt->execute ();
		
		//Unset the qry once finished
		unset($qry);
		unset($stmt);
		
		//Construct the 2rd SQL query with variables
		$qry = "INSERT INTO " . $action . " (fullName, firstName, middleName, lastName, probability, indexFound, namesFound)";
		$qry .= " VALUES ('" . $row['fullName'] . "', '" . $row['firstName'] . "', '" . $row['middleName'] . "', '";
		$qry .= $row['lastName'] . "', '" . $row['probability'] . "', '" . $row['indexFound'] . "', '" . $row['namesFound'] . "')";
		
		//Prepare the query
		$stmt=$dbh->prepare($qry);
		
		//execute the query
		$stmt->execute ();
		
		//Unset the qry once finished
		unset($qry);
		unset($stmt);
		
	}

}
?>