<?php
session_start();
//membuat script konneksi ke data base
include 'koneksi.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
	
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
	<link rel="stylesheet" href="css/header.css">
	<link rel="stylesheet" href="css/pencarian.css">
	<link rel="stylesheet" href="css/messenge.css">
	<link rel="stylesheet" href="css/footers.css">
	<link rel="stylesheet" href="css/produk.css">

</head>
<body>
<title>Petshop Zaman Now</title>

  </style>
<!-- navbar-->
    
    <?php


	include 'menu.php';
	?>
	<?php
	include 'content.php';
	?>
	<?php
	include 'messenge.php';
	?>
	<br>
<!-- kontent-->
<section class="konten">
	<div class="container">
	<h1>Produk Barang</h1>
		<div class="row">
			<?php $ambil = $koneksi->query("SELECT * FROM produk");?>
			<?php while($perproduk = $ambil->fetch_assoc()){ ?>
			<div class="col-md-3" id="garis">
				<div class="thumbnail" id="borderdalam">
					<img  src="foto_produk/<?php echo $perproduk['foto_produk']; ?>" width="200">
					<div class="caption">
						<h3 id="nama_produk"><?php echo $perproduk['nama_produk']; ?></h3>
						<h5 id="harga">Rp. <?php echo number_format($perproduk['harga_produk']); ?></h5><br>
						<div id="button">
                        <a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>" id="detail">Beli</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
            </div>

    </div>
	<br>
	<br>
</section>
		<?php
		include 'footer.php';
		?>

</body>
</html>