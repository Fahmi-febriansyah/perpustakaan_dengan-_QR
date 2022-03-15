<?php 
include 'koneksi.php';

$id = $_GET['id'];
$hapus = mysqli_query($koneksi,"DELETE FROM `cart` WHERE id_cart = '$id'");

if ($hapus) {
	header("location:pinjem.php");
}else{
	header("location:pinjem.php");
}
?>