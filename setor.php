<?php 
session_start();
include 'koneksi.php';
$id = $_SESSION['id_user'];
$lak = $_SESSION['id'];

$gom = mysqli_query($koneksi,"SELECT * FROM pinjaman INNER JOIN buku ON pinjaman.id_buku = buku.id_buku WHERE id_user = '$lak'")->fetch_assoc();
$tal = $gom['tgl_pinjam'];
$tul = $gom['tgl_balik'];
$query = mysqli_query($koneksi,"SELECT * FROM pinjaman INNER JOIN buku ON pinjaman.id_buku = buku.id_buku WHERE id_user = '$lak' AND tgl_balik = '$tul'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script src="instascan.min.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	<script src="jquery.min.js"></script>
	<style>
	body{
		background-image: url('bg.jpg');
		background-size: cover;
		background-repeat: no-repeat;
	}
	.clock {

		font-size: 60px;
		font-family: Orbitron;
		letter-spacing: 7px;



	}
</style>
</head>
<body>
	
	<div class="container">
		<div class="row">
			<div class="col-sm-12" align="center">
				<div id="MyClockDisplay" class="clock" onload="showTime()"></div>
				<hr>
				<h3>Scan Di sini</h3>

			</div>
		</div>
		<div class="row">
			<div class="col-sm-4"><h1></h1>
				<video id="preview" width="300" height="300"></video>
				<center><a href="logout.php"><button type="button" class="btn btn-primary">Logout</button></a></center>
			</div>
			<div class="col-sm-8"><br><br>
				<table class="table">
					<thead>
						<tr>
							<th scope="col">No</th>
							<th scope="col">Judul buku</th>
							<th scope="col">jenis</th>
							<th scope="col">aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$tambah = 1;
						while ($data = mysqli_fetch_assoc($query)){ ?>
							<tr>
								<th scope="row"><?php echo $tambah ?></th>
								<td><?php echo $data['judul_buku'] ?></td>
								<td><?php echo $data['jenis_buku'] ?></td>
								<?php if ($data['status'] == "belum"): ?>
									<td><img src="gak.png" style=" width:2rem; " alt=""></td>
								<?php endif ?>
								<?php if ($data['status'] == "selesai"): ?>
									<td><img src="cek.png" style=" width:2rem; " alt=""></td>
								<?php endif ?>
								
							</tr>
							<?php $tambah++; ?>
						<?php } ?>
					</tbody>
				</table>

				<center>
					
					<form method="POST" action="snk.php">
						<hr>
						<button type="submit" name="submit" class="btn btn-primary">Kirim</button> | <a href=""><button  class="btn btn-warning">manual</button></a></center>
					</form>
				</div>

			</div>







			<script>
				function showTime(){
					var date = new Date();
    var h = date.getHours(); // 0 - 23
    var m = date.getMinutes(); // 0 - 59
    var s = date.getSeconds(); // 0 - 59
    var session = "AM";
    
    if(h == 0){
    	h = 12;
    }
    
    if(h > 12){
    	h = h - 12;
    	session = "PM";
    }
    
    h = (h < 10) ? "0" + h : h;
    m = (m < 10) ? "0" + m : m;
    s = (s < 10) ? "0" + s : s;
    
    var time = h + ":" + m + ":" + s + " " + session;
    document.getElementById("MyClockDisplay").innerText = time;
    document.getElementById("MyClockDisplay").textContent = time;
    
    setTimeout(showTime, 1000);
    
}

showTime();s
</script>
<script>
	var audio = new Audio('beep.mp3');
	let scanner = new Instascan.Scanner({video: document.getElementById('preview')});
	scanner.addListener('scan', function(content){

		$("#qr").val(content);


		var id = (content);
		audio.play();
		setTimeout(pindah, 500);
		function pindah(){
			top.location.href="tambah1.php?id="+id
		}



	});

	Instascan.Camera.getCameras().then(function (cameras){
		if (cameras.length > 0){
			scanner.start(cameras[0]);
		}else{
			console.error('no camera found')
		}
	}).catch(function (e){
		console.error(e);
	});


</script>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
</html>