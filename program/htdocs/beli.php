<?php 
session_start();
//mendapatkan id produk dari url
$id_produk =  $_GET['id'];


//jika produk suda ada di keranjang, maka produk akan bertambah menjadi +1
if (isset($_SESSION['keranjang'][$id_produk])) {
    $_SESSION['keranjang'][$id_produk]+=1;
}


//jika tida ada di keranjang maka produk itu di beli 1
else {
    $_SESSION['keranjang'][$id_produk]=1;

}

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

//larikan ke halaman keranjang
echo "<script>alert('Produk Telah Masuk Ke dalam keranjang belanjaan');</script>";
echo "<script>location='keranjang.php';</script>";

?>