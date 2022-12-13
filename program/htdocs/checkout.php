<?php
session_start();

include 'koneksi.php';
//jika tidak ada session pelanggan atau belum login di larikan ke login.php
if (!isset($_SESSION["pembeli"])) {
    echo "<script>alert('silahkan login terlebih dahulu');</script>";
    echo "<script>location='login.php';</script>";
}
if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))
{
    echo "<script>alert('keranjang kosong');</script>";
    echo "<script>location='index.php';</script>";
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <link rel="stylesheet" href="css/checkout.css">
    <link rel="stylesheet" href="js/jquery.min.js">
</head>
<body>

<!-- navbar-->
    

<?php
include 'menu.php';
?>

<section class="konten">
        <div class="container">
            <h1>Checkout Belanja</h1>
            <hr>


            <div class="row">
                   <div class="col-md-4"><div class="form-group">
                    <h4>Nama :<?php echo $_SESSION["pembeli"]["nama_pembeli"] ?></h4></div></div>
                   <div class="col-md-4"><div class="form-group">
                    <h4>No Telepon:<?php echo $_SESSION["pembeli"]["telepon_pembeli"] ?></h4></div></div>

            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subharga</th>
                    
                </tr>
                <thead>
                    <tbody>
                    <?php $nomor =1;?>
                    <!-- membuat variable total berat -->
                    <?php $total_berat=0;?>
                    <!-- perhitungan total -->
                    <?php $totalbelanja=0;?>

                    <?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah):?>
                    <!-- menampilkan produk berdaasarkan id produk -->
                    <?php
                    $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                    $pecah = $ambil->fetch_assoc();
                    $subharga = $pecah["harga_produk"]*$jumlah;
                    // menghitung total berat(sub berat) dari jumlah produk x jumlah berat
                    $subberat = $pecah["berat_produk"] * $jumlah;
                    //menghitung total berat
                    $total_berat+=$subberat;

                    ?>
                    
                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $pecah['nama_produk'];  ?></td>
                            <td><?php echo $pecah['harga_produk'];  ?></td>
                            <td><?php echo $jumlah;  ?></td>
                            <td><?php echo number_format($subharga);  ?></td>
                            
                        </tr>
                        <?php $nomor++; ?>
                        <?php $totalbelanja+=$subharga?>
                    <?php endforeach ?>
                    </tbody>

                    <tfoot>
                        <th colspan="4">Total Belanja</th>
                        <th><?php echo number_format($totalbelanja)?></th>
                    </tfoot>


                </thead>
            </table>
           <form action="" method="post">  
           <hr>
               </div>
               <div class="form-group">
                   <label for="" class="alamat">Alamat Lengkap Pengiriman</label>
                   <textarea class="form-control" id="inputdata" name="alamat_pengiriman" placeholder="Masukan Alamat Pengiriman" required oninput="setCustomValidity('')"></textarea>
               </div>

               <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Provinsi</label>
                        <select name="nama_provinsi" class="form-control" id="" required oninput="setCustomValidity('')">
                        
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Distrik</label>
                        <select name="nama_distrik" class="form-control" id="" required oninput="setCustomValidity('')">
                       
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Ekspedisi</label>
                        <select name="nama_ekspedisi" class="form-control" id="" required oninput="setCustomValidity('')">
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Paket</label>
                        <select name="nama_paket" class="form-control" id="" required oninput="setCustomValidity('')"> 
                        </select>
                    </div>
                </div>
            </div>
            <input type="text" class="readdata" readonly name="total_berat" value="<?php echo $total_berat; ?>"> /Grams <br>
            <input type="text" placeholder="Provinsi" class="readdata" readonly name="provinsi">
            <input type="text" placeholder="Kota" class="readdata" readonly name="distrik">
            <input type="text" placeholder="Tipe" class="readdata" readonly name="tipe">
            <input type="text" placeholder="Ekspedisi" class="readdata" readonly name="ekspedisi">
            <input type="text" placeholder="Tipe Pengiriman" class="readdata" readonly name="paket">
            <input type="text" placeholder="Ongkos Kirim" class="readdata" readonly name="ongkir">
            <input type="text" placeholder="Estimasi Pengiriman" class="readdata" readonly name="estimasi">
            
            <br>
               <button class="btn btn-primary" id="checkout" name="checkout">Checkout</button>
           </form>
        <?php
          if (isset($_POST["checkout"])) {
            $id_pembeli = $_SESSION["pembeli"]["id_pembeli"];
           
            $tanggal_penjualan=date("Y-m-d");
            $alamat_pengiriman =  $_POST["alamat_pengiriman"];

            $totalberat =  $_POST["total_berat"];
            $provinsi =  $_POST["provinsi"];
            $distrik =  $_POST["distrik"];
            $tipe =  $_POST["tipe"];
            $kodepos =  $_POST["kodepos"];
            $ekspedisi =  $_POST["ekspedisi"];
            $paket =  $_POST["paket"];
            $ongkir =  $_POST["ongkir"];
            $estimasi =  $_POST["estimasi"];

            // $ambil=$koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'");
            // $arrayongkir  = $ambil->fetch_assoc();
            $nama_kota = $arrayongkir['nama_kota'];
            $tarif = $arrayongkir['tarif'];
            $total_penjualan =  $totalbelanja + $ongkir;

            //menyimpan data ke table pembelian
            $koneksi->query("INSERT INTO riwayat (id_pembeli,tanggal_penjualan,total_penjualan,alamat_pengiriman,totalberat,provinsi,distrik,tipe,kodepos,ekspedisi,paket,ongkir,estimasi) VALUES ('$id_pembeli','$tanggal_penjualan','$total_penjualan','$alamat_pengiriman','$totalberat','$provinsi','$distrik','$tipe','$kodepos','$ekspedisi','$paket','$ongkir','$estimasi')");


            //mendapatkam id_pembelian barusan terjadi
            $id_pembelian_barusan = $koneksi->insert_id;
            foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) {

                //mendapatkan data produk berdasarkan id produk
                $ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                $perproduk=$ambil->fetch_assoc();

                $nama= $perproduk['nama_produk'];
                $harga =$perproduk['harga_produk'];
                $berat = $perproduk['berat_produk'];

                $subberat=$perproduk['berat_produk']*$jumlah;
                $subharga = $perproduk['harga_produk']*$jumlah;
                $koneksi->query("INSERT INTO penjualan_produk (id_penjualan,id_produk,nama,harga,berat,subberat,subharga,jumlah)
                VALUES ('$id_pembelian_barusan','$id_produk','$nama','$harga','$berat','$subberat','$subharga','$jumlah')");


                //perintah update keranjang belanjaan
                $koneksi->query("UPDATE produk SET stok_produk=stok_produk -$jumlah
                WHERE id_produk='$id_produk'");
            }
            //mengkosongkan keranjang belanja
            unset($_SESSION["keranjang"]);

            //tampilan di alihkan ke halaman nota
            echo "<script>alert('Pembelian sukses');</script>";
            echo "<script>location='nota.php?id= $id_pembelian_barusan';</script>";
            
        
        }

        ?>


        </div>
</section>
    
<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function(){
            $.ajax({
                type:'post',
                url:'dataprovinsi.php',
                success:function(hasil_provinsi){
                    $("select[name=nama_provinsi]").html(hasil_provinsi);
                }
            });
            //memasukan dan menghububgkan data distrik terhadap menu province
            $("select[name=nama_provinsi]").on("change",function(){
                //ketika nama provinsi di pilih akan memunculkan nama distrik 
                //ambil id provinsi yang di pilih pada menu provinsi
                var id_provinsi_terpilih = $("option:selected",this).attr("id_provinsi");
                $.ajax({
                type:'post',
                url:'datadistrik.php',
                data:'id_provinsi='+id_provinsi_terpilih,
                success:function(hasil_distrik){
                    //memasang
                    $("select[name=nama_distrik]").html(hasil_distrik);
                }
            });
            });

            $.ajax({
                type:'post',
                url:'dataekspedisi.php',
                success:function(hasil_ekspedisi){
                    $("select[name=nama_ekspedisi]").html(hasil_ekspedisi);
                }
            });
            $("select[name=nama_ekspedisi]").on("change",function(){
                //mendapatkan ongkir
                
                //mendapatkan id distrik yang di pilih
                var ekspedisi_terpilih = $("select[name=nama_ekspedisi]").val();
                
                //mendapatkan id distrik yang di pilih pengguna
                var distrik_terpilih = $("option:selected","select[name=nama_distrik]").attr("id_distrik");
              

                //mendapatkan total berat dari inputan
                var total_berat = $("input[name=total_berat]").val();
                $.ajax({
                type:'post',
                url:'datapaket.php',
                data:'ekspedisi='+ekspedisi_terpilih+'&distrik='+distrik_terpilih+'&berat='+total_berat,
                success:function(hasil_paket){
                    // console.log(hasil_paket);
                    $("select[name=nama_paket]").html(hasil_paket);

                    //menetapkan nama ekspedisi di input data ekspedisi
                    $("input[name=ekspedisi]").val(ekspedisi_terpilih);
                }
            })
            });

            $("select[name=nama_distrik]").on("change",function(){
                var prov =$("option:selected",this).attr("nama_provinsi");
                var dist =$("option:selected",this).attr("nama_distrik");
                var tipe =$("option:selected",this).attr("tipe_distrik");
                var kodepos =$("option:selected",this).attr("kodepos");
                //hasil di taroh pada inputan yang terdapat pada kolom di option di atas
                $("input[name=provinsi]").val(prov);
                $("input[name=distrik]").val(dist);
                $("input[name=tipe]").val(tipe);
                $("input[name=kodepos]").val(kodepos);
            });

            $("select[name=nama_paket]").on("change",function(){
                var paket =$("option:selected",this).attr("paket");
                var ongkir =$("option:selected",this).attr("ongkir");
                var etd =$("option:selected",this).attr("etd");
                //hasil di taroh pada inputan yang terdapat pada kolom di option di atas
                $("input[name=paket]").val(paket);
                $("input[name=ongkir]").val(ongkir);
                $("input[name=estimasi]").val(etd);
            })

        });
    </script>