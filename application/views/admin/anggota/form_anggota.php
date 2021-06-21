<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Body Content -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Anggota</h6>
        </div>
        <div class="card-body">
            <div class="container">
                <form action="<?= base_url('admin/anggota/add_anggota') ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nik" class="col-form-label">NIK</label>
                        <input type="text" class="form-control" name="nik" id="nik" required>
                    </div>
                    <div class="form-group">
                        <label for="nama" class="col-form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" id="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir" class="col-form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" required>
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir" class="col-form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir">
                    </div>
                    <div class="form-group">
                        <label for="jenkel" class="col-form-label">Jenis Kelamin</label>
                        <select name="jenkel" id="jenkel" class="form-control">
                            <option disabled selected>Please select</option>
                            <?php
                            foreach ($data_jenkel->result_array() as $jenkel) {
                            ?>
                                <option value="<?php echo $jenkel['jenkel']; ?>"><?php echo $jenkel['jenkel']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="agama" class="col-form-label">Agama</label>
                        <select name="agama" id="agama" class="form-control">
                            <option disabled selected>Please select</option>
                            <?php
                            foreach ($data_agama->result_array() as $agama) {
                            ?>
                                <option value="<?php echo $agama['agama']; ?>"><?php echo $agama['agama']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pekerjaan" class="col-form-label">Pekerjaan</label>
                        <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" required>
                    </div>
                    <div class="form-group">
                        <label for="no_telp" class="col-form-label">No Telepon</label>
                        <input type="text" class="form-control" name="no_telp" id="no_telp" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat" class="col-form-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat" id="alamat" required>
                    </div>
                    <div class="form-group">
                        <label for="picture" class="col-form-label">Picture</label>
                        <input type="file" class="form-control" name="picture" id="picture">
                    </div>
                    <div class="form-group float-right">
                        <button class="btn btn-secondary" type="reset">Cancel</button>
                        <button class="btn btn-primary" type="submit">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->