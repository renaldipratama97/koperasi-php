<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Body Content -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Peminjaman</h6>
        </div>
        <div class="message" data-flashdata="<?= $this->session->flashdata('message') ?>"></div>
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
                                <td><a href="<?= base_url('admin/angsuran/form_angsuran/') . $data->kode_pinjam ?>" class="btn btn-primary"><i class="fas fa-money-bill-alt"></i></a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->