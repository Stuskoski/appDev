<?php
class HowToView {
	public static function show() {
?>
<a href="home">Home</a>
<h3>AD Audit How To</h3>

<article>
   <p>
   This tool was created to help the user run an Active Directory Audit.<br>
   This tool uses two excel CSV(comma seperated values) files to run an audit against.<br>
   </p>
   
   <p>
   The first file is the confirmed users list.  This list is usually obtained from payroll<br>
   and contains the names of all currently active employees.  This list is in the form of <br>
   lastName, firstName [middle intial] <br>
   The AD tool uses the comma to find the correct first names, lastnames and run the audit against<br> 
   those names.  <br>
   The second file is an Active Directory Accounts list, this is pulled from our active directory<br>
   either through a third part tool or the Active Directory PowerShell command below:<br>
   <br>
   Get-ADUser -LDAPFilter "(&(objectCategory=person)(objectClass=user)(!objectClass=inetOrgPerson))" | select Name, Enabled | Export-Csv "C:\Users\AugustusR\Desktop\ADExport.csv"
   <br><br>
   The PowerShell command must be ran in the Active Directory module, and will export the list to a <br>
   file path of your choosing. Please make sure it is all on one line, not line breaks<br>
   I also usually convert the lists to tables in excel and just do the sort function to make it <br>
   alphabetical and easier to lookup names. In addition, I also remove all the users who are have<br>
   a false under the enabled column since they are already disabled.<b> Be sure to delete enabled column before proceeding!!!</b><br>
   </p>
   
   <p>
   Before proceeding, make sure to clear the Database with the "clear" link, this will ask for a confirmation<br>
   and should only take a few seconds before redirecting you back to the home page.<br>
   After the database is cleared, select the two files to upload in the specified order mentioned above.<br>
   Once both files are in the upload form, click the button "Run Audit"<br>
   This runs the AD Audit and uploads the data into the database.  Each of the users has a few tests run on<br>
   them and they become sorted in 4 tables, Users that should be disabled, Service Accounts, Undetermined Users,<br>
   and Users that should be kept enabled.
   </p>
   
   <p>
   Based on the amount of checks the user passed, they will be put in a respective table.  You should then go through<br>
   these lists and confirm the users are where they should be. You may quickly add/delete users from various tables<br>
   through the Options on the right hand side of the form.  Select which options you want and when finished, click the<br>
   "Submit" button on the top left hand side or bottom left hand side.  
   </p>
   
   <p>
   There are a few column names that give various information.  The first is the full Name, the second is probability<br>
   which gives you the probability that they are a active employee, index found at which gives the row number - 1<br>
   (since programming arrays start at 0 and not 1, sorry!) at which the employee was found in the Excel CSV file<br>
   of active users.  And the last column is options which gives you the ability to move or delete users from<br>
   tables.
   </p>
   
   <p>
   Once all the users are sorted to your liking, proceed to the home page and click "Write Results" link.  This<br>
   will ask if you would like to save a file, this file contains all the tables and their data.  This list<br>
   is the final list of the AD Audit.
   </p>
   
   <p>
   Well thats all there is to it! Any questions/issues/recommendations please email me at<br>
   <a href="mailto:Augustus.Rutkoski@siriuscom.com?Subject=AD Audit Tool" target="_top">Augustus.Rutkoski@siriuscom.com</a>
   </p>


</article>


<?php 
	}
}
?>