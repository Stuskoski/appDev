<?php
/**
 * This class truncates each of the tables which deletes then recreates the table.  Faster than deleting.
 * Returns the user back to home after 3 seconds.
 */
include 'Database.class.php';
$dbh = Database::getDB();

echo "Clearing Database, This may take a few seconds...<br>";

$stmt = $dbh->prepare("TRUNCATE TABLE serviceusers");
$stmt->execute();

$stmt = $dbh->prepare("TRUNCATE TABLE nousers");
$stmt->execute();

$stmt = $dbh->prepare("TRUNCATE TABLE undeterminedusers");
$stmt->execute();

$stmt = $dbh->prepare("TRUNCATE TABLE yesusers");
$stmt->execute();
echo "Database Cleared...redirecting in 3 seconds<br>";

header("refresh:3,url=../home");
?>