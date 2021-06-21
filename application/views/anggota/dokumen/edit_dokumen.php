<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Body Content -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Dokumen</h6>
        </div>
        <div class="card-body">
            <div class="container">
                <form action="<?= base_url('anggota/profile/update_dokumen') ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="kode_dokumen" class="col-form-label">Kode Dokumen</label>
                        <input type="text" class="form-control" name="kode_dokumen" id="kode_dokumen" value="<?php echo $kode_dokumen; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="anggota" class="col-form-label">Anggota</label>
                        <input type="text" class="form-control" name="anggota" id="anggota" value="<?php echo $kode_anggota; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="file_one" class="col-form-label">Berkas Surat Tanah</label>
                        <input type="file" class="form-control" name="file_one" id="file_one" required>
                    </div>
                    <span class="ml-4"><?= $file_one ?></span>
                    <div class="form-group">
                        <label for="file_two" class="col-form-label">Berkas Surat Pendukung</label>
                        <input type="file" class="form-control" name="file_two" id="file_two" required>
                    </div>
                    <span class="ml-4"><?= $file_two ?></span>
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