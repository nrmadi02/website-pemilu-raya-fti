<?php
//membuat acak angka
$pass_acak = mt_rand(1000, 9999);
?>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Tambah Data
        </h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Pemilih</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" placeholder="Nama user" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Program Studi</label>
                <div class="col-sm-6">
                    <select class="form-select" id="prodi" name="prodi" aria-label="Default select example">
                        <option value="Teknik Informatika">Teknik Informatika</option>
                        <option value="Sistem Informasi">Sistem Informasi</option>
                    </select>
                </div>
            </div>

        </div>
        <div class="card-footer">
            <input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
            <a href="?page=MyApp/data_pengguna" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<?php

if (isset($_POST['Simpan'])) {
    //mulai proses simpan data
    $sql_simpan = "INSERT INTO tb_pengguna (nama_pengguna,username,password,level,status,status2,jenis) VALUES (
        '" . addslashes($_POST['nama_pengguna']) . "',
        '" . $_POST['username'] . "',
        '" . $pass_acak . "',
        '" . $_POST['prodi'] . "',
        '1',
        '1',
        'PST')";
    $query_simpan = mysqli_query($koneksi, $sql_simpan);
    mysqli_close($koneksi);

    if ($query_simpan) {
        echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-pemilih';
          }
      })</script>";
    } else {
        echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-pemilih';
          }
      })</script>";
    }
}
     //selesai proses simpan data
