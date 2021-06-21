<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Body Content -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Peminjaman</h6>
        </div>
        <div class="card-body">
            <a class="btn btn-primary" href="<?= base_url('admin/pinjam/form_pinjam') ?>">
                <i class="fas fa-plus"></i>
            </a>
            <br><br>
            <div class="message" data-flashdata="<?= $this->session->flashdata('message') ?>"></div>
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
                            <th>Status</th>
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
                                <?php if ($data->status == 0) { ?>
                                    <td>Belum Dilihat</td>
                                <?php } elseif ($data->status == 1) { ?>
                                    <td>Disetujui</td>
                                <?php } else { ?>
                                    <td>Tidak Disetujui</td>
                                <?php } ?>
                                <td><a href="#" data-toggle="modal" data-target="#deleteModal<?= $data->kode_pinjam ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<!-- Delete Modal -->
<?php foreach ($data_pinjam as $data) { ?>
    <div class="modal fade" id="deleteModal<?= $data->kode_pinjam ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are You Sure ?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url('admin/pinjam/delete_pinjam/') . $data->kode_pinjam; ?>">Yes</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- End Delete Modal -->