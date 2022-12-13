<?php
session_start();

//menghacurkan script session pelanggan
session_destroy();
echo "<script>alert('anda telah Logout');</script>";
echo "<script>location='index.php';</script>";
?>