<?php require __DIR__ . '/parts/config.php'; ?>
<?php
$title = '會員中心';
$pageName = 'member';

// 
// 二維陣列
// [
//     [
//         id => 1,
//         name => "會員"
//     ],
//     [
//         id => 2,
//         name => "訂單"
//     ],
// ]


// 抓圖片
// print($helpdesk_img[$helpdesk['id']] ?? "" );


?>


<?php include __DIR__ . '/parts/html-head.php'; ?>
<link rel="stylesheet" href="./css/member.css">
<style>
    
</style>
<?php include __DIR__ . '/parts/navbar.php'; ?>


<body>
    <main>
        <div class="container my-5">
            <div class="row justify-content-center ">
                <div class="box  col-md-9 col-sm-12 m-2   p-0 ">

                        <div id="helpdeskRecord" class="tab-pane fade row ">
                            <form onsubmit="helpdeskRecord(); return false;">
                                <div class="hdItem  p-0 m-0">
                                </div>
                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>




    </main>

    <?php include __DIR__ . '/parts/scripts.php'; ?>



    <script>
        // helpdesk
        $.post('<?= WEB_API ?>/helpdesk-api.php', {
            'action': 'readCat',
        }, function(data){
            data.forEach(function (cat){
            var output = 
            `<option value="${cat['id']}">${cat['name']}</option>`;
            $("#helpdesk_select_id").append(output);
            });

        }, 'json').fail(function(data){
        })

        function helpdeskRecord(){
            $.post('<?= WEB_API ?>/helpdesk-api.php', {
                action: 'readAll',
                cat_id: $("#helpdesk_select_id").val(),
                year: $("#helpdesk_select_year").val(),
                month: $("#helpdesk_select_month").val(),
                status: $("#helpdesk_select_reply").val(),

            },function(result) {
                data = result['data'];
                img = result['img'];
                $(".hdItem").html("");
                data.forEach(function(hd){
                    var hdi_output = "";
                    var imgList = img[hd['id']] ?? [];
                    imgList.forEach(function(hdi){
                        hdi_output += `<div class="text-center fancybox d-flex row p-1 m-0"> 
                                            <a id="fancybox" href="${hdi['path']}"  data-fancybox='F_box1' data-caption= ''>
                                            <img width="120px" src="${hdi['path']}" alt=''  >
                                            </a>
                                        </div>`;
                    });



                    var output = `<div class="row mx-0 mb-4">
                                    <div class="col-md-12 bg-secondary text-white p-2">❤ ${ hd['status'] }：${ hd['replied_at'] ?? "" }</div>
                                    <div class="col-md-12"><div class="row m-0  py-2">圖片：${ hdi_output }</div> </div>
                                    <div class="col-md-12 py-2">
                                        <div>日期：<span>${ hd['created_at'] }</span></div>
                                        <div>信件主旨：<span>${ hd["topic"] } </span></div>
                                        <div>問題類型：<span>${ hd["cat_name"] }</span></div>
                                        <div>訂單編號：<span>${ hd["order_num"] }</span></div>
                                    </div>
                                    <div class="col-md-12  py-2">信件內容：
                                    <p>${ hd["content"] }</ｐ></div>
                                    <div class="reply_content col-md-12  py-2" style="background: #dcedd5">回覆內容：
                                    <p>${ hd["reply"] }</p></div>
                                </div>`;
                    $(".hdItem").append(output);
                })
            }, 'json')
            .fail(
                function(e) {
                    alert( "error" );
                    console.log(e.responseText);
            });
        }
    </script>

    <?php include __DIR__ . '/parts/html-foot.php'; ?>