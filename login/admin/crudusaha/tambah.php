<?php
session_start();
include('../../koneksi.php');

if($_SESSION['status']!="sudah_login"){
    header("location:../login.php");
}elseif($_SESSION['level']!="admin"){
  header("location:../user/index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Tambah Data Usaha</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="../crud/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../crud/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../crud/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../crud/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../crud/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../crud/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../crud/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../crud/css/util.css">
	<link rel="stylesheet" type="text/css" href="../crud/css/main.css">
<!--===============================================================================================-->
	<script src="../assets/js/livepreview.js"></script>
</head>
<body>


	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" enctype="multipart/form-data" method="POST" action="proses_tambah.php">
				<span class="contact100-form-title">
					Tambah Data Usaha
				</span>

				<div class="wrap-input100 validate-input" data-validate="Ketik namamu bambang!">
					<span class="label-input100">Nama</span>
					<input class="input100" type="text" name="nama" placeholder="Masukkan namamu!">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Jenis kelamin dibutuhkan!">
					<span class="label-input100">Jenis Kelamin</span>
					<div>
					<select class="selection-2" name="gender">
						<option value="Pria">Pria</option>
						<option value="Wanita">Wanita</option>
					</select>
					</div>
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Masukkan Jenis Usahamu!">
                    <span class="label-input100">Jenis Usaha</span>
                    <input class="input100" type="text" name="jenisusaha" placeholder="Masukkan Jenis usahamu!">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Masukkan Alamat Usahamu!">
                    <span class="label-input100">Alamat Usaha</span>
                    <input class="input100" type="text" name="alamatusaha" placeholder="Masukkan Alamat Usahamu!">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Masukkan Alamat Usahamu!">
                    <span class="label-input100">Tahun Usaha</span>
                    <input class="input100" type="number" min="1900" max="2099" step="1" value="2000" name="tahunusaha" />
					<span class="focus-input100"></span>
				</div>
                
                <img id="preview" src="" alt="" width="320px"/>

				<div class="wrap-input100">
					<span class="label-input100">Foto Profil</span><br>
					<input type="file" name="gambar" accept="image/*" onchange="showLive(this,'preview')" />
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button class="contact100-form-btn" type="submit" name="submit">
							<span>
								Submit
								<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
							</span>
						</button>
					</div>
				</div>
				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
				<a href="../usaha.php" class="contact100-form-btn">Kembali</a>
				</div>
				</div>
			</form>
		</div>
	</div>
	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="../crud/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../crud/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../crud/vendor/bootstrap/js/popper.js"></script>
	<script src="../crud/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../crud/vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="../crud/vendor/daterangepicker/moment.min.js"></script>
	<script src="../crud/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../crud/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="../crud/js/main.js"></script>
	<script src="js/val.js"></script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="../crud/css/googlemanager.js"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>
</html>
