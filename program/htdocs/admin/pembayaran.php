<h2>Data Pembayaran</h2>
<?php
//mendapatkan id pembelian dari URL
$id_penjualan = $_GET['id'];

//mengambil data pembayaran berdasarkan id pembelian
$ambil = $koneksi->query("SELECT * FROM pembayaran WHERE id_penjualan='$id_penjualan'");
$detail = $ambil->fetch_assoc();

?>
<title>Halaman Pembayaran</title>
<div class="row">
    <div class="col-md-6">
        <table class="table">
            <tr>
                <th>Nama</th>
                <th><?php echo $detail["nama"] ?></th>
            </tr>
            <tr>
                <th>Bank</th>
                <th><?php  echo $detail["bank"] ?></th>
            </tr>
            <tr>
                <th>Jumlah</th>
                <th><?php echo number_format($detail["jumlah"]) ?></th>
            </tr>
            <tr>
                <th>Tanggal</th>
                <th><?php echo $detail["tanggal"] ?></th>
            </tr>
            
            
             
        </table>
    </div>
    <div class="col-md-6">
        <img src="../bukti_pembayaran/<?php echo $detail["bukti"] ?>" alt="" class="img-responsive">
    </div>
</div>
<form action="" method="post">
    <div class="form-group">
        <label for="">No Resi Pengiriman</label>
        <input type="text" name="resi" placeholder="Masukan Nomor Resi Pengiriman" id="" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Status</label>
        <select name="status" id="" class="form-control">
            <option value="">Pilih Status Barang</option>
            <option value="Pembayaran Berhasil">Pembayaran Berhasil</option>
            <option value="barang dikirim">Barang Di Kirim</option>
            <option value="selesai">Selesai</option>
            <option value="batal">Batal</option>
        </select>
    </div>
    <button class="btn btn-primary" name="proses">Proses</button>
</form>
<?php
if (isset($_POST["proses"])) {
    $resi = $_POST["resi"];
    $status = $_POST["status"];
    $koneksi->query("UPDATE riwayat SET resi_pengiriman='$resi', status_penjualan='$status'
    WHERE id_penjualan='$id_penjualan'");
    echo "<script>alert('Data Pembelian Terupdate');</script>";
    echo "<script>location='index.php?halaman=pembelian';</script>";
}
?>