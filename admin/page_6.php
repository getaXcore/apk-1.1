<?
$display = "\n<form action=\"\" method=\"POST\" enctype=\"multipart/form-data\">";
$display.= "\n<table border=\"0\" class=\"tbl\">";
$display.= "\n<tr>";
$display.= "\n\t<td>Company Name</td>";
$display.= "\n\t<td>:&nbsp;<input type=\"text\" name=\"company\" size=\"40\" autocomplete=\"off\" required=\"required\" value=\"".$_REQUEST['company']."\">&nbsp;<i>(Max 32 characters/letters)</i></td>";
$display.= "\n</tr>";
$display.= "\n<tr>";
$display.= "\n\t<td>Upload Logo</td>";
$display.= "\n\t<td>:&nbsp;<input type=\"file\" name=\"logo\"><br />&nbsp;<i>(At least have the size of 141x60 pixels, .jpg, .png, .gif, max size 2MB)</i></td>";
$display.= "\n</tr>";
$display.= "\n<tr>";
$display.= "\n\t<td>City</td>";
$display.= "\n\t<td>:&nbsp;<input type=\"text\" name=\"kota\" autocomplete=\"off\" required=\"required\" value=\"".$_REQUEST['kota']."\"></td>";
$display.= "\n</tr>";
$display.= "\n<tr>";
$display.= "\n\t<td>Street Name</td>";
$display.= "\n\t<td>:&nbsp;<input type=\"text\" name=\"jalan\" autocomplete=\"off\" required=\"required\" value=\"".$_REQUEST['jalan']."\"></td>";
$display.= "\n</tr>";
$display.= "\n<tr>";
$display.= "\n\t<td>Signer Name</td>";
$display.= "\n\t<td>:&nbsp;<input type=\"text\" name=\"signed\" autocomplete=\"off\" required=\"required\" value=\"".$_REQUEST['signed']."\"></td>";
$display.= "\n</tr>";
/*
$display.= "\n<tr>";
$display.= "\n\t<td>Size Kwitansi</td>";
$display.= "\n\t<td>:&nbsp;<input type=\"radio\" name=\"size\" value=\"700x300\">700x300 Pixel<!--&nbsp;<input type=\"radio\" name=\"size\" value=\"750x320\">750x320 Pixel--><br /><div id=\"pratinjau\"></div></td>";
$display.= "\n</tr>";
*/
$display .= "<input type=\"hidden\" name=\"width\" value=\"".$dataconfig['CONF_INST_WIDTH']."\"><input type=\"hidden\" name=\"height\" value=\"".$dataconfig['CONF_INST_HEIGHT']."\">";
$display.= "\n<tr>";
$display.= "\n\t<td colspan=\"2\"><input type=\"hidden\" name=\"id\" value=\"".$_REQUEST['id']."\"><input type=\"submit\" name=\"submit\" value=\"Update\">&nbsp;<input type=\"button\" name=\"cancel\" value=\"Cancel\" onClick=\"javascript:window.location.assign('admin.php?".paramEncrypt('page=5&uid='.$_REQUEST['uid'])."')\"></td>";
$display.= "\n</tr>";
$display.= "\n</table>";
$display.= "\n</form>";
$display.= "\n<i>*Empty <b>Upload Logo</b> <!--And <b>Size Kwitansi</b>-->, if it will not change the logo <!--And the size of the kwitansi--></i>";
//print_r($_REQUEST);

if(isset($_POST['submit'])){
	$idConfig=$_POST['id'];
	$company=mysql_escape_string($_POST['company']);
	$lengthCompany=strlen($_POST['company']);
	$kota=mysql_escape_string($_POST['kota']);
	$jalan=mysql_escape_string($_POST['jalan']);
	$signed=mysql_escape_string($_POST['signed']);
	

	if(!empty($_POST['size']) AND empty($_FILES['logo']['name'])){
		//update tanpa logo
		$sizekw=$_POST['size'];
		$arSize=explode("x",$sizekw);
		$width=$arSize[0];
		$height=$arSize[1];
		$user->updateConfigNotLogo($idConfig,$company,$kota,$jalan,$signed,$width,$height);
		echo "<script>alert('Configuration has been updated!')</script>";
		echo "<meta http-equiv='refresh' content='0; url=admin.php?".paramEncrypt('page=5&uid='.$_REQUEST['uid'])."'>";
	}
	elseif($lengthCompany>32){
		echo "\n<script>alert('Company Name, max 32 characters')</script>";
	}
	else if(empty($_POST['size']) AND !empty($_FILES['logo']['name'])){
		//update tanpa size kwitansi

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
		
		if(substr($nmFile,-4)==".png" || substr($nmFile,-4)==".jpg" || substr($nmFile,-4)==".gif"){
			$fileupload=$direktori.$nmFile;
			if(move_uploaded_file($tmpName, $fileupload)){
				$user->updateConfigNotSize($idConfig,$company,$nmFile,$kota,$jalan,$signed);
				echo "<script>alert('Configuration has been updated!')</script>";
				echo "<meta http-equiv='refresh' content='0; url=admin.php?".paramEncrypt('page=5&uid='.$_REQUEST['uid'])."'>";
			}
		}
		else{
			echo "<script>alert('Failed, maybe logo type is not jpg, png, dan gif!')</script>";
		}
		
	}
	else if(empty($_POST['size']) AND empty($_FILES['logo']['name'])){
		//update tanpa tanpa size kwitansi dan logo
		$user->updateConfigNotSizeLogo($idConfig,$company,$kota,$jalan,$signed);
		echo "<script>alert('Configuration has been updated!')</script>";
		echo "<meta http-equiv='refresh' content='0; url=admin.php?".paramEncrypt('page=5&uid='.$_REQUEST['uid'])."'>";
	}
	else{
		if(empty($_POST['size'])){
			//update tanpa size kwitansi
			
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
		
			if(substr($nmFile,-4)==".png" || substr($nmFile,-4)==".jpg" || substr($nmFile,-4)==".gif"){
				$fileupload=$direktori.$nmFile;
				if(move_uploaded_file($tmpName, $fileupload)){
					$user->updateConfigNotSize($idConfig,$company,$nmFile,$kota,$jalan,$signed);
					echo "<script>alert('Configuration has been updated!')</script>";
					echo "<meta http-equiv='refresh' content='0; url=admin.php?".paramEncrypt('page=5&uid='.$_REQUEST['uid'])."'>";
				}
			}
			else{
				echo "<script>alert('Failed, maybe logo type is not jpg, png, dan gif!')</script>";
			}
		}
		else{
			//update semua
			
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

			if(substr($nmFile,-4)==".png" || substr($nmFile,-4)==".jpg" || substr($nmFile,-4)==".gif"){
				$fileupload=$direktori.$nmFile;
				if(move_uploaded_file($tmpName, $fileupload)){
					$user->updateConfig($idConfig,$company,$nmFile,$kota,$jalan,$signed,$width,$height);
					echo "<script>alert('Configuration has been updated!')</script>";
					echo "<meta http-equiv='refresh' content='0; url=admin.php?".paramEncrypt('page=5&uid='.$_REQUEST['uid'])."'>";
				}
			}
			else{
				echo "<script>alert('Failed, maybe logo type is not jpg, png, dan gif!')</script>";
			}
		}
	}
}
?>