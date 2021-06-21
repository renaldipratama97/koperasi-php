<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Body Content -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Angsuran Peminjaman</h6>
        </div>
        <div class="card-body">
            <div class="container">
                <form action="<?= base_url('admin/angsuran/add_angsuran') ?>" method="POST">
                    <div class="form-group">
                        <label for="kode" class="col-form-label">Kode Angsuran</label>
                        <input type="text" class="form-control" name="kode" id="kode" value="<?= $automatic_kode ?>" readonly>
                    </div>
                    <?php
                    foreach ($angsuran as $data) {
                    ?>
                        <div class="form-group">
                            <label for="kode_pinjam" class="col-form-label">Kode Peminjaman</label>
                            <input type="text" class="form-control" name="kode_pinjam" id="kode_pinjam" value="<?= $data->kode_pinjam ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama_anggota" class="col-form-label">Kode Anggota</label>
                            <input type="text" class="form-control" name="nama_anggota" id="nama_anggota" value="<?= $data->nama ?>" readonly>
                            <input type="hidden" class="form-control" name="kode_anggota" id="kode_anggota" value="<?= $data->kode_anggota ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_pinjam" class="col-form-label">Jumlah Pinjam</label>
                            <input type="text" class="form-control" onchange="getAngsuran()" name="jumlah_pinjam" id="jumlah_pinjam" value="<?= $data->jumlah_pinjam ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama_tenor" class="col-form-label">Tenor</label>
                            <input type="text" class="form-control" name="nama_tenor" id="tenor" value="<?= $data->nama_tenor ?>" readonly>
                            <input type="hidden" class="form-control" name="tenor" id="tenor" value="<?= $data->tenor ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_bayar" class="col-form-label">Jumlah Bayar Angsuran</label>
                            <input type="text" class="form-control" name="jumlah_bayar" id="jumlah_bayar" readonly>
                        </div>
                        <div class="form-group">
                            <label for="angsuran_ke" class="col-form-label">Angsuran Ke-</label>
                            <input type="text" class="form-control" name="angsuran_ke" id="angsuran_ke">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi" class="col-form-label">Deskripsi</label>
                            <input type="text" class="form-control" name="deskripsi" id="deskripsi">
                        </div>
                    <?php } ?>
                    <div class="form-group float-right">
                        <button class="btn btn-secondary" type="reset">Cancel</button>
                        <button class="btn btn-primary" type="submit">Bayar</button>
                    </div>
                </form>
                <script>
                    function getAngsuran() {
                        var jumlahPinjam = parseInt(document.getElementById('jumlah_pinjam').value);
                        var tenor = parseInt(document.getElementById('tenor').value);
                        if (document.getElementById("jumlah_pinjam") !== "") {
                            document.getElementById("jumlah_bayar").value = jumlahPinjam / tenor;
                        }
                    }
                    console.log(getAngsuran())
                </script>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->