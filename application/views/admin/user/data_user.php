<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Body Content -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
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
                            <th>NIK</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Level</th>
                            <th>Picture</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_user as $data) {
                        ?>
                            <tr style="text-align:center">
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $data->nik ?></td>
                                <td><?php echo $data->email ?></td>
                                <td><?php echo $data->username ?></td>
                                <td><?php echo $data->level ?></td>
                                <td><img src="<?= base_url('assets/picture/') . $data->picture ?>" width="90" height="100" alt="user-picture"></td>
                                <td><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#editModal<?= $data->kode_user ?>"><i class="fas fa-edit"></i></a> <a href="<?= base_url('admin/user/delete_user/') . $data->kode_user ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
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
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah User</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="<?= base_url('admin/user/add_user') ?>">
                    <div class="form-group">
                        <label for="nik" class="col-form-label">NIK</label>
                        <input type="text" class="form-control" name="nik" id="nik">
                    </div>
                    <div class="form-group">
                        <label for="nama" class="col-form-label">Nama Lengkap</label>
                        <input type="nama" class="form-control" name="nama" id="nama">
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="username" class="col-form-label">Username</label>
                        <input type="text" class="form-control" name="username" id="username">
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div class="form-group">
                        <label for="level" class="col-form-label">Level</label>
                        <select name="level" id="level" class="form-control">
                            <option disabled selected>Please select</option>
                            <?php
                            foreach ($data_level->result_array() as $level) {
                            ?>
                                <option value="<?php echo $level['kode_level']; ?>"><?php echo $level['level']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="picture" class="col-form-label">Picture</label>
                        <input type="file" class="form-control" name="picture" id="picture">
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
<?php foreach ($data_user as $data) { ?>
    <div class="modal fade" id="editModal<?= $data->kode_user ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Edit User</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" action="<?= base_url('admin/user/update_user') ?>">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="kode" id="kode" value="<?= $data->kode_user ?>">
                            <label for="nama" class="col-form-label">Nama Lengkap</label>
                            <input type="nama" class="form-control" name="nama" id="nama" value="<?= $data->nama ?>">
                        </div>
                        <div class=" form-group">
                            <label for="email" class="col-form-label">Email</label>
                            <input type="text" class="form-control" name="email" id="email" value="<?= $data->email ?>">
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="username" value="<?= $data->username ?>">
                        </div>
                        <div class="form-group">
                            <label for="level" class="col-form-label">Level</label>
                            <!-- <input type="text" class="form-control" name="level" id="level" value="<?= $data->level ?>"> -->
                            <select name="level" id="level" class="form-control">
                                <option disabled>Please select</option>
                                <?php
                                foreach ($data_level->result() as $level) {
                                    if ($data->level === $level->level) {
                                ?>
                                        <option value="<?php echo $level->kode_level ?>" selected="selected"><?php echo $level->level ?></option>
                                    <?php
                                    } else {
                                    ?>
                                        <option value="<?php echo $level->kode_level ?>"><?php echo $level->level ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="userfile" class="col-form-label">Picture</label>
                            <input type="file" class="form-control" name="userfile" id="userfile">
                        </div>

                        <img class="ml-1" src="<?= base_url('assets/picture/') . $data->picture ?>" alt="user-picture" width="90" height="100">
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
<!-- <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <a class="btn btn-primary" href="<?= base_url('admin/JenisSimpanan/delete') ?>">Yes</a>
            </div>
        </div>
    </div>
</div> -->
<!-- End Delete Modal -->