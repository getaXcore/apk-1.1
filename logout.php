<?
//$user->deleteSession($_REQUEST['uid']);
session_start();
session_destroy();
include "config/inc.define_connection.php";
include "lib/inc.user.lib.php";
include "lib/inc.encrypt.php";

//inisialisasi
$user=new user;

//decode param url ke bentuk $_REQUEST
$_REQUEST = decode($_SERVER['REQUEST_URI']);

//delete session dari tabel
$user->deleteSession($_REQUEST['uid']);

//direct ke index
echo "<meta http-equiv='REFRESH' content='0;url=index.php'>";

//stop eksekusi script
exit();
?>