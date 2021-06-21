<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Body Content -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Laporan Data Angsuran</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr style="text-align:center">
                            <th>No</th>
                            <th>Kode Angsuran</th>
                            <th>Kode Pinjam</th>
                            <th>Nama Anggota</th>
                            <th>Jumlah Bayar</th>
                            <th>Angsuran Ke-</th>
                            <th>Deskripsi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_laporan as $data) {
                        ?>
                            <tr style="text-align:center">
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $data->kode_angsuran ?></td>
                                <td><?php echo $data->kode_pinjam ?></td>
                                <td><?php echo $data->nama ?></td>
                                <td><?php echo $data->jumlah_bayar ?></td>
                                <td><?php echo $data->angsuran_ke ?></td>
                                <td><?php echo $data->deskripsi ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <a href="<?= base_url('admin/laporan/angsuran_pdf') ?>" class="btn btn-danger mt-4"><i class="fas fa-file-pdf"></i> Export PDF</a>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->