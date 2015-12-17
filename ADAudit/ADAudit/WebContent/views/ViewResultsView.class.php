<?php
class ViewResultsView {
	public static function show() {
		echo "<a href='home'>Home</a><br><br><br>";
		echo '<a href="models/DisplayTables.php?table=' . "nousers" . '">Users that should be disabled</a><br>';
		echo '<a href="models/DisplayTables.php?table=' . "serviceusers" . '">Service Accounts</a><br>';
		echo '<a href="models/DisplayTables.php?table=' . "undeterminedusers" . '">Undetermined Users</a><br>';
		echo '<a href="models/DisplayTables.php?table=' . "yesusers" . '">Users that should be kept enabled</a><br>';
	}
}
?>