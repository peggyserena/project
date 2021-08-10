<?php require __DIR__ . '/parts/config.php'; ?>
<?php
$title = '森林快報';
$pageName = 'news';
?>
<?php include __DIR__ . '/parts/html-head.php'; ?>
<link rel="stylesheet" href="./css/coupon.css">
<style>



</style>
<body id="body" class="dark-mode">


<?php include __DIR__ . '/parts/navbar.php'; ?>
    <main>
        <div class="container mt-5">
            <div class="cat_id_E">
                <h2 class="title1  b-green rot-135 c_1">
                    <span  id="cat_id_H" name="name"  >
                    </span>
                    <span  id="cat_id_E" name="name"  >
                    </span>
                </h2>
                <div id="accordion">
                    <div class="card">
                        <div class="card-header py-1 ">
                            <a class="card-link row   align-items-center  " data-toggle="collapse" href="#coupon_accordion">
                                <h4 id="name" name="name" class="col-lg-8 col-md-8 col-sm-12" ></h4>
                                <p class="col-lg-4 col-md-4 col-sm-12">
                                    <span id="start_date" name="start_date" ></span> ～
                                    <span id="end_date" name="end_date"></span>
                                </p>
                            </a>
                        </div>
                        <div id="coupon_accordion" class="collapse" data-parent="#accordion">
                        <img class="card-img-top m-0" id="coupon_img_cover" alt="Card image cap">

                            <div class="card-body">
                                <h4 class="card-title1 text-center "></h4>
                                <pre>
                                    <p id="content" name="content"class="card-text " ></p>
                                </pre>
                            </div>
                            <div class="card-footer">
                                <pre>
                                    <p id="notice" name="notice" class="text-muted"></p>
                                    <a id="link_address" name="link_address" href=""><p id="link_title" name="link_title"></p></a>
                                </pre>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            </div>

            <div class="text-center mt-5">
                <a class="text-center c_1 custom-btn btn-4" href="staff_coupon_editor.php?id=<?= $_GET['id']?>" target="_blank">修改</a>
            </div>


        </div>
    








    </main>

<?php include __DIR__ . '/parts/scripts.php'; ?>

<script>
    
    $(document).ready(function() {
        $.post('api/coupon-api.php', {
            action: 'read',
            id: <?= $_GET['id'] ?>
        }, function(result){
            data = result['data'];
            img = result['img'];
            console.log(result);
            list = [
                {
                    selector: "#cat_id_H",
                    text: data['fc_name'],
                },
                {
                    selector: "#cat_id_E",
                    text: data['fc_en_name'],
                },
                {
                    selector: "#coupon_img_cover",
                    attr: {
                        src: "<?= WEB_ROOT."/" ?>" + img[0]['path']
                    }
                },
                {
                    selector: "#name",
                    text: data['name'],
                },
                {
                    selector: "#start_date",
                    text: [data['start_date']],
                },
                {
                    selector: "#end_date",
                    text: [data['end_date']],
                },
                {
                    selector: "#content",
                    text: data['content'],
                },
                 {
                    selector: "#notice",
                    text: data['notice'],
                },
                 {
                    selector: "#link_address",
                    attr: {
                        href: data['link_address'],
                    }

                },
                 {
                    selector: "#link_title",
                    text: data['link_title'],
                },
            ]
            
            // map
            // {
            //     selector: "#coupon_name",
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

            img.forEach(function(data_img){
                var output = `<a href='<?= WEB_ROOT."/" ?>${data_img['path']}' data-fancybox='F_box1' data-caption=' ${data['name']}'>
                        <img src='<?= WEB_ROOT."/" ?>${data_img['path']}' alt=''>
                    </a>`
                $(".fancybox").append(output);
            })
                        
        }, 'json').fail(function(data){
        })
    });
</script>

<?php include __DIR__ . '/parts/html-foot.php'; ?>