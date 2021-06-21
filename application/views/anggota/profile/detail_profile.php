<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Body Content -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
        </div>
        <div class="message" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
        <div class="card-body">
            <h2>Biodata</h2>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <td>NIK</td>
                        <td><?php echo $nik; ?></td>
                    </tr>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td><?php echo $nama; ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?php echo $email; ?></td>
                    </tr>
                    <tr>
                        <td>No Handphone</td>
                        <td><?php echo $no_telp; ?></td>
                    </tr>
                    <tr>
                        <td>Tempat Lahir</td>
                        <td><?php echo $tempat_lahir; ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td><?php echo $tgl_lahir; ?></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td><?php echo $jenkel; ?></td>
                    </tr>
                    <tr>
                        <td>Agama</td>
                        <td><?php echo $agama; ?></td>
                    </tr>
                    <tr>
                        <td>Pekerjaan</td>
                        <td><?php echo $pekerjaan; ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td><?php echo $alamat; ?></td>
                    </tr>
                    <tr>
                        <td>Picture</td>
                        <td><img src="<?= base_url('assets/picture/') . $picture ?>" alt="picture" width="100" height="100"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <a href="<?php echo site_url('welcome') ?>" class="btn btn-default">Cancel</a>
                            <a href="<?php echo site_url('anggota/profile/edit_profile/') . $nik ?>" class="btn btn-primary">Edit</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->