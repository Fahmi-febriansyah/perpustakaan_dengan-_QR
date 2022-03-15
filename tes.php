<?php 
include 'koneksi.php';

$tgl1 = new DateTime("2021-12-5");
$tgl2 = new DateTime("2021-12-6");
$jarak = $tgl1->diff($tgl2);
$hangus = $jarak->format("%r%a");
echo $hangus;
if ($hangus >= 1) {
	echo "gas";
}else{
	echo "lah";
}
?>