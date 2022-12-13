<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./assets/css/admin.css">
        <title>Admin</title>
</head>
<body>
        
<h2>Selamat Datang <?php echo $pecah['nama_lengkap'];?>  </h2>

<?php
$ambil = $koneksi->query("SELECT * FROM admin");
$pecah = $ambil->fetch_assoc ();
?>

<form action="" method="post">
<div class="form-group">
        <label>Username</label>
        <input type="text" class="form-control" name="username" value="<?php echo $pecah['username']; ?>">
</div>

<div class="form-group">
        <label>Password</label>
        <input type="text" class="form-control" name="password" value="<?php echo $pecah['password']; ?>">
</div>

<div class="form-group">
        <label>Nama Lengkap</label>
        <input type="text" class="form-control" name="nama_lengkap" value="<?php echo $pecah['nama_lengkap']; ?>">
</div>
<div class="form-group">
        <label>Nama Bank</label>
        <input type="text" class="form-control" name="nama_bank" value="<?php  echo $pecah['nama_bank']; ?>">
</div>
<div class="form-group">
        <label>Nomor Rekening</label>
        <input type="text" class="form-control" name="no_rekening" value="<?php  echo $pecah['no_rekening']; ?>">
</div>



<button class="btn btn-primary" name="ubah" id="tambah">Ubah</button>
<?php

if (isset($_POST['ubah'])) {
    
        $koneksi->query("UPDATE admin SET username='$_POST[username]',
        password='$_POST[password]',nama_lengkap='$_POST[nama_lengkap]',nama_bank='$_POST[nama_bank]',no_rekening='$_POST[no_rekening]'");

        echo "<script>alert('DATA ADMIN BERHASIL DI UPDATE');</script>";
        echo "<script>location='index.php';</script>";
}

?>


</form>
</form>
</body>
</html>