<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Body Content -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Simpanan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr style="text-align:center">
                            <th>No</th>
                            <th>Kode Simpan</th>
                            <th>Nama Anggota</th>
                            <th>Jumlah Simpan</th>
                            <th>Tgl Simpan</th>
                            <th>Jenis Simpanan</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_simpan as $data) {
                        ?>
                            <tr style="text-align:center">
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $data->kode_simpan ?></td>
                                <td><?php echo $data->nama ?></td>
                                <td><?php echo $data->jumlah_simpan ?></td>
                                <td><?php echo $data->tgl_simpan ?></td>
                                <td><?php echo $data->deskripsi ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->