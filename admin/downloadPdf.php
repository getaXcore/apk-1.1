<?php
header("Content-type: application/pdf");

include "../tcpdf/config/lang/eng.php";
include "../tcpdf/htmlcolors.php";
include "../tcpdf/tcpdf.php";
include "../lib/inc.func.php";
/*
$html = "
<style>
.company-title {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 41px;
	text-align:center;
	color: #666;
}
.element-text {
	font-family: Arial, Helvetica, sans-serif;
}
.element-text {
	font-family: Arial, Helvetica, sans-serif;
}
.element-text {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 8pt;
	font-weight: bold;
	vertical-align:top;
	color: #666;
}
.layout{
	border-top-color:#666;
	border-top-style:solid;
	border-top-width:2px;
	border-right-color:#666;
	border-right-style:solid;
	border-right-width:2px;
	border-left-color:#666;
	border-left-style:solid;
	border-left-width:2px;
	width:696px;
}
</style>
";
$html.= "<table border=\"0\" cellspacing=\"4\" cellpadding=\"3\" class=\"layout\">";
$html.= "<tr>";
$html.= "<td width=\"80\"><img src=\"../images/logo_config/".$_REQUEST['logo']."\" width=\"80\" height=\"69\" alt=\"#\" /></td>";
$html.= "<td colspan=\"2\" width=\"433\" align=\"center\"><br /><br />";
$html.= "<font class=\"company-title\">".$_REQUEST['company']."</font>";
$html.= "<br /><br />";
$html.= "<font class=\"element-text\">".$_REQUEST['jalan']."</font>";
$html.= "</td>";
$html.= "</tr>";
$html.= "<tr>";
$html.= "<td colspan=\"3\"><img src=\"../images/line-graphic.png\" width=\"600\" height=\"5\" alt=\"#\" /></td>";
$html.= "</tr>";
$html.= "</table>";

$html2 = "
<style>
.layout{
	border-right-color:#666;
	border-right-style:solid;
	border-right-width:2px;
	border-left-color:#666;
	border-left-style:solid;
	border-left-width:2px;
	border-bottom-color:#666;
	border-bottom-style:solid;
	border-bottom-width:2px;
	width:696px;
}
.element-text {
	font-family: Arial, Helvetica, sans-serif;
}
.element-text {
	font-family: Arial, Helvetica, sans-serif;
}
.element-text {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 8pt;
	font-weight: bold;
	vertical-align:top;
	color: #666;
}
.element-value {
	border-top-color:#666;
	border-top-style:inset;
	border-top-width:2px;
	border-bottom-color:#666;
	border-bottom-style:outset;
	border-bottom-width:2px;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 8pt;
	font-weight: bold;
	color: #666;
}
</style>
";

$bulan=monthString();

$html2.= "<table border=\"0\" cellspacing=\"5\" cellpadding=\"2\" class=\"layout\">";
$html2.= "<tr>";
$html2.= "<td class=\"element-text\" width=\"15%\">Nomor</td>";
$html2.= "<td align=\"center\" class=\"element-text\" width=\"3%\">:</td>";
$html2.= "<td class=\"element-text\" colspan=\"3\" width=\"57%\">".$_REQUEST['nomor']."</td>";
$html2.= "</tr>";
$html2.= "<tr>";
$html2.= "<td class=\"element-text\" width=\"15%\">Telah Terima Dari</td>";
$html2.= "<td align=\"center\" class=\"element-text\" width=\"3%\">:</td>";
$html2.= "<td class=\"element-text\" colspan=\"3\">".$_REQUEST['trd']."</td>";
$html2.= "</tr>";
$html2.= "<tr>";
$html2.= "<td class=\"element-text\" width=\"15%\">Uang Sejumlah</td>";
$html2.= "<td align=\"center\" class=\"element-text\" width=\"3%\">:</td>";
$html2.= "<td class=\"element-text\" colspan=\"3\">".terbilang($_REQUEST['ujml'])." rupiah</td>";
$html2.= "</tr>";
$html2.= "<tr>";
$html2.= "<td class=\"element-text\" width=\"15%\">Untuk Pembayaran</td>";
$html2.= "<td align=\"center\" class=\"element-text\" width=\"3%\">:</td>";
$html2.= "<td class=\"element-text\" colspan=\"3\" rowspan=\"2\">".$_REQUEST['nmpay']."</td>";
$html2.= "</tr>";
$html2.= "<tr>";
$html2.= "<td>&nbsp;</td>";
$html2.= "<td>&nbsp;</td>";
$html2.= "</tr>";
$html2.= "<tr>";
$html2.= "<td class=\"element-text\" width=\"15%\">&nbsp;</td>";
$html2.= "<td align=\"center\" class=\"element-text\" width=\"3%\">&nbsp;</td>";
$html2.= "<td class=\"element-text\" colspan=\"3\">&nbsp;</td>";
$html2.= "</tr>";
$html2.= "<tr>";
$html2.= "<td align=\"center\" class=\"element-value\" width=\"15%\">".rupiah($_REQUEST['ujml'])."</td>";
$html2.= "<td>&nbsp;</td>";
$html2.= "<td width=\"35%\" >&nbsp;</td>";
$html2.= "<td width=\"22%\" colspan=\"2\" align=\"center\" class=\"element-text\">".$_REQUEST['kota'].", ".substr($_REQUEST['date'],0,2)."&nbsp;".$bulan[substr($_REQUEST['date'],2,2)]."&nbsp;".substr($_REQUEST['date'],4,4)."</td>";
$html2.= "</tr>";
$html2.= "<tr>";
$html2.= "<td>&nbsp;</td>";
$html2.= "<td>&nbsp;</td>";
$html2.= "<td>&nbsp;</td>";
$html2.= "<td colspan=\"2\">&nbsp;</td>";
$html2.= "</tr>";
$html2.= "<tr>";
$html2.= "<td>&nbsp;</td>";
$html2.= "<td>&nbsp;</td>";
$html2.= "<td>&nbsp;</td>";
$html2.= "<td colspan=\"2\" align=\"center\" class=\"element-text\">".$_REQUEST['signed']."</td>";
$html2.= "</tr>";
$html2.= "</table>";
*/

$html = "
<style>
.company-title {
	font-size: 47px;
	text-align:center;
}
</style>
";

$html.= "<table border=\"0\" cellspacing=\"4\" cellpadding=\"3\" width=\"100%\">";
$html.= "<tr>";
$html.= "<td width=\"141\"><img src=\"../images/logo_config/".$_REQUEST['logo']."\" width=\"141\" height=\"69\" alt=\"#\" /></td>";
$html.= "<td colspan=\"2\" width=\"533\" align=\"center\"><br /><br />";
$html.= "<font class=\"company-title\">".$_REQUEST['company']."</font>";
$html.= "<br /><br />";
$html.= "<font class=\"element-text\">".$_REQUEST['jalan']."</font>";
$html.= "</td>";
$html.= "</tr>";
$html.= "<tr>";
$html.= "<td colspan=\"3\"><hr /></td>";
$html.= "</tr>";
$html.= "</table>";

$html2 = "
<style>
.element-value {
	border-top-color:#000;
	border-top-style:inset;
	border-top-width:2px;
	border-bottom-color:#000;
	border-bottom-style:outset;
	border-bottom-width:2px;
}
</style>
";

$bulan=monthString();

$html2.= "<table border=\"0\" cellspacing=\"5\" cellpadding=\"2\" width=\"100%\">";
$html2.= "<tr>";
$html2.= "<td class=\"element-text\" width=\"23%\">Nomor</td>";
$html2.= "<td align=\"center\" class=\"element-text\" width=\"3%\">:</td>";
$html2.= "<td class=\"element-text\" colspan=\"3\" width=\"70%\">".$_REQUEST['nomor']."</td>";
$html2.= "</tr>";
$html2.= "<tr>";
$html2.= "<td class=\"element-text\" width=\"23%\">Telah Terima Dari</td>";
$html2.= "<td align=\"center\" class=\"element-text\" width=\"3%\">:</td>";
$html2.= "<td class=\"element-text\" colspan=\"3\">".$_REQUEST['trd']."</td>";
$html2.= "</tr>";
$html2.= "<tr>";
$html2.= "<td class=\"element-text\" width=\"23%\">Uang Sejumlah</td>";
$html2.= "<td align=\"center\" class=\"element-text\" width=\"3%\">:</td>";
$html2.= "<td class=\"element-text\" colspan=\"3\">".terbilang($_REQUEST['ujml'])." rupiah</td>";
$html2.= "</tr>";
$html2.= "<tr>";
$html2.= "<td class=\"element-text\" width=\"23%\">Untuk Pembayaran</td>";
$html2.= "<td align=\"center\" class=\"element-text\" width=\"3%\">:</td>";
$html2.= "<td class=\"element-text\" colspan=\"3\" rowspan=\"2\">".$_REQUEST['nmpay']."</td>";
$html2.= "</tr>";
$html2.= "<tr>";
$html2.= "<td>&nbsp;</td>";
$html2.= "<td>&nbsp;</td>";
$html2.= "</tr>";
$html2.= "<tr>";
$html2.= "<td class=\"element-text\" width=\"23%\">&nbsp;</td>";
$html2.= "<td align=\"center\" class=\"element-text\" width=\"3%\">&nbsp;</td>";
$html2.= "<td class=\"element-text\" colspan=\"3\">&nbsp;</td>";
$html2.= "</tr>";
$html2.= "<tr>";
$html2.= "<td align=\"center\" class=\"element-value\" width=\"23%\">".rupiah($_REQUEST['ujml'])."</td>";
$html2.= "<td>&nbsp;</td>";
$html2.= "<td width=\"40%\" >&nbsp;</td>";
$html2.= "<td width=\"30%\" colspan=\"2\" align=\"center\" class=\"element-text\">".$_REQUEST['kota'].", ".substr($_REQUEST['date'],0,2)."&nbsp;".$bulan[substr($_REQUEST['date'],2,2)]."&nbsp;".substr($_REQUEST['date'],4,4)."</td>";
$html2.= "</tr>";
$html2.= "<tr>";
$html2.= "<td>&nbsp;</td>";
$html2.= "<td>&nbsp;</td>";
$html2.= "<td>&nbsp;</td>";
$html2.= "<td colspan=\"2\">&nbsp;</td>";
$html2.= "</tr>";
$html2.= "<tr>";
$html2.= "<td>&nbsp;</td>";
$html2.= "<td>&nbsp;</td>";
$html2.= "<td>&nbsp;</td>";
$html2.= "<td colspan=\"2\" align=\"center\" class=\"element-text\">".$_REQUEST['signed']."</td>";
$html2.= "</tr>";
$html2.= "</table>";


$doc = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$doc->setImageScale(PDF_IMAGE_SCALE_RATIO);
$doc->SetTitle('Download Kwitansi');
$doc->SetMargins(0,0,0,0);
$doc->setPrintHeader(false);
$doc->setPrintFooter(false);
$font = $doc->addTTFfont('../lib/Tahoma/tahoma.ttf', 'TrueTypeUnicode', '', 96);
$doc->SetFont($font,'',12);
$doc->AddPage('P','LETTER','','');
$doc->setJPEGQuality(80);
$doc->SetDisplayMode('real','SinglePage','UseNone'); 
$doc->writeHTMLCell('','',10,15,$html,0,'',0,'',false,true,'center',true);
$doc->writeHTMLCell('','',10,45,$html2,0,'',0,'',false,true,'center',true);		
$doc->Output('download-kwitansi-'.$_REQUEST['nomor'].'.pdf','I');

?>
