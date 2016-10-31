<?php
$data = $user->getAllUser();

$display = "\n<form action=\"\" method=\"POST\">";
$display.= "\n<table border=\"0\" class=\"tbl\">";
$display.= "\n<tr>";
$display.= "\n\t<td>ID</td>";
$display.= "\n\t<td>:&nbsp;".$data['USR_ID']."<input type=\"hidden\" name=\"id\" value=\"".$data['USR_ID']."\"></td>";
$display.= "\n</tr>";
$display.= "\n<tr>";
$display.= "\n\t<td>User Id</td>";
$display.= "\n\t<td><input type=\"text\" name=\"userid\" autocomplete=\"off\" value=\"".$data['USR_NAME']."\"></td>";
$display.= "\n</tr>";
$display.= "\n<tr>";
$display.= "\n\t<td colspan=\"2\">________________________________</td>";
$display.= "\n</tr>";
$display.= "\n<tr>";
$display.= "\n\t<td colspan=\"2\">Fill in, if you will change password</td>";
$display.= "\n</tr>";
$display.= "\n<tr>";
$display.= "\n\t<td>Old Password</td>";
$display.= "\n\t<td><input type=\"password\" name=\"pwdlm\"></td>";
$display.= "\n</tr>";
$display.= "\n<tr>";
$display.= "\n\t<td>New Password</td>";
$display.= "\n\t<td><input type=\"password\" name=\"pwd\"></td>";
$display.= "\n</tr>";
$display.= "\n<tr>";
$display.= "\n\t<td>Retype Password</td>";
$display.= "\n\t<td><input type=\"password\" name=\"upwd\"></td>";
$display.= "\n\t</td>";
$display.= "\n</tr>";
$display.= "\n<tr>";
$display.= "\n\t<td colspan=\"2\"><input type=\"submit\" name=\"submit\" value=\"Update\"></td>";
$display.= "\n</tr>";
$display.= "\n</table>";
$display.= "\n</form>";

if(isset($_POST['submit'])){
	$userid = mysql_escape_string($_POST['userid']);
		$id = $_POST['id'];
	if(empty($_POST['pwd']) && empty($_POST['upwd'])){
		$user->updateUserId($userid,$id);
		echo "<script>alert('User Id successfully updated!')</script>";
		echo "<meta http-equiv='refresh' content='0; url=admin.php?".paramEncrypt('page=2&uid='.$_REQUEST['uid'])."'>";
	
	}
	else{
		$pwdlm = mysql_escape_string($_POST['pwdlm']);
		$pwd = mysql_escape_string($_POST['pwd']);
		$upwd = $_POST['upwd'];
		$trueOldPassword = $user->getTrueOldPassword($pwdlm);
		if($trueOldPassword==false){
			echo "<script>alert('Old Password, wrong!')</script>";
		}
		elseif($upwd!=$pwd){
			echo "<script>alert('Fill in The retype password is not same with New Password!')</script>";
		}
		else{
			$user->updateUidPwd($userid,md5($pwd),$id);
			echo "<script>alert('User Id and Password successfully upadated!')</script>";
			echo "<meta http-equiv='refresh' content='0; url=admin.php?".paramEncrypt('page=2&uid='.$_REQUEST['uid'])."'>";
		}
	}
}

?>
