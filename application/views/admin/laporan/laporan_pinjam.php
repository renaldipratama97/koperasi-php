<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Body Content -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Laporan Data Pinjaman</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr style="text-align:center">
                            <th>No</th>
                            <th>Kode Pinjam</th>
                            <th>Nama Anggota</th>
                            <th>Tenor</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Tanggal Persetujuan</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_laporan as $data) {
                        ?>
                            <tr style="text-align:center">
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $data->kode_pinjam ?></td>
                                <td><?php echo $data->nama ?></td>
                                <td><?php echo $data->nama_tenor ?></td>
                                <td><?php echo $data->tgl_pengajuan ?></td>
                                <td><?php echo $data->tgl_persetujuan ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <a href="<?= base_url('admin/laporan/pinjam_pdf') ?>" class="btn btn-danger mt-4"><i class="fas fa-file-pdf"></i> Export PDF</a>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->