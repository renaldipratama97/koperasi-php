<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Body Content -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Peminjaman</h6>
        </div>
        <div class="message" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
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
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_pinjam as $data) {
                        ?>
                            <tr style="text-align:center">
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $data->kode_pinjam ?></td>
                                <td><?php echo $data->nama ?></td>
                                <td><?php echo $data->jumlah_pinjam ?></td>
                                <td><?php echo $data->nama_tenor ?></td>
                                <td><?php echo $data->tgl_pengajuan ?></td>
                                <td><?php echo $data->tgl_persetujuan ?></td>
                                <td>
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="<?= base_url('admin/pinjam/proses_setuju/') . $data->kode_pinjam ?>">Setujui Pinjaman</a>
                                            <a class="dropdown-item" href="<?= base_url('admin/pinjam/proses_tidak_setuju/') . $data->kode_pinjam ?>">Tidak Setuju</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->