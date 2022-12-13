<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/pelanggan.css">
    <title>Data Pembeli</title>
</head>
<body>
    
<h2>Data Pembeli</h2>
<table class="table table-bordered">
    <thead>
        <tr class="rowtable">
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php $nomor =1;?>
        <?php $ambil = $koneksi->query("SELECT * FROM pembeli"); ?>
        <?php while ($pecah = $ambil->fetch_assoc ()){ ?>
        <tr class="data2">
            <td> <?php echo $nomor; ?> </td>
            <td> <?php echo $pecah['nama_pembeli']; ?> </td>
            <td><?php echo $pecah['email_pembeli']; ?></td>
            <td><?php echo $pecah['telepon_pembeli']; ?></td>
            <td> 
            <a href="index.php?halaman=hapuspembeli&id=<?php echo $pecah['id_pembeli']; ?>" class="btn-danger btn" id="hapus">Hapus</a>
            </td>
        </tr>
        <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>
</body>
</html>