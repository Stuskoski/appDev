<?php
session_start();

if(isset($_SESSION['user_session'])){
	unset($_SESSION['user_session']);
}
if(isset($_SESSION['firstName'])){
	unset($_SESSION['firstName']);
}
if(isset($_SESSION['user_id'])){
	unset($_SESSION['user_id']);
}

header("location:../home");


?>