<?php include __DIR__ . '/parts/config.php'; ?>
<?php
$title = '薰衣草森林 Lavender Forest';
$pageName = 'index';


$sql = "SELECT * FROM `index`";
$stmt = $pdo->query($sql);
$index = $stmt->fetchAll();

$sql = "SELECT * FROM `index`where id = '16'";
$stmt = $pdo->query($sql);
$a = $stmt->fetch();


$sql = "SELECT * FROM `index`where id = '17'";
$stmt = $pdo->query($sql);
$b = $stmt->fetch();


$sql = "SELECT * FROM `index`where id = '18'";
$stmt = $pdo->query($sql);
$c = $stmt->fetch();


$sql = "SELECT * FROM `index`where id = '19'";
$stmt = $pdo->query($sql);
$d = $stmt->fetch();


$sql = "SELECT * FROM `index`where id = '20'";
$stmt = $pdo->query($sql);
$e = $stmt->fetch();


$sql = "SELECT * FROM `index`where id = '21'";
$stmt = $pdo->query($sql);
$f = $stmt->fetch();


$sql = "SELECT * FROM `index`where id = '22'";
$stmt = $pdo->query($sql);
$g = $stmt->fetch();

// 抓圖片
if (!empty($index_id_list)){
    $sql = "SELECT * FROM `index_image` WHERE index_id in (".implode(",", $index_id_list).") ORDER BY num_order";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([]);
    $result = $stmt->fetchAll();
    $index_img = [];
    foreach($result as $cover_img){
        if (!array_key_exists($cover_img['index_id'], $index_img)){
            $index_img[$cover_img['index_id']] = $cover_img['path'];
        }
    }
}
// print($index_img[$index['id']] ?? "" );

?>
<?php include __DIR__ . '/parts/html-head.php'; ?>
<link rel="stylesheet" href="./css/index.css">
<?php include __DIR__ . '/parts/navbar.php'; ?>
<style>


</style>

<main>
    <!-- <div class="modal fade text-muted" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content ">
                <h3 class="modal-title title text-center m-0" id="exampleModalLongTitle">森林防疫懶人包</h3>
                <div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
            <div class="modal-body pb-2 pl-4 pr-4 pt-4 ">
                <p class="pb-2">薰衣草森林兩園區照常營業，但目前防疫為首要任務，請旅人來訪時，遵循以下守則：</p>
                <p class="pb-2">✅入園時<br>step 1.測量體溫<br>step 2.噴灑酒精<br>step 3.填寫實名制表單，並將提交畫面交給園區夥伴確認<br>step 4.購票入園</p>                  
                <p class="pb-2">✅在園區<br>- 保持社交距離<br>- 除用餐時全程配戴口罩<br>- 勤洗手</p>
                <p class="pb-2">兩園區面積廣闊，有足夠的空間供旅人遊覽，可以盡情與植物連結再連結，但防疫要當心，照顧自己也照顧別人，出外要小心，才能大盡興，薰衣草森林關心您。</p>
            </div>
            <div class="p-3" style="background-color:MistyRose">
                <p>※ 醫護人員入園免費，及森林咖啡館用 8 折<br>※ 繡球花節，活動期間4/17~6/30<br>※ 目前園區花卉還有 #鼠尾草 #追風草 #小天使花～</p>
            </div>
            </div>
        </div>
    </div> -->
    <div id="slider" name="slider" class=" owl-carousel owl-theme">
        <!-- <?php for ($i = 1; $i < count($index_img); $i++) : ?>
            <img src='<?= WEB_ROOT."/".$index_img[$i]['path'] ?>' alt=''>
        <?php endfor; ?>  -->
        <img src="./images/album/hill/hill_3.jpg">
        <img src="./images/album/hill/hill_4.jpg">
        <img src="./images/album/garden/garden_21.jpg">
        <img src="./images/album/garden/garden_23.jpg">
        <img src="./images/album/forest/forest_1.jpg">
        <img src="./images/album/forest/forest_2.jpg">
        <img src="./images/album/forest/forest_18.jpg">
        <img src="./images/album/farm/farm_10.jpg">
        <img src="./images/album/farm/farm_11.jpg">
        <img src="./images/album/carousel/carousel_1.jpg">
        <img src="./images/album/carousel/carousel_5.jpg">
        <img src="./images/album/carousel/carousel_6.jpg">
    </div>

 

    <div class="container  text-center text-white c_1 mt-5 ">
        <h1 class="box_desktop  m-0  "><?= $a['title'] ?> </h1>
        <h2 class="box_cellphone m-0   mb-4 mt-4" ><?= $a['title'] ?></h2>
        <pre>
            <h3 class="poetry1   m-0 " style="line-height:2.8rem"><?= $a['content'] ?></h3>
        </pre>
        <pre>
            <div class="poetry2   m-0 "><?= $a['content_cellphone'] ?></div>
        </pre>


    </div>

    <div class="container row d-flex my-5 px-0 justify-content-between  ">
        <div class="tableOne col-sm-12 col-lg-6  ">
            <h3 class=" text-white b-green rot-135 col-12 p-3 m-0" style="background-color: rgb(95, 185, 173);"> 台中市 新社區 天氣</h3>
            <table>

                <tbody>
                    <tr class="box_desktop">
                        <th class="WD" colspan="4" scope="col"></th>
                        <th class="WDW" colspan="4" scope="col"></th>
                    </tr>
                    <tr class="box_tablet ">
                        <th class="WD" colspan="4" scope="col"></th>
                        <th class="WDW" colspan="4" scope="col"></th>
                    </tr>
                    <tr class="box_cellphone ">
                        <th class="WDW" colspan="8" scope="col"></th>
                    </tr>

                    <tr class="box_cellphone ">
                        <th class="WD" colspan="8" scope="col"></th>
                    </tr>
                    <tr>
                        <td rowspan="2" scope="col">日期</td>
                        <td class="bT" id="date1" scope="col"></td>
                        <td class="bT" id="date2" scope="col"></td>
                        <td class="bT" id="date3" scope="col"></td>
                        <td class="bT" id="date4" scope="col"></td>
                        <td class="bT" id="date5" scope="col"></td>
                        <td class="bT" id="date6" scope="col"></td>
                        <td class="bT" id="date7" scope="col"></td>
                    </tr>
                    <tr>
                        <td class="dbox" scope="col" style="text-align: center; background-color: darkcyan; font-weight:900;">
                        </td>
                        <td class="dbox" scope="col" style="background-color:rgb(95, 185, 173)"></td>
                        <td class="dbox" scope="col"></td>
                        <td class="dbox" scope="col"></td>
                        <td class="dbox" scope="col"></td>
                        <td class="dbox" scope="col"></td>
                        <td class="dbox" scope="col"></td>
                    </tr>
                    <tr>
                        <td scope="col" class="p-1">天氣圖</td>
                        <td id="day_weather1" scope="col" style="text-align: center;"></td>
                        <td id="day_weather3" scope="col"></td>
                        <td id="day_weather5" scope="col"></td>
                        <td id="day_weather7" scope="col"></td>
                        <td id="day_weather9" scope="col"></td>
                        <td id="day_weather11" scope="col"></td>
                        <td id="day_weather13" scope="col"></td>
                    </tr>
                    <tr>
                        <td scope="col" class="p-1">白天 °C</td>
                        <td id="DT1" scope="col"></td>
                        <td id="DT2" scope="col"></td>
                        <td id="DT3" scope="col"></td>
                        <td id="DT4" scope="col"></td>
                        <td id="DT5" scope="col"></td>
                        <td id="DT6" scope="col"></td>
                        <td id="DT7" scope="col"></td>
                    </tr>
                    <tr>
                        <td scope="col" class="p-1">晚上 °C</td>
                        <td id="NT1" scope="col"></td>
                        <td id="NT2" scope="col"></td>
                        <td id="NT3" scope="col"></td>
                        <td id="NT4" scope="col"></td>
                        <td id="NT5" scope="col"></td>
                        <td id="NT6" scope="col"></td>
                        <td id="NT7" scope="col"></td>
                    </tr>
                    <tr>
                        <td scope="col" class="p-1">降雨 ％</td>
                        <td id="DP1" scope="col"></td>
                        <td id="DP2" scope="col"></td>
                        <td id="DP3" scope="col"></td>
                        <td id="DP4" scope="col"></td>
                        <td id="DP5" scope="col"></td>
                        <td id="DP6" scope="col"></td>
                        <td id="DP7" scope="col"></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="tableTwo col-sm-12 col-lg-6 " >
            <h3 class=" text-center  b-green rot-135 col-12 p-3 m-0" style="background-color: rgb(95, 185, 173);"><?= $c['title'] ?></h3>
            <table>
                <tbody>
                    <tr>
                        <th style="height:3rem"><?= $d['title'] ?></th>
                        <td><?= $d['content'] ?></td>
                        <td rowspan="3" class="pt-3 pb-3">
                            <pre>
                                <p class=box_desktop><?= $c['content'] ?></p>
                                <p class=box_tablet><?= $c['content'] ?></p>
                                <p class=box_cellphone><?= $c['content'] ?></p>
                            </pre>
                        </td>
                    </tr>
                    <tr>
                        <th style="height:3rem"><?= $e['title'] ?></th>
                        <td>
                            <pre>
                                <p><?= $e['content'] ?></p>
                            </pre>
                        </td>
                    </tr>
                    <tr>
                        <th><?= $f['title'] ?></th>
                        <td >
                            <pre>
                                <p><?= $f['content'] ?></p>
                            </pre>
                        </td>
                    </tr>
                    <tr class="box_desktop">
                        <td colspan="3" class="pt-3 pm-3 c_pink">
                            <pre>
                                <h4 class=""><?= $g['content'] ?></h4></li>
                            </pre>
                        </td>
                    </tr>
                    <tr class="box_tablet">
                        <td colspan="3" class="pt-3 pm-3 c_pink">
                            <pre>
                                <h4 class=""><?= $g['content'] ?></h4></li>
                            </pre>
                        </td>
                    </tr>
                    <tr class="box_cellphone">
                        <td colspan="3" class="pt-3 pb-3 c_pink">
                            <pre>
                                <h4 class=""><?= $g['content'] ?></h4></li>
                            </pre>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="box_desktop">
        <h3 class="text-center text-white b-green rot-135 col-12 p-3 m-0" style="background-color: rgb(95, 185, 173);"> 薰衣草森林 園區介紹＆相簿</h3>




        <div class="grid-container">
        <?php foreach ($index as $ind) { ?>

            <div class="small <?= $ind['name'] ?>" id="<?= $ind['name'] ?>" name="<?= $ind['name'] ?>">

                <h4 class="p-3 m-0 b-green rot-135 c_1 text-center text-white "><?= $ind['title'] ?></h4>
                <pre  class="push-2">
                    <h4><?= $ind['content'] ?></h4>
                </pre>
                <img src="<?= WEB_ROOT."/".$index_img[1]['path'] ?>" alt="" data-toggle="modal" data-target="#myModal_<?= $ind['id'] ?>">
                <div class="modal fade" id="myModal_<?= $ind['id'] ?>">
                    <div class="modal-dialog modal-lg modal-dialog-centered ">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                            <div id="demo" class="carousel slide" data-ride="carousel" data-interval="3000">

                                    <ul class="carousel-indicators">
                                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                                        <li data-target="#demo" data-slide-to="1"></li>
                                        <li data-target="#demo" data-slide-to="2"></li>
                                    </ul>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                        <?php for ($i = 1; $i < count($index_img); $i++) : ?>
                                            <img src='<?= WEB_ROOT."/".$index_img[$i]['path'] ?>' alt=''>
                                        <?php endfor; ?>                                     
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                        <span class="carousel-control-prev-icon"></span>
                                    </a>
                                    <a class="carousel-control-next" href="#demo" data-slide="next">
                                        <span class="carousel-control-next-icon"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php } ?>

            </div>

            <div class="big map">
                <div class="radioArea">
                    <input type="radio" name="radio" id="radio01">
                    <input type="radio" name="radio" id="radio02">
                    <input type="radio" name="radio" id="radio03">
                    <input type="radio" name="radio" id="radio04">
                    <input type="radio" name="radio" id="radio05">
                    <input type="radio" name="radio" id="radio06">
                    <input type="radio" name="radio" id="radio07">
                    <input type="radio" name="radio" id="radio08">
                    <input type="radio" name="radio" id="radio09">
                    <input type="radio" name="radio" id="radio10">
                    <input type="radio" name="radio" id="radio11">
                    <input type="radio" name="radio" id="radio12">
                    <input type="radio" name="radio" id="radio13">
                    <input type="radio" name="radio" id="radio14">
                </div>
            </div>
        </div>
    </div>















    <div class="box_tablet ">
        <h3 class="text-center text-white b-green rot-135 col-12 p-3 m-0" style="background-color: rgb(95, 185, 173);"> 薰衣草森林 園區介紹＆相簿</h3>
        <div class="grid-container">

            <div class="small grid_0<?= $ind['id'] ?>">
                    <h4 class="p-2 m-0 b-green rot-135 c_1 text-center text-white ">心中一畝田</h4>
                    <img src="./images/album/farm/farm_1.jpg" data-toggle="modal" data-target="#myModal_15">
                    <div class="modal fade" id="myModal_15">
                        <div class="modal-dialog modal-lg modal-dialog-centered ">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header m-auto">
                                    <p class="text-center text-secondary ">尊重自然，以友善大地的方式，<br>在山上自己種、自己吃，感謝大自然給予的食物。 <br>看著植物努力扎根，我們也找到自己想要的生活樣貌。</p>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div id="demo" class="carousel slide" data-ride="carousel" data-interval="3000">
                                        <!-- Indicators -->
                                        <ul class="carousel-indicators">
                                            <li data-target="#demo" data-slide-to="0" class="active"></li>
                                            <li data-target="#demo" data-slide-to="1"></li>
                                            <li data-target="#demo" data-slide-to="2"></li>
                                        </ul>
                                        <!-- The slideshow -->
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="./images/album/farm/farm_1.jpg">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="./images/album/farm/farm_2.jpg">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="./images/album/farm/farm_3.jpg">
                                            </div>
                                        </div>
                                        <!-- Left and right controls -->
                                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                            <span class="carousel-control-prev-icon"></span>
                                        </a>
                                        <a class="carousel-control-next" href="#demo" data-slide="next">
                                            <span class="carousel-control-next-icon"></span>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




            </div>
            <div class="big map">
                <div class="radioArea">
                    <input type="radio" name="radio" id="radio01">
                    <input type="radio" name="radio" id="radio02">
                    <input type="radio" name="radio" id="radio03">
                    <input type="radio" name="radio" id="radio04">
                    <input type="radio" name="radio" id="radio05">
                    <input type="radio" name="radio" id="radio06">
                    <input type="radio" name="radio" id="radio07">
                    <input type="radio" name="radio" id="radio08">
                    <input type="radio" name="radio" id="radio09">
                    <input type="radio" name="radio" id="radio10">
                    <input type="radio" name="radio" id="radio11">
                    <input type="radio" name="radio" id="radio12">
                    <input type="radio" name="radio" id="radio13">
                    <input type="radio" name="radio" id="radio14">
                </div>
            </div>
        </div>
    </div>

    <div class="box_cellphone">
        <div class="">
            <div class="small " id="map1">
                <h4 class="p-2 m-0 b-green rot-135 c_1 text-center text-white ">薰衣草森林園區導覽圖</h4>
                <img src="images/map/map_01.jpg" alt="">
            </div>
            <h2 class="p-2 mb-3 b-green rot-135 c_1 text-center text-white ">－ 園區相簿 －</h2>
            <div class="small">
                <h4 class="p-2 m-0 b-green rot-135 c_1 text-center text-white ">心中一畝田</h4>
                <div >
                    <p class="text-secondary">尊重自然，以友善大地的方式，<br>在山上自己種、自己吃，<br>感謝大自然給予的食物。 <br>看著植物努力扎根，<br>我們也找到自己想要的生活樣貌。</p>
                </div>

                <img src="./images/album/farm/farm_1.jpg" data-toggle="modal" data-target="#myModal_29">
                <div class="modal fade" id="myModal_29">
                    <div class="modal-dialog  modal-dialog-centered ">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                <div id="demo" class="carousel slide" data-ride="carousel" data-interval="3000">
                                    <!-- Indicators -->
                                    <ul class="carousel-indicators">
                                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                                        <li data-target="#demo" data-slide-to="1"></li>
                                        <li data-target="#demo" data-slide-to="2"></li>
                                    </ul>
                                    <!-- The slideshow -->
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="./images/album/farm/farm_1.jpg">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="./images/album/farm/farm_2.jpg">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="./images/album/farm/farm_3.jpg">
                                        </div>
                                    </div>
                                    <!-- Left and right controls -->
                                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                        <span class="carousel-control-prev-icon"></span>
                                    </a>
                                    <a class="carousel-control-next" href="#demo" data-slide="next">
                                        <span class="carousel-control-next-icon"></span>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <div class="big map"></div>

    </div>




</main>

<?php include __DIR__ . '/parts/scripts.php'; ?>
<script>
    //=============== weather ====================
    var dayNames = ["日", "一", "二", "三", "四", "五", "六"];
    const dbox = $('.dbox');
    const today = new Date().getDay();

    $(document).ready(function() {

        for (let i = 0; i < dbox.length; i++) {
            let j = (today + i) % 7;
            dbox.eq(i).text(dayNames[j]);
        }
    })



    $(document).ready(function() {
        let now = new Date();
        let j = 1,
            k = 1,
            m = 1,
            n = 1,
            o = 1,
            z = 1;
        $.get(
            "https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-075?Authorization=CWB-F5E9FA71-D4C6-46F3-A222-584C369CC864&locationName=%E6%96%B0%E7%A4%BE%E5%8D%80",
            function(objJson) {
                for (
                    let i = 0; i <
                    objJson.records.locations[0].location[0].weatherElement[0].time.length; i++
                ) {
                    let startTime =
                        objJson.records.locations[0].location[0].weatherElement[0].time[i]
                        .startTime;
                    let value =
                        objJson.records.locations[0].location[0].weatherElement[12].time[i]
                        .elementValue[0].value;
                    let valueN =
                        objJson.records.locations[0].location[0].weatherElement[8].time[i]
                        .elementValue[0].value;

                    let weather =
                        objJson.records.locations[0].location[0].weatherElement[6].time[i]
                        .elementValue[1].value;
                    let rain =
                        objJson.records.locations[0].location[0].weatherElement[0].time[i]
                        .elementValue[0].value;


                    //===================== 日期 =====================
                    date_str = startTime.substring(5, 10)
                    if (i % 2 == 1) {
                        $("#date" + j).text(date_str);
                        j++;
                    }

                    //===================== 氣溫 =====================
                    T_str = value.substring(0, 2);
                    if (i % 2 == 0) {
                        $("#DT" + k).text(T_str);
                        k++;
                    }
                    TN_str = valueN.substring(0, 2);
                    if (i % 2 == 0) {
                        $("#NT" + m).text(TN_str);
                        m++;
                    }
                    //===================== 降雨機率 =====================
                    P_str = rain.substring(0, 2)
                    if (i % 2 == 0) {
                        $("#DP" + n).text(P_str);
                        n++;
                    }

                    //===================== 氣象圖 =====================

                    if (weather > 0 && weather <= 1) {
                        $("#day_weather" + z).append('<img src="./images/weather/sun.svg">');
                    } else if (weather >= 2 && weather <= 3) {
                        $("#day_weather" + z).append('<img src="./images/weather/SunC.svg">');
                    } else if (weather >= 4 && weather <= 7) {
                        $("#day_weather" + z).append('<img src="./images/weather/cloudy.svg">');
                    } else if (weather >= 8 && weather <= 14) {
                        $("#day_weather" + z).append('<img src="./images/weather/rain.svg">');
                    } else if (weather = 15) {
                        $("#day_weather" + z).append('<img src="./images/weather/rainCLS.svg">');
                    } else if (weather >= 16 && weather <= 18) {
                        $("#day_weather" + z).append('<img src="./images/weather/rainCL.svg">');
                    } else if (weather = 19) {
                        $("#day_weather" + z).append('<img src="./images/weather/rainS.svg">');
                    } else if (weather = 20) {
                        $("#day_weather" + z).append('<img src="./images/weather/rain.gif">');
                    } else if (weather = 21) {
                        $("#day_weather" + z).append('<img src="./images/weather/rainCLS.svg">');
                    } else if (weather = 22) {
                        $("#day_weather" + z).append('<img src="./images/weather/rainCL.svg">');
                    } else if (weather >= 23) {
                        $("#day_weather" + z).append('<img src="./images/weather/snow.svg">');
                    } else if (weather >= 24 && weather <= 26) {
                        $("#day_weather" + z).append('<img src="./images/weather/sunC.svg">');
                    } else if (weather >= 27 && weather <= 28) {
                        $("#day_weather" + z).append('<img src="./images/weather/cloudy.svg">');
                    } else if (weather >= 29 && weather <= 32) {
                        $("#day_weather" + z).append('<img src="./images/weather/rainS.svg">');
                    } else if (weather >= 33 && weather <= 36) {
                        $("#day_weather" + z).append('<img src="./images/weather/rainCL.svg">');
                    } else if (weather = 37) {
                        $("#day_weather" + z).append('<img src="./images/weather/snow.svg">');
                    } else if (weather >= 38 && weather <= 39) {
                        $("#day_weather" + z).append('<img src="./images/weather/rain.svg">');
                    } else if (weather = 41) {
                        $("#day_weather" + z).append('<img src="./images/weather/rainCL.svg">');
                    }
                    z++;

                }

                let weather =
                    objJson.records.locations[0].location[0].weatherElement[6].time[0]
                    .elementValue[1].value;
                weather = parseInt(weather);
                // console.log('weather:', weather)
                if (weather > 0 && weather <= 1) {
                    $(".WD").append('<img src="./images/weather/B_sunny01.gif">');
                    $(".WDW").append('<i class="fas fa-leaf"></i><br>今天薰衣草森林是大晴天<br><i class="fas fa-paw"></i>^_^ <br>記得多喝水和防曬喔!   <br> <i class="fas fa-grin"></i>');
                } else if (weather >= 2 && weather <= 3) {
                    $(".WD").append('<img src="./images/weather/B_sunC.gif">');
                    $(".WDW").append('<i class="fas fa-leaf"></i><br>今天薰衣草森林是晴時多雲<br><i class="fas fa-paw"></i> <br>記得多喝水和防曬喔!   <br> <i class="fas fa-grin"></i> ');
                } else if (weather >= 4 && weather <= 7) {
                    $(".WD").append('<img src="./images/weather/B_cloud.gif">');
                    $(".WDW").append('<i class="fas fa-leaf"></i><br>今天薰衣草森林是陰天多雲<br><i class="fas fa-paw"></i> <br>也要注意紫外線和防曬喔!   <br> <i class="fas fa-grin"></i>');
                } else if (weather >= 8 && weather <= 14) {
                    $(".WD").append('<img src="./images/weather/B_rain01.gif">');
                    $(".WDW").append('<i class="fas fa-leaf"></i><br>今天薰衣草森林會有短暫陣雨<br><i class="fas fa-paw"></i> <br>出門別忘了帶傘喔!   <br> <i class="fas fa-grin"></i> ');
                } else if (weather = 15) {
                    $(".WD").append('<img src="./images/weather/B_storm.gif">');
                    $(".WDW").append('<i class="fas fa-leaf"></i><br>今天薰衣草森林會有雷陣雨  <br>出門別忘了帶傘喔!  <br> <i class="fas fa-grin"></i> ');
                } else if (weather >= 16 && weather <= 18) {
                    $(".WD").append('<img src="./images/weather/B_storm.gif">');
                    $(".WDW").append('<i class="fas fa-leaf"></i><br>今天薰衣草森林會有雷陣雨<br><i class="fas fa-paw"></i> <br>出門別忘了帶傘喔!  <br> <i class="fas fa-grin"></i> ');
                } else if (weather = 19) {
                    $(".WD").append('<img src="./images/weather/B_rain01.gif">');
                    $(".WDW").append('<i class="fas fa-leaf"></i><br>今天薰衣草森林會有晴午後局部陣雨<br><i class="fas fa-paw"></i> <br>出門別忘了帶傘喔!  <br> <i class="fas fa-grin"></i>');
                } else if (weather = 20) {
                    $(".WD").append('<img src="./images/weather/B_rain01.gif">');
                    $(".WDW").append('<i class="fas fa-leaf"></i><br>今天薰衣草森林會有多雲午後陣雨<br><i class="fas fa-paw"></i> <br>出門別忘了帶傘喔!  <br> <i class="fas fa-grin"></i> ');
                } else if (weather = 21) {
                    $(".WD").append('<img src="./images/weather/B_storm.gif">');
                    $(".WDW").append('<i class="fas fa-leaf"></i><br>今天薰衣草森林會有晴午後雷陣雨<br><i class="fas fa-paw"></i> <br>出門別忘了帶傘喔!  <br> <i class="fas fa-grin"></i>');
                } else if (weather = 22) {
                    $(".WD").append('<img src="./images/weather/B_storm.gif">');
                    $(".WDW").append('<i class="fas fa-leaf"></i><br>今天薰衣草森林會有多雲時晴雷陣雨<br><i class="fas fa-paw"></i> <br>出門別忘了帶傘喔!  <br> <i class="fas fa-grin"></i>');
                } else if (weather >= 23) {
                    $(".WD").append('<img src="./images/weather/B_snow4.gif">');
                    $(".WDW").append('<i class="fas fa-leaf"></i><br>今天薰衣草森林是晴有雨或雪<br><i class="fas fa-paw"></i> <br>出門別忘了帶傘和保暖喔!  <br> <i class="fas fa-grin"></i>');
                } else if (weather >= 24 && weather <= 26) {
                    $(".WD").append('<img src="./images/weather/B_sunC.gif">');
                    $(".WDW").append('<i class="fas fa-leaf"></i><br>今天薰衣草森林是晴時多雲有霧<br><i class="fas fa-paw"></i> <br>也要注意紫外線和防曬喔!   <br> <i class="fas fa-grin"></i>');
                } else if (weather >= 27 && weather <= 28) {
                    $(".WD").append('<img src="./images/weather/B_cloud.gif">');
                    $(".WDW").append('<i class="fas fa-leaf"></i><br>今天薰衣草森林是多雲時陰晨霧<br><i class="fas fa-paw"></i> <br>要注意路況，小心行駛喔!  <br> <i class="fas fa-grin"></i>');
                } else if (weather >= 29 && weather <= 32) {
                    $(".WD").append('<img src="./images/weather/B_rain01.gif">');
                    $(".WDW").append('<i class="fas fa-leaf"></i><br>今天薰衣草森林會有多雲局部陣雨<br><i class="fas fa-paw"></i> <br>出門別忘了帶傘和保暖喔!  <br> <i class="fas fa-grin"></i>');
                } else if (weather >= 33 && weather <= 36) {
                    $(".WD").append('<img src="./images/weather/B_storm.gif">');
                    $(".WDW").append('<i class="fas fa-leaf"></i><br>今天薰衣草森林會有陰時多雲局部陣雨或雷雨有霧<br><i class="fas fa-paw"></i> <br>天氣變化大，出門別忘了帶傘和保暖喔!  <br> <i class="fas fa-grin"></i>');
                } else if (weather = 37) {
                    $(".WD").append('<img src="./images/weather/B_snow.gif">');
                    $(".WDW").append('<i class="fas fa-leaf"></i><br>今天薰衣草森林會有雨或雪有霧<br><i class="fas fa-paw"></i> <br><br>天氣變化大，出門別忘了帶傘和保暖喔!  <br> <i class="fas fa-grin"></i>');
                } else if (weather >= 38 && weather <= 39) {
                    $(".WD").append('<img src="./images/weather/B_rain01.gif">');
                    $(".WDW").append('<i class="fas fa-leaf"></i><br>今天薰衣草森林會有短暫雨有霧<br><i class="fas fa-paw"></i> <br>出門別忘了帶傘喔!  <br> <i class="fas fa-grin"></i>');
                } else {
                    $(".WD").append('<img src="./images/weather/B_storm.gif">');
                    $(".WDW").append('<i class="fas fa-leaf"></i><br>今天薰衣草森林可能會有下雪、積冰、暴風雪<br><i class="fas fa-paw"></i>, <br>出門別忘了帶傘和保暖喔!  <br> <i class="fas fa-grin"></i>');
                }
                // console.log('weather:', weather)
            }

        );

    });
</script>
<script>
    $('input[type="radio"]').change(function() {
        $(".small").css({
            "border": ""
        });
        var number = this.id.replace("radio", "");
        console.log(this);
        $(".grid_" + number)[0].style = " border:10px solid orange;border-radius:10px"
    });
</script>
<script>
  fillData();
  function fillData(){
    console.log("read");
    $.post('staff_gallery-api.php', {
      'action': 'readAll'
    }, function(data){
      var formGallery = $("#formGallery");
      data['data'].forEach(function(elem){
        var img_output = "";
        if (elem['id'] in data['img']){
          data['img'][elem['id']].forEach(function(img_elem){
            img_output += `<img src='<?= WEB_ROOT."/" ?>${img_elem['path']}' alt=''>`;
          });
        }
        var output = `<div id="${elem['name']}" class="form-group con_01 my-5 row justify-content-center align-items-center">
                        <h3 class="col-sm-12  text-center "id="${elem['id']}">${elem["title"] }</h3>

                        <h4 class="col-sm-12 m-0 p-2 bg-dark text-white text-center">圖片</h4>

                        <div class="col-sm-12" id="show_${elem['name']}">
                            ${img_output}
                        </div>

                        <h4 class="col-sm-12 m-0 p-2 bg-dark text-white text-center">圖片說明</h4>

                        <textarea class=" form-control col-sm-12 p-3 m-0" id="content_${elem['name']}" name="" disabled cols="30" rows="5" >${elem["content"] }</textarea>
                        <textarea class=" form-control col-sm-12 p-3 m-0" id="content_${elem['name']}" name="" disabled cols="30" rows="5" >${elem["content_tablet"] }</textarea>
                        <textarea class=" form-control col-sm-12 p-3 m-0" id="content_${elem['name']}" name="" disabled cols="30" rows="5" >${elem["content_cellphone"] }</textarea>

                        <a class="text-center custom-btn btn-4 t_shadow" style="width:100%;border-radius: 0;transform: none;" href="staff_gallery_editor.php?id=${elem['id']}" target="_blank"><h4 class="m-2">修改</h4></a>


                      </div>`;
          $("#formGallery").append(output);    
      });
      

      // 圖片預覽
      // $("#preview #sortable").html("");
      // const files = data['img'];
      // for(var i = 0; i < files.length; i++){
      //   var file = files[i];
      //   if (file) {
      //     var img = ` <li class="ui-state-default" data-order="${i}">
      //                   <img class="preview_img" style="max-width: 120px; max-height: 120px" src="${file.path}" alt="your image" />
      //                 </li>`;
      //     $("#preview #sortable").append(img);
      //   }
      // }
    }, 'json').fail(function(data){
    })
  }
  function scroll(){
      console.log('test' + window.scrollY);
      if (location.href.indexOf("#<?= $ind['name']?>") > -1){
          window.scrollTo(0, window.scrollY - 152)
      }
  }


</script>

<script>
    $("#exampleModalCenter").modal('show');

    // updateStyle('nobordertop');
    </script>





<?php include __DIR__ . '/parts/html-foot.php'; ?>




