<?php
//Mulai Sesion
session_start();
$data_login = $_SESSION['ses_id'];
if ($data_login != '19630674' and $data_login != '19630280') {
	header("location: login");
	session_destroy();
} else {
	// $data_id = $_SESSION["ses_id"];
	$data_id = $_SESSION["ses_id"];
	$data_username = $_SESSION["ses_username"];
	$data_password = $_SESSION['ses_password'];
	$data_name = $_SESSION['ses_name'];
	// $data_level = $_SESSION["ses_level"];
	// $data_status = $_SESSION["ses_status"];
	// $data_jenis = $_SESSION["ses_jenis"];
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
	<div class="container">
		<h2 class="">Data Admin</h2>

		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title">
					<i class="fa fa-edit"></i> Tambah Data
				</h3>
			</div>
			<form action="" method="post" enctype="multipart/form-data">
				<div class="card-body">

					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Nama Admin</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" placeholder="Nama user" value="<?php echo $data_name ?>" required readonly />
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Username</label>
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
						<label class="col-sm-2 col-form-label">Level</label>
						<div class="col-sm-6">
							<select class="form-select" id="prodi" name="prodi" aria-label="Default select example">
								<option value="Administrator">Administrator</option>
							</select>
						</div>
					</div>

				</div>
				<div class="card-footer">
					<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
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
	$sql_simpan = "INSERT INTO tb_pengguna (id_pengguna,nama_pengguna,username,password,level,status,status2,jenis) VALUES (
        '" . $_POST['username'] . "',
        '" . $_POST['nama_pengguna'] . "',
        '" . $_POST['username'] . "',
        '" . $_POST['password'] . "',
        '" . $_POST['prodi'] . "',
        '1',
        '1',
        'PAN')";
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
		$_SESSION["ses_jenis"] = 'PAN';
		echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php';
          }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'login';
          }
      })</script>";
	}
}
