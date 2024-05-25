<?php 
session_start();
$username = $_SESSION['username'];
$avatar = $_SESSION['avatar'];
$role = $_SESSION['role'];
if ($username == null) {
    header('Location: login.php');
    exit;
}
if($role == 1){
    header('Location: index.php');
    exit;
}
?>
<?php include "connect.php" ;
$id = $_GET['delete'];
$current_time = date("Y-m-d");
$sql = "UPDATE song SET deleteAt = '$current_time' WHERE id = $id";
$result = mysqli_query($connect, $sql);
if($result) {
    echo "<script>alert('Delete success')</script>";
}
else{
    echo "<script>alert(Delete fail) </script>";
}
?>
