<?
ini_set('display_errors', 'Off');  
ini_set('log_errors', 'On');  
ini_set('error_log', 'D:\_www\apk2\log\log.php');  
error_reporting(E_ALL); 

set_time_limit(0);
date_default_timezone_set("Asia/Jakarta");
ob_start();

include "temp/inc.rangka.php";

//inisialisasi 
$layout=new rangka;

//memanggil form login
$layout->view_login("APK Berbasis Web - v.1.1","images/logo-v1.1.png","logo");

?>