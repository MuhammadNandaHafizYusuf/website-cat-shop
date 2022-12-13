<?php
session_start();
include 'koneksi.php';



//jika tidak ada seasson pelanggan atau blm login
if (!isset($_SESSION["pembeli"]) OR empty($_SESSION["pembeli"])) {
    echo "<script>alert('Silahkan Login');</script>";
    echo "<script>location='login.php';</script>";
    exit();
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pembelian</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <link rel="stylesheet" href="css/riwayat.css">
</head>
<body>
    <!-- memasukan nav bar -->
    <?php
    include 'menu.php';
    ?>
    <!-- <pre><?php print_r($_SESSION) ?></pre> -->
    <br>
    <h1>Riwayat Belanja</h1>
    <br>
    <hr>
    
    <section class="riwayat">
        <div class="container">
            <h3>Riwayat Pembeli <?php echo $_SESSION["pembeli"]["nama_pembeli"]; ?></h3>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $nomor=1;
                    //mendapatkan id pelanggan yang login dari sebuah section
                    $id_pembeli  = $_SESSION["pembeli"]["id_pembeli"];
                    $ambil = $koneksi->query("SELECT * FROM riwayat WHERE id_pembeli= '$id_pembeli'");
                     while ($pecah =  $ambil->fetch_assoc()){

                    ?>
                    <tr>
                        <td class="isi"><?php echo $nomor;?></td>
                        <td class="isi"><?php echo $pecah["tanggal_penjualan"]?></td>
                        <td class="isi">
                            <?php echo $pecah["status_penjualan"] ?> <br>
                            <?php if (!empty($pecah['resi_pengiriman'])):?>
                                       Resi: <?php echo $pecah["resi_pengiriman"]; ?> 
                                       <br>
                            <a href="https://cekresi.com/" target="_blank">Cek Keberadaan Paket</a>
                            <?php endif ?>
                            
                            
                        </td>
                        <td class="isi"><?php echo number_format($pecah["total_penjualan"]) ?></td>
                        <td class="isi">
                            <a href="nota.php?id=<?php echo $pecah["id_penjualan"] ?>" class="btn btn-info">Nota</a>

                            <!-- Jika sudah mengirimkan bukti pembayaran pengupload akan tertutup -->
                            <?php if($pecah['status_penjualan']=="pending"):  ?>
                            <a href="pembayaran.php?id=<?php echo $pecah["id_penjualan"] ?>" class="btn btn-success">Input Pembayaran</a>
                            <?php else: ?>
                                <a href="lihat_pembayaran.php?id=<?php echo $pecah["id_penjualan"] ?>" class="btn btn-warning">
                                Lihat Pembayaran
                                </a>
                            <?php endif ?>

                        </td>
                    </tr>
                    <?php $nomor++?>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </section>

    
</body>
</html>