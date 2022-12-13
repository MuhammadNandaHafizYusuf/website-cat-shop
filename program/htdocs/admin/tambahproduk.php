<?php
$datakategori=array();
$ambil= $koneksi->query("SELECT * FROM kategori");

?>
<title>Tambah Produk</title>
<h2>Tambah Produk</h2>
<form method="post" enctype="multipart/form-data">

<div class="form-group">
        <label>Nama Barang</label>
        <input type="text" placeholder="Masukkan Nama Barang" class="form-control" name="nama">
</div>
<div class="form-group">
        <label>Harga Barang</label>
        <input type="number" placeholder="Masukkan Harga Barang" class="form-control" name="harga">
</div>
<div class="form-group">
        <label>Berat Barang</label>
        <input type="number" placeholder="Masukkan Berat Barang /Gram" class="form-control" name="berat">
</div>
<div class="form-group">
        <label>Deskripsi Barang</label>
        <textarea class="form-control" placeholder="Masukkan Deskripsi Barang" rows="10"  name="deskripsi"></textarea>
</div>
<div class="form-group">
        <label>Foto Barang</label>
        <input type="file" placeholder="Masukkan Foto Barang" class="form-control" name="foto">
</div>
<div class="form-group">
        <label>Stok Barang</label>
        <input type="number" placeholder="Masukkan Jumlah Stok Barang" class="form-control" name="stok">
</div>
<button class="btn btn-primary" name="save">Simpan</button>

</form>
<?php

if (isset($_POST['save'])) 
{
        $nama = $_FILES['foto']['name'];
        $lokasi = $_FILES['foto']['tmp_name'];
        move_uploaded_file($lokasi, "../foto_produk/".$nama);
        $koneksi->query("INSERT INTO produk
        (nama_produk,harga_produk,berat_produk,foto_produk,deskripsi_produk,stok_produk)
        VALUES('$_POST[nama]','$_POST[harga]','$_POST[berat]','$nama','$_POST[deskripsi]','$_POST[stok]')");
        echo "<div class='alert alert-info'>DATA TERSIMPAN</div>";
        echo "<meta http-equiv='refresh' meta content='1;url=index.php?halaman=produk'>";
}


?>