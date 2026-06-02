<?php
include 'koneksi.php';

$id=$_POST['id'];
$nama=$_POST['nama_produk'];
$harga=$_POST['harga'];
$stok=$_POST['stok'];

$query = mysqli_query($koneksi, "update produk set nama_produk='$nama', harga='$harga', stok='$stok' where id='$id'");

if($query) {
    echo "Data Berhasil di edit";
} else {
    echo "Data gagal di edit";
}
?>