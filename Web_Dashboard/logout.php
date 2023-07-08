<?PHP
//Logout
session_start(); 	//to get session info
session_destroy(); 
header('location:login.php');
?>