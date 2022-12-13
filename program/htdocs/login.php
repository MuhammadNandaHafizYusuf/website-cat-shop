<?php
session_start();
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pembeli</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/login.css">

</head>
<body>

<!-- navbar-->
    


    <?php
	include 'menu.php';
	?>

<div class="header-login"> 
        <div class="login-struct">
            <h1>LOGIN</h1>
            <!-- FORM LOGIN -->
            <!-- <form action="" method="post">
            <p>E-mail</p>
            <input type="email" class="input-data" name="email" placeholder="Masukan E-mail">
            <p>Password</p>
            <input type="password" class="input-data" name="password" placeholder="Masukan Password"> <br> <br>
            <button type="button" class="button-login" name="login">Login</button>
            </form> -->
            <form action="" method="post">
                    <p>Email</p>
                        <input type="email" name="email" class="input-data" placeholder="Masukan E-mail">
                    <p>Password</p>
                        <input type="password" name="password" class="input-data" placeholder="Masukan Password" ><br> <br>
                        <button class="button-login" name="login">Login</button>
            </form>
        </div>
        <div class="link">
            <a href="admin/login.php" class="link-data">Admin</a>  <br>
            <a href="daftar.php" class="link-data">Register Account</a>
        </div>
    </div>


            <?php
            //tombol simpan di tekan
            if (isset($_POST["login"])) 
            {
                $email =  $_POST["email"];
                $password =  $_POST["password"];
                //MENGECEK AKUN PADA TABLE  DI DATABASE
                $ambil = $koneksi->query("SELECT * FROM pembeli WHERE email_pembeli='$email'
                AND password_pembeli='$password'");
                //AKUN YANG DI AMBIL
                $akunyangcocok = $ambil->num_rows;
                //jika ada yang ciocok di loginkan
                if ($akunyangcocok==1) {
                    //anda berhasil login
                    //mendapatkan akun dalam bentuk array
                    $akun = $ambil->fetch_assoc();
                    $_SESSION["pembeli"] = $akun;
                    echo "<script>alert('anda berhasil login');</script>";

                    //jk sdah belanja mka lari ke checkout
                    if (isset($_SESSION["keranjang"]) OR !empty($_SESSION["keranjang"])) {
                        echo "<script>location='checkout.php';</script>";
                        
                    }else {
                        echo "<script>location='index.php';</script>";
                    }
                    
                }else {
                    //anda gagal login
                    echo "<script>alert('anda gagal login');</script>";
                    echo "<script>location='login.php';</script>";
                }
            }



            ?>
    


    
</body>
</html>