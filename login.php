<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css.css">
    <title>Document</title>
</head>
<body>

<div class="form">
    <h4>Login</h4>
<form action="" method="POST">
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">Email:</label>
    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
  </div>
  <div class="mb-3">
    <label for="pwd" class="form-label">Password:</label>
    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
  </div>
  <div class="form-check mb-3">
   <a href="register.php">Don't Account</a>
  </div>
  <input type="submit" value="Login" name="login" class="btn btn-primary">
</form>
</div>
 <?php 
 
 include 'connect.php';
 if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['pswd'];
    $sql = "select * from users where email = '$email' and pass='$password'";
    $result = mysqli_query($connect,$sql);
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0) {
        session_start();
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role_id'];
        $_SESSION['avatar'] = $row['image_user'];
        if($row['role_id'] == 1 ){
        header('Location: index.php');
        exit();
        }
        if($row['role_id'] == 2 ){
            header('Location: admin.php');
            exit();
        }
    }
    else{
        echo"<script>alert('account don't exist')</script>";
    }
}
 ?>
</body>
</html>