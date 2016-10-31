<?php
$data = $user->getViewUser();
$bulan = monthString();//array nama-nama bulan
$LsDYear=substr($data['SESSION_DATE'],0,4);//ambil tahun
$LsDMont=substr($data['SESSION_DATE'],5,2);//ambil bulan
$LsDate=substr($data['SESSION_DATE'],8,2);//ambil tanggal
$LsDTime=substr($data['SESSION_DATE'],11,8);//ambil waktu

$display = "\n<table border=\"0\" class=\"tbl\">";
$display.= "\n<tr>";
$display.= "\n\t<td>ID</td>";
$display.= "\n\t<td>:&nbsp;".$data['USR_ID']."</td>";
$display.= "\n</tr>";
$display.= "\n<tr>";
$display.= "\n\t<td>USER ID</td>";
$display.= "\n\t<td>:&nbsp;".$data['USR_NAME']."</td>";
$display.= "\n</tr>";
$display.= "\n<tr>";
$display.= "\n\t<td>LAST LOGIN</td>";
$display.= "\n\t<td>:&nbsp;".$LsDate."&nbsp;".$bulan[$LsDMont]."&nbsp;".$LsDYear.",&nbsp;Jam&nbsp;".$LsDTime."</td>";
$display.= "\n</tr>";
$display.= "\n</table>";

?>
