<?php
require('koneksi.php');

header('Content-Type: application/json');
$user=$_POST['user_id'];
$produk=$_POST['produk_id'];
$quantity=$_POST['quantity'];

$result = mysqli_query($koneksi, "SELECT * from produk where id='$produk'");
$order = mysqli_fetch_assoc($result);
$total = $quantity * $order['harga'];

$query = "insert into `order`(user_id, produk_id, quantity, total)
          values ('$user', '$produk', '$quantity', '$total')";
if (mysqli_query($koneksi, $query)) {
    echo "Success";
}else {
    echo "Error";
}
?>