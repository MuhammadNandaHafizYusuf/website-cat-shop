<?php
include 'koneksi.php';

$keyword = $_GET["keyword"];
$semuadata=array();
$ambil = $koneksi->query("SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%'
OR deskripsi_produk LIKE '%$keyword%'");
while($pecah = $ambil->fetch_assoc() ){
    $semuadata[]=$pecah;
}
// echo"<pre>"; 
// print_r($semuadata); 
// echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petshop Zaman Now</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <link rel="stylesheet" href="css/pencarianfilter.css">
    <link rel="stylesheet" href="css/menu.css">
</head>
<body>
    <?php
    include 'menu.php';
    ?>
    <div class="container">
        <h1>Hasil Pencarian <?php echo $keyword ?></h1>

        <!-- Memberi pesan jika tidak ada produk yang di cari -->
        <?php
        if (empty($semuadata)) :?>
        <div class=" alert alert-danger">Kata Yang Anda Cari Tidak Di Temukan</div>
        <?php endif ?>

        <!--  -->
        
        <?php foreach ($semuadata as $key => $value):?>
    <section class="konten">
	<div class="container">
        <div class="row">
            <div class="col-md-3" id="garis">
                <div class="thumbnail" id="borderdalam">
                <img src="foto_produk/<?php echo $value['foto_produk'];?>" alt="" class="img-responsive"  width="200">
                <div class="caption" id="borderdalam">
                      <h3 id="nama_produk"> <?php echo $value["nama_produk"] ?> </h3>
                      <h5 id="harga">Rp. <?php echo number_format($value['harga_produk']); ?></h5>
                        <a href="detail.php?id=<?php echo $value['id_produk']; ?> "  class="btn btn-default" id="detail">Beli</a>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
    </div>
</section>
</body>
</html>