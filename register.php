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
    <label for="username" class="form-label">Username:</label>
    <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
  </div>
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">Email:</label>
    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
  </div>
  <div class="mb-3">
    <label for="pwd" class="form-label">Password:</label>
    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
  </div>
  <div class="mb-3 mt-3">
    <label for="avatar" class="form-label">Avatar:</label>
    <input type="file" class="form-control" id="avatar" placeholder="Enter avatar" name="avatar">
  </div>
  <div class="form-check mb-3">
   <a href="login.php">Don't Account</a>
  </div>
  <input type="submit" value="Register" name="register" class="btn btn-primary">
</form>
</div>
 <?php 
 include 'connect.php';
 if(isset($_POST['register']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['pswd'];
    $user_img;
    if(!empty($_FILES['avatar']['name'])){
        $file_extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
        $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
        if(in_array(strtolower($file_extension), $allowed_extensions)) {
        // chú ý nhận dữ liệu kiểu file từ Form
        $user_img = $_FILES['avatar']['name'];
       
        //upload file vào thư mục tạm trong htdocs
        $user_img_tmp = $_FILES['avatar']['tmp_name'];
    }
    }
    $sql = "INSERT INTO users (username, email, pass, role_id, image_user, createAt) VALUES('$username','$email','$password', 1, '$user_img', '$current_time')";
    $result = mysqli_query($connect,$sql);
    if($result){
        echo "<script>alert('Register thành công') </script>";
        header('Location: login.php');
    }
    else{
        echo "<script>alert('Register thất bại') </script>";
    }
}

 ?>
</body>
</html>