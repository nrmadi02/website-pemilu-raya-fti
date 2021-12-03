<?php
$sql = $koneksi->query("SELECT COUNT(ID_CALON) as tot_calon  from tb_calon");
while ($data = $sql->fetch_assoc()) {
	$calon = $data['tot_calon'];
}

$sql = $koneksi->query("SELECT COUNT(ID_CALON) as tot_calon  from tb_calonhmpti");
while ($data = $sql->fetch_assoc()) {
	$calonhmpti = $data['tot_calon'];
}

$sql = $koneksi->query("SELECT COUNT(ID_CALON) as tot_calon  from tb_calonhmpsi");
while ($data = $sql->fetch_assoc()) {
	$calonhmpsi = $data['tot_calon'];
}

$sql = $koneksi->query("SELECT COUNT(id_pengguna) as tot_pemilih  from tb_pengguna where jenis='PST'");
while ($data = $sql->fetch_assoc()) {
	$pemilih = $data['tot_pemilih'];
}

$sql = $koneksi->query("SELECT COUNT(id_pengguna) as tot_pemilih  from tb_pengguna where level='Teknik Informatika'");
while ($data = $sql->fetch_assoc()) {
	$pemilihti = $data['tot_pemilih'];
}

$sql = $koneksi->query("SELECT COUNT(id_pengguna) as tot_pemilih  from tb_pengguna where level='Sistem Informasi'");
while ($data = $sql->fetch_assoc()) {
	$pemilihsi = $data['tot_pemilih'];
}

$sql = $koneksi->query("SELECT COUNT(id_pengguna) as sudah  from tb_pengguna where jenis='PST' and status='0'");
while ($data = $sql->fetch_assoc()) {
	$sudah = $data['sudah'];
}

$sql = $koneksi->query("SELECT COUNT(id_pengguna) as sudah  from tb_pengguna where level='Teknik Informatika' and status2='0'");
while ($data = $sql->fetch_assoc()) {
	$sudahti = $data['sudah'];
}

$sql = $koneksi->query("SELECT COUNT(id_pengguna) as sudah  from tb_pengguna where level='Sistem Informasi' and status2='0'");
while ($data = $sql->fetch_assoc()) {
	$sudahsi = $data['sudah'];
}

$sql = $koneksi->query("SELECT COUNT(id_pengguna) as belum  from tb_pengguna where jenis='PST' and status='1'");
while ($data = $sql->fetch_assoc()) {
	$belum = $data['belum'];
}

$sql = $koneksi->query("SELECT COUNT(id_pengguna) as belum  from tb_pengguna where level='Teknik Informatika' and status2='1'");
while ($data = $sql->fetch_assoc()) {
	$belumti = $data['belum'];
}

$sql = $koneksi->query("SELECT COUNT(id_pengguna) as belum  from tb_pengguna where level='Sistem Informasi' and status2='1'");
while ($data = $sql->fetch_assoc()) {
	$belumsi = $data['belum'];
}

?>

<div class="row">
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-primary">
			<div class="inner">
				<h5>
					<?php echo $calon; ?>
				</h5>

				<p>Jumlah Kandidat BEM FTI</p>
			</div>
			<div class="icon">
				<i class="ion ion-stats-bars"></i>
			</div>
			<a href="" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-primary">
			<div class="inner">
				<h5>
					<?php echo $pemilih; ?>
				</h5>

				<p>Jumlah Pemilih BEM FTI</p>
			</div>
			<div class="icon">
				<i class="ion ion-stats-bars"></i>
			</div>
			<a href="" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-primary">
			<div class="inner">
				<h5>
					<?php echo $sudah; ?>
				</h5>

				<p>Sudah Memilih BEM FTI</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a href="#" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-primary">
			<div class="inner">
				<h5>
					<?php echo $belum; ?>
				</h5>

				<p>Belum Memlih BEM FTI</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a href="#" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-warning">
			<div class="inner">
				<h5>
					<?php echo $calonhmpti; ?>
				</h5>

				<p>Jumlah Kandidat HMP-TI</p>
			</div>
			<div class="icon">
				<i class="ion ion-stats-bars"></i>
			</div>
			<a href="" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-warning">
			<div class="inner">
				<h5>
					<?php echo $pemilihti; ?>
				</h5>

				<p>Jumlah Pemilih HMP-TI</p>
			</div>
			<div class="icon">
				<i class="ion ion-stats-bars"></i>
			</div>
			<a href="" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-warning">
			<div class="inner">
				<h5>
					<?php echo $sudahti; ?>
				</h5>

				<p>Sudah Memilih HMP-TI</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a href="#" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-warning">
			<div class="inner">
				<h5>
					<?php echo $belumti; ?>
				</h5>

				<p>Belum Memlih HMP-TI</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a href="#" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-dark">
			<div class="inner">
				<h5>
					<?php echo $calonhmpsi; ?>
				</h5>

				<p>Jumlah Kandidat HMP-SI</p>
			</div>
			<div class="icon">
				<i class="ion ion-stats-bars"></i>
			</div>
			<a href="" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-dark">
			<div class="inner">
				<h5>
					<?php echo $pemilihsi; ?>
				</h5>

				<p>Jumlah Pemilih HMP-SI</p>
			</div>
			<div class="icon">
				<i class="ion ion-stats-bars"></i>
			</div>
			<a href="" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-dark">
			<div class="inner">
				<h5>
					<?php echo $sudahsi; ?>
				</h5>

				<p>Sudah Memilih HMP-SI</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a href="#" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-dark">
			<div class="inner">
				<h5>
					<?php echo $belumsi; ?>
				</h5>

				<p>Belum Memlih HMP-SI</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a href="#" class="small-box-footer">Selengkapnya
				<i class="fas fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>