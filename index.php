<?php
//Mulai Sesion
session_start();
if (isset($_SESSION["ses_username"]) == "") {
	header("location: login");
} else {
	$data_id = $_SESSION["ses_id"];
	$data_name = $_SESSION["ses_name"];
	$data_username = $_SESSION["ses_username"];
	$data_level = $_SESSION["ses_level"];
	$data_status =		$_SESSION["ses_status"];
	$data_status_dua =		$_SESSION["ses_status_dua"];
	$data_jenis =		$_SESSION["ses_jenis"];
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
	<script>
		setInterval(function() {
			$(".realtime").load("admin/suara/data_suara.php").fadeIn("slow");
		}, 1000);
	</script>
	<script>
		setInterval(function() {
			$(".realtimesi").load("admin/suara/data_suarasi.php").fadeIn("slow");
		}, 1000);
	</script>
	<script>
		setInterval(function() {
			$(".realtimeti").load("admin/suara/data_suarati.php").fadeIn("slow");
		}, 1000);
	</script>
</head>

<body class="hold-transition sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-yellow navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#">
						<i class="fas fa-bars"></i>
					</a>
				</li>

			</ul>

			<!-- SEARCH FORM -->
			<ul class="navbar-nav ml-auto">

				<li class="nav-item d-none d-sm-inline-block">
					<a href="index.php" class="nav-link">
						<b>Pemilu Raya Ormawa FTI 2021</b>
					</a>
				</li>
			</ul>

		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="index.php" class="brand-link">
				<img src="dist/img/voting.png" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
				<span class="brand-text font-weight-light"> E-Voting Ormawa FTI</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user (optional) -->
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="image">
						<img src="dist/img/avatar.png" class="img-circle elevation-2" alt="User Image">
					</div>
					<div class="info">
						<a href="index.php" class="d-block">
							<?php echo $data_name; ?>
						</a>
						<span class="badge badge-success">
							<?php echo $data_level; ?>
						</span>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

						<!-- Level  -->
						<?php
						if ($data_level == "Administrator") {
						?>
							<li class="nav-item">
								<a href="index.php" class="nav-link">
									<i class="nav-icon fas fa-tachometer-alt"></i>
									<p>
										Dashboard
									</p>
								</a>
							</li>

							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-cogs"></i>
									<p>
										Kelola Data
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="?page=data-calon" class="nav-link">
											<i class="nav-icon far fa-circle text-success"></i>
											<p>Kandidat BEM FTI</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-calonti" class="nav-link">
											<i class="nav-icon far fa-circle text-success"></i>
											<p>Kandidat HMP-TI</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-calonsi" class="nav-link">
											<i class="nav-icon far fa-circle text-success"></i>
											<p>Kandidat HMP-SI</p>
										</a>
									</li>
								</ul>
							</li>

							<li class="nav-item">
								<a href="?page=data-pemilih" class="nav-link">
									<i class="nav-icon far fa-user"></i>
									<p>
										Data Pemilih
									</p>
								</a>
							</li>

							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon far fa fa-table"></i>
									<p>
										Kotak Suara
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="?page=data-kotak" class="nav-link">
											<i class="nav-icon far fa-circle text-success"></i>
											<p>Kotak Suara BEM FTI</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-kotakti" class="nav-link">
											<i class="nav-icon far fa-circle text-success"></i>
											<p>Kotak Suara HMP-TI</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-kotaksi" class="nav-link">
											<i class="nav-icon far fa-circle text-success"></i>
											<p>Kotak Suara HMP-SI</p>
										</a>
									</li>
								</ul>
							</li>

							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon far fa fa-chart-pie"></i>
									<p>
										Quick Count
										<i class="fas fa-angle-left right"></i>
										<span class="badge badge-warning">
											QC
										</span>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="?page=data-suara" class="nav-link">
											<i class="nav-icon far fa-circle text-success"></i>
											<p>Quick Count BEM FTI</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-suarati" class="nav-link">
											<i class="nav-icon far fa-circle text-success"></i>
											<p>Quick Count HMP-TI</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-suarasi" class="nav-link">
											<i class="nav-icon far fa-circle text-success"></i>
											<p>Quick Count HMP-SI</p>
										</a>
									</li>
								</ul>
							</li>

							<li class="nav-header">Setting</li>
							<li class="nav-item">
								<a href="?page=data-pengguna" class="nav-link">
									<i class="nav-icon far fa-user"></i>
									<p>
										Users
									</p>
								</a>
							</li>

						<?php
						} elseif ($data_level == "Petugas") {
						?>

							<li class="nav-item">
								<a href="index.php" class="nav-link">
									<i class="nav-icon fas fa-tachometer-alt"></i>
									<p>
										Dashboard
									</p>
								</a>
							</li>

							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-cogs"></i>
									<p>
										Data Kandidat
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="?page=kandidat-bem" class="nav-link">
											<i class="nav-icon far fa-circle text-success"></i>
											<p>Kandidat BEM FTI</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=kandidat-ti" class="nav-link">
											<i class="nav-icon far fa-circle text-success"></i>
											<p>Kandidat HMP-TI</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=kandidat-si" class="nav-link">
											<i class="nav-icon far fa-circle text-success"></i>
											<p>Kandidat HMP-SI</p>
										</a>
									</li>
								</ul>
							</li>

							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon far fa fa-table"></i>
									<p>
										Kotak Suara
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="?page=data-kotak" class="nav-link">
											<i class="nav-icon far fa-circle text-success"></i>
											<p>Kotak Suara BEM FTI</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-kotakti" class="nav-link">
											<i class="nav-icon far fa-circle text-success"></i>
											<p>Kotak Suara HMP-TI</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-kotaksi" class="nav-link">
											<i class="nav-icon far fa-circle text-success"></i>
											<p>Kotak Suara HMP-SI</p>
										</a>
									</li>
								</ul>
							</li>

							<li class="nav-item">
								<a href="?page=data-pemilih-petugas" class="nav-link">
									<i class="nav-icon far fa-user"></i>
									<p>
										Data Pemilih
									</p>
								</a>
							</li>

							<li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon far fa fa-chart-pie"></i>
									<p>
										Quick Count
										<i class="fas fa-angle-left right"></i>
										<span class="badge badge-warning">
											QC
										</span>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="?page=data-suara" class="nav-link">
											<i class="nav-icon far fa-circle text-success"></i>
											<p>Quick Count BEM FTI</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-suarati" class="nav-link">
											<i class="nav-icon far fa-circle text-success"></i>
											<p>Quick Count HMP-TI</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="?page=data-suarasi" class="nav-link">
											<i class="nav-icon far fa-circle text-success"></i>
											<p>Quick Count HMP-SI</p>
										</a>
									</li>
								</ul>
							</li>


							<!-- <li class="nav-item has-treeview">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-file"></i>
									<p>
										Laporan
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="#" class="nav-link">
											<i class="nav-icon far fa-circle text-info"></i>
											<p>Daftar Kandidat</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="#" class="nav-link">
											<i class="nav-icon far fa-circle text-info"></i>
											<p>Daftar pemilih</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="#" class="nav-link">
											<i class="nav-icon far fa-circle text-info"></i>
											<p>Perolehan Suara</p>
										</a>
									</li>
								</ul>
							</li> -->
							<li class="nav-header">Setting</li>

						<?php
						} elseif ($data_level == "Sistem Informasi") {
						?>
							<li class="nav-item">
								<a href="index.php" class="nav-link">
									<i class="nav-icon far fa fa-edit"></i>
									<p>
										Bilik Suara BEM-FTI
									</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="?page=pemilihsi" class="nav-link">
									<i class="nav-icon far fa fa-edit"></i>
									<p>
										Bilik Suara HMP-SI
									</p>
								</a>
							</li>

							<li class="nav-header">Setting</li>

						<?php
						} elseif ($data_level == "Teknik Informatika") {
						?>
							<li class="nav-item">
								<a href="index.php" class="nav-link">
									<i class="nav-icon far fa fa-edit"></i>
									<p>
										Bilik Suara BEM-FTI
									</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="?page=pemilihti" class="nav-link">
									<i class="nav-icon far fa fa-edit"></i>
									<p>
										Bilik Suara HMP-TI
									</p>
								</a>
							</li>

							<li class="nav-header">Setting</li>
						<?php
						}
						?>

						<li class="nav-item">
							<a onclick="return confirm('Apakah anda yakin akan keluar ?')" href="logout.php" class="nav-link">
								<i class="nav-icon far fa-circle text-danger"></i>
								<p>
									Logout
								</p>
							</a>
						</li>

				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
			</section>

			<!-- Main content -->
			<section class="content">
				<!-- /. WEB DINAMIS DISINI ############################################################################### -->
				<div class="container-fluid">

					<?php
					if (isset($_GET['page'])) {
						$hal = $_GET['page'];

						switch ($hal) {
								//Klik Halaman Home Pengguna
							case 'admin':
								include "home/admin.php";
								break;
							case 'petugas':
								include "home/bendahara.php";
								break;
							case 'pemilih':
								include "home/pemilih.php";
								break;
							case 'pemilihti':
								include "home/pemilihti.php";
								break;
							case 'pemilihsi':
								include "home/pemilihsi.php";
								break;

								//Pengguna
							case 'data-pengguna':
								include "admin/pengguna/data_pengguna.php";
								break;
							case 'add-pengguna':
								include "admin/pengguna/add_pengguna.php";
								break;
							case 'edit-pengguna':
								include "admin/pengguna/edit_pengguna.php";
								break;
							case 'del-pengguna':
								include "admin/pengguna/del_pengguna.php";
								break;

								//calon
							case 'data-calon':
								include "admin/calon/data_calon.php";
								break;
							case 'add-calon':
								include "admin/calon/add_calon.php";
								break;
							case 'edit-calon':
								include "admin/calon/edit_calon.php";
								break;
							case 'del-calon':
								include "admin/calon/del_calon.php";
								break;

								//calon HMP-TI
							case 'data-calonti':
								include "admin/calonti/data_calon.php";
								break;
							case 'add-calonti':
								include "admin/calonti/add_calon.php";
								break;
							case 'edit-calonti':
								include "admin/calonti/edit_calon.php";
								break;
							case 'del-calonti':
								include "admin/calonti/del_calon.php";
								break;

								//calon HMP-SI
							case 'data-calonsi':
								include "admin/calonsi/data_calon.php";
								break;
							case 'add-calonsi':
								include "admin/calonsi/add_calon.php";
								break;
							case 'edit-calonsi':
								include "admin/calonsi/edit_calon.php";
								break;
							case 'del-calonsi':
								include "admin/calonsi/del_calon.php";
								break;

								//Pemilih
							case 'data-pemilih':
								include "admin/pemilih/data_pemilih.php";
								break;

							case 'add-pemilih':
								include "admin/pemilih/add_pemilih.php";
								break;
							case 'edit-pemilih':
								include "admin/pemilih/edit_pemilih.php";
								break;
							case 'del-pemilih':
								include "admin/pemilih/del_pemilih.php";
								break;

								//Petugas
							case 'data-pemilih-petugas':
								include "petugas/petugas_check.php";
								break;
							case 'kandidat-bem':
								include "petugas/kandidat_bem.php";
								break;
							case 'kandidat-si':
								include "petugas/kandidat_si.php";
								break;
							case 'kandidat-ti':
								include "petugas/kandidat_ti.php";
								break;


								//Bilik suara BEM FTI
							case 'PsSQAdT':
								include "pemilih/calon/data_calon.php";
								break;
							case 'PsSQBpL':
								include "pemilih/calon/pilih_calon.php";
								break;
							case 'PsSQBBK':
								include "pemilih/calon/buka_calon.php";
								break;
							case 'view':
								include "pemilih/calon/view_calon.php";
								break;

								//Bilik suara HMP-TI
							case 'CanaLvjv':
								include "pemilih/calonti/data_calon.php";
								break;
							case 'lSVxAKGj':
								include "pemilih/calonti/pilih_calon.php";
								break;
							case 'uvhwiIeX':
								include "pemilih/calonti/buka_calon.php";
								break;
							case 'viewti':
								include "pemilih/calonti/view_calon.php";
								break;

								//Bilik suara HMP-SI
							case 'wYFSKguq':
								include "pemilih/calonsi/data_calon.php";
								break;
							case 'vvZHUkts':
								include "pemilih/calonsi/pilih_calon.php";
								break;
							case 'EjjNfKUR':
								include "pemilih/calonsi/buka_calon.php";
								break;
							case 'viewsi':
								include "pemilih/calonsi/view_calon.php";
								break;

								//Kotak suara
							case 'data-kotak':
								include "admin/kotak/data_kotak.php";
								break;
							case 'data-kotaksi':
								include "admin/kotak/data_kotaksi.php";
								break;
							case 'data-kotakti':
								include "admin/kotak/data_kotakti.php";
								break;
							case 'data-suara':
								include "admin/suara/data_suara.php";
								break;
							case 'data-suarasi':
								include "admin/suara/data_suarasi.php";
								break;
							case 'data-suarati':
								include "admin/suara/data_suarati.php";
								break;



								//default
							default:
								echo "<center><h1> ERROR !</h1></center>";
								break;
						}
					} else {
						// Auto Halaman Home Pengguna
						if ($data_level == "Administrator") {
							include "home/admin.php";
						} elseif ($data_level == "Petugas") {
							include "home/admin.php";
						} elseif ($data_level == "Sistem Informasi") {
							include "home/pemilih.php";
						} elseif ($data_level == "Teknik Informatika") {
							include "home/pemilih.php";
						}
					}
					?>

				</div>
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<footer class="main-footer">
			<div class="float-right d-none d-sm-block">
				Copyright &copy;
				<a target="_blank" href="https://www.instagram.com/bem.fti.uniska/">
					<strong> ORMAWA FTI</strong>
				</a>
				All rights reserved.
			</div>
			Create 2021
		</footer>

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
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