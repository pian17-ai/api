<?php
include 'koneksi.php';

$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

$response = array();

if ($username == "" || $password == "") {
    $response['status'] = "error";
    $response['message'] = "data tidak boleh kosong";
    echo json_encode($response);
    exit;
}
$chek = mysqli_query($koneksi, "select * from user where username = '$username'");

if (mysqli_num_rows($chek) > 0) {
    $response['status'] = "error";
    $response['message'] = "username sudah digunakan";
} else {
    $query = "insert into user(username, password) values ('$username', '$password')";

    if (mysqli_query($koneksi, $query)) {
        $response['status'] = "success";
        $response['message'] = "regis berhasil";
    }else {
        $response['status'] = "gagal";
        $response['message'] = "regis gagal";
    } 
}
echo json_encode($response);
exit;
?>
    