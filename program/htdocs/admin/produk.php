<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/produkk.css">
    <title>Halaman Produk</title>
</head>
<body>

        <h2>Data Produk  <a href="index.php?halaman=tambahproduk" class="btn btn-primary" id="tambah">Tambah Data</a></h2>
       



    <table class="table table-bordered">
    <thead>
        <tr class="rowtable">
            <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Berat</th>
            <th>Stok</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor =1;?>
        <?php $ambil = $koneksi->query("SELECT * FROM produk"); ?>
        <?php while ($pecah = $ambil->fetch_assoc ()){ ?>

        <tr class="data2">
            <td> <?php echo $nomor; ?> </td>
            <td> <?php echo $pecah['nama_produk']; ?> </td>
            <td><?php echo number_format ($pecah['harga_produk']); ?></td>
            <td><?php echo $pecah['berat_produk']; ?> g</td>
            <td><?php echo $pecah['stok_produk']; ?> pcs</td>
            <td>
                <img src="../foto_produk/<?php echo $pecah['foto_produk']; ?>" width="100">
            </td>
            <td> 
                <a href="index.php?halaman=hapusproduk&id=<?php echo $pecah['id_produk']; ?>" class="btn-danger btn" id="aksi">Hapus</a>
                <a href="index.php?halaman=ubahproduk&id=<?php echo $pecah['id_produk']; ?>" class="btn btn-warning" id="aksi">Ubah</a>
            </td>
        </tr>
        <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>
</body>
</html>