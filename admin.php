<?php
ini_set('display_errors', 'Off');  
ini_set('log_errors', 'On');  
ini_set('error_log', '/tmp/log.php');  
error_reporting(E_ALL); 

set_time_limit(0);
date_default_timezone_set("Asia/Jakarta");
ob_start();


include "config/inc.define_connection.php";
include "admin/inc.session.php";
include "lib/inc.encrypt.php";
include "temp/inc.rangka.php";
include "lib/inc.user.lib.php";
include "lib/inc.func.php";
include "lib/pagination/ps_pagination.php";

//inisialisasi 
$layout=new rangka;

//inisialisasi
$user=new user;
	
//decode param url ke bentuk $_REQUEST
$_REQUEST = decode($_SERVER['REQUEST_URI']);

//content admin
if(isset($_SESSION["SES_ADMIN"])){
	$layout->temp_admin("APK Berbasis Web","images/internallogo.png","logo","My Profile","View Profile","Update Profile","My Tools","New","Configuration","History","index","","");
}
if(!isset($_REQUEST['page'])){
	echo $layout->contentindexadmin("Welcome, Admin..","");
}
else if($_REQUEST['page']==1){//page view profile
	require_once("admin/page_1.php");
	echo $layout->contentpageview("Profile",$display);
}
else if($_REQUEST['page']==2){//page update profile
	require_once("admin/page_2.php");
	echo $layout->contentpageview("Update Profile",$display);
}
else if($_REQUEST['page']==3){//page new kwitansi
	require_once("admin/page_3.php");
	echo $layout->contentpageview("New Kwitansi",$display);
}
else if($_REQUEST['page']==4){//preview after submit new kwitansi
	require_once("admin/page_4.php");
	echo $layout->contentpageview("New Kwitansi",$display);
}
else if($_REQUEST['page']==5){//page configuration
	require_once("admin/page_5.php");
	echo $layout->contentpageview("Configuration",$display);
}
else if($_REQUEST['page']==6){//update page configuration
	require_once("admin/page_6.php");
	echo $layout->contentpageview("Configuration",$display);
}
else if($_REQUEST['page']==7){//back & repair kwitansi
	require_once("admin/page_7.php");
	echo $layout->contentpageview("New Kwitansi",$display);
}
else if($_REQUEST['page']==8){////preview after back & repair kwitansi
	require_once("admin/page_8.php");
	echo $layout->contentpageview("New Kwitansi",$display);
}
else if($_REQUEST['page']==9){//page history
	require_once("admin/page_9.php");
	echo $layout->contentpageview("History",$display);
}







?>
