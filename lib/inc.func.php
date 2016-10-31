<?php
function monthString(){
	$namaBulan = array("01"=>"Januari","02"=>"Februari","03"=>"Maret","04"=>"April","05"=>"Mei","06"=>"Juni","07"=>"Juli","08"=>"Agustus","09"=>"September","10"=>"Oktober","11"=>"November","12"=>"Desember");

		foreach($namaBulan as $key=>$value){
			$stringbulan[$key]=$value;
		}
		return $stringbulan;
}
function rupiah($nominal)
{
	$rupiah =  number_format($nominal,0, ",",".");
	$rupiah = "Rp "  . $rupiah . ",-";
	return $rupiah;
}
function ctword($x) {
	$x = abs($x);
	$number = array("","satu","dua","tiga","empat","lima","enam","tujuh","delapan","sembilan","sepuluh","sebelas");
	$temp = "";

	if ($x<12) {
		$temp = "".$number[$x];
	} else if ($x<20) {
		$temp = ctword($x-10)." belas ";
	} else if ($x<100) {
		$temp = ctword($x/10)." puluh ".ctword($x%10);
	} else if ($x<200) {
		$temp = " seratus ".ctword($x%100);
	} else if ($x<1000) {
		$temp = ctword($x/100)." ratus ".ctword($x%100);
	} else if ($x<2000) {
		$temp = " seribu ".ctword($x%1000);
	} else if ($x<1000000) {
		$temp = ctword($x/1000)." ribu ".ctword($x%1000);
	} else if ($x<1000000000) {
		$temp = ctword($x/1000000)." juta ".ctword($x%1000000);
	} else if ($x<1000000000000) {
		$temp = ctword($x/1000000000)." milyar ".ctword(fmod($x,1000000000));
	} else if ($x <1000000000000000) {
		$temp = ctword($x/1000000000000)." trilyun ".ctword(fmod($x,1000000000000));
	}
	return $temp;
}
function terbilang($x,$style=4,$strcomma=",") {
	if($x<0) {
		$result = " minus ".trim(ctword($x));
	} else {
		$arrnum=explode("$strcomma",$x);
		$arrcount=count($arrnum);
		if ($arrcount==1){
			$result = trim(ctword($x));
		}else if ($arrcount>1){
			$result = trim(ctword($arrnum[0]))." koma ".trim(ctword($arrnum[1]));
		}
	}
	switch ($style) {
	case 1: //1=uppercase  dan
		$result = strtoupper($result);
	break;
	case 2: //2= lowercase
		$result = strtolower($result);
	break;
	case 3: //3= uppercase on first letter for each word
		$result = ucwords($result);
	break;
	default: //4= uppercase on first letter
		$result = ucfirst($result);
	break;
	}
	return $result;
}
function nomorkw($x){
	$x++;
	$nomorkw="K".sprintf("%04s",$x);
	return $nomorkw;
}
function idConfig($x){
	$x++;
	$idConfig="conf".$x;
	return $idConfig;
} 
?>
