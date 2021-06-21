<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Body Content -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Dokumen</h6>
        </div>
        <div class="card-body">
            <div class="container">
                <form action="<?= base_url('admin/dokumen/add_dokumen') ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="kode_dokumen" class="col-form-label">Kode Dokumen</label>
                        <input type="text" class="form-control" name="kode_dokumen" id="kode_dokumen" value="<?php echo $kode; ?>" readonly>
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
                        <label for="file_one" class="col-form-label">Berkas Surat Tanah</label>
                        <input type="file" class="form-control" name="file_one" id="file_one">
                    </div>
                    <div class="form-group">
                        <label for="file_two" class="col-form-label">Berkas Surat Pendukung</label>
                        <input type="file" class="form-control" name="file_two" id="file_two">
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