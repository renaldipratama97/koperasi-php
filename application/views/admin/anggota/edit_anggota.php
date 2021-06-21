<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Body Content -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Anggota</h6>
        </div>
        <div class="card-body">
            <div class="container">
                <form action="<?= base_url('admin/anggota/update_anggota') ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nik" class="col-form-label">NIK</label>
                        <input type="text" class="form-control" name="nik" id="nik" value="<?= $nik ?>">
                    </div>
                    <div class="form-group">
                        <label for="nama" class="col-form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" id="nama" value="<?= $nama ?>">
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="<?= $email ?>">
                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir" class="col-form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="<?= $tempat_lahir ?>">
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir" class="col-form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" value="<?= $tgl_lahir ?>">
                    </div>
                    <div class="form-group">
                        <label for="jenkel" class="col-form-label">Jenis Kelamin</label>
                        <select name="jenkel" id="jenkel" class="form-control">
                            <option disabled selected>Please select</option>
                            <?php
                            foreach ($data_jenkel->result_array() as $dj) {
                                if ($jenkel == $dj['jenkel']) {
                            ?>
                                    <option value="<?php echo $dj['jenkel']; ?>" selected="selected"><?php echo $dj['jenkel']; ?></option>
                                <?php
                                } else {
                                ?>
                                    <option value="<?php echo $dj['jenkel']; ?>"><?php echo $dj['jenkel']; ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="agama" class="col-form-label">Agama</label>
                        <select name="agama" id="agama" class="form-control">
                            <option disabled selected>Please select</option>
                            <?php
                            foreach ($data_agama->result_array() as $da) {
                                if ($agama == $da['agama']) {
                            ?>
                                    <option value="<?php echo $da['agama']; ?>" selected="selected"><?php echo $da['agama']; ?></option>
                                <?php
                                } else {
                                ?>
                                    <option value="<?php echo $da['agama']; ?>"><?php echo $da['agama']; ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pekerjaan" class="col-form-label">Pekerjaan</label>
                        <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" value="<?= $pekerjaan ?>">
                    </div>
                    <div class="form-group">
                        <label for="no_telp" class="col-form-label">No Telepon</label>
                        <input type="text" class="form-control" name="no_telp" id="no_telp" value="<?= $no_telp ?>">
                    </div>
                    <div class="form-group">
                        <label for="alamat" class="col-form-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat" id="alamat" value="<?= $alamat ?>">
                    </div>
                    <div class="form-group">
                        <label for="picture" class="col-form-label">Picture</label>
                        <input type="file" class="form-control" name="picture" id="picture">
                        <img src="<?= base_url('assets/picture/') . $picture ?>" class="mt-2 ml-2" alt="picture" width="100" height="100">
                    </div>
                    <div class="form-group float-right">
                        <button class="btn btn-secondary" type="reset">Cancel</button>
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->