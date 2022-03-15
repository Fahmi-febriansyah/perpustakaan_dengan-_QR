<?php 
include 'koneksi.php';
session_start();
$id = $_SESSION['id'];
$query = mysqli_query($koneksi,"SELECT * FROM cart INNER JOIN buku ON cart.id_buku = buku.id_buku WHERE id_user = 1");
$cok = mysqli_num_rows($query);
$coba = mysqli_query($koneksi,"SELECT * FROM cart WHERE id_user = $id");
date_default_timezone_set('Asia/Jakarta');
$tgl = date('Y-m-d');

if (isset($_POST['submit'])) {
	$tanggal = $_POST['tanggal'];
	$tgl2 = new DateTime($tanggal);
	$tgl1 = new DateTime($tgl);
	$jarak = $tgl1->diff($tgl2);
	$hangus = $jarak->format("%r%a");
	if ($kos >= 30) {
		echo "<script>alert('maksimal pimjam 30 hari');
		document.location.href = 'pinjem.php';
		</script>";
	}
	$idsak = rand(10000, 99999);
	while ($pesan = mysqli_fetch_assoc($coba)) {
		$idbuk = $pesan['id_buku'];
		$masuk = mysqli_query($koneksi,"INSERT INTO pinjaman VALUES('','$idbuk','$id','$idsak','$tgl','$tanggal','belum','0')");
		
	}
	
	$masak = mysqli_query($koneksi,"INSERT INTO transaksi_lagi VALUES('$idsak','$id','$cok','$tgl','$tanggal','belum','0')");
	if ($masak) {
		$hapus = mysqli_query($koneksi,"DELETE FROM `cart` WHERE id_user = '$id'");
		header("location:sukses.php");
	}else{
		echo "<script>alert('tidak ada data buku');
		document.location.href = 'pinjem.php';
		</script>";
	}

}

?>