<h2>Detail Pembelian</h2>
<?php
 $ambil=$koneksi->query("SELECT * FROM riwayat JOIN pembeli ON riwayat.
 id_pembeli=pembeli.id_pembeli WHERE riwayat.id_penjualan='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>
<link rel="stylesheet" href="./assets/css/detail.css">

    <div class="row">
        <div class="col-md-4">
            <h3>Pembelian</h3>
            
                tanggal:  <?php echo $detail['tanggal_penjualan']; ?> <br>
                Total Pembelian:    <?php echo number_format($detail['total_penjualan']); ?>  <br>
                Status Pembelian:   <?php echo $detail['status_penjualan']; ?> <br>
                <?php if (!empty($detail['resi_pengiriman'])):?>
                Resi : <?php echo $detail["resi_pengiriman"]; ?> <br>
                <?php endif ?></td>
            
        </div>
        <div class="col-md-4">
            <h3>Pelanggan</h3>
            <strong>Nama: <?php echo $detail['nama_pembeli']; ?></strong> <br>
            No. Tlp :<?php echo $detail['telepon_pembeli']; ?><br>
            Email :<?php echo $detail['email_pembeli']; ?>
           

        </div>
        <div class="col-md-4">
        <h3>Pengiriman</h3>
        <strong> <?php echo $detail['tipe'] ?><?php echo $detail['distrik'] ?> <?php echo $detail['provinsi'] ?></strong> <br>
        Ongkos Kirim : <?php echo number_format( $detail['ongkir']); ?> <br>
        Ekspedisi Pengiriman : <?php echo $detail['ekspedisi'] ?> <?php echo $detail['paket'] ?> <?php echo $detail['estimasi'] ?> <br>
        Alamat : <?php echo $detail['alamat_pengiriman'] ?>
        </div>
    </div>




<table class="table table-bordered">
    <thead>
        <tr>
            <th>NO</th>
            <th>NAMA</th>
            <th>HARGA</th>
            <th>JUMLAH</th>
            <th>SUBTOTAL</th>
        </tr>
    </thead>
    <tbody>
    <?php $nomor=1; ?>
    <?php $ambil=$koneksi->query("SELECT * FROM penjualan_produk JOIN produk ON penjualan_produk.id_produk=produk.id_produk WHERE penjualan_produk.id_penjualan='$_GET[id]'"); ?>
    <?php while ($pecah = $ambil->fetch_assoc ()){ ?>

        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah['nama_produk'];  ?></td>
            <td><?php echo number_format( $pecah['harga_produk']);  ?></td>
            <td><?php echo $pecah['jumlah'];  ?></td>
            <td><?php echo number_format( $pecah['harga_produk']*$pecah['jumlah']);  ?></td>
        </tr>
        <?php $nomor++ ?>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="4">Total</th>
            <th><?php echo number_format($detail['total_penjualan']); ?></th>
        </tr>
    </tfoot>
    <tfoot>
            <td colspan="4">Ongkos Kirim</td>
            <td><?php echo number_format( $detail['ongkir']); ?></td>
    </tfoot>
</table>