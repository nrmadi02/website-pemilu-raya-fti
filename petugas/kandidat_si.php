<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-table"></i> Data Kandidat HMP-SI
        </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <br>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No Urut</th>
                        <th>Nama Kandidat</th>
                        <th>Foto Kandidat</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 1;
                    $sql = $koneksi->query("select * from tb_calonhmpsi");
                    while ($data = $sql->fetch_assoc()) {
                    ?>

                        <tr>
                            <td>
                                <?php echo $data['id_calon']; ?>
                            </td>
                            <td>
                                <?php echo $data['nama_calon']; ?>
                            </td>
                            <td align="center">
                                <img src="foto/<?php echo $data['foto_calon']; ?>" width="150px" />
                            </td>
                            <td>
                                <?php echo $data['keterangan']; ?>
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