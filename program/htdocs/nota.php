<?php 
session_start();
include 'koneksi.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Pembelian</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <link rel="stylesheet" href="css/nota.css">

</head>
<body>

<?php
include 'menu.php';
?>

<section class="konten">
    <div class="container">

    <!-- nota di sini pake nota yang ada di admin -->
    <h1>Detail Pembelian</h1>
    <hr>
<?php
 $ambil=$koneksi->query("SELECT * FROM riwayat JOIN pembeli ON riwayat.
 id_pembeli=pembeli.id_pembeli WHERE riwayat.id_penjualan='$_GET[id]'");
 $bank=$koneksi->query("SELECT * FROM admin");
$detail = $ambil->fetch_assoc();
$bank = $bank->fetch_assoc();

?>

<!-- <pre> <?php print_r($detail);?> </pre>
<pre> <?php print_r($bank);?> </pre> -->

<!-- Jika pelanggan yang beli tidak sama yang login maka dilarikan ke riwayat.php karena tidak berhak melihat nota orang lain -->
<!-- pelanggan yang beli harus pelanggan yang login -->

<?php
//mendapatkan id pelanggan yang beli
$idpelangganyangbeli  = $detail["id_pembeli"];
//mendapatkan id peklanggan yang login
$idpelangganyanglogin = $_SESSION["pembeli"]["id_pembeli"];

if ($idpelangganyangbeli!==$idpelangganyanglogin) {
    echo "<script>alert('Data Tidak Sesuai ,ERROR!');</script>";
    echo "<script>location='riwayat.php';</script>";
    exit();
}
?>
<!-- Himbauan -->
<div class="row">
    <div class="col-md">
        <div class="alert alert-info">
            <h5>
            <p>Silahkan Lakukan Pembayatan Sebesar Rp. <?php echo number_format ($detail['total_penjualan']); ?></p><br>
            <strong> Bank <?php echo $bank['nama_bank']?> <?php echo $bank['no_rekening']?> AN, <?php echo $bank['nama_lengkap']?></strong>
            </h5>
        </div>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-md-4">
        <h3>Pembelian</h3>
        <strong> <h6> No Pembelian: <?php echo $detail['id_penjualan']; ?></strong> <br>
        tanggal:  <?php echo date("d F Y",strtotime($detail["tanggal_penjualan"]));  ?> <br>
        Total:<?php echo $detail['total_penjualan']; ?></h6>
    </div>
    <div class="col-md-4">
        <h3>Pelanggan</h3>
        <strong> <h6> Nama :<?php echo $detail['nama_pembeli']; ?></strong> <br>
        No Tlp :<?php echo $detail['telepon_pembeli']; ?><br>
        Email :<?php echo $detail['email_pembeli']; ?></h6>
    </div>
    <div class="col-md-4">
        <h3>Pengiriman</h3>
        <strong><h6> <?php echo $detail['tipe'] ?><?php echo $detail['distrik'] ?><?php echo $detail['provinsi'] ?></strong> <br>
        Ongkos Kirim : <?php echo number_format( $detail['ongkir']); ?> <br>
        Ekspedisi Pengiriman : <?php echo $detail['ekspedisi'] ?> <?php echo $detail['paket'] ?> <?php echo $detail['estimasi'] ?> <br>
        Alamat : <?php echo $detail['alamat_pengiriman'] ?></h6>
    </div>
</div>



<table class="table table-bordered">
    <thead>
        <tr>
            <th>NO</th>
            <th>NAMA</th>
            <th>HARGA</th>
            <th>BERAT</th>
            <th>JUMLAH</th>
            <th>SUBBERAT</th>
            <th>SUBTOTAL</th>
        </tr>
    </thead>
    <tbody>
    <?php $nomor=1; ?>
    <?php $ambil=$koneksi->query("SELECT * FROM penjualan_produk  WHERE id_penjualan='$_GET[id]'"); ?>
    <?php while ($pecah = $ambil->fetch_assoc ()){ ?>

        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah['nama'];  ?></td>
            <td><?php echo number_format ($pecah['harga']);  ?></td>
            <td><?php echo $pecah['berat'];  ?></td>
            <td><?php echo $pecah['jumlah'];  ?></td>
            <td><?php echo $pecah['subberat'];  ?></td>
            <td><?php echo number_format($pecah['subharga']);  ?></td>
        </tr>
        <?php $nomor++ ?>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="6">Total</th>
            <th><?php echo number_format($detail['total_penjualan']); ?></th>
        </tr>
    </tfoot>
    <tfoot>
            <td colspan="6">Ongkos Kirim</td>
            <td><?php echo number_format( $detail['ongkir']); ?></td>
    </tfoot>
</table>



    </div>
</section>






</body>
</html>