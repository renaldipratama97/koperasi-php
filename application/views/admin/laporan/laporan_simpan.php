<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Body Content -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Laporan Data Simpanan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr style="text-align:center">
                            <th>No</th>
                            <th>Kode Simpan</th>
                            <th>Kode Anggota</th>
                            <th>Nama Anggota</th>
                            <th>Kode Jenis Simpan</th>
                            <th>Jumlah Simpan</th>
                            <th>Tanggal Simpan</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_laporan as $data) {
                        ?>
                            <tr style="text-align:center">
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $data->kode_simpan ?></td>
                                <td><?php echo $data->kode_anggota ?></td>
                                <td><?php echo $data->nama ?></td>
                                <td><?php echo $data->deskripsi ?></td>
                                <td><?php echo $data->jumlah_simpan ?></td>
                                <td><?php echo $data->tgl_simpan ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <a href="<?= base_url('admin/laporan/simpan_pdf') ?>" class="btn btn-danger mt-4"><i class="fas fa-file-pdf"></i> Export PDF</a>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->