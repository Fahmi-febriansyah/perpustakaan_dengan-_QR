<?php 
session_start();
include 'koneksi.php';
$id = $_SESSION['id_user'];
$lak = $_SESSION['id'];

$gom = mysqli_query($koneksi,"SELECT * FROM pinjaman INNER JOIN buku ON pinjaman.id_buku = buku.id_buku WHERE id_user = '$lak'")->fetch_assoc();
$tal = $gom['tgl_pinjam'];
$tul = $gom['tgl_balik'];
$query = mysqli_query($koneksi,"SELECT * FROM pinjaman INNER JOIN buku ON pinjaman.id_buku = buku.id_buku WHERE id_user = '$lak' AND tgl_balik = '$tul'");
$sanksi = mysqli_query($koneksi,"SELECT * FROM denda")->fetch_assoc();
$harga = $sanksi['harga'];
date_default_timezone_set('Asia/Jakarta');
$tgl = date('Y-m-d');
if (isset($_POST['submit'])) {
	$tgl2 = new DateTime($tul);
	$tgl1 = new DateTime($tgl);
	$jarak = $tgl2->diff($tgl1);
	$hangus = $jarak->format("%r%a");

	
	if ($hangus > 0) {
		$plok = $harga * $hangus;
		$ubah = mysqli_query($koneksi,"UPDATE `transaksi_lagi` SET status ='selesai', tgl_balik = '$tgl', denda = '$plok'  WHERE id_user = '$lak' AND tgl_balik = '$tul'");
		if ($ubah) {
			$_SESSION['sakni'] = $plok;
			$_SESSION['hari'] = $hangus;
			$hapus = mysqli_query($koneksi,"DELETE FROM `pinjaman` WHERE id_user = '$lak' AND tgl_balik = '$tul'");
			header("location:sanksi.php");
		}else{
			echo "gagal";
		}
	}else{
		$ubap = mysqli_query($koneksi,"UPDATE `transaksi_lagi` SET status ='selesai', tgl_balik = '$tgl' WHERE id_user = '$lak'");
		if ($ubap) {
			$hapusa = mysqli_query($koneksi,"DELETE FROM `pinjaman` WHERE id_user = '$lak' AND tgl_balik = '$tul'");
			header("location:sukses.php");
		}else{
			echo "gagal";
		}
	}
}

?>