<?php
include 'getUserData.class.php';

session_start();

//Start the first email function
ob_start();

try{
//set and then sanitize post data
$firstName = filter_var($_POST['firstNameOrder'], FILTER_SANITIZE_STRING);
$lastName = filter_var($_POST['lastNameOrder'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['emailOrder'], FILTER_SANITIZE_EMAIL);
$phone = filter_var($_POST['phoneNumberOrder'], FILTER_SANITIZE_NUMBER_INT);
$notes = filter_var($_POST['orderNotes'], FILTER_SANITIZE_STRING);

//Email title/header
echo "Online Order Details:\n";

//Get all the details
echo "First Name = " . $_POST['firstNameOrder'] . "\n";
echo "Last Name = " . $_POST['lastNameOrder'] . "\n";
echo "Email = " . $_POST['emailOrder'] . "\n";
echo "Phone = " . $_POST['phoneNumberOrder'] . "\n";
echo "Order Notes = " . $_POST['orderNotes'] . "\n";
echo "Items: \n";
$numArray = array_count_values($_SESSION['cart']);

//get the carts contents
getUserData::convertIdToItem($numArray, true);

//echo total
echo "Total = $" . $_SESSION['cartTotal'];

//Get data from output buffer
$output=ob_get_clean();

//Santize string just in case
$output = filter_var($output, FILTER_SANITIZE_STRING);

//Sends all this information to the sendEmail function. Parameters are as follows:
//Who to send to, Subject, Body
sendEmail::EmailStore("3614599491@txt.att.net", "New Order", $output);


//Start the second email function for the customers email
ob_start();

//Email title/header
echo "Online Order Details:\n";

//Get all the details for the email body
echo "First Name = " . $_POST['firstNameOrder'] . "\n";
echo "Last Name = " . $_POST['lastNameOrder'] . "\n";
echo "Email = " . $_POST['emailOrder'] . "\n";
echo "Phone = " . $_POST['phoneNumberOrder'] . "\n";
echo "Order Notes = " . $_POST['orderNotes'] . "\n";
echo "Items: \n";
$numArray = array_count_values($_SESSION['cart']);

//Get the carts contents
getUserData::convertIdToItem($numArray, false);

//Echo the total of the order
echo "Total = $" . number_format($_SESSION['cartTotal'], 2);

//Get all the contents from the output buffer
$output=ob_get_clean();

//Sanitize the string just in case
$output = filter_var($output, FILTER_SANITIZE_STRING);

//Email the customer
sendEmail::EmailCustomer($_POST['emailOrder'], "Order Confirmation", $output);

/**
 * This next segment of code creates the order in the database.  The order in
 * the database will be handled through an Admin console which I will eventually
 * build.  Orders are for record keeping and such.  Save inventory decrementing to 
 * the admin console just in case an order is not picked up.
 */
//get connection
$dbh = Database::getDB();

//prepare statement
$order = $dbh->prepare("INSERT INTO orders(firstName, lastName, email, notes, phoneNumber, status, customerID, orderTotal)
						VALUES (:firstName, :lastName, :email, :notes, :phoneNumber, :status, :customerID, :orderTotal)");

//create customerID if they are logged in and it exists
$customerID = null;
if(isset($_SESSION['user_id'])){
	$customerID = $_SESSION['user_id'];
}

//Intialize every new order with the status of "New".
//This will be changed in the admin console eventually.
$status = "New";

//bind parameters
$order->bindParam ( ':firstName', $firstName, PDO::PARAM_STR );
$order->bindParam ( ':lastName', $lastName, PDO::PARAM_STR );
$order->bindParam ( 'email', $email, PDO::PARAM_STR );
$order->bindParam ( ':notes', $notes, PDO::PARAM_STR );
$order->bindParam ( ':phoneNumber', $phone, PDO::PARAM_INT );
$order->bindParam ( ':status', $status, PDO::PARAM_STR );
$order->bindParam ( ':customerID', $customerID, PDO::PARAM_INT );
$order->bindParam ( ':orderTotal', $_SESSION['cartTotal'], PDO::PARAM_INT );

//execute
$order->execute();

//Get last ID inserted so you can create the foreign key inventory objects
$lastID = $dbh->lastInsertId();
echo $lastID;

//this form of foreach gives you the key and the value. These are the foreign key orderItems.
foreach($numArray as $itemId => $numOrdered){
	
	//prepare sql
	$orderedItems = $dbh->prepare("INSERT INTO ordereditems(iid, oid, numberOrdered)
								 VALUES(:iid, :oid, :numberOrdered)");
	
	//bind parameters
	$orderedItems->bindParam ( ':iid', $itemId, PDO::PARAM_INT );
	$orderedItems->bindParam ( ':oid', $lastID, PDO::PARAM_INT );
	$orderedItems->bindParam ( ':numberOrdered', $numOrdered, PDO::PARAM_INT );
	
	//execute
	$orderedItems->execute();
}

Database::clearDB();

//Redirect to cartActions which will clear the cart after the order, then redirect to order confirmation page
header("location:cartActions.php?action=clearCartAfterOrder");

}catch(Exception $e){
	header("location:../home");
}

/**
 * I could insert the names of the product into orderitems but I feel that it is redundant data.
 * So instead we'll put it in the admin console.  Here is the command you will use to find
 * the name of the prouct and the amount ordered.
 * SELECT i.productName, o.numberOrdered
 * FROM ordereditems o
 * JOIN inventory i
 * ON o.iid = i.iid
 */


?>