<?
session_start();
if(!isset($_SESSION["SES_ADMIN"])) {
	header('location:index.php');
	exit();
}
?>