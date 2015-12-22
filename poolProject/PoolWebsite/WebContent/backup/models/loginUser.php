<?php
session_start();
include 'Database.class.php';

if(isset($_POST['emailLogin']) && isset($_POST['passLogin'])){
	try{
		//get connection
		$dbh=Database::getDB();
		
		//prepare query
		$login = $dbh->prepare("SELECT email, firstName, uid FROM users
								WHERE email=:email AND password=:password");
		
		//assign email and bind a sha1'd password
		$email = $_POST['emailLogin'];
		$password = sha1($_POST['passLogin']);
		
		//Bind the values
		$login->bindParam ( ':email', $email, PDO::PARAM_STR );
		$login->bindParam ( ':password', $password, PDO::PARAM_STR, 40 );
		
		//execute
		$login->execute();
		
		//Fetch the row to see if it exists
		$row = $login->fetch ( PDO::FETCH_ASSOC );
		
		//Check if it was a valid user, if so set a bunch of session variables for reference later
		if(!is_null($row['email'])){
			$_SESSION['user_session'] = $row['email'];
			$_SESSION['firstName'] = $row['firstName'];
			$_SESSION['user_id'] = $row['uid'];
			header("Location:../home");
			exit();
		}
		//else head back to main page with error flag set
		else
		{
			$_SESSION['loginError'] = 1;
			header("location:../home");
			exit();
			throw new Exception("Invalid username/password");
		}
		
	}catch(Exception $e){
		echo "<br><br><b>" . $e->getMessage() . "</b>";
		header("location:../home");
	}
}
//No login or password in post
else{
	header("location:../home");
	
}


?>