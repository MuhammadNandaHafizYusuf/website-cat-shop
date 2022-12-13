<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/pembelian.css">
    <title>Halaman Penjualan</title>
</head>
<body>
    

<h2>Data Penjualan</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Tanggal</th>
            <th>Status Penjualan</th>
            <th>Total</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1; ?>
    <!-- menggabungkan dua data base untuk pemanggilan nama pelanggan -->
    <?php $ambil=$koneksi->query("SELECT * FROM riwayat JOIN pembeli ON riwayat.
    id_pembeli=pembeli.id_pembeli"); ?>
    <?php while ($pecah = $ambil->fetch_assoc()){ ?>
        <tr class="data2">
            <td> <?php echo $nomor; ?></td>
            <td><?php echo $pecah['nama_pembeli'];  ?></td>
            <td><?php echo date("d F Y",strtotime($pecah["tanggal_penjualan"]));  ?></td>
            <td> <?php echo $pecah["status_penjualan"] ?> <br>
                <?php if (!empty($pecah['resi_pengiriman'])):?>
                Resi: <?php echo $pecah["resi_pengiriman"]; ?> <br>
                <?php endif ?></td>
            <td><?php echo number_format($pecah['total_penjualan']);  ?></td>
            <td>
            <a href="index.php?halaman=detail&id=<?php echo $pecah['id_penjualan']; ?>" class="btn btn-info" id="aksi">detail</a>
            <?php if ($pecah['status_penjualan']!=="pending"):?>
            <a href="index.php?halaman=pembayaran&id=<?php echo $pecah['id_penjualan'] ?>" class="btn btn-success" id="aksi">Lihat Pembayaran</a>
                        <?php endif ?>
                 
            </td>
        </tr>
        <?php $nomor++ ?>
        <?php } ?>
    
    </tbody>
</table>
</body>
</html>