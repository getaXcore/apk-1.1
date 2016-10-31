<?php

if(isset($_POST['cari'])){
	$keySearch = $_POST['keySearch'];
	$display = form_search();
	$display.= result_search($keySearch);
}
else{
	$display = form_search();
	$display.= default_display();
}

function form_search(){
	$show = "\n\t<form action=\"admin.php?".paramEncrypt('page=9&uid='.$_REQUEST['uid'])."\" method=\"POST\">";
	$show.= "\n\t<input type=\"text\" name=\"keySearch\" size=\"30\" autocomplete=\"off\" required=\"required\">&nbsp;<input type=\"submit\" name=\"cari\" value=\"Search\">";
	$show.= "\n\t</form>";
	$show.= "\n<br />";
	return $show;
}

function result_search($keySearch){
	$keySearch = mysql_escape_string($keySearch);
	$sql = "SELECT * FROM tbl_kwitansi WHERE K_PAYTO LIKE '%$keySearch%' OR K_PAY_NAME LIKE '%$keySearch%'";
	$param ='page=9&uid='.$_REQUEST['uid'];
	$param_go_back = "admin.php?".paramEncrypt('page=9&uid='.$_REQUEST['uid']);

	$user = new user;
	$config = $user->getAllConfig();//ambil konfigurasi

	$pager = new PS_Pagination($param_go_back,$sql, 10, 5, $param);

	$pager->setDebug(true);
	$show = "\n<table border=\"0\" cellpadding=\"2\" cellspacing=\"2\" class=\"tbl\" width=\"85%\">";
	$show.= "\n<tr bgcolor=\"#99ccff\" align=\"center\" style=\"{font-weight: bold;}\">";
	$show.= "\n\t<td>Number</td>";
	$show.= "\n\t<td>Amount</td>";
	$show.= "\n\t<td>Payment</td>";
	$show.= "\n\t<td>From</td>";
	$show.= "\n\t<td>Date</td>";
	$show.= "\n\t<td>Download</td>";
	$show.= "\n</tr>";
	
	$rs = $pager->paginate();
	if(!$rs) die(mysql_error());
	//if($rs!==0){
		while($row = mysql_fetch_assoc($rs)) {
			$show.= "\n<form action=\"admin/downloadPdf.php\" method=\"POST\" target=\"_blank\">";
			$show.= "\n<tr bgcolor=\"#e2e2e2\">";
			$show.= "\n\t<td>".$row['K_ID']."<input type=\"hidden\" name=\"nomor\" value=\"".$row['K_ID']."\"></td>";
			$show.= "\n\t<td>".rupiah($row['K_PAYEE'])."<input type=\"hidden\" name=\"ujml\" value=\"".$row['K_PAYEE']."\"></td>";
			//$show.= "\n\t<td>".$row['K_TOT_PAY_TXT']."</td>";
			$show.= "\n\t<td>".$row['K_PAYTO']."<input type=\"hidden\" name=\"nmpay\" value=\"".$row['K_PAYTO']."\"></td>";
			$show.= "\n\t<td>".$row['K_PAY_NAME']."<input type=\"hidden\" name=\"trd\" value=\"".$row['K_PAY_NAME']."\"></td>";
			$show.= "\n\t<td>".substr($row['K_PAY_DATE'],0,2)."-".substr($row['K_PAY_DATE'],2,2)."-".substr($row['K_PAY_DATE'],4,4)."<input type=\"hidden\" name=\"date\" value=\"".$row['K_PAY_DATE']."\"></td>";
			$show.= "\n\t<td align=\"center\"><input type=\"submit\" name=\"download\" value=\"Download\"></td>";
			$show.= "\n</tr>";
			$show.= "\n<input type=\"hidden\" name=\"company\" value=\"".$config['CONF_INST_NAME']."\">";
			$show.= "\n<input type=\"hidden\" name=\"logo\" value=\"".$config['CONF_INST_LOGO']."\">";
			$show.= "\n<input type=\"hidden\" name=\"kota\" value=\"".$config['CONF_CITY']."\">";
			$show.= "\n<input type=\"hidden\" name=\"jalan\" value=\"".$config['CONF_STREET']."\">";
			$show.= "\n<input type=\"hidden\" name=\"signed\" value=\"".$config['CONF_SIGNED']."\">";
			$show.= "\n<input type=\"hidden\" name=\"width\" value=\"".$config['CONF_INST_WIDTH']."\">";
			$show.= "\n<input type=\"hidden\" name=\"height\" value=\"".$config['CONF_INST_HEIGHT']."\">";
			$show.= "\n</form>";
		}
		/*
	}
	else{
		$show.= "\n<tr bgcolor=\"#ebebeb\">";
		$show.= "\n\t<td>No Record</td>";
		$show.= "\n<tr colspan=\"5\">";
	}
	*/
	$show.= "\n<tr>";
	$show.= "\n\t<td colspan=\"6\">";
	$show.= $pager->renderFullNav()."<br />";
	$show.= "\n\t</td>";
	$show.= "\n</tr>";
	$show.= "\n</table>";
	return $show;

}

function default_display(){
	$sql = "SELECT * FROM tbl_kwitansi";
	$param ='page=9&uid='.$_REQUEST['uid'];
	$param_go_back = "admin.php?".paramEncrypt('page=9&uid='.$_REQUEST['uid']);

	$user = new user;
	$config = $user->getAllConfig();//ambil konfigurasi

	$pager = new PS_Pagination($param_go_back,$sql, 10, 5, $param);

	$pager->setDebug(true);
	$show = "\n<table border=\"0\" cellpadding=\"2\" cellspacing=\"2\" class=\"tbl\" width=\"85%\">";
	$show.= "\n<tr bgcolor=\"#99ccff\" align=\"center\" style=\"{font-weight: bold;}\">";
	$show.= "\n\t<td>Number</td>";
	$show.= "\n\t<td>Amount</td>";
	$show.= "\n\t<td>Payment</td>";
	$show.= "\n\t<td>From</td>";
	$show.= "\n\t<td>Date</td>";
	$show.= "\n\t<td>Download</td>";
	$show.= "\n</tr>";


	$rs = $pager->paginate();
	if(!$rs) die(mysql_error());
	//if($rs!==0){
		while($row = mysql_fetch_assoc($rs)) {
			$show.= "\n<form action=\"admin/downloadPdf.php\" method=\"POST\" target=\"_blank\">";
			$show.= "\n<tr bgcolor=\"#e2e2e2\">";
			$show.= "\n\t<td>".$row['K_ID']."<input type=\"hidden\" name=\"nomor\" value=\"".$row['K_ID']."\"></td>";
			$show.= "\n\t<td>".rupiah($row['K_PAYEE'])."<input type=\"hidden\" name=\"ujml\" value=\"".$row['K_PAYEE']."\"></td>";
			//$show.= "\n\t<td>".$row['K_TOT_PAY_TXT']."</td>";
			$show.= "\n\t<td>".$row['K_PAYTO']."<input type=\"hidden\" name=\"nmpay\" value=\"".$row['K_PAYTO']."\"></td>";
			$show.= "\n\t<td>".$row['K_PAY_NAME']."<input type=\"hidden\" name=\"trd\" value=\"".$row['K_PAY_NAME']."\"></td>";
			$show.= "\n\t<td>".substr($row['K_PAY_DATE'],0,2)."-".substr($row['K_PAY_DATE'],2,2)."-".substr($row['K_PAY_DATE'],4,4)."<input type=\"hidden\" name=\"date\" value=\"".$row['K_PAY_DATE']."\"></td>";
			$show.= "\n\t<td align=\"center\"><input type=\"submit\" name=\"download\" value=\"Download\"></td>";
			$show.= "\n</tr>";
			$show.= "\n<input type=\"hidden\" name=\"company\" value=\"".$config['CONF_INST_NAME']."\">";
			$show.= "\n<input type=\"hidden\" name=\"logo\" value=\"".$config['CONF_INST_LOGO']."\">";
			$show.= "\n<input type=\"hidden\" name=\"kota\" value=\"".$config['CONF_CITY']."\">";
			$show.= "\n<input type=\"hidden\" name=\"jalan\" value=\"".$config['CONF_STREET']."\">";
			$show.= "\n<input type=\"hidden\" name=\"signed\" value=\"".$config['CONF_SIGNED']."\">";
			$show.= "\n<input type=\"hidden\" name=\"width\" value=\"".$config['CONF_INST_WIDTH']."\">";
			$show.= "\n<input type=\"hidden\" name=\"height\" value=\"".$config['CONF_INST_HEIGHT']."\">";

			$show.= "\n</form>";
		}
		/*
	}
	else{
		$show.= "\n<tr bgcolor=\"#ebebeb\">";
		$show.= "\n\t<td>No Record</td>";
		$show.= "\n<tr colspan=\"5\">";
	}
	*/
	$show.= "\n<tr>";
	$show.= "\n\t<td colspan=\"6\">";
	$show.= $pager->renderFullNav()."<br />";
	$show.= "\n\t</td>";
	$show.= "\n</tr>";
	$show.= "\n</table>";
	return $show;
}

?>
