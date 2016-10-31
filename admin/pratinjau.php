<?php
$reqsize=$_REQUEST['size'];
$size=explode("x",$reqsize);
echo "<img src=\"./images/sample".$size[0].".png\"><br /><center><b>Pratinjau Sample</b></center>";
//print_r($_REQUEST);
?>
