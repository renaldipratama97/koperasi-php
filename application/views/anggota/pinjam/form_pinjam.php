<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Body Content -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Peminjaman</h6>
        </div>
        <div class="meessage" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
        <div class="card-body">
            <div class="container">
                <form action="<?= base_url('anggota/pinjam/add_pinjam') ?>" method="POST">
                    <div class="form-group">
                        <label for="kode" class="col-form-label">Kode Pinjam</label>
                        <input type="text" class="form-control" name="kode" id="kode" value="<?php echo $kode; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tgl_pengajuan" class="col-form-label">Tanggal Pengajuan Pinjam</label>
                        <input type="date" class="form-control" name="tgl_pengajuan" id="tgl_pengajuan">
                    </div>
                    <div class="form-group">
                        <label for="jumlah_pinjam" class="col-form-label">Jumlah Pinjam</label>
                        <select name="jumlah_pinjam" id="jumlah_pinjam" class="form-control">
                            <option disabled selected>Please Select</option>
                            <option value="1000000">Rp. 1.000.000</option>
                            <option value="2000000">Rp. 2.000.000</option>
                            <option value="3000000">Rp. 3.000.000</option>
                            <option value="4000000">Rp. 4.000.000</option>
                            <option value="5000000">Rp. 5.000.000</option>
                            <option value="6000000">Rp. 6.000.000</option>
                            <option value="7000000">Rp. 7.000.000</option>
                            <option value="8000000">Rp. 8.000.000</option>
                            <option value="9000000">Rp. 9.000.000</option>
                            <option value="10000000">Rp. 10.000.000</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tenor" class="col-form-label">Tenor</label>
                        <select name="tenor" id="tenor" class="form-control">
                            <option disabled selected>Please select</option>
                            <?php
                            foreach ($data_tenor->result_array() as $tenor) {
                            ?>
                                <option value="<?php echo $tenor['kode_tenor']; ?>"><?php echo $tenor['nama_tenor']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi" class="col-form-label">Deskripsi</label>
                        <input type="text" class="form-control" name="deskripsi" id="deskripsi">
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