<h2>UBAH PRODUK</h2>
<?php
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah = $ambil->fetch_assoc ();
//file tampil mentahan

// echo "<pre>";
// print_r($pecah);
// echo "</pre>";
?>



<title>Ubah Data Produk</title>
<form method="post" enctype="multipart/form-data">



<div class="form-group">
        <label>nama produk</label>
        <input type="text" class="form-control" name="nama" value="<?php echo $pecah['nama_produk']; ?>">
</div>

<div class="form-group">
        <label>harga</label>
        <input type="number" class="form-control" name="harga"  value="<?php echo $pecah['harga_produk']; ?>">
</div>

<div class="form-group">
        <label>berat</label>
        <input type="number" class="form-control" name="berat" value="<?php echo $pecah['berat_produk']; ?>">
</div>

<div class="form-group">
        <label></label>
        <img src="../foto_produk/<?php echo $pecah['foto_produk']; ?>" width="200">
</div>
<div class="form-group">
        <label>Ganti foto</label>
        <input type="file" class="form-control" name="foto">
</div>

<div class="form-group">
        <label>deskripsi</label>
        <textarea class="form-control" rows="10"  name="deskripsi">
        <?php echo $pecah['deskripsi_produk']; ?>
        </textarea>
</div>
<div class="form-group">
        <label>Stok Produk</label>
        <input type="text" class="form-control" name="stok" value="<?php echo $pecah['stok_produk']; ?>">
</div>

<button class="btn btn-primary" name="ubah">Ubah</button>


</form>

<?php


if (isset($_POST['ubah'])) {
    
    $namafoto = $_FILES['foto']['name'];
    //sementara menaruh nama
    $lokasifoto = $_FILES['foto']['tmp_name'];

    //jika sebuah kondisi foto di rubah nilai
    if (!empty($lokasifoto)) {
        move_uploaded_file($lokasifoto, "../foto_produk/$namafoto");
        $koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',
        harga_produk='$_POST[harga]',berat_produk='$_POST[berat]',foto_produk='$namafoto',deskripsi_produk='$_POST[deskripsi]',stok_produk='$_POST[stok]'
        WHERE id_produk='$_GET[id]'");
    }else{
        $koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',
        harga_produk='$_POST[harga]',berat_produk='$_POST[berat]',deskripsi_produk='$_POST[deskripsi]',stok_produk='$_POST[stok]' WHERE id_produk='$_GET[id]'");
    }
    echo "<script>alert('DATA PRODUK BERHASIL DI UPDATE');</script>";
    echo "<script>location='index.php?halaman=produk';</script>";
}

?>

