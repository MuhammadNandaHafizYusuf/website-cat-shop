<?php
$semuadata=array();
$tgl_mulai="-";
$tgl_selsei="-";

if (isset($_POST["kirim"])) {
    $tgl_mulai =  $_POST["tglm"];
    $tgl_selsei = $_POST["tgls"];
    $ambil = $koneksi ->query("SELECT * FROM riwayat LEFT JOIN pembeli ON
    riwayat.id_pembeli=pembeli.id_pembeli WHERE tanggal_penjualan BETWEEN '$tgl_mulai' AND '$tgl_selsei'");
    
    while ($pecah = $ambil->fetch_assoc()){ 
        $semuadata[]=$pecah;
    }
    //  echo "<pre>";
    //  print_r($semuadata);
    //  echo "</pre>";
}
?>



<h2>Laporan Pembelian dari <?php echo $tgl_mulai ?> Hingga <?php echo $tgl_selsei ?></h2>
<form action="" method="post">
    <div class="row">
        <div class="col-md-5">
            <div class="form-group"> 
                <label for="">Tanggal  Mulai</label> 
                <input type="date" name="tglm" value="<?php echo $tgl_mulai ?>" class="form-control" id="">
            </div>
        </div>
        <div class="col-md-5">
        <div class="form-group">
                <label for="">Tanggal  Selesei</label> 
                <input type="date" name="tgls" value="<?php echo $tgl_selsei ?>" class="form-control" id="">
            </div>
        </div>
        <div class="col-md-2">
            <label for=""></label><br>
            <button class="btn btn-primary" name="kirim">Lihat</button>
        </div>
    </div>
</form>



<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Pelanggan</th>
            <th>Tanggal</th>
            <th>Jumlah</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php $total =0;?>
        <?php foreach ($semuadata as $key => $value): ?>
            <?php $total+=$value['total_penjualan'] ?>
        <tr>
            <td><?php echo $key+1 ?></td>
            <td><?php echo $value["nama_pembeli"] ?></td>
            <td><?php echo $value["tanggal_penjualan"] ?></td>
            <td><?php echo number_format ($value["total_penjualan"]) ?></td>
            <td><?php echo $value["status_penjualan"] ?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="3">Total</th>
            <th><?php echo number_format($total) ?></th>
        </tr>
    </tfoot>
</table>
