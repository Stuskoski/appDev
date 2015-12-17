<?php
class HomeView {
	public static function show() {
		//if(!isset($_SESSION['user_session'])){
		//	header("location:login");
		//}

?>
   <title>AD Audit Home</title>
   <h3>AD Audit Tool</h3>
   <i>See Instructions How To Run And File Formats:<a href="HowTo">HowTo</a></i><br>
   <i>Clear Database Before New Audit:<a href="models/ClearDB.php" onClick="return confirm('Are you sure you want to clear the contents of the Database?');">Clear</a></i><br>
   <i>See Last Saved Audit Results:<a href="viewResults">Last Audit</a></i><br><br>
   <i>Write Audit Results To A File:<a href="models/writeContentsToFile.php">Write Results</a></i><br><br>
   <form action="models/upload.php" method="post" enctype="multipart/form-data">
      Select Existing Users File To Upload. I.E(Users To Run Audit Against):
      <input type="file" name="fileToUpload" id="fileToUpload">
      <br>
      <br>
      
      Select Active Directory Accounts File To Upload I.E(AD Accounts To Audit):
      <input type="file" name="fileToUpload2" id="fileToUpload2">
      <br>
      <input type="submit" value="Run Audit" name="submit">
   </form>
   	  <span>Clicking on "Run Audit" will upload data into database.  Give it a few minutes to complete.</span>
<?php 
	}
}


?>