<?php
class WriteResultsView {
	public static function show() {
		?>
		<a href="home">Home</a><br><br>
		<form method="post" action="models/writeContentsToFile.php">
		  File Path To Write To:<br>
		  <input type="text" name="filePath" required>
		  <br>
		  <input type="submit" value="Submit">
		  <br>
		</form>
		-- Write the full filepath name including the file name at the end. <br>
		-- Example: C:\Users\UserName\Desktop\fileName.doc<br><br><br>
		
		<style>span{color:red; }</style>
		<span>***THIS WILL OVERWRITE FILES, MAKE SURE FILE HAS A DIFFERENT NAME***</span>
		
		<?php 
	}
}
?>