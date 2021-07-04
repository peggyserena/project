<?php include __DIR__ . '/parts/config.php'; ?>
<?php
$title = '交通資訊';
$pageName = 'intinerary';
?>
<?php include __DIR__ . '/parts/html-head.php'; ?>
<link rel="stylesheet" href="./css/itinerary.css">
<?php include __DIR__ . '/parts/navbar.php'; ?>
<style>
</style>

<body>
    <main>
        <div class="container ">
            <h2 class="title b-green rot-135 text-center">指引地圖</h2>

            <div class="map row">
                <div class="col "><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d233009.26720078188!2d120.70117331415656!3d24.144721173432306!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34691f7d9f88d10f%3A0x835acf3859329d22!2z6Jaw6KGj6I2J5qOu5p6X5Y-w5Lit5paw56S-5bqX!5e0!3m2!1szh-TW!2stw!4v1615634816450!5m2!1szh-TW!2stw" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div class="col"><img src="./images/map/map_02.jpg" alt="">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="position-relative">
                <div class="row container_02 ">
                    <div class="co1 cloud">
                        <img class="ani" src="./images/other/busStation_c1.svg" alt="">
                        <img class="ani" src="./images/other/busStation_c2.svg" alt="">
                        <img class="ani" src="./images/other/busStation_c3.svg" alt="">
                    </div>

                    <div class="col information ">
                        <p><img class="b-green rot-135" src="./images/icon/house.svg" alt=""><span>426台中市新社區中興街20號</span>
                        </p>
                        <p><img class="b-green rot-135" src="./images/icon/phone-call.svg" alt="">
                            <a href="tel:+886-4-25931066"><span>Tel：(04)25931066 </a></span>
                        </p>
                        <p><a href="mailto:lavenderforestcafe@gmail.com?subject=Lavendar Forest %20使用者意見回饋&body=您好,%0A我在 薰衣草森林 遭遇了底下的問題，請協助處理～ %0A%0A謝謝">
                                <img class="b-green rot-135" src="./images/icon/mail.svg" alt=""><span>lavenderforestcafe@gmail.com</span></a></p>
                    </div>
                    <div class="col animation_01 ">
                        <img src="./images/other/busStation_f.svg" alt="">
                    </div>
                </div>
                <div>

                    <div class=" col ani car_01">
                        <img src="./images/other/car_01.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="transportation row">
                <section class="col-12">
                    <h3 class="  b-green rot-135">自行開車</h3>
                    <p><span>經台中市</span></p>
                    <p>台中市 → 大坑 → 中興嶺 → 協中街 → 新六村 → 中和 村 → 薰衣草森林</p>
                    <p><span>經卓蘭、東勢、豐原、石岡</span></p>
                    <p>往谷關方向經台3線省道 → 東勢 → 台8線省道至龍安橋 → 轉中95道路 → 白冷圳 → 中和村 → 薰衣草森林
                    </p>
                    <p><span>經谷關、國姓</span></p>
                    <p>往東勢、豐原方向經台8線省道至龍安橋 → 轉中95道路 → 白冷圳 → 中和村 → 薰衣草森林</p>
                    <p><span>1號國道</span></p>
                    <p>北上方向過清水休息站，南下方向過大甲收費站，轉四號國道 → 接台3線省道 → 石岡 → 東勢 → 台8線省道至龍安橋 → 轉中95道路 → 白冷圳 → 中和村 → 薰衣草森林
                    </p>
                    <p><span>GPS定位</span></p>
                    <p>N24° 07.472° E120° 50.273°</p>
                </section>
                <section class="col-12">
                    <h3 class="  b-green rot-135">搭乘高鐵+客運+接駁車</h3>
                    <p><span>經台中市</span></p>
                    <p>至「高鐵台中站」，改搭台鐵由「新烏日站」至「台中站」後，搭乘豐原客運【<span style="color: lightsalmon;">270</span>路 (豐富公園 -
                        大南 -
                        東勢)】支線至新社中興嶺的「新二村站」後，轉搭接駁車(或計程車)至 薰衣草森林新社店。</p>
                    <div class="stage col-12">
                        <div class="sky">
                            <div class="cloud_train"></div>
                            <div class="cloud_train"></div>
                        </div>
                        <div class="train">
                            <div class="wagon"></div>
                            <div class="wagon"></div>
                            <div class="wagon"></div>
                            <div class="locomotive">
                                <div class="cabin"></div>
                                <div class="motor"></div>
                                <div class="chimney">
                                    <div class="smoke"></div>
                                </div>
                                <div class="light"></div>
                            </div>
                        </div>

                    </div>

                </section>
            </div>
        </div>
        <div class="container">
            <section class="col-12">
                <h3 class="  b-green rot-135">搭乘台鐵+客運+接駁車</h3>
                <p><span>經台中市</span></p>
                <p>至「台中站」後，改豐原客運【<span style="color: lightsalmon;"></span>路 (豐富公園 - 大南 -
                    東勢)】支線至新社中興嶺的「新二村站」後，轉搭接駁車至 薰衣草森林新社店。
                </p>

            </section>
            <section class="col-12">
                <h3 class="   b-green rot-135">接駁業者資訊</h3>
                <p><span>新社 接駁車業者 林先生</span><br>
                    <a href="tel:+886-927-030988">Tel：0927-030988 </a><br>
                    因接駁車為當地業者經營，採預約制，建議儘早預約。<br>
                    自新社中興嶺搭乘計程車，車資約500元左右。 <br>
                </p>
                <p><span>豐原客運</span><br>
                    <a href="tel:+886-4-25234175">Tel：(04)25234175 </a><br>
                    <a href="http://www.fybus.com.tw"> http://www.fybus.com.tw</a>
                </p>
                <p><span>台中市公車及時動態</span><span style="color: lightsalmon;">&ensp;270路</span> (豐富公園 - 大南 - 東勢) <br>
                </p>
            </section>
        </div>
        <div class="container ">
            <div class=" position-relative">
                <div class=" row container_02 ">
                    <div class="col map_bus ">
                        <a href="https://citybus.taichung.gov.tw/ebus/driving-map"> <img class='col' src="./images/map/map_bus.png" alt=""> </a>
                    </div>

                    <div class="col animation_01 ">
                        <img src="./images/other/busStation_f.svg" alt="">
                    </div>
                </div>
                <div>
                    <div class="co1-12 cloud">
                        <img class="ani" src="./images/other/busStation_c1.svg" alt="">
                        <img class="ani" src="./images/other/busStation_c2.svg" alt="">
                        <img class="ani" src="./images/other/busStation_c3.svg" alt="">
                    </div>

                    <div class=" col ani car_02">
                        <img src="./images/other/car_02.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </main>




    <?php include __DIR__ . '/parts/scripts.php'; ?>
    <?php include __DIR__ . '/parts/html-foot.php'; ?>

</body>

</html>