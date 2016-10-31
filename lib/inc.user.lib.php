<?php
class user{
	public function getuser($userid,$pwd){
		$query="SELECT *FROM tbl_user WHERE USR_NAME='$userid' AND USR_PWD='$pwd'";
		$result = mysql_query($query);
		if(!$result){
			die("Gagal Query:".mysql_error());
		}
		return $periksaUserId = mysql_num_rows($result);
		/*
		if(mysql_num_rows($result)!=null){
			return mysql_result($result,0);
		}
		*/
		
	}
	public function getIduser($uid,$pwd){
		$query="SELECT USR_ID FROM tbl_user WHERE USR_NAME='$uid' AND USR_PWD='$pwd'";
		$result = mysql_query($query);
		if(!$result){
			die("Gagal Query:".mysql_error());
		}
		if(mysql_num_rows($result)!=null){
			return mysql_result($result,0);
		}
	}
	public function createIdSession(){
		$query="SELECT MAX(SUBSTR(SESSION_ID,2)) AS MAX_ID FROM tbl_session";
		$result = mysql_query($query);
		if(!$result){
			die("Gagal Query:".mysql_error());
		}
		if(mysql_num_rows($result)!=null){
			if(mysql_result($result,0)==0){
				return $idSess=1;
			}
			else{
				return $idSess=mysql_result($result,0)+1;
			}
		}
	}
	public function insertSession($uid,$session){
		$query="INSERT INTO tbl_session VALUES('$uid','$session','".date('Y-m-d H:i:s')."')";
		$result = mysql_query($query);
		if(!$result){
			die("Gagal Query:".mysql_error());
		}
	}
	public function checkSession($uid){
		$query="SELECT SESSION_ID FROM tbl_session WHERE SESSION_UID='$uid'";
		$result = mysql_query($query);
		if(!$result){
			die("Gagal Query:".mysql_error());
		}
		if(mysql_num_rows($result)!=null){
			return mysql_result($result,0);
		}
	}
	public function pageAdmin($expired){
		$expire=session_cache_expire($expired);
		if($expire<=1){
			echo "session anda telah habis";
		}
		else{
		return include("admin/admin.php");
		}
	}
	public function deleteSession($uid){
		$query="DELETE FROM tbl_session WHERE SESSION_UID='$uid'";
		$result = mysql_query($query);
		if(!$result){
			die("Gagal Query:".mysql_error());
		}
	}
	public function updateSession($uid,$sessionid){
		$query="UPDATE tbl_session SET SESSION_ID='$sessionid', SESSION_DATE='".date('Y-m-d H:i:s')."' WHERE SESSION_UID='$uid'";
		$result = mysql_query($query);
		if(!$result){
			die("Gagal Query:".mysql_error());
		}
	}
	public function getViewUser(){
		//$query="SELECT a.USR_ID,a.USR_NAME,b.SESSION_DATE FROM tbl_user as a inner join tbl_session as b WHERE USR_ID='apk1'";
		$query="SELECT USR_ID,USR_NAME,SESSION_DATE FROM tbl_user inner join tbl_session";
		$result = mysql_query($query);
		if(!$result){
			die("Gagal Query:".mysql_error());
		}
		$hasil=mysql_fetch_array($result);
		foreach ($hasil as $key=>$value){
			$hasil[$key]=$value;
		}
		return $hasil;
		
	}
	public function getAllUser(){
		$query="SELECT *FROM tbl_user";
		$result = mysql_query($query);
		if(!$result){
			die("Gagal Query:".mysql_error());
		}
		$hasil=mysql_fetch_array($result);
		foreach ($hasil as $key=>$value){
			$hasil[$key]=$value;
		}
		return $hasil;
		
	}
	public function updateUserId($userid,$id){
		$query="UPDATE tbl_user SET USR_NAME='$userid' WHERE  USR_ID='$id'";
		$result = mysql_query($query);
		if(!$result){
			die("Gagal Query:".mysql_error());
		}
		
	}
	public function updateUidPwd($userid,$pwd,$id){
		$query="UPDATE tbl_user SET USR_NAME='$userid', USR_PWD='$pwd' WHERE  USR_ID='$id'";
		$result = mysql_query($query);
		if(!$result){
			die("Gagal Query:".mysql_error());
		}
	}
	public function getMaxIdKwitansi(){
		$query="SELECT MAX(SUBSTR(K_ID,2)) AS MAX_NUMBER FROM tbl_kwitansi";
		$result = mysql_query($query);
		if(!$result){
			die("Gagal Query:".mysql_error());
		}
		if(mysql_num_rows($result)!=null){
			return mysql_result($result,0);
		}
	}
	public function getCountConfig(){
		$query="SELECT COUNT(*) FROM tbl_config";
		$result = mysql_query($query);
		if(!$result){
			die("Gagal Query:".mysql_error());
		}
		if(mysql_num_rows($result)!=null){
			return mysql_result($result,0);
		}
	}
	public function getAllConfig(){
		$query="SELECT *FROM tbl_config";
		$result = mysql_query($query);
		if(!$result){
			die("Gagal Query:".mysql_error());
		}
		$hasil=mysql_fetch_array($result);
		foreach ($hasil as $key=>$value){
			$hasil[$key]=$value;
		}
		return $hasil;
		
	}
	public function insertConfig($id,$company,$logo,$kota,$jalan,$signed,$width,$height){
		$query="INSERT INTO tbl_config VALUES('$id','$company','$logo','$kota','$jalan','$signed','$width','$height')";
		$result = mysql_query($query);
		if(!$result){
			die("Gagal Query:".mysql_error());
		}
	}
	public function updateConfigNotLogo($id,$company,$kota,$jalan,$signed,$width,$height){
		$query="UPDATE tbl_config SET CONF_INST_NAME='$company',CONF_CITY='$kota',CONF_STREET='$jalan',CONF_SIGNED='$signed',CONF_INST_WIDTH='$width',CONF_INST_HEIGHT='$height' WHERE CONF_ID='$id'";
		$result = mysql_query($query);
		if(!$result){
			die("Gagal Query:".mysql_error());
		}
	}
	public function updateConfigNotSize($id,$company,$logo,$kota,$jalan,$signed){
		$query="UPDATE tbl_config SET CONF_INST_NAME='$company',CONF_INST_LOGO='$logo',CONF_CITY='$kota',CONF_STREET='$jalan',CONF_SIGNED='$signed' WHERE CONF_ID='$id'";
		$result = mysql_query($query);
		if(!$result){
			die("Gagal Query:".mysql_error());
		}
	}
	public function updateConfigNotSizeLogo($id,$company,$kota,$jalan,$signed){
		$query="UPDATE tbl_config SET CONF_INST_NAME='$company',CONF_CITY='$kota',CONF_STREET='$jalan',CONF_SIGNED='$signed' WHERE CONF_ID='$id'";
		$result = mysql_query($query);
		if(!$result){
			die("Gagal Query:".mysql_error());
		}
	}
	public function updateConfig($id,$company,$logo,$kota,$jalan,$signed,$width,$height){
		$query="UPDATE tbl_config SET CONF_INST_NAME='$company',CONF_INST_LOGO='$logo',CONF_CITY='$kota',CONF_STREET='$jalan',CONF_SIGNED='$signed',CONF_INST_WIDTH='$width',CONF_INST_HEIGHT='$height' WHERE CONF_ID='$id'";
		$result = mysql_query($query);
		if(!$result){
			die("Gagal Query:".mysql_error());
		}
	}
	public function getMaxIdConfig(){
		$query="SELECT MAX(SUBSTR(CONF_ID,5)) AS MAX_NUMBER FROM tbl_config";
		$result = mysql_query($query);
		if(!$result){
			die("Gagal Query:".mysql_error());
		}
		if(mysql_num_rows($result)!=null){
			return mysql_result($result,0);
		}
	}
	public function insertKwitansi($kid,$kuid,$kpay,$ktpay,$kpayto,$kname,$kdate){
		$query="INSERT INTO tbl_kwitansi VALUES('$kid','$kuid','$kpay','$ktpay','$kpayto','$kname','$kdate')";
		$result = mysql_query($query);
		if(!$result){
			die("Gagal Query:".mysql_error());
		}
	}
	public function getKwitansi($kid){
		$query="SELECT *FROM tbl_kwitansi WHERE K_ID='$kid'";
		$result = mysql_query($query);
		if(!$result){
			die("Gagal Query:".mysql_error());
		}
		$hasil=mysql_fetch_array($result);
		foreach ($hasil as $key=>$value){
			$hasil[$key]=$value;
		}
		return $hasil;
		
	}
	public function updateKwitansi($kid,$kpay,$ktpay,$kpayto,$kname){
		$query="UPDATE tbl_kwitansi SET K_PAYEE='$kpay',K_TOT_PAY_TXT='$ktpay',K_PAYTO='$kpayto',K_PAY_NAME='$kname' WHERE K_ID='$kid'";
		$result = mysql_query($query);
		if(!$result){
			die("Gagal Query:".mysql_error());
		}
	}
	public function getHistory($keySearch){
		$query="SELECT * FROM tbl_kwitansi WHERE K_PAYTO LIKE '%$keySearch%' OR K_PAY_NAME LIKE '%$keySearch%'";
		$result = mysql_query($query);
		if(!$result){
			die("Gagal Query:".mysql_error());
		}
		while($hasil=mysql_fetch_array($result)){
			return $hasil;
		}
	}
	public function getTrueOldPassword($pwd){
		$query="SELECT USR_PWD FROM tbl_user WHERE USR_PWD=MD5('$pwd')";
		$result = mysql_query($query);
		if(!$result){
			die("Gagal Query:".mysql_error());
		}
		if(mysql_num_rows($result)!=null){
			return mysql_result($result,0);
		}
	}
	
}
?>
