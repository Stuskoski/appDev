<?php
set_time_limit(0);
class addUser {
	public function addUserWithIndexYes($fullName, $firstName, $lastName, $middleName, $indexFound, $probability, $namesFound){
		//Get Database Connection
		$dbh = Database::getDB();
		
		//Prepare SQL statement
		$stmt1 =  $dbh->prepare("INSERT INTO yesusers (fullName, firstName, lastName, middleName, indexFound, probability, namesFound)
									 VALUES(:fullName, :firstName, :lastName, :middleName, :indexFound, :probability, :namesFound)");
		
		//bind the parameters to their respective values
		$stmt1->bindParam ( ':fullName', $fullName, PDO::PARAM_STR );
		$stmt1->bindParam ( ':firstName', $firstName, PDO::PARAM_STR );
		$stmt1->bindParam ( ':lastName', $lastName, PDO::PARAM_STR );
		$stmt1->bindParam ( ':middleName', $middleName, PDO::PARAM_STR );
		$stmt1->bindParam ( ':indexFound', $indexFound, PDO::PARAM_STR );
		$stmt1->bindParam ( ':probability', $probability, PDO::PARAM_INT );
		$stmt1->bindParam ( ':namesFound', $namesFound, PDO::PARAM_STR );
		
		//execute the SQL code
		$stmt1->execute();	
	}
	
	public function addUserWithoutIndexYes($fullName, $firstName, $lastName, $middleName, $probability, $namesFound){
		//Get Database Connection
		$dbh = Database::getDB();
		
		//Prepare SQL statement
		$stmt1 =  $dbh->prepare("INSERT INTO yesusers (fullName, firstName, lastName, middleName, probability, namesFound)
									 VALUES(:fullName, :firstName, :lastName, :middleName, :probability, :namesFound)");
		
		//bind the parameters to their respective values
		$stmt1->bindParam ( ':fullName', $fullName, PDO::PARAM_STR );
		$stmt1->bindParam ( ':firstName', $firstName, PDO::PARAM_STR );
		$stmt1->bindParam ( ':lastName', $lastName, PDO::PARAM_STR );
		$stmt1->bindParam ( ':middleName', $middleName, PDO::PARAM_STR );
		$stmt1->bindParam ( ':probability', $probability, PDO::PARAM_INT );
		$stmt1->bindParam ( ':namesFound', $namesFound, PDO::PARAM_STR );
		
		//execute the SQL code
		$stmt1->execute();	
	}
	
	
	public function addUserWithIndexUndetermined($fullName, $firstName, $lastName, $middleName, $indexFound, $probability, $namesFound){
		//Get Database Connection
		$dbh = Database::getDB();
	
		//Prepare SQL statement
		$stmt1 =  $dbh->prepare("INSERT INTO undeterminedusers (fullName, firstName, lastName, middleName, indexFound, probability, namesFound)
									 VALUES(:fullName, :firstName, :lastName, :middleName, :indexFound, :probability, :namesFound)");
	
		//bind the parameters to their respective values
		$stmt1->bindParam ( ':fullName', $fullName, PDO::PARAM_STR );
		$stmt1->bindParam ( ':firstName', $firstName, PDO::PARAM_STR );
		$stmt1->bindParam ( ':lastName', $lastName, PDO::PARAM_STR );
		$stmt1->bindParam ( ':middleName', $middleName, PDO::PARAM_STR );
		$stmt1->bindParam ( ':indexFound', $indexFound, PDO::PARAM_STR );
		$stmt1->bindParam ( ':probability', $probability, PDO::PARAM_INT );
		$stmt1->bindParam ( ':namesFound', $namesFound, PDO::PARAM_STR );
	
		//execute the SQL code
		$stmt1->execute();
	}
	
	public function addUserWithoutIndexUndetermined($fullName, $firstName, $lastName, $middleName, $probability, $namesFound){
		//Get Database Connection
		$dbh = Database::getDB();
	
		//Prepare SQL statement
		$stmt1 =  $dbh->prepare("INSERT INTO undeterminedusers (fullName, firstName, lastName, middleName, probability, namesFound)
									 VALUES(:fullName, :firstName, :lastName, :middleName, :probability, :namesFound)");
	
		//bind the parameters to their respective values
		$stmt1->bindParam ( ':fullName', $fullName, PDO::PARAM_STR );
		$stmt1->bindParam ( ':firstName', $firstName, PDO::PARAM_STR );
		$stmt1->bindParam ( ':lastName', $lastName, PDO::PARAM_STR );
		$stmt1->bindParam ( ':middleName', $middleName, PDO::PARAM_STR );
		$stmt1->bindParam ( ':probability', $probability, PDO::PARAM_INT );
		$stmt1->bindParam ( ':namesFound', $namesFound, PDO::PARAM_STR );
	
		//execute the SQL code
		$stmt1->execute();
	}
	
	
	public function addUserWithIndexNo($fullName, $firstName, $lastName, $middleName, $indexFound, $probability, $namesFound){
		//Get Database Connection
		$dbh = Database::getDB();
	
		//Prepare SQL statement
		$stmt1 =  $dbh->prepare("INSERT INTO nousers (fullName, firstName, lastName, middleName, indexFound, probability, namesFound)
									 VALUES(:fullName, :firstName, :lastName, :middleName, :indexFound, :probability, :namesFound)");
	
		//bind the parameters to their respective values
		$stmt1->bindParam ( ':fullName', $fullName, PDO::PARAM_STR );
		$stmt1->bindParam ( ':firstName', $firstName, PDO::PARAM_STR );
		$stmt1->bindParam ( ':lastName', $lastName, PDO::PARAM_STR );
		$stmt1->bindParam ( ':middleName', $middleName, PDO::PARAM_STR );
		$stmt1->bindParam ( ':indexFound', $indexFound, PDO::PARAM_STR );
		$stmt1->bindParam ( ':probability', $probability, PDO::PARAM_INT );
		$stmt1->bindParam ( ':namesFound', $namesFound, PDO::PARAM_STR );
	
		//execute the SQL code
		$stmt1->execute();
	}
	
	public function addUserWithoutIndexNo($fullName, $firstName, $lastName, $middleName, $probability, $namesFound){
		//Get Database Connection
		$dbh = Database::getDB();
	
		//Prepare SQL statement
		$stmt1 =  $dbh->prepare("INSERT INTO nousers (fullName, firstName, lastName, middleName, probability, namesFound)
									 VALUES(:fullName, :firstName, :lastName, :middleName, :probability, :namesFound)");
	
		//bind the parameters to their respective values
		$stmt1->bindParam ( ':fullName', $fullName, PDO::PARAM_STR );
		$stmt1->bindParam ( ':firstName', $firstName, PDO::PARAM_STR );
		$stmt1->bindParam ( ':lastName', $lastName, PDO::PARAM_STR );
		$stmt1->bindParam ( ':middleName', $middleName, PDO::PARAM_STR );
		$stmt1->bindParam ( ':probability', $probability, PDO::PARAM_INT );
		$stmt1->bindParam ( ':namesFound', $namesFound, PDO::PARAM_STR );
	
		//execute the SQL code
		$stmt1->execute();
	}
	
	
	public function addUserWithIndexService($fullName, $firstName, $lastName, $middleName, $indexFound, $probability, $namesFound){
		//Get Database Connection
		$dbh = Database::getDB();
	
		//Prepare SQL statement
		$stmt1 =  $dbh->prepare("INSERT INTO serviceusers (fullName, firstName, lastName, middleName, indexFound, probability, namesFound)
									 VALUES(:fullName, :firstName, :lastName, :middleName, :indexFound, :probability, :namesFound)");
	
		//bind the parameters to their respective values
		$stmt1->bindParam ( ':fullName', $fullName, PDO::PARAM_STR );
		$stmt1->bindParam ( ':firstName', $firstName, PDO::PARAM_STR );
		$stmt1->bindParam ( ':lastName', $lastName, PDO::PARAM_STR );
		$stmt1->bindParam ( ':middleName', $middleName, PDO::PARAM_STR );
		$stmt1->bindParam ( ':indexFound', $indexFound, PDO::PARAM_STR );
		$stmt1->bindParam ( ':probability', $probability, PDO::PARAM_INT );
		$stmt1->bindParam ( ':namesFound', $namesFound, PDO::PARAM_STR );
	
		//execute the SQL code
		$stmt1->execute();
	}
	
	public function addUserWithoutIndexService($fullName, $firstName, $lastName, $middleName, $probability, $namesFound){
		//Get Database Connection
		$dbh = Database::getDB();
	
		//Prepare SQL statement
		$stmt1 =  $dbh->prepare("INSERT INTO serviceusers (fullName, firstName, lastName, middleName, probability, namesFound)
									 VALUES(:fullName, :firstName, :lastName, :middleName, :probability, :namesFound)");
	
		//bind the parameters to their respective values
		$stmt1->bindParam ( ':fullName', $fullName, PDO::PARAM_STR );
		$stmt1->bindParam ( ':firstName', $firstName, PDO::PARAM_STR );
		$stmt1->bindParam ( ':lastName', $lastName, PDO::PARAM_STR );
		$stmt1->bindParam ( ':middleName', $middleName, PDO::PARAM_STR );
		$stmt1->bindParam ( ':probability', $probability, PDO::PARAM_INT );
		$stmt1->bindParam ( ':namesFound', $namesFound, PDO::PARAM_STR );
	
		//execute the SQL code
		$stmt1->execute();
	}
}