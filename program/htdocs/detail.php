<?php 
session_start();
include 'koneksi.php'; ?>
<?php 
//mendapatkan id produk dari url
$id_produk = $_GET["id"];

//mengambil data 
$ambil  = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
$detail = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($detail);
// echo "</pre>";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <link rel="stylesheet" href="css/detaill.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">
    <!-- deskripsi -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&display=swap" rel="stylesheet">
    <title>Detail Produk</title>
</head>
<body>
    
    <!-- navbar-->
    
    <?php
include 'menu.php';
?>
<br>

<section class="kontent">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="foto_produk/<?php echo $detail["foto_produk"]; ?>" alt="" class="img-responsive">
            </div>
            <div class="col-md-6">
                <h2 id="nama_produk"><?php echo $detail["nama_produk"]; ?></h2> <br>
                <hr>
                <h2 id="harga_produk">Harga : Rp. <?php echo number_format( $detail["harga_produk"]); ?></h2><br>

                <!-- membuat formulir -->
                <form action="" method="post">
                    <div class="form-group">
                        <div class="input-group">
                        <input type="number" name="jumlah" min="1" class="form-control" id="edit_input" placeholder="masukkan jumlah produk" value="0" 
                        max="<?php echo $detail["stok_produk"]; ?>">
                        <div class="input-group-btn">
                            <button id="Beli"  class="btn btn-primary" name="beli">Beli</button>
                        </div>
                    </div>
                    </div>
                </form>

                <!-- stok produk -->
                <h5 id="stok_produk"> Jumlah Stok Produk Yang Tersedia Saat Ini: <?php echo $detail["stok_produk"];?> pcs</h5> 
                <h5 id="stok_produk"> Berat Barang: <?php echo $detail["berat_produk"];?> Grams</h5> <br>
                <?php
                //jika menampilkan tombol beli
                if (isset($_POST["beli"])) {

                    //mendapatkan jumlah yang di inputkan
                    $jumlah = $_POST["jumlah"];
                    //masukan keranjang belanja
                    $_SESSION["keranjang"][$id_produk] = $jumlah;
                    echo "<script>alert('produk telah masuk dalam keranjang belanja');</script>";
                    echo "<script>location='keranjang.php';</script>";
                }
                ?>
                <hr>
                <div id="deskripsi">
                    <p class="deskripsi_label">Deskripsi Produk</p> 
                    <p class="deskripsi_produk"><?php echo $detail["deskripsi_produk"]; ?></p>
                </div>
            </div>
        </div>
    </div>
</section>


    
</body>
</html>