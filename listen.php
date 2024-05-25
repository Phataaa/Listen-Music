
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>搁浅的心 - 董运昌 - 静听网 </title>
  <link rel="stylesheet" href="assets/css/reset.css">
  <link rel="stylesheet" href="assets/css/common.css">
  <link rel="stylesheet" href="assets/css/music.css">
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">
</head>
<body>
<header>
  <div class="container">
    <div class="navbar-header">
      <a href="" class="navbar-brand">
        <img src="../assets/images/logo.png" alt="">
      </a>
    </div>
    <nav>
      <ul class="nav navbar-nav navbar-link">
        <li><a href="../index.html">Home</a></li>
        <?php 
        include 'connect.php';
        $sql = "select * from category";
        $result = mysqli_query($connect,$sql);
        while($row_product = mysqli_fetch_array($result)){
          $id = $row_product['id'];
          $name = $row_product['name_category'];
          $image = $row_product['image_category'];
          echo"<li><a href='category.php?name='$name',id='$id'>$name</a></li>";
        }
        ?>
      </ul>
      <ul class="nav navbar-nav navbar-right navbar-sm">
        <!--<li><input type="text" class="search-input" placeholder="歌名 / 歌手"></li>-->
        <!--<li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>-->
        <!--<li><a href="#">注册 / 登录</a></li>-->
      </ul>
    </nav>
  </div>
</header>
<div class="container-sm player-wrap">
  <div id="music-player" class="aplayer"></div>
</div>
<div class="container-sm box">
  <div class="main">
    <div class="main-wrap">
      <div class="content-box article">
        <?php
        $id = $_GET['id'];
        $sql = "select * from song where id = $id";
        $result = mysqli_query($connect, $sql);
        $row = mysqli_fetch_assoc($result);
        
        $name = $row['name_song'];
        $singer = $row['singer'];
        $lyrics = $row['lyrics'];
        $image = $row['image_song'];
        $audio = $row['audio_song'];
        $createAt = $row['createAt'];
        echo"
        <div class='title'>
          <h2>$name - $singer</h2>
          <div class='info'>
            <span class='author'>$singer</span> / <span class='date'>$createAt</span>
          </div>
        </div>
        <div class='content'>
          <p>
            <img src='ImageSong/$image'>
          </p>
          <p>
           $lyrics
          </p>";
          ?>
        </div>
      </div>
    </div>
  </div>

  <div class="sidebar">
    <div class="right-module">
      <h4>New Song</h4>
      <ul class="new-artist-songs">
        <?php 
        $category = $_GET['category'];
        $sql_song = "select * from song where category_Id = $category";
        $result_sql_song = mysqli_query($connect,$sql_song);
        while($row_newsong = mysqli_fetch_array($result_sql_song)){
            $name_newsong = $row_newsong['name_song'];
            $singer_newsong = $row_newsong['singer'];
            $image_newsong = $row_newsong['image_song'];
            $id_newsong = $row_newsong['id'];
            $category = $row_newsong['category_Id'];
        
        echo"<li class='artist-song'>
        <div class='avatar'>
          <img src='ImageSong/$image_newsong'>
        </div>
        <div class='info'>
          <h3>$name_newsong</h3>
          <p>$singer_newsong / <span>1595</span>view</p>
        </div>
        <a href='listen.php?id=$id_newsong&&category=$category' title='$name_newsong' class='cover-link'></a>
      </li>"; 
        } 
        ?>
       
      </ul>
    </div>
    <div class="right-module">
      <h4>HOT</h4>
      <ul class="new-artist-songs">
      <?php 
        $category = $_GET['category'];
        $sql_hotsong = "select * from song where category_Id = $category";
        $result_sql_hotsong = mysqli_query($connect,$sql_hotsong);
        while($row_hotsong = mysqli_fetch_array($result_sql_hotsong)){
            $name_hotsong = $row_hotsong['name_song'];
            $singer_hotsong = $row_hotsong['singer'];
            $image_hotsong = $row_hotsong['image_song'];
            $id_hotsong = $row_hotsong['id'];
            $category = $row_hotsong['category_Id'];
        
        echo" <li class='artist-song'>
        <div class='avatar'>
          <img src='ImageSong/$image_hotsong'>
        </div>
        <div class='info'>
          <h3>$name_hotsong</h3>
          <p>$singer_hotsong / <span>1167</span>view</p>
        </div>
        <a href='listen.php?id=$id_hotsong&&category=$category' title='$name_hotsong' class='cover-link'></a>
      </li>";  
        }
        ?>
        <!-- <li class="artist-song">
          <div class="avatar">
            <img src="../storage/avatar/20.jpg">
          </div>
          <div class="info">
            <h3>風の詩</h3>
            <p>苗^v^ / <span>1167</span>次播放</p>
          </div>
          <a href="../music/22822602.html" title="風の詩" class="cover-link"></a>
        </li>
        <li class="artist-song">
          <div class="avatar">
            <img src="../storage/avatar/0.jpg">
          </div>
          <div class="info">
            <h3>Remember</h3>
            <p>HaPBoy / <span>1008</span>次播放</p>
          </div>
          <a href="../music/2116537.html" title="Remember" class="cover-link"></a>
        </li>
        <li class="artist-song">
          <div class="avatar">
            <img src="../storage/avatar/9.jpg">
          </div>
          <div class="info">
            <h3>夜的钢琴曲五</h3>
            <p>超级无敌帅气苗 / <span>864</span>次播放</p>
          </div>
          <a href="../music/149297.html" title="夜的钢琴曲五" class="cover-link"></a>
        </li>
        <li class="artist-song">
          <div class="avatar">
            <img src="../storage/avatar/00.jpg">
          </div>
          <div class="info">
            <h3>奇迹の山</h3>
            <p>Hapon / <span>838</span>次播放</p>
          </div>
          <a href="../music/441552.html" title="奇迹の山" class="cover-link"></a>
        </li>
        <li class="artist-song">
          <div class="avatar">
            <img src="../storage/avatar/17.jpg">
          </div>
          <div class="info">
            <h3>Because of You</h3>
            <p>Octobse_Idy / <span>821</span>次播放</p>
          </div>
          <a href="../music/28828074.html" title="Because of You" class="cover-link"></a>
        </li> -->
      </ul>
    </div>
  </div>
</div>
<footer>
  <div class="container">
    <div class="copyright">
      <p>Copyright © <span class="update-year">2016</span> HaPBoy - All Rights Reserved</p>
    </div>
  </div>
</footer>
<script src="http://cdn.bootcss.com/aplayer/1.5.8/APlayer.min.js"></script>
<script>
  var ap = new APlayer({
    element: document.getElementById('music-player'), // Optional, player element
    narrow: false,                                    // Optional, narrow style
    autoplay: true,                                   // Optional, autoplay song(s), not supported by mobile browsers
    showlrc: 0,                                       // Optional, show lrc, can be 0, 1, 2, see: ###With lrc
    mutex: true,                                      // Optional, pause other players when this player playing
    theme: '#B72712',                                 // Optional, theme color, default: #b7daff
    mode: 'circulation',                              // Optional, play mode, `random` `single` `circulation`(loop) `order`(no loop), default: `circulation`
    preload: 'metadata',                              // Optional, the way to load music, can be 'none' 'metadata' 'auto', default: 'auto'
    listmaxheight: '513px',                           // Optional, max height of play list
    music: {                                          // Required, music info
      title: '<?php echo"$name"; ?>',                                 // Required, music title
      author: '<?php echo"$singer"; ?>',                          // Required, music author
      url: '<?php echo"Audio/$audio"; ?>',  // Required, music url
      pic: '<?php echo"ImageSong/$image";?>'  // Optional, music picture
    }
  });
</script>
</body>
</html>
