<?
class MySQLConnection{
	public function createConnection($host,$user,$pass,$db){
		$connect = mysql_connect($host,$user,$pass);
		if(!$connect){
			echo "Connection failed, please setup config of connection at inc.define_connection.php!";
		}
		$selectDb = mysql_select_db($db,$connect);
		if(!$selectDb)
		{
			echo "<br />Can not find Database, please setup config of connection at inc.define_connection.php!<br />";
		}
	}
}
?>
