<?php
$config=$user->getAllConfig();//ambil konfigurasi
$kw=$user->getKwitansi($_REQUEST['kid']);
//print_r($_REQUEST['kid']);
$display = "\n<form action=\"admin.php?".paramEncrypt('page=8&uid='.$_REQUEST['uid'])."\" method=\"POST\">";
$display.= "\n<table border=\"0\" class=\"tbl\">";
$display.= "\n<tr>";
$display.= "\n\t<td>Number</td>";
$display.= "\n\t<td>:&nbsp;".$kw['K_ID']."<input type=\"hidden\" name=\"nomor\" value=\"".$kw['K_ID']."\"></td>";
$display.= "\n</tr>";
$display.= "\n<tr>";
$display.= "\n\t<td>Receive from</td>";
$display.= "\n\t<td>:&nbsp;<input type=\"text\" name=\"trd\" size=\"25\" autocomplete=\"off\" value=\"".$kw['K_PAY_NAME']."\" required=\"required\"></td>";
$display.= "\n</tr>";
$display.= "\n<tr>";
$display.= "\n\t<td>Amount</td>";
$display.= "\n\t<td>:&nbsp;<input type=\"text\" name=\"ujml\" size=\"15\" autocomplete=\"off\" value=\"".$kw['K_PAYEE']."\" required=\"required\">&nbsp;(contoh:125000 tanpa koma dan atau titik)</td>";
$display.= "\n</tr>";
$display.= "\n<tr>";
$display.= "\n\t<td>Payment for</td>";
$display.= "\n\t<td>:&nbsp;<textarea name=\"nmpay\" rows=\"5\" cols=\"20\" required=\"required\">".$kw['K_PAYTO']."</textarea></td>";
$display.= "\n</tr>";
$display.= "\n<tr>";
$display.= "\n\t<td colspan=\"2\"><input type=\"submit\" name=\"submit\" value=\"Submit\">&nbsp;<input type=\"reset\" name=\"reset\" value=\"Reset\"></td>";
$display.= "\n</tr>";
$display.= "\n</table>";
$display.= "\n<input type=\"hidden\" name=\"company\" value=\"".$config['CONF_INST_NAME']."\"><input type=\"hidden\" name=\"logo\" value=\"".$config['CONF_INST_LOGO']."\"><input type=\"hidden\" name=\"kota\" value=\"".$config['CONF_CITY']."\"><input type=\"hidden\" name=\"jalan\" value=\"".$config['CONF_STREET']."\"><input type=\"hidden\" name=\"signed\" value=\"".$config['CONF_SIGNED']."\"><input type=\"hidden\" name=\"width\" value=\"".$config['CONF_INST_WIDTH']."\"><input type=\"hidden\" name=\"height\" value=\"".$config['CONF_INST_HEIGHT']."\"><input type=\"hidden\" name=\"date\" value=\"".date('dmY')."\">";
$display.= "\n</form>";
?>
