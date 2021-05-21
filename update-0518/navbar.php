<?php
if (!isset($pageName)) {
    $pageName = '';
}
?>
<style>
    nav.navbar .nav-item.active {
        background-color: #5dc0df;
        border-radius: 10px;
    }
</style>
<header>
    <div class="logo animate__animated animate__rollIn animate__slow 3s"> <img src="./images/logo/logo.svg" alt=""></a>
    </div>
</header>
<nav id="nav_01" class="navbar navbar-expand-lg navbar-light bg-light active">
    <a class="navbar-brand" href="index.php"><img src="./images/logo/logo.svg" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto" style="flex-wrap:wrap">
            <li class="nav-item dropdown<?= $pageName == '' ? 'active' : '' ?>">
                <a class="nav-link " href="index.php" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    園區介紹&相簿
                </a>

            </li>


            <li class="nav-item dropdown<?= $pageName == '' ? 'active' : '' ?>">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    森林快報
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">園區相關</a>
                    <a class="dropdown-item" href="#">森林體驗</a>
                    <a class="dropdown-item" href="#">主廚上菜</a>
                    <a class="dropdown-item" href="#">夜宿薰衣草</a>
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
                <a class="nav-link dropdown-toggle" href="event.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    森林體驗
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="event.php">特惠活動</a>
                    <a class="dropdown-item" href="event.php">活動項目</a>
                    <a class="dropdown-item" href="event.php">報名參加</a>
                </div>
            </li>
            <li class="nav-item dropdown<?= $pageName == '' ? 'active' : '' ?>">
                <a class="nav-link dropdown-toggle" href="restaurant.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    主廚上菜
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="restaurant.php">特惠活動</a>
                    <a class="dropdown-item" href="restaurant.php">線上訂位</a>
                </div>
            </li>

            <li class="nav-item dropdown<?= $pageName == '' ? 'active' : '' ?>">
                <a class="nav-link dropdown-toggle" href="hotel.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    夜宿薰衣草
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="hotel.php">特惠活動</a>
                    <a class="dropdown-item" href="hotel.php">房型介紹</a>
                    <a class="dropdown-item" href="hotel.php">線上訂房</a>
                </div>
            </li>
            <li class="nav-item dropdown<?= $pageName == '' ? 'active' : '' ?>">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    套裝行程
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">一泊二食</a>
                    <a class="dropdown-item" href="#">一泊二食+下午茶</a>
                    <a class="dropdown-item" href="#">一泊二食+活動體驗</a>
                    <a class="dropdown-item" href="#">一泊二食+下午茶+活動體驗</a>
                </div>
            </li>
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
        <ul class="navbar-nav">
            <?php if (isset($_SESSION['user'])) : ?>
                <!-- <li class="nav-item">
                    <a class="nav-link"><?= htmlentities($_SESSION['user']['nickname']) ?></a>
                </li> -->
                <li class="nav-item" style="flex-shrink:0">
                    <a class="nav-link" href="logout.php">登出</a>
                </li>
                <li class="nav-item <?= $pageName == 'member' ? 'active' : '' ?>">
                    <a class="nav-link" href="member.php"><img src="./images/icon/member.svg" alt="">
                    </a>
                </li>
                <li class="nav-item <?= $pageName == 'cart' ? 'active' : '' ?>">
                    <a class="nav-link p-0 m-0" href="cart.php"><img class=" p-0 m-0" src="./images/icon/shoopingcart.svg" alt="">
                        <span class="badge badge-pill badge-danger cart-count">0</span>
                    </a>
                </li>

            <?php else : ?>
                <li class="nav-item <?= $pageName == 'login' ? 'active' : '' ?>">
                    <a class="nav-link" href="login.php">登入</a>
                </li>
                <li class="nav-item <?= $pageName == 'register' ? 'active' : '' ?>">
                    <a class="nav-link " href="register.php">註冊</a>
                </li>
                <li class="nav-item <?= $pageName == 'cart' ? 'active' : '' ?>">
                    <a class="nav-link  p-0 m-0" href="cart.php"><img src="./images/icon/shoopingcart.svg" alt="">
                        <span class="badge badge-pill badge-danger cart-count">0</span>
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
        <li>
            <a href="cart.php">
                <div><img src="./images/icon/shoopingcart.svg" alt="">
                </div>
                <div class="rw">
                    <span>cart</span>
                </div>

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
            <a href="">
                <img src="./images/icon/customer-service.svg" alt="">
                <div class="rw">
                    <span>contact</span>
                </div>
            </a>
        </li>
        <li id="goTop">
            <a href="mailto:peijingstudio@gmail.com?subject=Lavendar Forest %20使用者意見回饋&body=您好,%0A我在 薰衣草森林 遭遇了底下的問題，請協助處理～ %0A%0A謝謝">
                <img src="./images/icon/goTop.svg" alt="">
                <div class="rw">
                    <span>go top</span>
                </div>
            </a>
        </li>
    </ul>
</nav>