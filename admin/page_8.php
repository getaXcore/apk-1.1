<?php
//Insert ke tabel kwitansi
if(!empty($_REQUEST['nomor']) && !empty($_REQUEST['uid']) && !empty($_REQUEST['trd']) && !empty($_REQUEST['ujml']) && !empty($_REQUEST['nmpay']) && !empty($_REQUEST['date'])){
	$ktpay=terbilang($_REQUEST['ujml']);
	$user->updateKwitansi($_REQUEST['nomor'],$_REQUEST['ujml'],$ktpay,mysql_escape_string($_REQUEST['nmpay']),mysql_escape_string($_REQUEST['trd']));
}
else{
	echo "\n<script>alert('There is an error in the system, please log out and log back in!')</script>";
	echo "\n<meta http-equiv='refresh' content='0; url=admin.php?".paramEncrypt('page=3&uid='.$_REQUEST['uid'])."'>";
}

$display = "\n<form action=\"admin/downloadPdf.php\" method=\"POST\" target=\"_blank\">";
$display.= "\n<table border=\"0\" class=\"tbl\">";
$display.= "\n<tr>";
$display.= "\n\t<td>Number</td>";
$display.= "\n\t<td>:&nbsp;".$_REQUEST['nomor']."<input type=\"hidden\" name=\"nomor\" value=\"".$_REQUEST['nomor']."\"></td>";
$display.= "\n</tr>";
$display.= "\n<tr>";
$display.= "\n\t<td>Receive from</td>";
$display.= "\n\t<td>:&nbsp;".$_REQUEST['trd']."<input type=\"hidden\" name=\"trd\" value=\"".$_REQUEST['trd']."\"></td>";
$display.= "\n</tr>";
$display.= "\n<tr>";
$display.= "\n\t<td>Amount</td>";
$display.= "\n\t<td>:&nbsp;".rupiah($_REQUEST['ujml'])."<input type=\"hidden\" name=\"ujml\" value=\"".$_REQUEST['ujml']."\"></td>";
$display.= "\n</tr>";
$display.= "\n<tr>";
$display.= "\n\t<td>Payment for</td>";
$display.= "\n\t<td>:&nbsp;".$_REQUEST['nmpay']."<input type=\"hidden\" name=\"nmpay\" value=\"".$_REQUEST['nmpay']."\"></td>";
$display.= "\n</tr>";
$display.= "\n<tr>";
$display.= "\n\t<td colspan=\"2\"><input type=\"button\" name=\"preview\" value=\"Preview\">&nbsp;<input type=\"submit\" name=\"download\" value=\"Download\">&nbsp;<input type=\"button\" name=\"back\" value=\"Back\" onClick=\"javascript:location.assign('admin.php?".paramEncrypt('page=7&uid='.$_REQUEST['uid'].'&kid='.$_REQUEST['nomor'])."')\"></td>";
$display.= "\n</tr>";
$display.= "\n</table>";
$display.= "\n<input type=\"hidden\" name=\"company\" value=\"".$_REQUEST['company']."\"><input type=\"hidden\" name=\"logo\" value=\"".$_REQUEST['logo']."\"><input type=\"hidden\" name=\"kota\" value=\"".$_REQUEST['kota']."\"><input type=\"hidden\" name=\"jalan\" value=\"".$_REQUEST['jalan']."\"><input type=\"hidden\" name=\"signed\" value=\"".$_REQUEST['signed']."\"><input type=\"hidden\" name=\"width\" value=\"".$_REQUEST['width']."\"><input type=\"hidden\" name=\"height\" value=\"".$_REQUEST['height']."\"><input type=\"hidden\" name=\"date\" value=\"".$_REQUEST['date']."\">";
$display.= "\n</form>";
$display.= "\n<i>*To correct the data if there is a mistake, press the <b>Back</b> button</i></i><br />";
$display.= "\n<i>**And make sure that you have set the configuration on the <b>Configuration</b> menu before committing <b>Preview</b> or <b>Download</b></i><br />";

//Display Preview
$display.= "\n<div id=\"boxes\">";
$display.= "\n\t<div id=\"popup\" class=\"window\">";
$display.= "\n\t<a href=\"#\" class=\"close\"></a>";
//$display.= "\n\t<table class=\"preview\">";	
//$display.= "\n\t<tr>";
//$display.= "\n\t\t<td width=\"15%\"><div id=\"logo\"><img src=\"./images/logo_config/".$_REQUEST['logo']."\" height=\"60\" width=\"141\"></div></td>";
//$display.= "\n\t\t<td id=\"logo\"><img src=\"./images/logo_config/".$_REQUEST['logo']."\" height=\"60\" width=\"141\"></td>";
//$display.= "\n\t\t<td id=\"company\">tes</td>";
//$display.= "\n\t</tr>";
//$display.= "\n\t</table>";
/*
$display.= "\n\t<div class=\"preview\">";
$display.= "\n\t<div id=\"logo\"><img src=\"./images/logo_config/".$_REQUEST['logo']."\" height=\"60\" width=\"141\"></div>";
$display.= "\n\t<div id=\"company\">".$_REQUEST['company']."</div>";
$display.= "\n\t</div>";
$display.= "\n\t<div class=\"preview2\">";
$display.= "\n\t<div id=\"isi\">isinya di sini</div>";
$display.= "\n\t</div>";
*/
$bulan=monthString();
$display.= "
<table border=\"0\" cellspacing=\"1\" cellpadding=\"2\" width=\"100%\">
  <tr>
  	<td width=\"1\">&nbsp;</td>
    <td width=\"141\" height=\"69\"><img src=\"images/logo_config/".$_REQUEST['logo']."\" width=\"141\" height=\"69\" alt=\"#\" /></td>
    <td colspan=\"3\" align=\"center\" ><br />
		<font class=\"company-title\">".$_REQUEST['company']."</font>
		<br /><br />
		<font class=\"element-text\">".$_REQUEST['jalan']."</font>
		<br /><br />
	</td>
  </tr>
  <tr>
  	<td>&nbsp;</td>
    <td height=\"4\" colspan=\"4\" align=\"center\" valign=\"top\"><hr /></td>
  </tr>
  <tr>
  	<td>&nbsp;</td>
    <td class=\"element-text\" valign=\"top\">Nomor</td>
    <td width=\"5\" align=\"center\" class=\"element-text\" valign=\"top\">:</td>
    <td width=\"342\" class=\"element-text\" colspan=\"2\">".$_REQUEST['nomor']."</td>
  </tr>
  <tr>
  	<td>&nbsp;</td>
    <td class=\"element-text\" valign=\"top\">Telah Terima Dari</td>
    <td align=\"center\" class=\"element-text\" valign=\"top\">:</td>
    <td class=\"element-text\" colspan=\"2\">".$_REQUEST['trd']."</td>
  </tr>
  <tr>
  	<td>&nbsp;</td>
    <td class=\"element-text\" valign=\"top\">Uang Sejumlah</td>
    <td align=\"center\" class=\"element-text\" valign=\"top\">:</td>
    <td class=\"element-text\" colspan=\"2\">".terbilang($_REQUEST['ujml'])." rupiah</td>
  </tr>
  <tr>
  	<td>&nbsp;</td>
    <td class=\"element-text\" valign=\"top\">Untuk Pembayaran</td>
    <td align=\"center\" class=\"element-text\" valign=\"top\">:</td>
    <td class=\"element-text\" colspan=\"2\" rowspan=\"2\" valign=\"top\">".$_REQUEST['nmpay']."</td>
  </tr>
  <tr>
  	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
  </tr>
  <tr>
  	<td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
  	<td>&nbsp;</td>
    <td align=\"center\" class=\"element-value\" width=\"130\">".rupiah($_REQUEST['ujml'])."</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align=\"center\" class=\"element-text\" width=\"180\">".$_REQUEST['kota'].", ".substr($_REQUEST['date'],0,2)."&nbsp;".$bulan[substr($_REQUEST['date'],2,2)]."&nbsp;".substr($_REQUEST['date'],4,4)."</td>
  </tr>
  <tr>
  	<td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
  	<td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
  	<td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align=\"center\" class=\"element-text\">".$_REQUEST['signed']."</td>
  </tr>
</table>
";
$display.= "\n\t</div>";
$display.= "\n</div>";
$display.= "\n<div id=\"bg_popup\"></div>";
?>
