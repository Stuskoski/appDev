<?php
ob_start();
session_start();
class MasterView {
  public static function showHeader() {  		
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <!-- Latest compiled and minified CSS -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

 <!-- Optional theme -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

 <!-- Latest compiled and minified JavaScript -->
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
 <script src="../js/sorttable.js"></script>
</head>
<body>

<!-- HEADER SECTION START-->
	<header id="header">
	</header>
	<!-- HEADER SECTION END-->
<?php 
  }
  
  public static function showFooter() {
  	?>
	<!-- FOOTER SECTION START-->
	<footer>
	</footer>
	<!-- FOOTER SECTION END-->
</body>
</html>
 <?php
  }
}
?>
