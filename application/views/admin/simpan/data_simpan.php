<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Body Content -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Penyimpanan</h6>
        </div>
        <div class="card-body">
            <a class="btn btn-primary" href="<?= base_url('admin/simpan/form_simpan') ?>">
                <i class="fas fa-plus"></i>
            </a>
            <br><br>
            <div class="message" data-flashdata="<?= $this->session->flashdata('message') ?>"></div>
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
                            <th>Action</th>
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
                                <td><a href="#" data-toggle="modal" data-target="#editModal<?= $data->kode_simpan ?>" class="btn btn-primary"><i class="fas fa-plus-circle"></i></a> <a href="#" data-toggle="modal" data-target="#deleteModal<?= $data->kode_simpan ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<!-- Modal edit data -->
<?php foreach ($data_simpan as $data) { ?>
    <div class="modal fade" id="editModal<?= $data->kode_simpan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Tambah Saldo Anggota</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?= base_url('admin/simpan/add_saldo/') . $data->kode_simpan ?>">
                        <div class="form-group">
                            <label for="jumlah_simpan" class="col-form-label">Jumlah Simpan</label>
                            <input type="text" class="form-control" name="jumlah_simpan" id="jumlah_simpan">
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>
<!-- End edit data -->

<!-- Delete Modal -->
<?php foreach ($data_simpan as $data) { ?>
    <div class="modal fade" id="deleteModal<?= $data->kode_simpan ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
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
                    <a class="btn btn-primary" href="<?= base_url('admin/simpan/delete_simpan/') . $data->kode_simpan; ?>">Yes</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- End Delete Modal -->