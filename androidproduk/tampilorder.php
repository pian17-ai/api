<?php
require 'koneksi.php';

header('Content-Type: application/json');
$user_id = $_POST['user_id'];

$data = array();

$query = mysqli_query(
    $koneksi,
    "SELECT
    `order`.id,
    `order`.quantity,
    `order`.total,
    produk.nama_produk,
    produk.harga
FROM `order`
JOIN produk
ON `order`.produk_id = produk.id
WHERE `order`.user_id = '$user_id'"
);
while ($row = mysqli_fetch_assoc($query)) {
    $data[] = $row;
}
echo json_encode($data);
