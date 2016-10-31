<?
$config=$user->getCountConfig();
if($config==0){
	$maxIdConfig=$user->getMaxIdConfig();
	$idConfig=idConfig($maxIdConfig);
	$display = "\n<form action=\"\" method=\"POST\" enctype=\"multipart/form-data\">";
	$display.= "\n<table border=\"0\" class=\"tbl\">";
	$display.= "\n<tr>";
	$display.= "\n\t<td>Company Name</td>";
	$display.= "\n\t<td>:&nbsp;<input type=\"text\" name=\"company\" size=\"40\" autocomplete=\"off\" required=\"required\">&nbsp;<i>(Max 32 characters/letters)</i></td>";
	$display.= "\n</tr>";
	$display.= "\n<tr>";
	$display.= "\n\t<td>Upload Logo</td>";
	$display.= "\n\t<td>:&nbsp;<input type=\"file\" name=\"logo\" required=\"required\"><br />&nbsp;<i>(At least have the size of 141x60 pixels, .jpg, .png, .gif, max size 2MB)</i></td>";
	$display.= "\n</tr>";
	$display.= "\n<tr>";
	$display.= "\n\t<td>City</td>";
	$display.= "\n\t<td>:&nbsp;<input type=\"text\" name=\"kota\" autocomplete=\"off\" required=\"required\"></td>";
	$display.= "\n</tr>";
	$display.= "\n<tr>";
	$display.= "\n\t<td>Street Name</td>";
	$display.= "\n\t<td>:&nbsp;<input type=\"text\" name=\"jalan\" size=\"40\" autocomplete=\"off\" required=\"required\"></td>";
	$display.= "\n</tr>";
	$display.= "\n<tr>";
	$display.= "\n\t<td>Signer Name</td>";
	$display.= "\n\t<td>:&nbsp;<input type=\"text\" name=\"signed\" autocomplete=\"off\" required=\"required\"></td>";
	$display.= "\n</tr>";
	/*
	$display.= "\n<tr>";
	$display.= "\n\t<td>Size Kwitansi</td>";
	$display.= "\n\t<td>:&nbsp;<input type=\"radio\" name=\"size\" value=\"700x300\">700x300 Pixel&nbsp;<input type=\"radio\" name=\"size\" value=\"750x320\">750x320 Pixel<br /><div id=\"pratinjau\"></div></td>";
	$display.= "\n</tr>";
	*/
	$display.= "<input type=\"hidden\" name=\"size\" value=\"700xauto\">";
	$display.= "\n<tr>";
	$display.= "\n\t<td colspan=\"2\"><input type=\"hidden\" name=\"id\" value=\"$idConfig\"><input type=\"submit\" name=\"submit\" value=\"Submit\"></td>";
	$display.= "\n</tr>";
	$display.= "\n</table>";
	$display.= "\n</form>";
	$display.= "\n<i>*At the time of print kwitansi, paper size A4 or well used F4</i>";
}
else if($config==1){
	$dataconfig=$user->getAllConfig();
	$display = "\n<form action=\"admin.php?".paramEncrypt('page=6&uid='.$_REQUEST['uid'])."\" method=\"POST\" enctype=\"multipart/form-data\">";
	$display.= "\n<table border=\"0\" class=\"tbl\">";
	$display.= "\n<tr>";
	$display.= "\n\t<td>Company Name</td>";
	$display.= "\n\t<td>:&nbsp;".$dataconfig['CONF_INST_NAME']."<input type=\"hidden\" name=\"company\" value=\"".$dataconfig['CONF_INST_NAME']."\"></td>";
	$display.= "\n</tr>";
	$display.= "\n<tr>";
	$display.= "\n\t<td>Upload Logo</td>";
	$display.= "\n\t<td>:&nbsp;<img src=\"./images/logo_config/".$dataconfig['CONF_INST_LOGO']."\" width=\"141\" height=\"60\"><input type=\"hidden\" name=\"logo\" value=\"".$dataconfig['CONF_INST_LOGO']."\"></td>";
	$display.= "\n</tr>";
	$display.= "\n<tr>";
	$display.= "\n\t<td>City</td>";
	$display.= "\n\t<td>:&nbsp;".$dataconfig['CONF_CITY']."<input type=\"hidden\" name=\"kota\" value=\"".$dataconfig['CONF_CITY']."\"></td>";
	$display.= "\n</tr>";
	$display.= "\n<tr>";
	$display.= "\n\t<td>Street Name</td>";
	$display.= "\n\t<td>:&nbsp;".$dataconfig['CONF_STREET']."<input type=\"hidden\" name=\"jalan\" value=\"".$dataconfig['CONF_STREET']."\"></td>";
	$display.= "\n</tr>";
	$display.= "\n<tr>";
	$display.= "\n\t<td>Signer Name</td>";
	$display.= "\n\t<td>:&nbsp;".$dataconfig['CONF_SIGNED']."<input type=\"hidden\" name=\"signed\" value=\"".$dataconfig['CONF_SIGNED']."\"></td>";
	$display.= "\n</tr>";
	/*
	$display.= "\n<tr>";
	$display.= "\n\t<td>Size Kwitansi</td>";
	$display.= "\n\t<td>:&nbsp;".$dataconfig['CONF_INST_WIDTH']."x".$dataconfig['CONF_INST_HEIGHT']."&nbsp;Pixel<input type=\"hidden\" name=\"width\" value=\"".$dataconfig['CONF_INST_WIDTH']."\"><input type=\"hidden\" name=\"height\" value=\"".$dataconfig['CONF_INST_HEIGHT']."\"></td>";
	$display.= "\n</tr>";
	*/
	$display .= "<input type=\"hidden\" name=\"width\" value=\"".$dataconfig['CONF_INST_WIDTH']."\"><input type=\"hidden\" name=\"height\" value=\"".$dataconfig['CONF_INST_HEIGHT']."\">";
	$display.= "\n<tr>";
	$display.= "\n\t<td colspan=\"2\"><input type=\"hidden\" name=\"id\" value=\"".$dataconfig['CONF_ID']."\"><input type=\"submit\" name=\"Update\" value=\"Update\"></td>";
	$display.= "\n</tr>";
	$display.= "\n</table>";
	$display.= "\n</form>";
}

if(isset($_POST['submit'])){
	$idConfig=$_POST['id'];
	$company=mysql_escape_string($_POST['company']);
	$lengthCompany=strlen($_POST['company']);
	$kota=mysql_escape_string($_POST['kota']);
	$jalan=mysql_escape_string($_POST['jalan']);
	$signed=mysql_escape_string($_POST['signed']);
	$sizekw=$_POST['size'];
	$arSize=explode("x",$sizekw);
	$width=$arSize[0];
	$height=$arSize[1];

	// setting nama folder tempat upload
	$direktori = './images/logo_config/';

	// membaca nama file yang diupload
	$nmFile = mysql_escape_string($_FILES['logo']['name']);
		
	// nama file temporary yang akan disimpan di server
	$tmpName  = $_FILES['logo']['tmp_name'];
		
	// membaca ukuran file yang diupload
	$sizeFile = $_FILES['logo']['size'];
		
	// membaca jenis file yang diupload
	$typeFile = $_FILES['logo']['type'];

	if(empty($company)&&empty($kota)&&empty($signed)&&empty($sizekw)&&empty($jalan)){
		echo "\n<script>alert('The content of the configuration is still incomplete!')</script>";
	}
	elseif($lengthCompany>32){
		echo "\n<script>alert('Company Name, max 32 characters')</script>";
	}
	else{
		
		if($sizeFile>2097152){
			echo "<script>alert('Logo size exceeds 2MB!')</script>";
		}
		elseif(substr($nmFile,-4)==".png" || substr($nmFile,-4)==".jpg" || substr($nmFile,-4)==".gif"){
			
		//print_r($_REQUEST);
			$fileupload=$direktori.$nmFile;
			if(move_uploaded_file($tmpName, $fileupload)){
				$user->insertConfig($idConfig,$company,$nmFile,$kota,$jalan,$signed,$width,$height);
				echo "<script>alert('Configuration has been saved!')</script>";
				echo "<meta http-equiv='refresh' content='0; url=admin.php?".paramEncrypt('page=5&uid='.$_REQUEST['uid'])."'>";
			}
		}
		else{
			echo "<script>alert('Failed, maybe logo type is not jpg, png, dan gif!')</script>";
		}
	}
}
?>