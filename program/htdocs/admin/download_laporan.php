<?php
include '../koneksi.php';
// Require composer autoload
require_once '../vendor/autoload.php';
// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf();

// // Write some HTML code:
// $mpdf->WriteHTML('Hello World');

// // Output a PDF file directly to the browser
// $mpdf->Output("laporan.pdf");

// echo "<pre>";
// print_r($_GET);
// echo "</pre>";
$tgl_mulai= $_GET['tglm'];
$tgl_selesei= $_GET['tgls'];
$status= $_GET['status'];

$semuadata =array();
$ambil = $koneksi ->query("SELECT * FROM riwayat LEFT JOIN pembeli ON
riwayat.id_pembeli=pembeli.id_pembeli WHERE status_penjualan='$status' AND  tanggal_penjualan BETWEEN '$tgl_mulai' AND '$tgl_selesei'");

while ($pecah = $ambil->fetch_assoc()){ 
    $semuadata[]=$pecah;
}

$isi= "<table class='table table-bordered' border='1'>";
$isi.= "<tr>
            <th>No</th>
            <th>Pelanggan</th>
            <th>Tanggal</th>
            <th>Jumlah</th>
            <th>Status</th>
        </tr>";
        $isi.= "</thead>";
        $isi.= "<tbody>";
    $total =0;
    foreach ($semuadata as $key => $value): 
     $total+=$value['total_penjualan'];
     $nomor = $key+1;
     $isi.= "<tr>";
     $isi.= "<td>".$nomor."</td>";
     $isi.= "<td>".$value["nama_pembeli"]."</td>";
     $isi.= "<td>".$value["tanggal_penjualan"]."</td>";
     $isi.= "<td>".number_format ($value["total_penjualan"])."</td>";
     $isi.= "<td>".$value["status_penjualan"]."</td>";
     $isi.= "</tr>";
        endforeach;
        $isi.= "</tbody>";
        $isi.= "<tfoot>";
        $isi.= "<tr>";
        $isi.= "<th colspan='3'>Total</th>";
        $isi.= "<th>".number_format($total). "</th>";
        $isi.= "</tr>";
        $isi.= "</tfoot>";
        $isi.= "</table>";
// // Write some HTML code:
$mpdf->WriteHTML($isi);

// // Output a PDF file directly to the browser
$mpdf->Output("laporan.pdf","I");
