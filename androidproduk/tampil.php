<?php
include 'koneksi.php';

header('Content-Type: application/json');
$data=array();
$query = mysqli_query($koneksi, "select * from produk");
while ($row = mysqli_fetch_assoc($query)) {
    $data[] = $row;
}
echo json_encode($data);
?>