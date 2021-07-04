<?php
if (!isset($pageName)) {
    $pageName = '';
}
?>
<style>

</style>
<header>
    <div class="logo animate__animated animate__rollIn animate__slow 3s"> <img src="./images/logo/logo.svg" alt=""></a>
    </div>
</header>
<nav id="nav_01" class="navbar navbar-expand-lg navbar-light bg-light active" >
    <a class="navbar-brand" href="index.php"><img src="./images/logo/logo_nav.svg" alt=""></a>
    <div class="nav_03">
        <!-- <span>
            <a href="index.php"><img src="./images/icon/home.svg" alt=""></a>

        </span> -->
        <!-- <span>
            <a href="cart.php"><img src="./images/icon/shoopingcart.svg" alt=""></a>
            <span class="badge badge-pill text-center  c_pink cart-count">0</span>

        </span>
        <span>
            <a href="member.php"><img src="./images/icon/member.svg" alt=""></a>
        </span> -->
        <!-- <span>
            <a href="https://www.messenger.com/t/lavender2001/" target="_blank"><img src="./images/icon/FBM.svg" alt=""></a>
        </span> -->
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav m-auto" style="flex-wrap:wrap">
            <li class="nav-item dropdown<?= $pageName == '' ? 'active' : '' ?>">
                <a class="nav-link " href="index.php" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    園區介紹&相簿
                </a>

            </li>


            <li class="nav-item dropdown<?= $pageName == '' ? 'active' : '' ?>">
                <a class="nav-link dropdown-toggle" href="news.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    森林快報
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="news.php#gardenInfo">園區相關</a>
                    <a class="dropdown-item" href="news.php#eventInfo">森林體驗</a>
                    <a class="dropdown-item" href="news.php#restaurantInfo">森林咖啡館</a>
                    <a class="dropdown-item" href="news.php#hotelInfo">夜宿薰衣草</a>
                </div>
            </li>
            <li class="nav-item dropdown<?= $pageName == '' ? 'active' : '' ?>">
                <a class="nav-link dropdown-toggle" href="itinerary.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    交通資訊
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="itinerary.php">地圖指引</a>
                    <a class="dropdown-item" href="itinerary.php">自行開車</a>
                    <a class="dropdown-item" href="itinerary.php">大眾交通工具</a>
                </div>
            </li>
            <li class="nav-item dropdown<?= $pageName == '' ? 'active' : '' ?>">
                <a class="nav-link dropdown-toggle" href="restaurant.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    森林咖啡館
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="news.php#restaurantInfo">特惠活動</a>
                    <a class="dropdown-item" href="restaurant.php">線上訂位</a>
                </div>
            </li>
            <li class="nav-item dropdown<?= $pageName == '' ? 'active' : '' ?>">
                <a class="nav-link dropdown-toggle" href="event.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    森林體驗
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="news.php#eventInfo">特惠活動</a>
                    <a class="dropdown-item" href="event.php">活動項目</a>
                    <a class="dropdown-item" href="event.php">報名參加</a>
                </div>
            </li>
            <li class="nav-item dropdown<?= $pageName == '' ? 'active' : '' ?>">
                <a class="nav-link dropdown-toggle" href="hotel.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    夜宿薰衣草
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="news.php#hotelInfo">特惠活動</a>
                    <a class="dropdown-item" href="hotel.php">房型介紹</a>
                    <a class="dropdown-item" href="hotel.php">線上訂房</a>
                </div>
            </li>
            <!-- <li class="nav-item dropdown<?= $pageName == '' ? 'active' : '' ?>">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    套裝行程
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">一泊二食</a>
                    <a class="dropdown-item" href="#">一泊二食+下午茶</a>
                    <a class="dropdown-item" href="#">一泊二食+活動體驗</a>
                    <a class="dropdown-item" href="#">一泊二食+下午茶+活動體驗</a>
                </div>
            </li> -->
            <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        周邊商品
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">特惠活動</a>
                        <a class="dropdown-item" href="#">商品項目</a>
                    </div>
                </li> -->
            <li class="nav-item dropdown<?= $pageName == '' ? 'active' : '' ?>">
                <a class="nav-link dropdown-toggle" href="fun.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    寫卡片
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="fun.php">下載電子卡片</a>
                    <a class="dropdown-item" href="fun.php">寫卡片</a>
                </div>
            </li>
        </ul>
        <ul class="navbar-nav" style="flex-shrink:0">
            <?php if (isset($_SESSION['user'])) : ?>
                <li class="nav-item">
                    <a class="nav-link"><?= htmlentities($_SESSION['user']['fullname']) ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="logout.php">登出</a>
                </li>
                <li class="nav-item p-0 m-0 <?= $pageName == 'member' ? 'active' : '' ?>">
                    <a class="nav-link p-0 m-0" data-html="true" href="member.php" data-toggle="tooltip" data-placement="bottom" title="會員中心"><img src="./images/icon/member.svg" alt="">
                    </a>
                </li>
                <li class="nav-item p-0 m-0 <?= $pageName == 'cart' ? 'active' : '' ?>">
                    <a class="nav-link  p-0 m-0  cart_img" href="cart.php">
                        <img src="./images/icon/shoopingcart.svg" alt="">
                        <div class="badge badge-pill text-center  c_pink cart-count">0</div>
                    </a>
                </li>
                <li class="nav-item p-0 m-0 <?= $pageName == 'wishList' ? 'active' : '' ?>">
                <a class="nav-link  p-0 m-0" href="member.php?tab=wishList"><img src="./images/icon/heart.svg" alt="">
                        <span class="badge badge-pill c_pink text-white wishList-count">0</span>
                    </a>
                </li>

            <?php else : ?>
                <li class="nav-item <?= $pageName == 'login' ? 'active' : '' ?>">
                    <a class="nav-link " href="login.php">登入</a>
                </li>
                <li class="nav-item <?= $pageName == 'register' ? 'active' : '' ?>">
                    <a class="nav-link" href="register.php">註冊</a>
                </li>
                <li class="nav-item <?= $pageName == 'cart' ? 'active' : '' ?>">
                    <a class="nav-link  p-0 m-0" href="cart.php"><img src="./images/icon/shoopingcart.svg" alt="">
                        <span class="badge badge-pill text-white c_pink cart-count">0</span>
                    </a>
                </li>
                <li class="nav-item <?= $pageName == 'wishList' ? 'active' : '' ?>">
                    <a class="nav-link  p-0 m-0" href="member.php?tab=wishList"><img src="./images/icon/heart.svg" alt="">
                        <span class="badge badge-pill text-white c_pink wishList-count">0</span>
                    </a>
                </li>

            <?php endif; ?>

        </ul>
    </div>
    </div>
</nav>
<nav class="nav_02">
    <ul>
        <li>
            <a href="index.php">
                <div><img src="./images/icon/home.svg" alt=""></div>
                <div class="rw">
                    <span>Home</span>
                </div>
            </a>

        </li>
        <li >
            <a href="cart.php" >
                <div class="cart_img"><img src="./images/icon/shoopingcart.svg" alt="">
                <span class="badge badge-pill c_pink cart-count">0</span>
                </div>
                

                <div class="rw"><span>cart</span></div>
            </a>
        </li>

        <li>
            <a href="member.php">
                <img src="./images/icon/member.svg" alt="">
                <div class="rw">
                    <span>member</span>
                </div>
            </a>
        </li>
        <li>
            <a href="https://www.messenger.com/t/lavender2001/" target="_blank">
                <img src="./images/icon/FBM.svg" alt="">
                <div class="rw">
                    <span>messenger</span>
                </div>
            </a>
        </li>
        <li class="goTop">
          <a href="">
              <img src="./images/icon/goTop.svg" alt="">
              <div class="rw">
                  <span>go top</span>
              </div>
          </a>

        </li>
    </ul>
</nav>
<nav class="nav_04">
    <ul>
        <li>
            <a href="https://www.messenger.com/t/lavender2001/" target="_blank">
                <img src="./images/icon/FBM.svg" alt="">
            </a>
        </li>
        <li class="goTop">
            <img src="./images/icon/goTop.svg" alt="">
        </li>
    </ul>
</nav>
