<?php
session_start();
include 'koneksi.php';


//mendapatkan id pembelian dari URL
$id_penjualan = $_GET['id'];

//mengambil data pembayaran berdasarkan id pembelian
$ambil = $koneksi->query("SELECT * FROM pembayaran 
        LEFT JOIN riwayat ON pembayaran.id_penjualan=riwayat.id_penjualan 
        WHERE riwayat.id_penjualan='$id_penjualan'");
$detbay = $ambil->fetch_assoc();
// echo "<pre>";
// print_r($detbay);
// echo "</pre>";
//jika blm ada pembayaran
if (empty($detbay)) {
    echo "<script>alert('Anda Tidak Berhak')</script>";
    echo "<script>location='riwayat.php'</script>";
    exit();
}
//jika data pelanggan yang pembayaran tidak sesuai dengan yang login
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
if ($_SESSION["pembeli"]["id_pembeli"]!==$detbay["id_pembeli"]) {
    # code...
    echo "<script>alert('Anda Tidak Berhak')</script>";
    echo "<script>location='riwayat.php'</script>";
    exit();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Pembayaran</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>
<?php
include 'menu.php';
?>

<!-- membuat interface -->
<div class="container">
    <h3>Lihat Pembayaran</h3>
    <div class="row">
    <div class="col-md-6">
        <table class="table">
            <tr>
                <th>Nama</th>
                <th><?php echo $detbay["nama"] ?></th>
            </tr>
            <tr>
                <th>Bank</th>
                <th><?php  echo $detbay["bank"] ?></th>
            </tr>
            <tr>
                <th>Jumlah</th>
                <th><?php echo number_format($detbay["jumlah"]) ?></th>
            </tr>
            <tr>
                <th>Tanggal</th>
                <th><?php echo $detbay["tanggal"] ?></th>
            </tr>
            
            
             
        </table>
    </div>
    <div class="col-md-6">
    <img src="bukti_pembayaran/<?php echo $detbay["bukti"] ?>" alt="" class="img-responsive">
    </div>
</div>
</div>
    
</body>
</html>