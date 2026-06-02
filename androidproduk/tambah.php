<?php
include 'koneksi.php';

header('Content-Type: application/json');
$nama=$_POST['nama_produk'];
$harga=$_POST['harga'];
$stok=$_POST['stok'];

$query = "insert into produk(nama_produk, harga, stok) values ('$nama', '$harga', '$stok')";
if (mysqli_query($koneksi, $query)) {
    echo "Success"; 
}else {
    echo "Error";
}
?>