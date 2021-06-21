<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Body Content -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Dokumen</h6>
        </div>
        <div class="message" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
        <div class="card-body">
            <h2>Dokumen</h2>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <td>Kode Dokumen</td>
                        <td><?php echo $kode_dokumen; ?></td>
                    </tr>
                    <tr>
                        <td>Nama Pemilik Dokumen</td>
                        <td><?php echo $nama; ?></td>
                    </tr>
                    <tr>
                        <td>File One</td>
                        <td><a href="<?= base_url('assets/dokumen/') . $file_one ?>"><?php echo $file_one; ?></a></td>
                    </tr>
                    <tr>
                        <td>File Two</td>
                        <td><a href="<?= base_url('assets/dokumen/') . $file_two ?>"><?php echo $file_two; ?></td>
                    </tr>
                    <tr>
                        <td>Created At</td>
                        <td><?php echo $createdAtt; ?></td>
                    </tr>
                    <tr>
                        <td>Modified At</td>
                        <td><?php echo $modifiedAtt; ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <a href="<?php echo site_url('welcome') ?>" class="btn btn-default">Cancel</a>
                            <a href="<?php echo site_url('anggota/profile/edit_dokumen/') . $kode_dokumen ?>" class="btn btn-primary">Edit</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->