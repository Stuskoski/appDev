<?php
include 'Database.class.php';
session_start();

//Set session variables just in case any of the checks fail.  Do not save password.
if(isset($_POST['firstNameSignup'])){
	$_SESSION['firstNameSignup'] = $_POST['firstNameSignup'];
}
if(isset($_POST['lastNameSignup'])){
	$_SESSION['lastNameSignup'] = $_POST['lastNameSignup'];
}
if(isset($_POST['emailSignup'])){
	$_SESSION['emailSignup'] = $_POST['emailSignup'];
}
if(isset($_POST['phoneNumberSignup'])){
	$_SESSION['phoneNumberSignup'] = $_POST['phoneNumberSignup'];
}


//First check to see if all the required guys are here
if(!isset($_POST['firstNameSignup']) || !isset($_POST['lastNameSignup']) || !isset($_POST['emailSignup']) || !isset($_POST['passwordSignup']) || !isset($_POST['passwordConfirmSignup'])){
	header("location:../signup");
	exit();
}

//Second check to make sure everything is good to go
$firstName = $_POST['firstNameSignup'];
$lastName = $_POST['lastNameSignup'];
$email = $_POST['emailSignup'];
$password = $_POST['passwordSignup'];
$passwordConfirm = $_POST['passwordConfirmSignup'];
if(isset($_POST['phoneNumberSignup'])){
	$phoneNumber = $_POST['phoneNumberSignup'];
}

//check if passwords match
if($password !== $passwordConfirm){
	$_SESSION['signupError'] = 1;
	header("Location:../signup");
	Database::clearDB();
	exit();
}

//sanitize time!
$firstName = htmlspecialchars($firstName);
$lastName = htmlspecialchars($lastName);
$email = htmlspecialchars($email);
if(isset($phoneNumber)){
	$phoneNumber = htmlspecialchars($phoneNumber);
}else{
	$phoneNumber=null;
}
$password = sha1($password);//sha1 basically santizes bc it becomes a string

//Third check to make sure it is a unique user

//get connection
$dbh = Database::getDB();

//Prepare the qry.  Just checking email since it is the primary key.
$check = $dbh->prepare("SELECT email FROM users
						WHERE email=:email");

//Bind the values
$check->bindParam ( ':email', $email, PDO::PARAM_STR );

//execute
$check->execute();

//Fetch the row to see if it exists
$row = $check->fetch ( PDO::FETCH_ASSOC );

//Check if it was a valid user. If it is, go back to signup screen with error set
if(!is_null($row['email'])){
	$_SESSION['signupError'] = 2;
	header("Location:../signup");
	Database::clearDB();
	exit();
}

//Insert user into database
$insert = $dbh->prepare("INSERT INTO users(email, firstName, lastName, password, phoneNumber)
						 VALUES(:email, :firstName, :lastName, :password, :phoneNumber)");

//Bind the values.  Password has a 40 bc sha1 converts to a 40 char string
$insert->bindParam ( ':email', $email, PDO::PARAM_STR );
$insert->bindParam ( ':firstName', $firstName, PDO::PARAM_STR );
$insert->bindParam ( ':lastName', $lastName, PDO::PARAM_STR );
$insert->bindParam ( ':password', $password, PDO::PARAM_STR, 40);
$insert->bindParam ( ':phoneNumber', $phoneNumber, PDO::PARAM_STR);

//execute
$insert->execute();

//User was inserted, now get the last ID.
$getLastId = $dbh->prepare("SELECT uid FROM users
						    WHERE email=:email");
//Bind the values
$getLastId->bindParam ( ':email', $email, PDO::PARAM_STR );

//execute
$getLastId->execute();

//Fetch the row to see if it exists
$getId = $getLastId->fetch ( PDO::FETCH_ASSOC );

//Set variables just like in login
$_SESSION['user_id'] = $getId['uid'];
$_SESSION['user_session'] = $email;
$_SESSION['firstName'] = $firstName;

//Now clear DB connection, clear session variables, and go home
Database::clearDB();

if(isset($_SESSION['firstNameSignup'])){
	unset($_SESSION['firstNameSignup']);
}
if(isset($_SESSION['lastNameSignup'])){
	unset($_SESSION['lastNameSignup']);
}
if(isset($_SESSION['emailSignup'])){
	unset($_SESSION['emailSignup']);
}
if(isset($_SESSION['phoneNumberSignup'])){
	unset($_SESSION['phoneNumberSignup']);
}

header("location:../home");
?>