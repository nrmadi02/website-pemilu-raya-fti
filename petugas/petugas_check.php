<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-table"></i> Data Pemilih
        </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">

            <br>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama User</th>
                        <th>Program Studi</th>
                        <th>BEM FTI</th>
                        <th>Himpunan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 1;
                    $sql = $koneksi->query("select * from tb_pengguna where jenis='PST'");
                    while ($data = $sql->fetch_assoc()) {
                    ?>

                        <tr>
                            <td>
                                <?php echo $no++; ?>
                            </td>
                            <td>
                                <?php echo $data['nama_pengguna']; ?>
                            </td>
                            <td>
                                <?php echo $data['level']; ?>
                            </td>
                            <td>
                                <?php $stt = $data['status']  ?>
                                <?php if ($stt == '1') { ?>
                                    <span class="badge badge-warning">Belum memilih</span>
                                <?php } elseif ($stt == '0') { ?>
                                    <span class="badge badge-primary">Sudah memilih</span>
                            </td>
                        <?php } ?>
                        <td>
                            <?php $stt = $data['status2']  ?>
                            <?php if ($stt == '1') { ?>
                                <span class="badge badge-warning">Belum memilih</span>
                            <?php } elseif ($stt == '0') { ?>
                                <span class="badge badge-primary">Sudah memilih</span>
                        </td>
                    <?php } ?>
                    </td>
                    <td>
                        <p>No Aksi</p>
                    </td>
                        </tr>

                    <?php
                    }
                    ?>
                </tbody>
                </tfoot>
            </table>
        </div>
    </div>
    <!-- /.card-body -->