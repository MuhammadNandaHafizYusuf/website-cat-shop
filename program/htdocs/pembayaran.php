<?php
session_start();
include 'koneksi.php';



//jika tidak ada seasson pelanggan atau blm login
if (!isset($_SESSION["pembeli"]) OR empty($_SESSION["pembeli"])) {
    echo "<script>alert('Silahkan Login');</script>";
    echo "<script>location='login.php';</script>";
    exit();

 }

    //mendapatkan id pembelian dari url
   $idpem = $_GET["id"];
   $ambil = $koneksi->query("SELECT * FROM riwayat WHERE id_penjualan ='$idpem'");
   $detpem = $ambil->fetch_assoc();
   

  //mendapatkan id pelanggan yang akan membeli
  $idpelangganbeli = $detpem["id_pembeli"];
  //mendapatkan id pelanggan yang login
  $idpelangganlogin =  $_SESSION["pembeli"]["id_pembeli"];
  if ($idpelangganlogin!==$idpelangganbeli) {
    echo "<script>alert('Error');</script>";
    echo "<script>location='riwayat.php';</script>";
    exit();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <link rel="stylesheet" href="css/pembayaran.css">
</head>
<body>
    <?php
    include 'menu.php';
    ?>

    <div class="container">
        <h2>Konfirmasi Pembayaran</h2>
        <hr>
        <p>Kirim Bukti Pembayaran Anda Di sini
        <div class="alert alert-info">Total tagihan yang harus di bayarkan <strong><?php echo number_format($detpem["total_penjualan"]) ?></strong></div></p>


        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Nama Penyetor</label>
                <input type="text" placeholder="Masukkan Nama Penyetor" class="form-control" name="nama" required oninput="setCustomValidity('')">
            </div>
            <div class="form-group">
                <label for="">Bank Penyetor</label>
                <input type="text" placeholder="Masukan Nama Bank Penyetor" class="form-control" name="bank" required oninput="setCustomValidity('')">
            </div>
            <div class="form-group">
                <label for="">Jumlah</label>
                <input type="number" placeholder="Masukkan Jumlah Pembayaran" class="form-control" value="<?php echo  $detpem['total_penjualan']; ?>"  name="jumlah" min="1">
            </div>
            <div class="form-group">
                <label for="">Foto Bukti</label>
                <input type="file" class="form-control" name="bukti" required oninput="setCustomValidity('')">
                <p class="text-danger">Foto Harus JPG berukuran < 2MB</p>
            </div>
            <button class="btn btn-primary" id="checkout" name="kirim">Kirim</button>
        </form>

    </div>
    <?php
    //jika ada tombol kirim
    if (isset($_POST["kirim"])) {
        //upload foto bukti
        $namabukti =  $_FILES["bukti"]["name"];
        $lokasibukti = $_FILES["bukti"]["tmp_name"];
        $namafiks = date("YmdHis"). $namabukti;
        move_uploaded_file($lokasibukti, "bukti_pembayaran/$namafiks");
        
        $nama = $_POST["nama"];
        $bank = $_POST["bank"];
        $jumlah = $_POST["jumlah"];
        $tanggal = date("Y-m-d");
        //simpan data pembayaran
        $koneksi->query("INSERT INTO pembayaran
        (id_penjualan,nama,bank,jumlah,tanggal,bukti)
        VALUES('$idpem','$nama','$bank','$jumlah','$tanggal','$namafiks')");
        //update data status pembayaran
        $koneksi->query("UPDATE riwayat SET status_penjualan='Sudah mengirim bukti'
        WHERE id_penjualan='$idpem'");
         echo "<script>alert('Telah Mengirim Pembayaran');</script>";
         echo "<script>location='riwayat.php';</script>";
    }
    ?>
    
</body>
</html>