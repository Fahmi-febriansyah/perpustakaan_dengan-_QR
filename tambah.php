<?php 
include 'koneksi.php';
$id = $_GET['id'];
$iduser = $_GET['id_user'];
$idcart = rand(10000, 99999);
$query = mysqli_query($koneksi,"INSERT INTO cart VALUES('$idcart','1','$id')");
header("location:pinjem.php");




?>