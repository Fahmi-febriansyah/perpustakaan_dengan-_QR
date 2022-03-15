<?php 
include 'koneksi.php';

$id = $_GET['id'];

$query = mysqli_query($koneksi,"DELETE FROM `user` WHERE id_user = '$id'");
if ($query) {
	echo "<script>alert('berhasil di hapus');
	document.location.href = 'user.php';
	</script>";
}else{
	echo "<script>alert('gagal');
	document.location.href = 'user.php';
	</script>";
}
?>