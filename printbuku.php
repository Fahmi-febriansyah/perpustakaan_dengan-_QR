<?php 
include 'koneksi.php';
$id = $_GET['id'];
$kuari = mysqli_query($koneksi,"SELECT * FROM buku WHERE id_buku = '$id'");
$data = mysqli_fetch_assoc($kuari);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	<style>
	@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
	body{
		background-image: url('bg.jpg');
		background-size: cover;
		background-repeat: no-repeat;
	}
	nav{
		font-family: 'Poppins', sans-serif;
	}
	#kartu img{
		width: 10rem;
	}
	@media print {
		body {
			-webkit-print-color-adjust: exact;
		}
		#print{
			display: none;
		}
	}
	

</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="index.php">Beranda <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="buku.php">Buku<span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="user.php">User<span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="pinjaman.php">pinjaman<span class="sr-only">(current)</span></a>
				</li>
			</ul>
			<form class="form-inline my-2 my-lg-0">
				<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
			</form>
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
				<img src="teamwork.png" style=" width: 2rem; " alt="">
			</a>
			<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
				<a class="dropdown-item" href="add_pegawai.php">Tambah admin</a>
				<a class="dropdown-item" href="logout.php">Logout</a>
				<a class="dropdown-item" href="#">Edit</a>
			</div>
		</div>
	</nav>
	<main>
		<br><br><br>
		<div class="container" align="center">
			<div class="card" style=" width: 900px; border: 2px solid black; ">
				<div class="card-body" style=" font-size: 20px; ">
					<div class="row">
						<div class="col-sm-5" id="kartu">
							<img src="temp/<?php echo $data['qr'] ?>";>
						</div>
						<div class="col-sm-6">
							<table>
								<br>
								<tr>
									<td><b>Judul buku</b></td>
									<td>:</td>
									<td><?php echo $data['judul_buku'] ?></td>
								</tr>
								<tr>
									<td><b>Jenis buku</b></td>
									<td>:</td>
									<td><?php echo $data['jenis_buku'] ?></td>
								</tr>
								<tr>
									<td><b>Id buku</b></td>
									<td>:</td>
									<td><?php echo $data['id_buku'] ?></td>
								</tr>
								<td colspan="7"><small>silahkan scan qr atau masukan id buku untuk transaksi</small></td>
							</table>
						</div>
					</div>
				</div>
			</div>
			<br>
			<center><button type="button" id="print" onclick="window.print()" class="btn btn-primary">Print</button><small></small></center>
		</div>
	</main>

	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
</html>