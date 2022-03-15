<?php 
include 'koneksi.php';
if (isset($_POST['submit'])) {
	session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];
	$cek = mysqli_query($koneksi,"SELECT * FROM user WHERE username = '$username' AND password = '$password'");

	if (mysqli_num_rows($cek)) {
		$ambil = mysqli_query($koneksi,"SELECT * FROM user WHERE username = '$username'")->fetch_assoc();
		$_SESSION['id_user'] = $ambil['nama_user'];
		$_SESSION['id'] = $ambil['id_user'];
		header("location:pinjem.php");
	}else{
		echo "<script>alert('data salah');
		document.location.href = 'login.php';
		</script>";
	}
}
if (isset($_POST['gas'])) {
	session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];
	$cek = mysqli_query($koneksi,"SELECT * FROM user WHERE username = '$username' AND password = '$password'");

	if (mysqli_num_rows($cek)) {
		$ambil = mysqli_query($koneksi,"SELECT * FROM user WHERE username = '$username'")->fetch_assoc();
		$_SESSION['id_user'] = $ambil['nama_user'];
		$_SESSION['id'] = $ambil['id_user'];
		header("location:setor.php");
	}else{
		echo "<script>alert('data salah');
		document.location.href = 'login.php';
		</script>";
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
		height: 350px;
		background-color: white;
		/* code di bawah ini akan membuat div berada di tengah-tengah */
		position: absolute;
		top: 40%;
		left: 50%;
		transform: translate(-50%, -50%);
	}
	.anj{
		width: 100%;
		height: 70px;
		background-color: #0b3b5e;
		color: white;
	}
	.lagi{
		width: 350px;
		height: 100px;
		padding: 20px;
		background: #0b3b5e;
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
		<div class="bak"><div class="anj"><h3 align="center" style=" padding-top: 20px; ">LOGIN</h3></div>
		<div class="isi" style=" padding: 10px; "><form method="POST">
			<div class="form-group">
				<label for="exampleInputEmail1">Username</label>
				<input type="Username" class="form-control" placeholder="masukan username anda" id="exampleInputEmail1" required="" name="username" aria-describedby="emailHelp">
				<small id="emailHelp" class="form-text text-muted">anda tidak berguna jadi jangan sok privasi</small>
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Password</label>
				<input type="password" name="password" class="form-control" placeholder="masukan password anda" id="exampleInputPassword1">
			</div>
			<button type="submit" name="submit" class="btn btn-primary">Submit</button>
			<a href="setor.php"><button type="submit" name="gas" class="btn btn-primary">Setor</button></a>
		</form><small>Tidak punya akun ? <a href="daftar.php">Daftar</a></small></div>
	</div>
	<div class="lagi" align="center">
		<p style=" color: #e3e3e3;">Web ini buatan &copy fahmi inc</p>
		<h5>Perputakaan desadroid</h5>
	</div>
</div>


<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
</html>