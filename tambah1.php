<?php 
include 'koneksi.php';
session_start();
$id = $_GET['id'];
$iduser = $_SESSION['id'];
$idcart = rand(10000, 99999);
$cak = mysqli_query($koneksi,"SELECT * FROM pinjaman WHERE id_user = '$iduser' AND id_buku = '$id'")->fetch_assoc();
$query = mysqli_query($koneksi,"UPDATE `pinjaman` SET `status`='selesai' WHERE id_user = '$iduser' AND id_buku = '$id'");
header("location:setor.php");
?>
