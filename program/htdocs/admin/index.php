<?php
session_start();
include '../koneksi.php';


//mempertahankan user login 
if(!isset($_SESSION['admin'])){
    echo "<script>alert('anda harus login terlebih dahulu');</script>";
    echo "<script>location='login.php';</script>";
    header('location:login.php');
    exit();
}
$ambil = $koneksi->query("SELECT * FROM admin");
$pecah = $ambil->fetch_assoc ();
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
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/desain.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <h2><a class="navbar-brand">WELCOME</a> </h2>
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> 
<!-- Memasukan tanggal waktu format -->
<p><span id="tanggalwaktu"></span></p>
<script>
var tw = new Date();
if (tw.getTimezoneOffset() == 0) (a=tw.getTime() + ( 7 *60*60*1000))
else (a=tw.getTime());
tw.setTime(a);
var tahun= tw.getFullYear ();
var hari= tw.getDay ();
var bulan= tw.getMonth ();
var tanggal= tw.getDate ();
var hariarray=new Array("Minggu,","Senin,","Selasa,","Rabu,","Kamis,","Jum'at,","Sabtu,");
var bulanarray=new Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");
document.getElementById("tanggalwaktu").innerHTML = hariarray[hari]+" "+tanggal+" "+bulanarray[bulan]+" "+tahun+"<br>"+ ((tw.getHours() < 10) ? "0" : "") + tw.getHours() + ":" + ((tw.getMinutes() < 10)? "0" : "") + tw.getMinutes();
</script>   

        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
            <!-- Menu Pada tampilan menu html admin -->
            <li><a href="index.php"><i class="fa fa-user fa-2x"></i> ADMIN</a></li>
                    <li><a href="index.php?halaman=produk"><i class="fa fa-tags fa-2x"></i> PRODUK</a></li>
                    <li><a href="index.php?halaman=pelanggan"><i class="fa fa-users fa-2x"></i>PEMBELI</a></li>
                    <li><a href="index.php?halaman=pembelian"><i class="fa fa-shopping-cart fa-2x"></i> PENJUALAN</a></li>
                    <li><a href="index.php?halaman=laporanpenjualanselect"><i class="fa fa-file fa-2x"></i> LAPORAN PENJUALAN</a></li>
                    <li><a href="index.php?halaman=logout"><i  class="fa fa-close fa-2x"></i> KELUAR</a></li>
                </ul>
            </div>
        </nav>  
        <!-- /. NAV SIDE  -->
        
        <div id="page-wrapper" >
            <div id="page-inner">
            <?php
                if (isset($_GET['halaman']))
                {
                       if($_GET['halaman']=="produk")
                       {
                            include 'produk.php';
                       }
                       elseif($_GET['halaman']=="pembelian")
                       {
                             include 'pembelian.php';
                       }
                       elseif($_GET['halaman']=="pelanggan")
                       {
                             include 'pelanggan.php';
                       }
                       elseif ($_GET['halaman']=="detail") {
                           include 'detail.php';
                       }
                       elseif ($_GET['halaman']=="tambahproduk") {
                        include 'tambahproduk.php';
                       }
                        elseif ($_GET['halaman']=="hapusproduk") {
                        include 'hapusproduk.php';
                        }
                        elseif ($_GET['halaman']=="ubahproduk") {
                            include 'ubahproduk.php';
                        }
                        elseif ($_GET['halaman']=="logout") {
                            include 'logout.php';
                        }
                        elseif ($_GET['halaman']=="pembayaran") {
                            include 'pembayaran.php';
                        }
                        elseif ($_GET['halaman']=="laporan_pembelian") {
                            include 'laporan_pembelian.php';
                        }
                        elseif ($_GET['halaman']=="laporanpenjualanselect") {
                            include 'laporanpenjualanselect.php';
                        }
                        elseif ($_GET['halaman']=="hapuspembeli") {
                            include 'hapuspembeli.php';
                        }

                       
                }
                else
                {
                    include 'home.php';
                }
                ?>
                
                 <!-- /. ROW  -->           
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
