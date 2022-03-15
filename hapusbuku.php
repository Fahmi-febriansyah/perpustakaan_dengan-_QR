<?php 
include 'koneksi.php';

$id = $_GET['id'];

$hapus = mysqli_query($koneksi,"DELETE FROM `buku` WHERE id_buku = '$id'");

if ($hapus) {
	echo "<script>
	alert('Berhasil hapus buku');
	document.location.href = 'buku.php'
	</script>";
}else{
	echo "<script>
	alert('gagal');
	document.location.href = 'buku.php'
	</script>";
}

?>