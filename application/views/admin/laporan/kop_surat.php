<div class="container">
    <?php
    $path = 'assets/logo/logo.png';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    ?>
    <img src="<?php echo $base64 ?>" style="width:110px; height: 120px; margin-left : 0px;float : left">

    <p align="center" style="font-size: 30px; "><b>PEMERINTAH KOTA PEKANBARU</b></p>
    <p align="center" style="font-size: 23px; "><b>KECAMATAN RUMBAI</b></p>
    <p align="center" style="font-size: 23px; "><b>KELURAHAN SRI MERANTI</b></p>
    <p align="center" style="font-size: 10px; ">Jl. Sepakat, Sri Meranti, Kec. Rumbai, Kota Pekanbaru, Riau</p>
    <p align="center" style="font-size: 14px; "><b>PEKANBARU - RIAU</b></p>
    <br>
    <hr class="garis">
</div>