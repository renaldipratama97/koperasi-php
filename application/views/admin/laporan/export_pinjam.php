<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="author" content="Willy" /> -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/assets-template/tabel.css">
    <style>
        body,
        p,
        h3,
        h4,
        h1 h2 {
            font-family: "Times New Roman", serif;
        }

        .garis {
            height: 2px;
            background-color: #000;
            margin-bottom: 0px;
            margin-top: 10px;
        }

        hr {
            height: 0.5px;
            background-color: #000;
            margin-top: 5px;
        }

        p {
            margin: 0 0 0 0;
            padding: 0 0 0 0;
        }

        .left {
            text-align: left
        }

        .right {
            text-align: right
        }

        .center {
            text-align: center
        }

        .grid-container {
            display: grid;
            grid-template-columns: auto auto auto auto;
            grid-gap: 10px;
            padding: 10px;
            text-align: center;
        }

        .grid-container>div {
            text-align: center;
            padding: 20px 0;
        }

        .item1 {
            grid-row: 1 / span 2;
        }

        /* .container {
            padding-left: 30px;
            padding-right: 30px;
        } */
    </style>

</head>
<!-- <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script> -->

<body style="font-family: 'Times New Roman',serif; ">
    <?php $this->load->view('admin/laporan/kop_surat'); ?>

    <div class="left" style="margin-top: 20px;">
        <p></p>
        <p align="center"><b><u>LAPORAN DATA SIMPANAN</u></b></p>
        <p align="center"><b><?php echo date('d-F-Y'); ?></b></p>

    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Pinjam</th>
                <th>Nama Anggota</th>
                <th>Tenor</th>
                <th>Tanggal Pengajuan</th>
                <th>Tanggal Persetujuan</th>
            </tr>
        </thead>
        <?php
        $no = 1;
        foreach ($data_laporan as $data) {
        ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $data->kode_pinjam ?></td>
                <td><?php echo $data->nama ?></td>
                <td><?php echo $data->nama_tenor ?></td>
                <td><?php echo $data->tgl_pengajuan ?></td>
                <td><?php echo $data->tgl_persetujuan ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>