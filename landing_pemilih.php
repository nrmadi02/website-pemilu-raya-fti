<?php
//Mulai Sesion
session_start();
if (isset($_SESSION["ses_username"]) == "") {
	header("location: login");
} else {
	// $data_id = $_SESSION["ses_id"];
	$data_id = $_SESSION["ses_id"];
	$data_username = $_SESSION["ses_username"];
	$data_password = $_SESSION['ses_password'];
	$data_name = $_SESSION['ses_name'];
	// $data_level = $_SESSION["ses_level"];
	// $data_status = $_SESSION["ses_status"];
	$data_level = $_SESSION["ses_level"];
}
//KONEKSI DB
include "inc/koneksi.php";
//FUNGSI RUPIAH
include "inc/rupiah.php";

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Pemilu Raya Ormawa FTI</title>
	<link rel="icon" href="dist/img/LOGO KPU FTI-01.png">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!-- Alert -->
	<script src="plugins/alert.js"></script>
	<!-- Auto Refresh -->
	<script src="jquery-3.1.1.js" type="text/javascript"></script>
</head>

<body class="hold-transition sidebar-mini">
	<!-- Site wrapper -->
	<div class="container mb-3 mt-3">
		<div class="row">
			<img class="d-none d-sm-block" src="dist/img/LOGO KPU FTI-01.png" width="60px" alt="_blank">
			<h1 class="ml-3 d-none d-sm-block">KPU FTI UNISKA</h1>
			<div class="mx-auto text-center">
				<img class="d-sm-none" src="dist/img/LOGO KPU FTI-01.png" width="60px" alt="_blank">
				<h1 class="ml-3 d-sm-none text-bold">KPU FTI UNISKA</h1>
			</div>

		</div>
		<hr style="border: 1px solid black; border-radius: 1px;">
	</div>

	<div class="container">
		<h2 class="">Verifikasi Data Anda</h2>
		<p>Selamat datang, <strong><?php echo $data_name ?></strong>.<br>
			Silahkan pastikan kebenaran data ini, kalo terdapat kesalahan silahkan hubungi <strong>KPU FTI UNISKA</strong>.</p>
		<div class="card card-success">
			<div class="card-header">
				<h3 class="card-title">
					<i class="fa fa-edit"></i> Verifikasi
				</h3>
			</div>
			<form action="" method="post" enctype="multipart/form-data">
				<div class="card-body">

					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Nama Anda</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" placeholder="Nama user" value="<?php echo $data_name ?>" required readonly />
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-2 col-form-label">NPM</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo $data_username ?>" readonly />
						</div>
					</div>

					<div class="form-group row d-none">
						<label class="col-sm-2 col-form-label">Password</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="password" name="password" placeholder="Password" value="<?php echo $data_password ?>">
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Prodi Anda</label>
						<div class="col-sm-6">
							<select class="form-select" id="prodi" name="prodi" aria-label="Default select example">
								<option value="<?php echo $data_level ?>"><?php echo $data_level ?></option>
							</select>
						</div>
					</div>

				</div>
				<div class="card-footer">
					<input type="submit" name="Simpan" value="Verifikasi" class="btn btn-success">
					<a href="logout.php" title="Kembali" class="btn btn-secondary">Batal</a>
				</div>
			</form>
		</div>
		<!-- Navbar -->

		<!-- /.content-wrapper -->

		<footer class="bg-warning p-2 rounded">
			<div class="float-right d-none d-sm-block ">
				Copyright &copy;
				<a target="_blank" href="https://www.instagram.com/bem.fti.uniska/">
					<strong> ORMAWA FTI</strong>
				</a>
				All rights reserved.
			</div>
			Create 2021
		</footer>

		<!-- Control Sidebar -->

		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<!-- jQuery -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Select2 -->
	<script src="plugins/select2/js/select2.full.min.js"></script>
	<!-- DataTables -->
	<script src="plugins/datatables/jquery.dataTables.js"></script>
	<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="dist/js/demo.js"></script>
	<!-- page script -->
	<script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
	<script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

	<script>
		$(function() {
			$("#example1").DataTable();
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
			});
		});
	</script>

	<script>
		$(function() {
			//Initialize Select2 Elements
			$('.select2').select2()

			//Initialize Select2 Elements
			$('.select2bs4').select2({
				theme: 'bootstrap4'
			})
		})
	</script>

</body>

</html>
<?php

if (isset($_POST['Simpan'])) {
	//mulai proses simpan data
	$nama_fix = addslashes($_POST['nama_pengguna']);
	$sql_simpan = "INSERT INTO tb_pengguna (id_pengguna,nama_pengguna,username,password,level,status,status2,jenis) VALUES (
        '" . $_POST['username'] . "',
        '" . $nama_fix . "',
        '" . $_POST['username'] . "',
        '" . $_POST['password'] . "',
        '" . $_POST['prodi'] . "',
        '1',
        '1',
        'PST')";
	$query_simpan = mysqli_query($koneksi, $sql_simpan);
	mysqli_close($koneksi);

	if ($query_simpan) {
		$_SESSION["ses_id"] = $_POST['username'];
		$_SESSION["ses_username"] = $_POST['username'];
		$_SESSION["ses_name"] = $_POST['nama_pengguna'];
		$_SESSION["ses_password"] = $_POST['password'];
		$_SESSION["ses_level"] = $_POST['prodi'];
		$_SESSION["ses_status"] = '1';
		$_SESSION["ses_status_dua"] = '1';
		$_SESSION["ses_jenis"] = 'PST';
		echo "<script>
      Swal.fire({title: 'Verifikasi Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php';
          }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Verifikasi Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'login';
          }
      })</script>";
	}
}
