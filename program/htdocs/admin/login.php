<?php
session_start();
//skrip koneksi
include '../koneksi.php';
?>




<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet">
    <title>Login Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Istok+Web&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <link rel="stylesheet" href="assets/css/loginadmin.css">

</head>
<body>


                                <div class="header-login"> 
                                <div class="login-struct">
                                    <h1>LOGIN ADMIN</h1>
                                    <p>Username</p>
                                    <form role="form" method="post">
                                    <input type="text" class="input-data" name="user" id="username" placeholder="Masukan username admin">
                                    <p>Password</p>
                                    <input type="password" class="input-data" name="pass"  id="password" placeholder="Masukan password"> <br> <br>
                                    <button type="button " name="login"class="button-login" >Login</button> <br>
                                </div>
                                </form>
                                <div class="link">
                                    <a href="../index.php" class="link-data">Back To Home</a><br>
                                </div>
                                </div>


                                    
                            <!-- codingan pada menu login -->
                                <?php
                                if (isset($_POST['login'])){

                                $ambil= $koneksi->query("SELECT * FROM admin WHERE 	username='$_POST[user]'
                                    AND password='$_POST[pass]'");

                                    $yangsesuai=  $ambil->num_rows;

                                    if ($yangsesuai==1) {
                                        $_SESSION['admin']=$ambil->fetch_assoc();
                                        echo "<script>alert('Login Success');</script>";
                                        echo "<meta http-equiv='refresh' meta content='1;url=index.php'>";
                                    }else {
                                        echo "<script>alert('Login Gagal');</script>";
                                        echo "<meta http-equiv='refresh' meta content='1;url=index.php'>";
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
