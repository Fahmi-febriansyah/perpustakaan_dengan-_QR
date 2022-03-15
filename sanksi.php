<?php 
session_start();
$lah = $_SESSION['sakni'];
$luh = $_SESSION['hari'];
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
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>


	<script>
		Swal.fire({
			position: 'top-center',
			icon: 'warning',
			title: 'kamu telat <?php echo $luh ?> hari ',
			text: 'silahkan bayar denda sebesar <?php echo rupiah($lah) ?>',
			showConfirmButton: true,
			confirmButtonText: 'Bayar'
		}).then(function() {
			window.location = "logout.php";
		});
	</script>
</body>
</html>