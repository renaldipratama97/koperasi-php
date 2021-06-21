<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Body Content -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Jenis Simpanan</h6>
        </div>
        <div class="card-body">
            <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#addModal">
                <i class="fas fa-plus"></i>
            </a>
            <br><br>
            <div class="message" data-flashdata="<?= $this->session->flashdata('message') ?>"></div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr style="text-align:center">
                            <th>No</th>
                            <th>Jenis Simpanan</th>
                            <th>Deskripsi</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_jenissimpanan as $data) {
                        ?>
                            <tr style="text-align:center">
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $data->jenis_simpanan ?></td>
                                <td><?php echo $data->deskripsi ?></td>
                                <td><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#editModal<?= $data->id ?>"><i class="fas fa-edit"></i></a> <a href="#" data-toggle="modal" data-target="#deleteModal<?= $data->id ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->


<!-- Modal add data -->

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Jenis Simpanan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= base_url('admin/JenisSimpanan/add_jenissimpanan') ?>">
                    <div class="form-group">
                        <label for="jenis_simpanan" class="col-form-label">Jenis Simpanan</label>
                        <input type="text" class="form-control" name="jenis_simpanan" id="jenis_simpanan">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi" class="col-form-label">Deskripsi</label>
                        <input type="text" class="form-control" name="deskripsi" id="deskripsi">
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" type="submit">Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- End add data -->

<!-- Modal edit data -->
<?php foreach ($data_jenissimpanan as $data) { ?>
    <div class="modal fade" id="editModal<?= $data->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Edit Jenis Simpanan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?= base_url('admin/JenisSimpanan/update_jenissimpanan') ?>">
                        <div class="form-group">
                            <label for="jenis_simpanan" class="col-form-label">Jenis Simpanan</label>
                            <input type="hidden" class="form-control" name="kode" id="kode" value="<?= $data->id ?>">
                            <input type="text" class="form-control" name="jenis_simpanan" id="jenis_simpanan" value="<?= $data->jenis_simpanan ?>">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi" class="col-form-label">Deskripsi</label>
                            <input type="text" class="form-control" name="deskripsi" id="deskripsi" value="<?= $data->deskripsi ?>">
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
<?php foreach ($data_jenissimpanan as $data) { ?>
    <div class="modal fade" id="deleteModal<?= $data->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a class="btn btn-primary" href="<?= base_url('admin/JenisSimpanan/delete/') . $data->id; ?>">Yes</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- End Delete Modal -->