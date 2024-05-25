<!-- 
 include 'connect.php';
 $id = $_GET['id'];
 $sql = "select * from song where id = $id";
 $result = mysqli_query($connect,$sql);
 $row = mysqli_fetch_assoc($result);
 $singer = $row['singer'];
 $name = $row['name_song'];
 $image = $row['image_song'];
?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row mt-4">
            <div class="col-sm-4">
                    <img src="ImageSong/see_you_again.jpg" width = 400px alt="" srcset="">
            </div>
            <div class="col-sm-3">
                <h2>Name</h2>
                <p>Author</p>
            </div>
            <div class="col-sm-5">
            <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded"
                          action="xulythanhtoan.php">
                          <input type="hidden" name="id" value="<?php echo"$id" ?>">
                          <div style="margin-top: 1em;">
                            <button type="submit" class="btn btn-primary btn-block">Start MoMo payment</button>
                        </div>
            </form>
            </div>
        </div>
    </div>
</body>
</html>