<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Body Content -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Peminjaman</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr style="text-align:center">
                            <th>No</th>
                            <th>Kode Pinjam</th>
                            <th>Nama Anggota</th>
                            <th>Jumlah Pinjam</th>
                            <th>Tenor</th>
                            <th>Tgl Pengajuan</th>
                            <th>Tgl Persetujuan</th>
                            <th>Status Peminjaman</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_pinjam->result() as $data) {
                        ?>
                            <tr style="text-align:center">
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $data->kode_pinjam ?></td>
                                <td><?php echo $data->nama ?></td>
                                <td><?php echo $data->jumlah_pinjam ?></td>
                                <td><?php echo $data->nama_tenor ?></td>
                                <td><?php echo $data->tgl_pengajuan ?></td>
                                <td><?php echo $data->tgl_persetujuan ?></td>
                                <?php if ($data->status == 0) { ?>
                                    <td>Belum Dilihat</td>
                                <?php } elseif ($data->status == 1) { ?>
                                    <td>Disetujui</td>
                                <?php } else { ?>
                                    <td>Tidak Disetujui</td>
                                <?php } ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->