<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <link rel="stylesheet" href="css/daftar.css">

</head>
<body>
    <?php
    include 'menu.php';
    ?>
    
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading" id="panel">
                            <h3>Daftar Pembeli</h3>
                        </div>
                        <div class="panel-body">
                        <form action="" method="post" class="form-horizontal">
                            <div class="form-group">
                                <label for="" class="control-label col-md-3">Nama</label>
                                <div class="col-md-7">
                                    <input type="text" name="nama" class="form-control" id="inputdata" placeholder="Masuakan Nama Lengkap" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label col-md-3">Email</label>
                                <div class="col-md-7">
                                    <input type="email" name="email" class="form-control" id="inputdata" placeholder="Masukan Email Kamu @gmail.com" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label col-md-3">password</label>
                                <div class="col-md-7">
                                    <input type="password" name="password" class="form-control" id="inputdata" placeholder="Masukkan Password Pengguna" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label col-md-3">Alamat</label>
                                <div class="col-md-7">
                                    <textarea name="alamat" id="inputdata" class="form-control" placeholder="Masukan Alamat Lengkap" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label col-md-3">Telepon</label>
                                <div class="col-md-7">
                                    <input type="text" name="telepon" class="form-control" id="inputdata" placeholder="Masukkan Nomor Telepon Pengguna" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-7 col-md-offset-3">
                                    <button class="btn btn-primary" id="daftar" name="daftar">Daftar</button>
                                </div>
                            </div>
                        </form>
                        <?php
                        //jika di klik 
                        if (isset($_POST["daftar"])) {
                            //mengambil data form register
                            $nama = $_POST["nama"];
                            $email = $_POST["email"];
                            $password = $_POST["password"];
                            $alamat = $_POST["alamat"];
                            $telepon = $_POST["telepon"];

                            //falidasi untuk email baru
                            $ambil = $koneksi ->query("SELECT * FROM pembeli WHERE email_pembeli = '$email'");
                            //cara mengetahui ada dan tidak ada data tsb
                            $yangcocok  =  $ambil->num_rows;
                            if ($yangcocok ==1) {
                                echo "<script>alert('Pendaftaran gagal,Email sudah di gunakan');</script>";
                                echo "<script>location='daftar.php';</script>";
                            }else {
                                //memeasukan data pelanggan pada data base
                                $koneksi->query("INSERT INTO pembeli (email_pembeli,
                                password_pembeli,nama_pembeli,telepon_pembeli,alamat_pembeli)
                                 VALUES ('$email','$password','$nama','$telepon','$alamat')");
                            echo "<script>alert('Pendaftaran Berhasil,Silahkan Login');</script>";
                            echo "<script>location='login.php';</script>";

                            }
                        }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>
</html>