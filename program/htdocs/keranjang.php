<?php
session_start();
include 'koneksi.php';



if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))
{
    echo "<script>alert('keranjang kosong');</script>";
    echo "<script>location='index.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <link rel="stylesheet" href="css/keranjang.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <!-- text menu -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro&display=swap" rel="stylesheet">
    <title>Keranjang Belanja</title>
</head>
<body>
    
<!-- navbar-->
    


<?php
include 'menu.php';
?>



<section class="konten">
        <div class="container">
            <h1 class="judul">KERANJANG BELANJA</h1>
            <hr>
            <table class="table table-bordered">
                <tr class="rowtable">
                    <th>No</th>
                    <th>Produk</th>
                    <th>Harga Satuan</th>
                    <th>Jumlah</th>
                    <th>Subharga</th>
                    <th>Option</th>
                </tr>
                <thead>
                    <tbody>
                    <?php $nomor =1;?>
                    <?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah):?>
                    <!-- menampilkan produk berdaasarkan id produk -->
                    <?php
                    $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                    $pecah = $ambil->fetch_assoc();
                    $subharga = $pecah["harga_produk"]*$jumlah;
                    ?>
                    
                        <tr class="data2">
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $pecah['nama_produk'];  ?></td>
                            <td><?php echo number_format($pecah['harga_produk']);  ?></td>
                            <td><?php echo $jumlah;  ?></td>
                            <td><?php echo number_format($subharga);  ?></td>
                            <td>
                                <a href="hapuskeranjang.php?id=<?php echo $id_produk ?>" class="btn btn-danger" btn-xs>Hapus</a>
                            </td>
                        </tr>
                        <?php $nomor++; ?>
                    <?php endforeach ?>
                    </tbody>
                </thead>
            </table>
            <div class="button">
            <a href="index.php" class="btn btn-default" id="belanja">Tambah Belanjaan</a>
            <a href="checkout.php" class="btn btn-primary" id="checkout">Checkout Belanjaan</a>
            </div>
        </div>
</section>





</body>
</html>