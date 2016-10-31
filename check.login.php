<?
ini_set('display_errors', 'Off');  
ini_set('log_errors', 'On');  
ini_set('error_log', 'D:\_www\apk2\log\log.php');  
error_reporting(E_ALL); 

session_start();
include "config/inc.define_connection.php";
include "lib/inc.user.lib.php";
include "lib/inc.encrypt.php";

$userid	= $_POST['uid'];
$pwd	= $_POST['pwd'];

if(trim($userid) == "") {
	echo "<script language='javascript'>alert('User Id is empty..')</script>";
	include "index.php";
}
else if (trim($pwd)== "" ) {
	echo "<script language='javascript'>alert('Password is empty..')</script>";
	include "index.php";
}
else{
	//inisialisasi
	$user=new user;
	
	//cleaning
	$userid=mysql_escape_string($userid);
	$pwd=mysql_escape_string($pwd);
	
	//cek user
	$periksaUserId = $user->getuser($userid,md5($pwd));

	if($periksaUserId>=1){
		// Jika sukses
		
		//mengambil session id
		$sessionid=session_id();


		try {
			$error = 'Duplicate entry \'admin\' for key \'PRIMARY\'';
			throw new Exception($error);
			
			//insert session ke table
			$user->insertSession($userid,$sessionid);

		} catch (Exception $user) {
			//echo "<script>alert('Gagal Query : Duplicate entry \'admin\' for key \'PRIMARY\' on tbl_session\nSession telah berhasil diperbaharui')</script>";

			//inisialisasi
			$user=new user;
			
			//delete session dari tabel
			$user->deleteSession($userid);
		}

		
		//menjalankan kembali perintah insert session ke table
		$user->insertSession($userid,$sessionid);

		//membuat variabel session untuk pengecekan di content
		$_SESSION["SES_ADMIN"]=$userid;

		echo "<script language='javascript'>alert('You successfully login, welcome!')</script>";

		// Redireksi menuju admin.php
		echo "<meta http-equiv='refresh' content='0; url=admin.php?".paramEncrypt('uid='.$userid)."'>";

		//stop eksekusi script
		exit();

	}else{
		// Jika gagal
		echo "<script language='javascript'>alert('User Id and Password, wrong!')</script>";
		include "index.php";
	}


}
?>