<?php
include 'koneksi.php';

$id=$_POST['id'];

$query = mysqli_query($koneksi, "delete from produk where id='$id'");
if($query) {
    echo "data berhasil di hapus";
} else {
    echo "data ga jadi di hapus";
}
?>