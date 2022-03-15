<?php 
include 'koneksi.php';
function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
	

}
$denda = mysqli_query($koneksi,"SELECT * FROM denda")->fetch_assoc();
$query = mysqli_query($koneksi,"SELECT * FROM transaksi_lagi INNER JOIN user ON transaksi_lagi.id_user = user.id_user WHERE status = 'belum'");
$user = mysqli_query($koneksi,"SELECT * FROM user");
$admin = mysqli_query($koneksi,"SELECT * FROM admin");
$buku = mysqli_query($koneksi,"SELECT * FROM buku");
$jenis = mysqli_query($koneksi,"SELECT * FROM jenis");
$itung4 = mysqli_num_rows($jenis);
$itung0 = mysqli_num_rows($buku);
$itung1 = mysqli_num_rows($user);
$itung2 = mysqli_num_rows($admin);
$itung = mysqli_num_rows($query);
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
		font-family: 'Poppins', sans-serif;
		background-image: url('bg.jpg');
		background-size: cover;
		background-repeat: no-repeat;
	}

	#black:hover{
		opacity: 70%;
		border-radius: 5px;
	}
</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="#">Beranda <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="buku.php">Buku<span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="user.php">User<span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="pinjaman.php">Pinjaman<span class="sr-only">(current)</span></a>
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
	<br>
	<main>
		<div class="container">
			<h2>Dashboard</h2>
			<hr>
			<div class="row">
				<div class="col-sm-2 mr-3" style=" background-color: #7383ff; border-radius: 5px; ">
					<div class="row mt-4" id="black" >
						<div class="col-sm-6"><h5>Buku</h5> <h5><?php echo $itung0; ?></h5></div>
						<div class="col-sm-6"><img src="buku.png" style=" width: 4rem; " alt=""></div>
					</div>
				</div>
				<div class="col-sm-2 mr-3" style=" background-color: #45ff42; border-radius: 5px; ">
					<div class="row mt-4" id="black" >
						<div class="col-sm-6"><h5>User</h5> <h5><?php echo $itung1 ?></h5></div>
						<div class="col-sm-6"><img src="member.png" style=" width: 4rem; " alt=""></div>
					</div>
				</div>
				<div class="col-sm-2 mr-3" style=" background-color: #fcff30; border-radius: 5px; ">
					<div class="row mt-4" id="black" >
						<div class="col-sm-6"><h5>Pinjam</h5> <h5><?php echo $itung ?></h5></div>
						<div class="col-sm-6"><img src="pinjam.png" style=" width: 3rem; " alt=""></div>
					</div>
				</div>
				<div class="col-sm-2 mr-3" style=" background-color: #ff4545; border-radius: 5px; ">
					<div class="row mt-4" id="black" >
						<div class="col-sm-6"><h5>Admin</h5> <h5>1</h5></div>
						<div class="col-sm-6"><img src="admin.png" style=" width: 3rem; " alt=""></div>
					</div>
				</div>
				<div class="col-sm-2 mr-3" style=" background-color: #ff45a5; border-radius: 5px; ">
					<div class="row mt-4" id="black" >
						<div class="col-sm-6"><h5>Telat</h5> <h5>1</h5></div>
						<div class="col-sm-6"><img src="late.png" style=" width: 3rem; " alt=""></div>
					</div>
				</div>
			</div>
		</div>
		<br><br>
		<div class="container">
			<h5>data Pinjaman</h5>
			<div class="row">
				<div class="col-sm-7 mr-4 shadow p-3 mb-5 bg-white rounded"><table class="table">
					<thead>
						<tr>
							<th scope="col">No</th>
							<th scope="col">user</th>
							<th scope="col">buku</th>
							<th scope="col">aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$tambah = 1;
						while ($data = mysqli_fetch_assoc($query)){ ?>
							<tr>
								<th scope="row"><?php echo $tambah ?></th>
								<td><?php echo $data['nama_user'] ?></td>
								<td><?php echo $data['jumlahbuku'] ?></td>
								<td><a href=""><button type="button" class="btn btn-primary" style=" font-size: 14px; ">Setor</button></a></td>
							</tr>
							<?php $tambah++; ?>
						<?php } ?>
					</tbody>
				</table></div>
				<div class="col-sm-4 shadow p-3 mb-5 bg-white rounded"><center><img src="tipe.png" style="width: 2rem;" alt=""><br><b><?php echo $itung4 ?></b><br>Jenis buku<br>
					<a href="add_jenis.php"><button type="button" class="btn btn-dark" style=" font-size: 14px; ">tambah</button></a><hr><img src="fine.png" style="width: 2rem;" alt=""><br><b><?php echo rupiah($denda['harga']); ?></b><br>Per hari denda<br>
					<a href="ubahdenda.php"><button type="button" class="btn btn-warning" style=" font-size: 14px; ">Ubah</button></a></center></div>
				</div>
			</div>
		</main>

		<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
	</body>
	</html>