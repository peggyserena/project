<?php require __DIR__ . '/parts/config.php'; ?>
<?php
$title = '確認森林體驗新增內容';
$pageName = 'staff_event_comfirm';


?>
<?php include __DIR__ . '/parts/staff_html-head.php'; ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
<link rel="stylesheet" href="./css/staff_event.css">
<?php include __DIR__ . '/parts/staff_navbar.php'; ?>
<style>


</style>
<div class="container my-5 p-0 ">
    <?php include "parts/transaction.php"?>
    <?php include "parts/modal.php"?>
    <div class="eventItem justify-content-center row box_shadow">
        <h2 class='text-center b-green rot-135 col-12 p-2 m-0 event_name'>
        </h2>

        <div class='col-lg-8 col-md-12 col-sm-12 m-0 p-0'>
            <div class=' p-0 m-0'>
                <img id="event_img_cover" src='' alt=''>
            </div>
        </div>
        <div class='col-lg-4 col-md-12 col-sm-12 row m-0 p-0 pop ' style="background-color: whitesmoke;">
            <div>

                <div class='col-12 p-3 mt-0 ml-0 mr-0 'style="margin-bottom:75px">
                    <div >
                        <p class="text-success">累積銷售數量： <span id="event_quantity"></span></p>

                        <p>活動類別：<span style="font-size:1.2rem">
                            <span class="ec_name"></span>
                        </p>
                        <p>日期：
                            <span style="font-size:1.2rem" class="event_datetime"></span>
                        </p>
                        <p>尚有名額/總額：
                            <span style="font-size:1.2rem" class="event_available_quantity"></span> 人
                        </p>
                        <p>單價：<span class="event_price" class="c_pink_t" style="font-size:1.2rem"></span>
                        </p>
                    </div>
                </div>
                <div class='col-12 p-0 m-0 priceBar01'>

                    <form class='' action='' method=''>
                        <div class='d-flex c_pink justify-content-around pt-2 pb-2 pl-4 pr-4 '>
                            <div class='d-flex align-items-center'>
                                <label for='' class='m-0 p-0'>
                                    <h4 class='m-0 pr-2'>參加人數</h4>
                                </label>
                                <input type='number' value='1' min='1' max="" name='quantity' id='event_quantity_input' style='width: 3rem; ' placeholder='1' class=''>
                            </div>
                            <button class='btn add-to-cart m-0 ' type="button" data-toggle="modal" data-target="#addToCartAlert" onclick="tr_addTransaction('event', 'cart', '<?= $_GET['id'] ?>')"><i class='fas fa-cart-plus'></i></button>
                            <button class='btn add-to-wishList m-0 ' type="button"  data-toggle="modal" data-target="#addToWishListAlert" onclick="tr_addTransaction('event', 'wishList', '<?= $_GET['id'] ?>')" ><i class='fas fa-heart' ></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



        <div class='col-lg-12 col-md-12 col-sm-12 m-0 p-0'>
            <div class="m-0">
                <h4 class=' m-0 text-center p-2 c_1 b-green rot-135' style="color:white; font-weight:600" id="event_title"></h4>
            </div>


            <div class='fancybox d-flex row p-0 m-0'>
                <a id="fancybox" href='' data-fancybox='F_box1' data-caption= ''>
                    <img src='' alt=''>
                </a>
            </div>

            <div class="eventContent m-0 p-md-5 p-sm-2">
                <p><span>活動類別：</span><span class="ec_name"></span></p>
                <p><span>合適年齡：</span><span id="event_age"></span></p>
                <p><span>集合地點：</span><span id="event_location"></span></p>
                <p><span>活動日期：</span><span class="event_datetime"></span></p>
                <p><span>開放人數：</span><span id="event_limitNum"></span>人</p>
                <p><span>尚有名額：</span><span class="event_available_quantity"></span>人</p>
                <p><span>活動費用：</span><span class="c_pink_t event_price"></span> 元/人</p>
                <p><span>報名方式：</span>現場報名、線上報名</p>
                <p><span>活動內容：</span><span id="event_content"></span></p>
                <pre>
                  <p><span><span id="event_description"></span></span></p>
                  <p><span>活動任務：<br></span><span id="event_info"></span></p>
                  <p><span>注意事項：<br></span><span id="event_notice"></span></p>
                </pre>
            </div>
              






        </div>
        
    </div>
    <div class="text-center mt-5">
      <a class="text-center c_1 custom-btn btn-4" id="event_edit_link" href="#" onclick="event_confirm()">確認</a>
    </div>


</div>
    <?php include __DIR__ . '/js/staff_scripts.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>

<script>
    
    $(document).ready(function() {
         $(".c_pink_t").each(function(ind, elem){
            $(elem).text(dallorCommas($(elem).text()) + "元");
        });
        scroll();
        $.post('api/event-api.php', {
            action: 'readTemp',
            id: <?= $_GET['id'] ?>
        }, function(data){
            console.log('read');
            console.log(data);
            img = "";
            if (data['img'].length > 0){
                img = data['img'][0]['path'];
            }
            list = [
                {
                    selector: ".event_name",
                    text: data['name'],
                },
                {
                    selector: "#event_img_cover",
                    attr: {
                        src: "<?= WEB_ROOT."/" ?>" + img
                    }
                },
                {
                    selector: "#event_quantity",
                    text: data['quantity_map'][data['name']],
                },
                {
                    selector: ".event_datetime",
                    text: `${data['date']} ${data['time'].substr(0, 5)}`,
                },
                {
                    selector: ".event_available_quantity",
                    text:`${data['limitNum'] - data['quantity']}/${data['limitNum']}`,
                },
                {
                    selector: ".event_price",
                    text: data['price'],
                },
                {
                    selector: "#event_quantity_input",
                    attr: {
                        max: data['limitNum'] - data['quantity'],
                    },
                },
                {
                    selector: "#event_title",
                    attr: {
                        max: data['title'],
                    },
                },
                {
                    selector: "#fancybox",
                    attr: {
                        "data-caption": data['name'],
                        href: data['video'],
                    },
                },
                {
                    selector: "#fancybox img",
                    attr: {
                        src: `<?= WEB_ROOT ?>/${data['video_img']}`,
                    },
                },
                {
                    selector: ".ec_name",
                    text: data['ec_name'],
                },
                {
                    selector: "#event_age",
                    text: data['age'],
                },
                {
                    selector: "#event_location",
                    text: data['location'],
                },
                {
                    selector: "#event_limitNum",
                    text: data['limitNum'],
                },
                {
                    selector: "#event_content",
                    text: data['content'],
                },
                {
                    selector: "#event_description",
                    text: data['description'],
                },
                {
                    selector: "#event_info",
                    text: data['info'],
                },
                {
                    selector: "#event_notice",
                    text: data['notice'],
                },
            ]
            
            // map
            // {
            //     selector: "#event_name",
            //     attr: {
            //         text: data['name']
            //     }
            // }
            list.forEach(function(m){
                // attr
                // attr: {
                //         src: <?= WEB_ROOT."/" ?>data['img'][0]['path']
                //     }
                if ('text' in m){
                    $(m['selector']).text(m['text']);
                }
                if ('value' in m){
                    $(m['selector']).value(m['value']);
                }
                for (attr_key in m['attr']){
                    // fill_key = 'src'
                    // m['attr']['src']
                    $(m['selector']).attr(attr_key, m['attr'][attr_key]);
                }
            });

            data['img'].forEach(function(data_img){
                var output = `<a href='<?= WEB_ROOT."/" ?>${data_img['path']}' data-fancybox='F_box1' data-caption=' ${data['name']}'>
                        <img src='<?= WEB_ROOT."/" ?>${data_img['path']}' alt=''>
                    </a>`
                $(".fancybox").append(output);
            })
            
            
        }, 'json').fail(function(data){
            console.log('error');
            console.log(data);
        })
    });
    function event_confirm(){
        $.post('api/event-api.php', {
            action: 'confirm',
            id: <?= $_GET['id'] ?>
        }, function(data){
            modal_init();
            insertPage("#modal_img", "animation/animation_success.html");
            insertText("#modal_content", "森林體驗成功確認!");
            $("#modal_alert").modal("show");
            setTimeout(function(){location.href = `event.php`}, 2000);
        });
    }
</script>

<script>
    $(document).ready(function() {
         $(".c_pink_t").each(function(ind, elem){
            $(elem).text(dallorCommas($(elem).text()) + "元");
        });
        scroll();
    });
    </script>
<?php include __DIR__ . '/parts/html-foot.php'; ?>