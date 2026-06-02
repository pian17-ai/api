<?php
require 'koneksi.php';

$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

$response = array();

if ($username == "" || $password == "") {
    $response['status'] = "error";
    $response['message'] = "data tidak boleh kosong";
    echo json_encode($response);
    exit;
}

$query = "select * from user where username='$username' and password='$password'";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);

    $response['status'] = "success";
    $response['message'] = "Login berhasil";
    $response['id'] = $data['id'];
    $response['role'] = $data['role'];
} else {
    $response['status'] = "gagal";
    $response['message'] = "login gagal";
}
echo json_encode($response);
