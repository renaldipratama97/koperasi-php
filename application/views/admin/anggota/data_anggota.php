<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Body Content -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Anggota</h6>
        </div>
        <div class="card-body">
            <a class="btn btn-primary" href="<?= base_url('admin/anggota/form_anggota') ?>">
                <i class="fas fa-plus"></i>
            </a>
            <br><br>
            <div class="message" data-flashdata="<?= $this->session->flashdata('message') ?>"></div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr style="text-align:center">
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama Anggota</th>
                            <th>Pekerjaan</th>
                            <th>Alamat</th>
                            <th>Foto</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_anggota as $data) {
                        ?>
                            <tr style="text-align:center">
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $data->nik ?></td>
                                <td><?php echo $data->nama ?></td>
                                <td><?php echo $data->pekerjaan ?></td>
                                <td><?php echo $data->alamat ?></td>
                                <td><img src="<?= base_url('assets/picture/') . $data->picture  ?>" alt="picture" width="90" height="80"></td>
                                <td><a href="<?= base_url('admin/anggota/edit_anggota/') . $data->nik ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a> <a href="#" data-toggle="modal" data-target="#deleteModal<?= $data->nik ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
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
<?php foreach ($data_anggota as $data) { ?>
    <div class="modal fade" id="deleteModal<?= $data->nik ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
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
                    <a class="btn btn-primary" href="<?= base_url('admin/anggota/delete_anggota/') . $data->nik; ?>">Yes</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- End Delete Modal -->