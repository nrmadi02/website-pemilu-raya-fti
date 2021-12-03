<?php
$data_id = $_SESSION["ses_id"];

    if(isset($_GET['kode'])){
		$sql_simpan = "INSERT INTO tb_vote (id_calon, id_pemilih, level) VALUES (
            '".$_GET['kode']."',
            '".$data_id."',
			'hmpsi');";
        $sql_simpan .= "UPDATE tb_pengguna set 
			status2='0'
			WHERE id_pengguna='".$data_id."'";
        $query_simpan = mysqli_multi_query($koneksi, $sql_simpan);
		mysqli_close($koneksi);
		
		if ($query_simpan) {
			echo "<script>
			Swal.fire({title: 'Anda Berhasil Memilih',text: '',icon: 'success',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
				window.location = 'index.php?page=wYFSKguq';
				}
			})</script>";
			}else{
			echo "<script>
			Swal.fire({title: 'Anda Gagal Memilih',text: '',icon: 'error',confirmButtonText: 'OK'
			}).then((result) => {if (result.value){
				window.location = 'index.php?page=wYFSKguq';
				}
			})</script>";
		  }}
		   //selesai proses simpan data
	  