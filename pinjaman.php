<?php 
include 'koneksi.php';
$query = mysqli_query($koneksi,"SELECT * FROM transaksi_lagi INNER JOIN user ON transaksi_lagi.id_user = user.id_user");
function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
body{
	font-family: 'Poppins', sans-serif;
	background-image: url('bg.jpg');
	background-size: cover;
	background-repeat: no-repeat;
}
</style>
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
		<div class="container-fluid">
			<br>
			<div class="row">
				<div class="col-sm-6"><h2><b>Daftar Pinjaman</b></h2></div>
			</div>
			
			
		</div>
		<div class="container-fluid">
			<table class="table">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col">user</th>
						<th scope="col">tanggal pinjam</th>
						<th scope="col">tanggal balik</th>
						<th scope="col">status</th>
						<th scope="col">Denda</th>
						<th scope="col">aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$tambah = 1;
					while ($data = mysqli_fetch_assoc($query)){ ?>
						<tr>
							<th scope="row"><?php echo $tambah ?></th>
							<td><?php echo $data['nama_user']  ?></td>
							<td><?php echo $data['tgl_pinjam']  ?></td>
							<td><?php echo $data['tgl_balik'] ?></td>
							<td><?php echo $data['status']  ?></td>
							<td><?php echo rupiah($data['denda']) ?></td>
							<td><a href="lihat.php?id=<?php echo $data['id_transaksu'] ?>" class="btn btn-primary">Lihat</a></td>

						</tr>
						<?php $tambah++; ?>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</main>

	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
</html>
