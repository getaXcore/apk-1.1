<?
include "inc.connect.php";
DEFINE("host","localhost");
DEFINE("user","root");
DEFINE("pass","root");
DEFINE("db","dbapk");
$mysql=new MySQLConnection;
$mysql->createConnection(host,user,pass,db);
?>
