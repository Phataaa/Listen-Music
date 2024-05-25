<?php
session_start();
$username = $_SESSION['username'];
$avatar = $_SESSION['avatar'];
if ($username == null) {
    header('Location: login.php');
    exit;
}


?>
  <!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>静听网 </title>
  <link rel="icon" href="favicon.ico" mce_href="favicon.ico" type="image/x-icon">
  <link rel="shortcut icon" href="favicon.ico" mce_href="http://jt.hapboy.xyz/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="assets/css/reset.css">
  <link rel="stylesheet" href="assets/css/common.css">
  <link rel="stylesheet" href="assets/css/slider.css">
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="css.css">
</head>
<body>
<!-- 导航栏 -->
<header>
  <div class="container">
    <div class="navbar-header">
      <a href="" class="navbar-brand">
        <img src="assets/images/logo.png" alt="">
      </a>
    </div>
    <nav>
      <ul class="nav navbar-nav navbar-link">
        <li class="active"><a href="index.php">Home</a></li>
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
        <li><a href="">Library</a></li>
        <li style="margin-left:200px;"><a href=""><?php echo"$username" ?></a></li>
        <li><img src="<?php echo "Avatar/$avatar";?>" style="width: 30px; height: 30px; border-radius: 50%; margin-top: 15px;" alt="" srcset=""></li>
        <li><a href="logout.php">Logout</a></li>

      </ul>
      <ul class="nav navbar-nav navbar-right navbar-sm">
        <!--<li><input type="text" class="search-input" placeholder="歌名 / 歌手"></li>-->
        <!--<li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>-->
        <!--<li><a href="#">注册 / 登录</a></li>-->
      </ul>
    </nav>
  </div>
</header>
<!-- 轮播图 -->
<div class="container-sm slider-wrap">
  <div class="slider">
    <div class="slider-item-list"></div>
    <div class="slider-dots">
      <div class="slider-dots-wrap"></div>
    </div>
    <div class="slider-arrows">
      <div class="slider-arrows-wrap">
        <span class="slider-arrow slider-arrow-left" onclick="HBSlider.turn(-1)"></span>
        <span class="slider-arrow slider-arrow-right" onclick="HBSlider.turn(1)"></span>
      </div>
    </div>
  </div>
</div>
<!-- 主内容区域 -->
<div class="container-sm box">
  <!-- 主内容 -->
  <div class="main">
    <div class="main-wrap">
      <div class="content-box">
        <!-- 热门推荐 -->
        <div class="hot-recommand">
          <div class="content-header">
            <h2><i class="fa fa-music red"></i>HOT</h2>
            <div class="tab">
            <?php 
            
            $sql = "select * from category";
            $result = mysqli_query($connect,$sql);
            while($row_product = mysqli_fetch_array($result)){
              $id = $row_product['id'];
              $name = $row_product['name_category'];
              $image = $row_product['image_category'];
              echo"<a href='category/piano?name='$name,id=$id'>$name</a>
              <span class='line'>|</span>";
            }
            ?>
              <!-- <a href="category/piano">钢琴</a>
              <span class="line">|</span>
              <a href="category/guitar">吉他</a>
              <span class="line">|</span>
              <a href="category/cartoon">动漫</a>
              <span class="line">|</span>
              <a href="category/elect">电子</a> -->
            </div>
            <!--<span class="more"><a href="#">更多</a></span>-->
          </div>
          <ul class="music-list clearfix">
          <?php 
            
            $sql = "select * from song";
            $result = mysqli_query($connect,$sql);
            while($row_product = mysqli_fetch_array($result)){
              $id = $row_product['id'];
              $name = $row_product['name_song'];
              $singer = $row_product['singer'];
              $image = $row_product['image_song'];
              $category = $row_product['category_Id'];
              echo" 
              <li>
              <div class='u-cover'>
                <img src='ImageSong/$image'>
                <a title='$name - $singer' href='kiemtrabaihat.php?id=$id&&category=$category' class='msk'></a>
              </div>
              <p class='dec'>
                <a title='$name - $singer' href='listen.php?id=$id'>$name</a>
              </p>
              <div class='author'>$singer</div>
            </li>";
            }
            ?>
            <!-- <li>
              <div class="u-cover">
                <img src="http://p3.music.126.net/fNtMX44fvaGByURP0AbOZQ==/836728348761063.jpg">
                <a title="Refrain - Anan Ryoko" href="./music/22712173.html" class="msk"></a>
              </div>
              <p class="dec">
                <a title="Refrain - Anan Ryoko" href="./music/22712173.html">Refrain</a>
              </p>
              <div class="author">HaPBoy</div>
            </li>
            <li>
              <div class="u-cover">
                <img src="http://p4.music.126.net/ap7KvRE0-V4kfThDVVor9A==/18777459579736085.jpg">
                <a title="風の住む街 - 磯村由纪子" href="./music/586299.html" class="msk"></a>
              </div>
              <p class="dec">
                <a title="風の住む街 - 磯村由纪子" href="./music/586299.html">風の住む街</a>
              </p>
              <div class="author">Hapon</div>
            </li>
            <li>
              <div class="u-cover">
                <img src="http://p3.music.126.net/hNJFmhHzaGxYYwVbQbALNw==/79164837215733.jpg">
                <a title="夜的钢琴曲五 - 石进" href="./music/149297.html" class="msk"></a>
              </div>
              <p class="dec">
                <a title="夜的钢琴曲五 - 石进" href="./music/149297.html">夜的钢琴曲五</a>
              </p>
              <div class="author">超级无敌帅气苗</div>
            </li>
            <li>
              <div class="u-cover">
                <img src="http://p3.music.126.net/l5-9FCPKx9xrUtzyKCMPPw==/81363860481074.jpg">
                <a title="流れ行く云 - 岸部眞明" href="./music/441532.html" class="msk"></a>
              </div>
              <p class="dec">
                <a title="流れ行く云 - 岸部眞明" href="./music/441532.html">流れ行く云</a>
              </p>
              <div class="author">Hapon</div>
            </li>
            <li>
              <div class="u-cover">
                <img src="http://p3.music.126.net/N0b8fzm7vl6tkj1Rfqa3hQ==/794946906935600.jpg">
                <a title="Remember - 7AND5" href="./music/2116537.html" class="msk"></a>
              </div>
              <p class="dec">
                <a title="Remember - 7AND5" href="./music/2116537.html">Remember</a>
              </p>
              <div class="author">HaPBoy</div>
            </li>
            <li>
              <div class="u-cover">
                <img src="http://p4.music.126.net/Kcxcv0cfsdAx30HZ_6tDGQ==/827932255715549.jpg">
                <a title="A Little Story - Valentin" href="./music/857896.html" class="msk"></a>
              </div>
              <p class="dec">
                <a title="A Little Story - Valentin" href="./music/857896.html">A Little Story</a>
              </p>
              <div class="author">LoveMiao</div>
            </li>
            <li>
              <div class="u-cover">
                <img src="http://p3.music.126.net/P1ac-TWkFzjDqcvl5_oK7Q==/881808325476577.jpg">
                <a title="Flower Dance - DJ OKAWARI" href="./music/406238.html" class="msk"></a>
              </div>
              <p class="dec">
                <a title="Flower Dance - DJ OKAWARI" href="./music/406238.html">Flower Dance</a>
              </p>
              <div class="author">HaPBoy</div>
            </li>
            <li>
              <div class="u-cover">
                <img src="http://p4.music.126.net/8dzD62VK8jLDbhEqkmpIAg==/18277181788626198.jpg">
                <a title="Faded - Alan Walker" href="./music/36990266.html" class="msk"></a>
              </div>
              <p class="dec">
                <a title="Faded - Alan Walker" href="./music/36990266.html">Faded</a>
              </p>
              <div class="author">HaPBoy</div>
            </li> -->
          </ul>
        </div>
        <!-- 分类榜单 -->
        <div class="category">
          <div class="content-header">
            <h2><i class="fa fa-music red"></i>分类榜单</h2>
          </div>
          <div class="row">
            <div class="category-music-list">
              <div class="category-header">
                🎹 钢琴
              </div>
              <ul>
                <li class="music-list-item">
                  <div class="title">
                    <div class="title_wrap">
                      <span class="rank">1</span>
                      <a href="./music/22712173.html" title="Refrain">Refrain</a>
                    </div>
                  </div>
                  <div class="info">
                    <span class="date">12-26</span>
                    <span class="avatar"><img
                        src="./storage/avatar/18.jpg"></span>
                  </div>
                </li>
                <li class="music-list-item">
                  <div class="title">
                    <div class="title_wrap">
                      <span class="rank">2</span>
                      <a href="./music/586299.html" title="風の住む街">風の住む街</a>
                    </div>
                  </div>
                  <div class="info">
                    <span class="date">12-20</span>
                    <span class="avatar"><img
                        src="./storage/avatar/10.jpg"></span>
                  </div>
                </li>
                <li class="music-list-item">
                  <div class="title">
                    <div class="title_wrap">
                      <span class="rank">3</span>
                      <a href="./music/357126.html" title="Tassel">Tassel</a>
                    </div>
                  </div>
                  <div class="info">
                    <span class="date">12-25</span>
                    <span class="avatar"><img
                        src="./storage/avatar/25.jpg"></span>
                  </div>
                </li>
                <li class="music-list-item">
                  <div class="title">
                    <div class="title_wrap">
                      <span class="rank">4</span>
                      <a href="./music/139730.html" title="安静的午后">安静的午后</a>
                    </div>
                  </div>
                  <div class="info">
                    <span class="date">11-17</span>
                    <span class="avatar"><img
                        src="./storage/avatar/5.jpg"></span>
                  </div>
                </li>
                <li class="music-list-item">
                  <div class="title">
                    <div class="title_wrap">
                      <span class="rank">5</span>
                      <a href="./music/139774.html" title="The truth that you leave">The truth that you leave</a>
                    </div>
                  </div>
                  <div class="info">
                    <span class="date">12-13</span>
                    <span class="avatar"><img
                        src="./storage/avatar/24.jpg"></span>
                  </div>
                </li>
              </ul>
            </div>
            <div class="category-music-list">
              <div class="category-header">
                🎸 吉他
              </div>
              <ul>
                <li class="music-list-item">
                  <div class="title">
                    <div class="title_wrap">
                      <span class="rank">1</span>
                      <a href="./music/22822602.html" title="風の詩">風の詩</a>
                    </div>
                  </div>
                  <div class="info">
                    <span class="date">11-12</span>
                    <span class="avatar"><img
                        src="./storage/avatar/20.jpg"></span>
                  </div>
                </li>
                <li class="music-list-item">
                  <div class="title">
                    <div class="title_wrap">
                      <span class="rank">2</span>
                      <a href="./music/709386.html" title="晴れ 时どき 雪">晴れ 时どき 雪</a>
                    </div>
                  </div>
                  <div class="info">
                    <span class="date">11-22</span>
                    <span class="avatar"><img
                        src="./storage/avatar/3.jpg"></span>
                  </div>
                </li>
                <li class="music-list-item">
                  <div class="title">
                    <div class="title_wrap">
                      <span class="rank">3</span>
                      <a href="./music/22688487.html" title="風見鶏">風見鶏</a>
                    </div>
                  </div>
                  <div class="info">
                    <span class="date">12-23</span>
                    <span class="avatar"><img
                        src="./storage/avatar/1.jpg"></span>
                  </div>
                </li>
                <li class="music-list-item">
                  <div class="title">
                    <div class="title_wrap">
                      <span class="rank">4</span>
                      <a href="./music/441552.html" title="奇迹の山">奇迹の山</a>
                    </div>
                  </div>
                  <div class="info">
                    <span class="date">12-22</span>
                    <span class="avatar"><img
                        src="./storage/avatar/2.jpg"></span>
                  </div>
                </li>
                <li class="music-list-item">
                  <div class="title">
                    <div class="title_wrap">
                      <span class="rank">5</span>
                      <a href="./music/441532.html" title="流れ行く云">流れ行く云</a>
                    </div>
                  </div>
                  <div class="info">
                    <span class="date">12-21</span>
                    <span class="avatar"><img
                        src="./storage/avatar/6.jpg"></span>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <div class="row">
            <div class="category-music-list">
              <div class="category-header">
                🍡 动漫
              </div>
              <ul>
                <li class="music-list-item">
                  <div class="title">
                    <div class="title_wrap">
                      <span class="rank">1</span>
                      <a href="./music/426341675.html" title="秒速五厘米">秒速五厘米</a>
                    </div>
                  </div>
                  <div class="info">
                    <span class="date">11-23</span>
                    <span class="avatar"><img
                        src="./storage/avatar/12.jpg"></span>
                  </div>
                </li>
                <li class="music-list-item">
                  <div class="title">
                    <div class="title_wrap">
                      <span class="rank">2</span>
                      <a href="./music/22707001.html" title="白詰草">白詰草</a>
                    </div>
                  </div>
                  <div class="info">
                    <span class="date">11-14</span>
                    <span class="avatar"><img
                        src="./storage/avatar/1.jpg"></span>
                  </div>
                </li>
                <li class="music-list-item">
                  <div class="title">
                    <div class="title_wrap">
                      <span class="rank">3</span>
                      <a href="./music/761323.html" title="鸟の诗 ~">鸟の诗 ~</a>
                    </div>
                  </div>
                  <div class="info">
                    <span class="date">12-26</span>
                    <span class="avatar"><img
                        src="./storage/avatar/4.jpg"></span>
                  </div>
                </li>
                <li class="music-list-item">
                  <div class="title">
                    <div class="title_wrap">
                      <span class="rank">4</span>
                      <a href="./music/528283.html" title="桜花抄">桜花抄</a>
                    </div>
                  </div>
                  <div class="info">
                    <span class="date">11-25</span>
                    <span class="avatar"><img
                        src="./storage/avatar/17.jpg"></span>
                  </div>
                </li>
                <li class="music-list-item">
                  <div class="title">
                    <div class="title_wrap">
                      <span class="rank">5</span>
                      <a href="./music/442454.html" title="人生的回转木马">人生的回转木马</a>
                    </div>
                  </div>
                  <div class="info">
                    <span class="date">12-17</span>
                    <span class="avatar"><img
                        src="./storage/avatar/9.jpg"></span>
                  </div>
                </li>
              </ul>
            </div>
            <div class="category-music-list">
              <div class="category-header">
                ⚡️ 电子
              </div>
              <ul>
                <li class="music-list-item">
                  <div class="title">
                    <div class="title_wrap">
                      <span class="rank">1</span>
                      <a href="./music/28828074.html" title="Because of You">Because of You</a>
                    </div>
                  </div>
                  <div class="info">
                    <span class="date">11-23</span>
                    <span class="avatar"><img
                        src="./storage/avatar/17.jpg"></span>
                  </div>
                </li>
                <li class="music-list-item">
                  <div class="title">
                    <div class="title_wrap">
                      <span class="rank">2</span>
                      <a href="./music/29207817.html" title="Easy Breeze">Easy Breeze</a>
                    </div>
                  </div>
                  <div class="info">
                    <span class="date">11-12</span>
                    <span class="avatar"><img
                        src="./storage/avatar/14.jpg"></span>
                  </div>
                </li>
                <li class="music-list-item">
                  <div class="title">
                    <div class="title_wrap">
                      <span class="rank">3</span>
                      <a href="./music/16345145.html" title="Levels - Radio Edit">Levels - Radio Edit</a>
                    </div>
                  </div>
                  <div class="info">
                    <span class="date">12-13</span>
                    <span class="avatar"><img
                        src="./storage/avatar/5.jpg"></span>
                  </div>
                </li>
                <li class="music-list-item">
                  <div class="title">
                    <div class="title_wrap">
                      <span class="rank">4</span>
                      <a href="./music/2116537.html" title="Remember">Remember</a>
                    </div>
                  </div>
                  <div class="info">
                    <span class="date">11-25</span>
                    <span class="avatar"><img
                        src="./storage/avatar/2.jpg"></span>
                  </div>
                </li>
                <li class="music-list-item">
                  <div class="title">
                    <div class="title_wrap">
                      <span class="rank">5</span>
                      <a href="./music/36990266.html" title="Faded">Faded</a>
                    </div>
                  </div>
                  <div class="info">
                    <span class="date">12-24</span>
                    <span class="avatar"><img
                        src="./storage/avatar/10.jpg"></span>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- 侧边栏 -->
  <div class="sidebar" style="min-height: 1094px">
    <div class="right-module">
      <h4>最新单曲</h4>
      <ul class="new-artist-songs">
        <li class="artist-song">
          <div class="avatar">
            <img src="./storage/avatar/0.jpg">
          </div>
          <div class="info">
            <h3>Refrain</h3>
            <p>HaPBoy / <span>1595</span>次播放</p>
          </div>
          <a href="./music/22712173.html" title="Refrain" class="cover-link"></a>
        </li>
        <li class="artist-song">
          <div class="avatar">
            <img src="./storage/avatar/4.jpg">
          </div>
          <div class="info">
            <h3>A Little Story</h3>
            <p>LoveMiao / <span>1052</span>次播放</p>
          </div>
          <a href="./music/857896.html" title="A Little Story" class="cover-link"></a>
        </li>
        <li class="artist-song">
          <div class="avatar">
            <img src="./storage/avatar/3.jpg">
          </div>
          <div class="info">
            <h3>晴れ 时どき 雪</h3>
            <p>Annie雀 / <span>349</span>次播放</p>
          </div>
          <a href="./music/709386.html" title="晴れ 时どき 雪" class="cover-link"></a>
        </li>
        <li class="artist-song">
          <div class="avatar">
            <img src="./storage/avatar/14.jpg">
          </div>
          <div class="info">
            <h3>Easy Breeze</h3>
            <p>Hannah / <span>420</span>次播放</p>
          </div>
          <a href="./music/29207817.html" title="Easy Breeze" class="cover-link"></a>
        </li>
        <li class="artist-song">
          <div class="avatar">
            <img src="./storage/avatar/5.jpg">
          </div>
          <div class="info">
            <h3>安静的午后</h3>
            <p>Wing / <span>1356</span>次播放</p>
          </div>
          <a href="./music/139730.html" title="安静的午后" class="cover-link"></a>
        </li>
      </ul>
    </div>
    <div class="right-module">
      <h4>热门单曲</h4>
      <ul class="new-artist-songs">
        <li class="artist-song">
          <div class="avatar">
            <img src="./storage/avatar/20.jpg">
          </div>
          <div class="info">
            <h3>風の詩</h3>
            <p>苗^v^ / <span>1167</span>次播放</p>
          </div>
          <a href="./music/22822602.html" title="風の詩" class="cover-link"></a>
        </li>
        <li class="artist-song">
          <div class="avatar">
            <img src="./storage/avatar/0.jpg">
          </div>
          <div class="info">
            <h3>Remember</h3>
            <p>HaPBoy / <span>1008</span>次播放</p>
          </div>
          <a href="./music/2116537.html" title="Remember" class="cover-link"></a>
        </li>
        <li class="artist-song">
          <div class="avatar">
            <img src="./storage/avatar/9.jpg">
          </div>
          <div class="info">
            <h3>夜的钢琴曲五</h3>
            <p>超级无敌帅气苗 / <span>864</span>次播放</p>
          </div>
          <a href="./music/149297.html" title="夜的钢琴曲五" class="cover-link"></a>
        </li>
        <li class="artist-song">
          <div class="avatar">
            <img src="./storage/avatar/00.jpg">
          </div>
          <div class="info">
            <h3>奇迹の山</h3>
            <p>Hapon / <span>838</span>次播放</p>
          </div>
          <a href="./music/441552.html" title="奇迹の山" class="cover-link"></a>
        </li>
        <li class="artist-song">
          <div class="avatar">
            <img src="./storage/avatar/17.jpg">
          </div>
          <div class="info">
            <h3>Because of You</h3>
            <p>Octobse_Idy / <span>821</span>次播放</p>
          </div>
          <a href="./music/28828074.html" title="Because of You" class="cover-link"></a>
        </li>
      </ul>
    </div>
  </div>
</div>
<!-- 底部版权 -->
<footer>
  <div class="container">
    <div class="copyright">
      <p>Copyright © <span class="update-year">2016</span> HaPBoy - All Rights Reserved</p>
    </div>
  </div>
</footer>
<!-- JS 脚本 -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/HBSlider.js"></script>
<script>
  // 轮播图数据
  var sliderData = [
    {
      title: '晴れ 时どき 雪',
      pic: './storage/slider/01.png',
      url: './music/709386.html'
    },
    {
      title: 'Flower Dance',
      pic: 'http://img.zcool.cn/community/0109575540b83d0000017c946b5535.jpg',
      url: './music/406238.html'
    },
    {
      title: 'A Little Story - Valentin',
      pic: 'http://ww2.sinaimg.cn/large/67d25024gw1fb5h1swze9j20gq0b6acf.jpg',
      url: './music/857896.html'
    },
    {
      title: '桜花抄 - 天門',
      pic: 'http://ww4.sinaimg.cn/mw690/67d25024gw1fb5hbjl32jj21hc0u01dz.jpg',
      url: './music/528283.html'
    }
  ];

  $(function () {
    HBSlider.setConfig({
      autoPlay: true,
      delay: 5
    });
    HBSlider.setItems(sliderData);
    HBSlider.init();
    HBSlider.play();
  });
</script>
<script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
