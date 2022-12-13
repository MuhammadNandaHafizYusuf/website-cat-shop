<?php


$koneksi->query("DELETE FROM pembeli WHERE id_pembeli='$_GET[id]'");
echo "<script>alert('Data Pembeli Telah Terhapus');</script>";
echo "<script>location='index.php?halaman=produk';</script>";

?>