<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Body Content -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Penyimpanan</h6>
        </div>
        <div class="card-body">
            <div class="container">
                <form action="<?= base_url('admin/simpan/add_simpan') ?>" method="POST">
                    <div class="form-group">
                        <label for="kode" class="col-form-label">Kode Pinjam</label>
                        <input type="text" class="form-control" name="kode" id="kode" value="<?php echo $kode; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="anggota" class="col-form-label">Anggota</label>
                        <select name="anggota" id="anggota" class="form-control">
                            <option disabled selected>Please select</option>
                            <?php
                            foreach ($data_anggota->result_array() as $anggota) {
                            ?>
                                <option value="<?php echo $anggota['nik']; ?>"><?php echo $anggota['nik']; ?> - <?php echo $anggota['nama']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_simpan" class="col-form-label">Jumlah Simpan</label>
                        <input type="number" class="form-control" name="jumlah_simpan" id="jumlah_simpan">
                    </div>
                    <div class="form-group">
                        <label for="jenis_simpan" class="col-form-label">Jenis Simpan</label>
                        <select name="jenis_simpan" id="jenis_simpan" class="form-control">
                            <option disabled selected>Please select</option>
                            <?php
                            foreach ($data_jenis_simpan->result_array() as $jenis_simpan) {
                            ?>
                                <option value="<?php echo $jenis_simpan['id']; ?>"><?php echo $jenis_simpan['deskripsi']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
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