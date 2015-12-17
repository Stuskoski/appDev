<?php
class ResultsView {
	public static function show() {
?>
   <title>AD Audit Results</title>
   <h3>The Results are as follows</h3>
   <i><a href="home">Home</a></i><br><br>
   
<?php 
if(!isset($_SESSION['file1']) || !isset($_SESSION['file2'])){
	header("location:home");
}


$row = 1;
//open users to run audit for
echo "Opening " . $_SESSION['file1'] . " To Run Audit Against<br>";
if (($handle = fopen($_SESSION['file1'], "r")) !== FALSE) {
	while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		$num = count($data);
		$row++;
		for ($c=0; $c < $num; $c++) {
			$AuditAgainst[] = $data[$c];
		}
	}
	echo "File 1 in AuditAgainst Array<br><br>";
	fclose($handle);
}

$row2 = 1;
//open users to run audit against
echo "Opening " . $_SESSION['file2'] . " To Run Audit Against<br>";
if (($handle2 = fopen($_SESSION['file2'], "r")) !== FALSE) {
	while (($data2 = fgetcsv($handle2, 1000, ",")) !== FALSE) {
		$num2 = count($data2);
		$row2++;
		for ($c=0; $c < $num2; $c++) {
			$AuditUsers[] = $data2[$c];
		}
	}
	echo "File 2 in AuditUsers Array<br><br>";
	fclose($handle2);
}

//Get the first/last names of the Users to Audit and run a couple checks
for($i=0; $i < count($AuditUsers); $i++){
	$tok1[] = explode(" ", $AuditUsers[$i]);
	$temp = count($tok1[$i]) ."<br>";
	$lastName1[$i][] = $tok1[$i][$temp-1]; //add the last name to the object
	$lastName1[$i][1] = 3; //start each user with a probability rating of 3 so no one is disabled that shouldn't be.
	$lastName1[$i][2] = null; //intialize each index match to be null.
	$lastName1[$i][3] = $AuditUsers[$i]; //Add full name to the object
	$lastName1[$i][4] = $tok1[$i][0]; //Add first name to the object
	$lastName1[$i][5] = null; //Intialize the middle names
	$lastName1[$i][6] = null; //Intialize the names that match column
	if(isset($tok1[$i][1])){
		for($x=1; $x < count($tok1[$i])-1; $x++){
			$lastName1[$i][5] .= $tok1[$i][$x]; //Add all the middle names to the object
		}
	}
	/**
	 * First quick check.  If the user only has one name
	 * it's probably a service account or a test account.
	 * Decrement probability by 1.
	 */
	if($temp <= 1){
		$lastName1[$i][1]--;
	}
	
	/**
	 * Second quick check.  If the user has any numbers
	 * in the full name, it's probably a service account
	 * or a test account.  Decrement probability by 1.
	 */
	if((preg_match('/[0-9]+/', $AuditUsers[$i])) || (preg_match('/[_]+/', $AuditUsers[$i]))){
		$lastName1[$i][1]-=2;
	}
	
	/**
	 * Third quick check.  If the user has a first name
	 * or last name in ALL CAPS, it's probably a service
	 * account.  So decrement count. Also strips all
	 * - from the word and then checks.
	 */
	$temp1 = $lastName1[$i][4];
	$temp2 = $lastName1[$i][0];
	$temp1 = str_replace("-","",$temp1);
	$temp2 = str_replace("-","",$temp2);
	$temp1 = str_replace("_","",$temp1);
	$temp2 = str_replace("_","",$temp2);
	if(ctype_upper($temp1) || ctype_upper($temp2)){
		$lastName1[$i][1]--;
	}
	
	/**
	 * Fourth check.  This check is a little slower but will help
	 * sort out the correct guys.  The check runs the first name and 
	 * last name of the user against a word list.  If any matches, 
	 * decrement the probability.
	 */
	$wordList = array('accounting', 'payable', 'dept', 'admin', 'support', 'test', 'staff', 'team', 'project', 'projects', 'dev', 'usa', 'sat', 'col', 'report',
	 			 'service', 'exec', 'integration', 'solution', 'solutions', 'build', 'services', 'config', 'system', 'systems', 'renewal', 'renewals',
	 		     'cisco', 'quotes', 'quote', 'total', 'totals', 'citrix', 'commission', 'comissions', 'improvement', 'improvements', 'contract', 
	 		     'contracts', 'infrastructure', 'value', 'values', 'credit', 'credits', 'plugin', 'plugins', 'helpdesk', 'sharepoint', 'alert', 'alerts',
	 		     'office', 'offices', 'reply', 'replys', 'licensing', 'license', 'licenses', 'network', 'networks', 'mail', 'mailbox', 'email', 'emails',
	 		     'survey', 'surveys', 'depository', 'temp', 'temps', 'guest', 'guests', 'access', 'accesses', 'hr', 'security', 'training', 'connection', 
	 		     'connections', 'director', 'lookup', 'hotline', 'backup', 'backups', 'tech', 'communication', 'communications', 'event', 'events', 'reporting',
				 'healthcare', 'committee', 'comittees', 'core', 'employment', 'company', 'verification', 'employee', 'employees', 'finance', 'financial',
				 'analysis', 'document', 'documents', 'issue', 'issues', 'webcast', 'sync', 'tester', 'tested', 'testing', 'okta', 'user', 'users', 'request', 'oma',
				 'room', 'rooms', 'approval', 'approvals', 'sirius', 'online', 'data', 'management', 'performace', 'scripts', 'script', 'sales', 'center', 'monitor',
				 'facilites', 'awards', 'realestate', 'special', 'social', 'storage', 'subscribe', 'invoice', 'invoices', 'department', 'taxes', 'tax', 'transcriptions',
				 'transcription', 'varrow', 'desktop', 'desktops', 'registration', 'registrations', 'servicedesk', 'snapshot', 'snapshots', 'hrnotification', 'hrnotifications',
				 'hrissue', 'hrissues', 'manager', 'managers', 'marketing', 'intelligence', 'calendar', 'outlook', 'plus', 'minus', 'securence', 'docs', 'testof', 'mobile',
			     'travel', 'desk', 'shipping', 'receiving', 'received', 'accounts', 'receivable', 'account', 'domain', 'plans', 'fax', 'lawson', 'audit', 'operations');
	
	foreach($wordList as $word){
		if((strtolower($lastName1[$i][4]) == $word) || (strtolower($lastName1[$i][0]) == $word)) {
			$lastName1[$i][1]-=2;
		}
	}
	
	
}
//free memory
unset($tok1);

//Get the first/last names of the Users to Audit Against
for($i=0; $i < count($AuditAgainst); $i++){
	$tok2[] = explode(",", $AuditAgainst[$i]);
	$lastName2[] = $tok2[$i][0]; //May come with a middle name, need to get rid of them.
	$firstName2[] = $tok2[$i][count($tok2[$i]) - 1]; //Get the first name.  Also comes with middle names, need to get rid of them.
	$firstName2[$i] = strtok($firstName2[$i],' '); //Str tok to get the first name minus the middle name. 
	$lastName2[$i] = strtok($lastName2[$i],' '); //Str tok to get the last name minus the middle name. Etc. Hill III, Thomas
}
//free memory
unset($tok2);

/**
 * At this point you have last names of both lists.  Audit Users is in the format lastName1[index][0] = lastName, lastName1[index][1] = probability, 
 * lastName1[index][2] = matched index, lastName1[index][3] = full name, and so forth.  Scroll up to see full list.
 * Audit Against is in the format lastName2[index] = lastName.  I have the 2nd field for the following flags. This is the fifth check.
 * Probably Yes = 3
 * Undetermined = 2
 * Probably Not = 1
 * Good Possibility Not = 0
 * Definitely Not = <0
 */
for($i=0; $i < count($lastName1); $i++){//users to check if exist
	$flag = 0;
	for($j=0; $j < count($lastName2); $j++){
		if($lastName1[$i][0] == $lastName2[$j]){
			$lastName1[$i][2] = $lastName1[$i][2] . " $j"; //Add the index match number into the array.
			$lastName1[$i][6] .= $AuditAgainst[$j] . "<br>"; //Add the payroll name to the array if a match was found. Makes it so you dont have to reference excel sheet for matches.
			//echo "AuditAgainst = " . $AuditAgainst[$j] . "<br>";
			//echo "lastName2 = " . $lastName2[$j] . "<br>";
			$flag = 1;
		}
    }
    if($flag == 0){
    	$lastName1[$i][1] -= 2;
    }
}

//for($i=0; $i < count($lastName1); $i++){
//	if($lastName1[$i][6] !== null){
//		echo $lastName1[$i][6] . "<br><br><br><br>";
//	}
//}
//Common Name subs arrays.  Only add new people here if they are a 1 -> 1 ratio. 
//Ie. Not (Rob,Bob) can be Robert. Ben can only be benjamin is acceptable.
$nameArray1=array('Chuck', 'Cindy', 'Chris', 'Dave', 'Mike', 'Matt', 'Don', 'Doug', 'Ed', 'Ken', 'Kim', 'Nick',
				  'Joe', 'Jim', 'Tim', 'Tom', 'Jeff', 'Greg', 'Josh', 'Alex', 'Ben', 'Beth', 'Brad', 'Larry', 'Pam',
				   'Pat', 'Ron', 'Russ');

$nameArray2=array('Chuck' => 'Charles',
				  'Cindy' => 'Cynthia',
				  'Chris' => 'Christopher',
				  'Dave'  => 'David',
		          'Mike'  => 'Michael',
		          'Matt'  => 'Matthew',
		          'Joe'   => 'Joseph',
                  'Jim'   => 'James',
		          'Tim'   => 'Timothy',
		          'Tom'   => 'Thomas',
		          'Jeff'  => 'Jeffery',
		          'Greg'  => 'Gregory',
		          'Josh'  => 'Joshua',
				  'Alex'  => 'Alexander',
				  'Ben'   => 'Benjamin',
		          'Beth'  => 'Elizabeth',
				  'Brad'  => 'Bradley',
				  'Don'   => 'Donald',
				  'Doug'  => 'Douglas',
				  'Ed'    => 'Edward',
				  'Ken'   => 'Kenneth',
				  'Kim'   => 'Kimberly',
				  'Larry' => 'Lawrence',
				  'Nick'  => 'Nicholas',
				  'Pam'   => 'Pamela',
			      'Pat'   => 'Patrick',
				  'Ron'   => 'Ronald',
			      'Russ'  => 'Russell'
);

/**
 * This is the 6th and final check for the users.  This check will get the indexes that the last name was found at and then check to see
 * if the first name matches.  If all the indexes are checked and the first name does not match any of them, their probability
 * is decremented by 1
 */
for($i=0; $i < count($lastName1); $i++){
	if(isset($lastName1[$i][2])){
		$indexArray = explode(" ", $lastName1[$i][2]);
		$flag2 = 0;
		foreach($indexArray as $val){
			//Common name subs, these are a one to one ratio, other ratios are below.
			if((isset($firstName2[$val])) && (in_array($lastName1[$i][4], $nameArray1))){
				if($nameArray2[$lastName1[$i][4]] == $firstName2[$val]){
					$flag2++;
				}
			}	
			//First name is the same but with multiple last names. 1 -> 2
 			if (isset($firstName2[$val]) && ($lastName1[$i][4] == 'Steve') &&  (($firstName2[$val] == 'Steven') || ($firstName2[$val] == 'Stephen'))){
				$flag2++;
 			}
 			if (isset($firstName2[$val]) && ($lastName1[$i][4] == 'Tony') &&  (($firstName2[$val] == 'Anthony') || ($firstName2[$val] == 'Antonio'))){
 				$flag2++;
 			}
			if (isset($firstName2[$val]) && ($lastName1[$i][4] == 'Dan') &&  (($firstName2[$val] == 'Danny') || ($firstName2[$val] == 'Daniel'))){
 				$flag2++;
			}
			if (isset($firstName2[$val]) && ($lastName1[$i][4] == 'Jeff') &&  (($firstName2[$val] == 'Jeffery') || ($firstName2[$val] == 'Jeffrey'))){
				$flag2++;
			}
			if (isset($firstName2[$val]) && ($lastName1[$i][4] == 'Kathy') &&  (($firstName2[$val] == 'Katherine') || ($firstName2[$val] == 'Kathryn'))){
				$flag2++;
			}
			if (isset($firstName2[$val]) && ($lastName1[$i][4] == 'Sam') &&  (($firstName2[$val] == 'Samantha') || ($firstName2[$val] == 'Samuel'))){
				$flag2++;
			}
			
			//Last name is the same but with multiple first names. 2 -> 1
			if (isset($firstName2[$val]) && (($lastName1[$i][4] == 'Bill')||($lastName1[$i][4] == 'Will')) &&  ($firstName2[$val] == 'William')){
				$flag2++;
			}
			if (isset($firstName2[$val]) && (($lastName1[$i][4] == 'Rich')||($lastName1[$i][4] == 'Rick')) &&  ($firstName2[$val] == 'Richard')){
				$flag2++;
			}
			if (isset($firstName2[$val]) && (($lastName1[$i][4] == 'Bob')||($lastName1[$i][4] == 'Rob')) &&  ($firstName2[$val] == 'Robert')){
				$flag2++;
			}
			
			//Rest of the checks
			if(isset($firstName2[$val]) && ($lastName1[$i][4] == $firstName2[$val])){
				$flag2++;
			}
		}
		if($flag2 == 0){
			$lastName1[$i][1]--;
		}
	}
}

/**
 * After all the checks have been done, it's time to put all the information into tables in MySQL.  These tables will eventually be 
 * called with AJAX to form response tables that are available for viewing on the web application.
 */
$count = 0;
for($i=0; $i < count($lastName1); $i++){
	//if(!isset($lastName1[$i][5])){
	//	$lastName1[$i][5] = "test";
	//}
	if($lastName1[$i][1] == 3){ //Insert into yes users table
		$count++;
		if(isset($lastName1[$i][2])){
			addUser::addUserWithIndexYes($lastName1[$i][3], $lastName1[$i][4], $lastName1[$i][0], $lastName1[$i][5], $lastName1[$i][2], $lastName1[$i][1], $lastName1[$i][6]);
		}else{
			addUser::addUserWithoutIndexYes($lastName1[$i][3], $lastName1[$i][4], $lastName1[$i][0], $lastName1[$i][5], $lastName1[$i][1], $lastName1[$i][6]);
		}
	}
	
	if($lastName1[$i][1] == 2){//Insert into undetermined users table
		$count++;
		if(isset($lastName1[$i][2])){ 
			addUser::addUserWithIndexUndetermined($lastName1[$i][3], $lastName1[$i][4], $lastName1[$i][0], $lastName1[$i][5], $lastName1[$i][2], $lastName1[$i][1], $lastName1[$i][6]);
		}else{
			addUser::addUserWithoutIndexUndetermined($lastName1[$i][3], $lastName1[$i][4], $lastName1[$i][0], $lastName1[$i][5], $lastName1[$i][1], $lastName1[$i][6]);
		}
	}
	
	if($lastName1[$i][1] == 1){//Insert into no users table
		$count++;
		if(isset($lastName1[$i][2])){ 
			addUser::addUserWithIndexNo($lastName1[$i][3], $lastName1[$i][4], $lastName1[$i][0], $lastName1[$i][5], $lastName1[$i][2], $lastName1[$i][1], $lastName1[$i][6]);
		}else{
			addUser::addUserWithoutIndexNo($lastName1[$i][3], $lastName1[$i][4], $lastName1[$i][0], $lastName1[$i][5], $lastName1[$i][1], $lastName1[$i][6]);
		}
	}
	
	if($lastName1[$i][1] <= 0){//Insert into Service users table
		$count++;
		if(isset($lastName1[$i][2])){ 
			addUser::addUserWithIndexService($lastName1[$i][3], $lastName1[$i][4], $lastName1[$i][0], $lastName1[$i][5], $lastName1[$i][2], $lastName1[$i][1], $lastName1[$i][6]);
		}else{
			addUser::addUserWithoutIndexService($lastName1[$i][3], $lastName1[$i][4], $lastName1[$i][0], $lastName1[$i][5], $lastName1[$i][1], $lastName1[$i][6]);
		}
	}
}

echo "Data is added successfully.  Redirecting to results.<br>";
header("refresh:3,url=viewResults");
?>



<?php
	}
}


?>