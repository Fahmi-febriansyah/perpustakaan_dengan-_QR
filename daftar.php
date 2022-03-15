<?php 
include 'koneksi.php';
if (isset($_POST['submit'])) {
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$telpon = $_POST['telpon'];
	$alamat = $_POST['alamat'];
	$cek = mysqli_query($koneksi,"SELECT * FROM user WHERE username = '$username'");
	if (mysqli_num_rows($cek) > 0) {
		echo "<script>alert('username sudah ada');
		</script>";
	}else{
		$masuk = mysqli_query($koneksi,"INSERT INTO user VALUES('','$nama','$username','$password','$telpon','$alamat')");
		if ($masuk) {
			echo "<script>alert('berhasil');
			document.location.href = 'login.php';
			</script>";
		}else{
			echo "<script>alert('gagal');
			document.location.href = 'index.php';
			</script>";
		}
	}



}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	<style>
	body{
		background-image: url('back.jpg');
		background-size: cover;
		background-repeat: no-repeat;

	}
	.bak{
		width: 350px;
		height: 575px;
		background-color: white;
		/* code di bawah ini akan membuat div berada di tengah-tengah */
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
	}
	.anj{
		width: 100%;
		height: 70px;
		background-color: #6aad32;
		color: white;
	}
	.lagi{
		width: 350px;
		height: 100px;
		padding: 20px;
		background: #6aad32;
		color: white;
		/* code di bawah ini akan membuat div berada di tengah-tengah */
		position: absolute;
		top: 80%;
		left: 50%;
		transform: translate(-50%, -50%);
	}
</style>
</head>
<body>
	<div class="container">
		<div class="bak"><div class="anj"><h3 align="center" style=" padding-top: 20px; ">DAFTAR</h3></div>
		<div class="isi" style=" padding: 10px; "><form method="POST">
			<div class="form-group">
				<label for="exampleInputEmail1">Nama lengkap</label>
				<input type="Username" class="form-control" placeholder="masukan nama anda" id="exampleInputEmail1" required="" name="nama" aria-describedby="emailHelp">
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Username</label>
				<input type="Username" class="form-control" placeholder="masukan username anda" id="exampleInputEmail1" required="" name="username" aria-describedby="emailHelp">
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Password</label>
				<input type="password" name="password" class="form-control" placeholder="masukan password anda" id="exampleInputPassword1">
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">no Telpon</label>
				<input type="number" class="form-control" placeholder="masukan nomor telpon anda" id="exampleInputEmail1" required="" name="telpon" aria-describedby="emailHelp">
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Alamat</label>
				<input type="Username" class="form-control" placeholder="masukan alamat anda" id="exampleInputEmail1" required="" name="alamat" aria-describedby="emailHelp">
			</div>
			<button type="submit" name="submit" class="btn btn-primary">Submit</button>
		</form><small>Tidak punya akun ? <a href="daftar.php">Daftar</a></small></div>
	</div>
</div>


<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
</html>