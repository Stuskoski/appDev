<?php
include 'Database.class.php';
session_start();

if(!isset($_POST['newsletter'])){
	header('location:home');
}
else{
	//validate email and then sanitize.  Prepare to enter into database.
	if (filter_var($_POST['newsletter'], FILTER_VALIDATE_EMAIL)) {
		$sanitizedEmail = filter_var($_POST['newsletter'], FILTER_SANITIZE_EMAIL);
		
		try{
		//Get database connection
		$dbh = Database::getDB();
		
		//Prepare the test query
		$check=$dbh->prepare("SELECT email FROM subscribers WHERE email = :emailCheck");
		
		//bind the parameters to their respective values
		$check->bindParam ( ':emailCheck', $sanitizedEmail, PDO::PARAM_STR );
		
		//Execute Check Qry
		$check->execute();
		
		// set the fetch mode to both array.  Can reference by numbers and by column names.
		$check->setFetchMode(PDO::FETCH_ASSOC);
		
		//Try to fetch first row
		$row = $check->fetch();
		
		if(isset($row['email'])){
			$_SESSION['flag'] = 2; //set flag to 2 meaning a user with that email exists
			header("location:../home");
			Database::clearDB();
			exit();
		}
		
		//Prepare the query
		$stmt=$dbh->prepare("INSERT INTO subscribers(email) VALUES(:email)");
		
		//bind the parameters to their respective values
		$stmt->bindParam ( ':email', $sanitizedEmail, PDO::PARAM_STR );
		
		//Execute
		$stmt->execute();
		}catch(Exception $e){
			Echo "Something went wrong, please try again";
			header( "refresh:3;url=../home" );
		}
		
		//Set flag to be successful
		$_SESSION['flag'] = 1;
		
		//Redirect home with no wait time if everything went well.
		header("location:../home");
		
		//Clear DB connection
		Database::clearDB();
	}
}






?>