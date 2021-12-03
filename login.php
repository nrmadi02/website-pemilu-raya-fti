<?php
include "inc/koneksi.php";
session_start();
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
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<img src="dist/img/LOGO KPU FTI-01.png" width=170px />
			<br>
			<a href="login.php">
				E-Voting
				<b>Pemilu Raya Ormawa FTI</b>
			</a>
		</div>
		<!-- /.login-logo -->
		<div class="card">
			<div class="card-body login-card-body">
				<p class="login-box-msg">Silahkan Masuk</p>

				<form action="" method="post">
					<div class="input-group mb-3">
						<input type="text" class="form-control" name="username" placeholder="Username" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-user"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="password" class="form-control" name="password" placeholder="Password" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<button type="submit" class="btn btn-warning btn-block btn-flat" name="btnLogin" title="Masuk Sistem">
								<b>Masuk</b>
							</button>
						</div>
					</div>
				</form>

			</div>
		</div>

		<a target="_blank" href="quick_count.php">
			<button class="btn btn-info btn-block btn-flat">
				<b>Quick Count</b>
			</button>
		</a>
		<!-- /.login-box -->

		<!-- jQuery -->
		<script src="plugins/jquery/jquery.min.js"></script>
		<!-- Bootstrap 4 -->
		<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- AdminLTE App -->
		<script src="dist/js/adminlte.min.js"></script>
		<!-- Alert -->
		<script src="plugins/alert.js"></script>

		<!-- <script>
			$(document).ready(function(){
                    $('#btnLogin').click(function(){
						
                        $.ajax({
                            type: 'POST',
                            url	: "https://ta.fti.uniska-bjm.ac.id/api/v1/login", 
                            data: {
								username: $('#username').val(),
								password : $('#password').val(),  
							},
                            success	: function(response){
								    // Swal.fire({title: 'Login Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
									// }).then((result) => {if (result.value)
									// 	{window.location = 'index.php';}
									// })
									console.log(response)
									//anti inject sql
									
									 

							// //query login
									// $sql_login = "SELECT * FROM tb_pengguna WHERE BINARY username='$username' AND password='$password'";
									// $query_login = mysqli_query($koneksi, $sql_login);
									// $data_login = mysqli_fetch_array($query_login,MYSQLI_BOTH);
									// $jumlah_login = mysqli_num_rows($query_login);
							// 	if(data.status == "success"){
                            
							// 	  
							// } else {
							// 	Swal.fire({title: 'Login Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
							// 			}).then((result) => {if (result.value)
							// 				{window.location = 'login';}
							// 			})
							// }
                            },
							error: function (xhr, textStatus, errorThrown) {  
                         		console.log(errorThrown);  
                     		}  
                        });
                    });
              })
		</script> -->

</body>

</html>

<?php

if (isset($_POST['btnLogin'])) {
	//create array of data to be posted
	$post_data['username'] = $_POST['username'];
	$post_data['password'] = $_POST['password'];

	//traverse array and prepare data for posting (key1=value1)
	foreach ($post_data as $key => $value) {
		$post_items[] = $key . '=' . $value;
	}

	//create the final string to be posted using implode()
	$post_string = implode('&', $post_items);

	//create cURL connection
	$curl_connection =
		curl_init('https://ta.fti.uniska-bjm.ac.id/api/v1/login');

	//set options
	curl_setopt($curl_connection, CURLOPT_CONNECTTIMEOUT, 30);
	curl_setopt(
		$curl_connection,
		CURLOPT_USERAGENT,
		"Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)"
	);
	curl_setopt($curl_connection, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl_connection, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl_connection, CURLOPT_FOLLOWLOCATION, 1);

	//set data to be posted
	curl_setopt($curl_connection, CURLOPT_POSTFIELDS, $post_string);

	//perform our request
	$result = curl_exec($curl_connection);

	//menampilkan data
	$hasil = json_decode($result, true);

	function Login($koneksi, $hasil, $level)
	{
		// /anti inject sql
		$username = mysqli_real_escape_string($koneksi, $_POST['username']);
		$userid = mysqli_real_escape_string($koneksi, $hasil['data']["userid"]);

		//query login
		$sql_login = "SELECT * FROM tb_pengguna WHERE BINARY username='$username' AND id_pengguna='$userid'";
		$query_login = mysqli_query($koneksi, $sql_login);
		$data_login = mysqli_fetch_array($query_login, MYSQLI_BOTH);
		$jumlah_login = mysqli_num_rows($query_login);


		if ($jumlah_login == 1) {
			$_SESSION["ses_id"] = $data_login["id_pengguna"];
			$_SESSION["ses_username"] = $hasil['data']["username"];
			$_SESSION["ses_name"] = $hasil['data']["nama"];
			$_SESSION["ses_password"] = '1';
			$_SESSION["ses_level"] = $data_login["level"];
			$_SESSION["ses_status"] = $data_login["status"];
			$_SESSION["ses_status_dua"] = $data_login["status2"];
			$_SESSION["ses_jenis"] = $data_login["jenis"];

			echo "<script>
			Swal.fire({title: 'Login Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
			}).then((result) => {if (result.value)
				{window.location = 'index.php';}
			})</script>";
		} else {


			if ((($hasil["success"] == true) and ($hasil['data']["userid"] == "19630674")) or (($hasil["success"] == true) and ($hasil['data']["userid"] == "19630280"))) {
				$_SESSION["ses_id"] = $hasil['data']["userid"];
				$_SESSION["ses_username"] = $hasil['data']["username"];
				$_SESSION["ses_name"] = $hasil['data']["nama"];
				$_SESSION["ses_password"] = '1';
				echo "<script>
			Swal.fire({title: 'Login Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
			}).then((result) => {if (result.value)
				{window.location = 'landing_admin.php';}
			})</script>";
			} elseif ((($hasil["success"] == true) and !($hasil['data']["userid"] == "19630674")) or (($hasil["success"] == true) and !($hasil['data']["userid"] == "19630280"))) {
				$_SESSION["ses_id"] = $hasil['data']["userid"];
				$_SESSION["ses_username"] = $hasil['data']["username"];
				$_SESSION["ses_name"] = $hasil['data']["nama"];
				$_SESSION["ses_level"] = $level;
				$_SESSION["ses_password"] = '1';
				echo "<script>
			Swal.fire({title: 'Login Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
			}).then((result) => {if (result.value)
				{window.location = 'landing_pemilih.php';}
			})</script>";
			} else {
				echo "<script>
			Swal.fire({title: 'Login Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
			}).then((result) => {if (result.value)
				{window.location = 'login';}
			})</script>";
			}

			// 	$_SESSION["ses_username"]=$data_login["username"];
			// 	$_SESSION["ses_password"]=$data_login["password"];
			// 	$_SESSION["ses_level"]=$data_login["level"];
			// 	$_SESSION["ses_status"]=$data_login["status"];
			// 	$_SESSION["ses_jenis"]=$data_login["jenis"];
			// var_dump($hasil["data"]);
			// var_dump($hasil);
		}
	}


	if ($hasil['success'] !== false) {
		if ((strpos($hasil['data']['userid'], '1963') !== false) and ($hasil['data']['kode_prodi'] == '55201')) {
			Login($koneksi, $hasil, 'Teknik Informatika');
		} elseif ((strpos($hasil['data']['userid'], '1863') !== false) and ($hasil['data']['kode_prodi'] == '55201')) {
			Login($koneksi, $hasil, 'Teknik Informatika');
		} elseif ((strpos($hasil['data']['userid'], '201001') !== false) and ($hasil['data']['kode_prodi'] == '55201')) {
			Login($koneksi, $hasil, 'Teknik Informatika');
		} elseif ((strpos($hasil['data']['userid'], '211001') !== false) and ($hasil['data']['kode_prodi'] == '55201')) {
			Login($koneksi, $hasil, 'Teknik Informatika');
		} elseif ((strpos($hasil['data']['userid'], '1971') !== false) and ($hasil['data']['kode_prodi'] == '57201')) {
			Login($koneksi, $hasil, 'Sistem Informasi');
		} elseif ((strpos($hasil['data']['userid'], '1871') !== false) and ($hasil['data']['kode_prodi'] == '57201')) {
			Login($koneksi, $hasil, 'Sistem Informasi');
		} elseif ((strpos($hasil['data']['userid'], '201002') !== false) and ($hasil['data']['kode_prodi'] == '57201')) {
			Login($koneksi, $hasil, 'Sistem Informasi');
		} elseif ((strpos($hasil['data']['userid'], '211002') !== false) and ($hasil['data']['kode_prodi'] == '57201')) {
			Login($koneksi, $hasil, 'Sistem Informasi');
		} else {
			echo "<script>
				Swal.fire({title: 'Maaf Anda Bukan Peserta Pemilih',text: '',icon: 'error',confirmButtonText: 'OK'
				}).then((result) => {if (result.value)
					{window.location = 'login';}
				})</script>";
		}
	} else {
		echo "<script>
				Swal.fire({title: 'Password atau Username Tidak Ada',text: '',icon: 'error',confirmButtonText: 'OK'
				}).then((result) => {if (result.value)
					{window.location = 'login';}
				})</script>";
	}
}


// 
	
	
	//anti inject sql
	// $username=mysqli_real_escape_string($koneksi,$_POST['username']);
	// $password=mysqli_real_escape_string($koneksi,$_POST['password']);

	// //query login
	// $sql_login = "SELECT * FROM tb_pengguna WHERE BINARY username='$username' AND password='$password'";
	// $query_login = mysqli_query($koneksi, $sql_login);
	// $data_login = mysqli_fetch_array($query_login,MYSQLI_BOTH);
	// $jumlah_login = mysqli_num_rows($query_login);


	// if ($jumlah_login == 1 ){
	// 	session_start();
	// 	$_SESSION["ses_id"]=$data_login["id_pengguna"];
	// 	$_SESSION["ses_nama"]=$data_login["nama_pengguna"];
	// 	$_SESSION["ses_username"]=$data_login["username"];
	// 	$_SESSION["ses_password"]=$data_login["password"];
	// 	$_SESSION["ses_level"]=$data_login["level"];
	// 	$_SESSION["ses_status"]=$data_login["status"];
	// 	$_SESSION["ses_jenis"]=$data_login["jenis"];
		
	// 	echo "<script>
	// 		Swal.fire({title: 'Login Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
	// 		}).then((result) => {if (result.value)
	// 			{window.location = 'index.php';}
	// 		})</script>";
	// 	}else{
	// 	echo "<script>
	// 		Swal.fire({title: 'Login Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
	// 		}).then((result) => {if (result.value)
	// 			{window.location = 'login';}
	// 		})</script>";
	// 	}
	// 	}
