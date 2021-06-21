<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Body Content -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Dokumen</h6>
        </div>
        <div class="card-body">
            <a class="btn btn-primary" href="<?= base_url('admin/dokumen/form_dokumen') ?>">
                <i class="fas fa-plus"></i>
            </a>
            <br><br>
            <div class="message" data-flashdata="<?= $this->session->flashdata('message') ?>"></div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr style="text-align:center">
                            <th>No</th>
                            <th>Kode Dokumen</th>
                            <th>Nama Anggota</th>
                            <th>File 1</th>
                            <th>File 2</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_dokumen as $data) {
                        ?>
                            <tr style="text-align:center">
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $data->kode_dokumen ?></td>
                                <td><?php echo $data->nama ?></td>
                                <td><a href="<?= base_url('assets/dokumen/') . $data->file_one ?>"><?php echo $data->file_one ?></a> </td>
                                <td><a href="<?= base_url('assets/dokumen/') . $data->file_two ?>"><?php echo $data->file_two ?></a></td>
                                <td><?php echo $data->createdAtt ?></td>
                                <td><a href="<?= base_url('admin/dokumen/edit_dokumen/') . $data->kode_dokumen ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a> <a href="#" data-toggle="modal" data-target="#deleteModal<?= $data->kode_dokumen ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
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
<?php foreach ($data_dokumen as $data) { ?>
    <div class="modal fade" id="deleteModal<?= $data->kode_dokumen ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a class="btn btn-primary" href="<?= base_url('admin/dokumen/delete_dokumen/') . $data->kode_dokumen; ?>">Yes</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- End Delete Modal -->