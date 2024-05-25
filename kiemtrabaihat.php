<?php 
include 'connect.php';
session_start();
$id = $_GET['id'];

$category = $_GET['category'];
$user_id = 1;
$sql = "select * from library where user_id = 1 and song_id = $id";
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
    // Có dữ liệu
    header("Location: listen.php?id=$id&&category=$category");
    exit();
    }
else {
    // Không có dữ liệu
    header("Location: indexThanhToan.php?id=$id");
}
 ?>