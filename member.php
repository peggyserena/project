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
<?php
$sql = "SELECT * FROM members WHERE id=" . $_SESSION['user']['id'];
$r = $pdo->query($sql)->fetch();

?>
<link rel="stylesheet" href="./css/member.css">
<style>
    
</style>
<?php include __DIR__ . '/parts/navbar.php'; ?>


<body>
    <main>
        <div class="container my-5">
            <div class="row justify-content-center ">
                <div class="box  col-md-9 col-sm-12 m-2   p-0 ">
                    <ul id="myTab" class="nav nav-tabs t_shadow ">
                        <li class="active b-green rot-135"><a data-toggle="tab" href="#profile"> <h3 class="m-0">會員中心</h3></a></li>
                        <li class="b-green rot-135"><a data-toggle="tab" href="#tradeRecord"><h3 class="m-0">交易訂單查詢</h3></a></li>
                        <li class="b-green rot-135"><a data-toggle="tab" href="#wishList"><h3 class="m-0">我的收藏</h3></a></li>
                        <li class="b-green rot-135"><a data-toggle="tab" href="#coupon"><h3 class="m-0">購物金查詢</h3></a></li>
                        <li class="b-green rot-135"><a data-toggle="tab" href="#helpdeskRecord"><h3 class="m-0">客服紀錄</h3></a></li>
                        <li class="b-green rot-135"><a data-toggle="tab" href="#setting"><h3 class="m-0">通知設定</h3></a></li>
                    </ul>

                    <div id="myTabContent" class="tab-content">



                        <!-- ================================ 會員中心 ================================ -->



                        <div id="profile" class="tab-pane fade in active">
                            <div class="col-md-8 col-sm-12  m-0 p-0 m-auto ">
                                <form name="form1" method="post">
                                    <div class="form-group">
                                        <label for="email">帳號 ( email )： </label><span><?= $r['email'] ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="fullname">姓名： </label><span><?= $r['fullname'] ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">性別： </label><span><?= $r['gender'] ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="birthday">生日： </label><span><?= $r['birthday'] ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="mobile">手機： </label><span><?= $r['mobile'] ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="email_2nd">備用email： </label><span><?= $r['email_2nd'] ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="zipcode">地址： </label><span><?= $r['zipcode'] ?></span><span><?= $r['county'] ?></span><span><?= $r['district'] ?></span><span><?= htmlentities($r['address']) ?></span>
                                    </div>

                                    <div  class="text-center"><a href="memberEditor.php" class="custom-btn btn-4 t_shadow text-center">修改</a>
                                    </div>
                                </form>
                            </div>
                        </div>



                        <!-- ================================ 交易訂單查詢 ================================ -->



                        <div id="tradeRecord" class="tab-pane fade">
                            
                            <div><span style="font-size: 1.3rem;">交易期間：</span><input type="date" id="start_date">　～　<input type="date" id="end_date"><button type="submit" onclick="readOrder()" class="custom-btn btn-4 t_shadow ml-4">查詢</button> </div>

                            <div class="mt-4">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr class="b-green rot-135 text-white">
                                            <th scope="col" class="m-0 t_shadow text-center">訂單編號</th>
                                            <th scope="col" class="m-0 t_shadow text-center">訂單日期</th>
                                            <th scope="col" class="m-0 t_shadow text-center">金額</th>
                                            <th scope="col" class="m-0 t_shadow text-center">狀態</th>
                                            <th scope="col" class="m-0 t_shadow text-center">查詢</th>
                                            <th scope="col" class="m-0 t_shadow text-center">取消</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <!-- ================================ 我的收藏查詢 ================================ -->



                        <div id="wishList" class="tab-pane fade">
                            <div class=" text-center">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr class="b-green rot-135 text-white">
                                            <th scope="col" class="m-0 t_shadow text-center">類型</th>
                                            <th scope="col" class="m-0 t_shadow text-center">
                                                項目名稱
                                            </th>
                                            <th scope="col" class="m-0 t_shadow text-center">日期／時間</th>
                                            <th scope="col" class="m-0 t_shadow text-center">單價</th>
                                            <th scope="col" class="m-0 t_shadow text-center">前往</th>
                                            <th scope="col" class="m-0 t_shadow text-center"><i class="fas fa-trash-alt"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                                <h3 class="custom-btn btn-4  c_1" ><a href="javascript:" id="" class="text-white"  onclick="deleteWishListAll()">清空</a></h3>

                            </div>
                        </div>




                        <!-- ================================ 購物金查詢 ================================ -->

                        <div id="coupon" class="tab-pane fade">
                            <div class=" text-center">
                                <div class=" " id="searchBar" >
                                    <form>
                                        <ul class="list-unstyled  row justify-content-center align-items-center p-2 m-0 ">
                                            <li class=" ">
                                                <select id="select_cat_id" name='cat_id'>
                                                    <option disabled hidden value="">活動類別</option>
                                                    <option value="all">全部</option>
                                                </select>
                                            </li>
                                            <li class="">

                                                <select id="select_year" name="year">
                                                    <option disabled hidden value="">年份</option>
                                                    <option value="all">全部</option>
                                                    <option value=""></option>
                                                    <option value=""></option>
                                                    <option value=""></option>
                                                    <option value=""></option>
                                                    <option value=""></option>
                                                    <option value=""></option>
                                                    <option value=""></option>
                                                </select>
                                            </li>
                                            <li class="">
                                                <select id="select_month" name="month">
                                                    <option disabled hidden selected value="">月份</option>
                                                    <option value="all">全部</option>
                                                    <option value=""></option>
                                                    <option value=""></option>
                                                    <option value=""></option>
                                                    <option value=""></option>
                                                    <option value=""></option>
                                                    <option value=""></option>
                                                    <option value=""></option>
                                                    <option value=""></option>
                                                    <option value=""></option>
                                                    <option value=""></option>
                                                    <option value=""></option>
                                                    <option value=""></option>
                                                </select>
                                            </li>
                                            <li class="bg-green">
                                                <select id="select_order" name="order">
                                                    <option disabled hidden selected value="">排序</option>
                                                    <option value="1" <?= $_GET['order'] ?? "" == 1 ? "selected" : "" ?>>暢銷度由高至低</option>
                                                    <option value="2" <?= $_GET['order'] ?? "" == 2 ? "selected" : "" ?>>價錢由低至高</option>
                                                    <option value="3" <?= $_GET['order'] ?? "" == 3 ? "selected" : "" ?>>價錢由高至低</option>
                                                </select>
                                            </li>
                                            <li><button type="button" class="custom-btn btn-4 m-0 p-0" style="width:3rem; " onclick="readData()">送出</button></li>
                                        </ul>
                                    </form>
                                </div>

                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr class="b-green rot-135 text-white">
                                            <th scope="col" class="m-0 t_shadow text-center" style="width: 10%;">序號</th>
                                            <th scope="col" class="m-0 t_shadow text-center">優惠項目</th>
                                            <th scope="col" class="m-0 t_shadow text-center">金額</th>
                                            <th scope="col" class="m-0 t_shadow text-center">使用期限</th>
                                            <th scope="col" class="m-0 t_shadow text-center">使用日</th>
                                            <th scope="col" class="m-0 t_shadow text-center">餘額</th>
                                            <th scope="col" class="m-0 t_shadow text-center">備註</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <!-- ================================ 客服紀錄 ================================ -->

                        <div id="helpdeskRecord" class="tab-pane fade row ">
                            <form onsubmit="helpdeskRecord(); return false;">
                                <div id="searchBar" class="m-0 p-0">

                                
                                    <ul class="p-2 m-auto row list-unstyled justify-content-center align-items-center ">
                                        <li class=" " >
                                            <select id="helpdesk_select_id" name='cat_id'>
                                                <option value=""disabled hidden selected>問題類別</option>
                                                <option value="all">全部</option>
      
                                            </select>
                                        </li>
                                        <li class="">
                                            <select id="helpdesk_select_year" name="year">
                                                <option value=""disabled hidden selected>年份</option>
                                                <option value="all">全部</option>
                                                <option value=""></option>
                                                <option value=""></option>
                                                <option value=""></option>
                                                <option value=""></option>
                                            </select>
                                        </li>
                                        <li class="">
                                            <select id="helpdesk_select_month" name="month">
                                                <option value=""disabled hidden selected>月份</option>
                                                <option value="all">全部</option>
                                                <option value=""></option>
                                                <option value=""></option>
                                                <option value=""></option>
                                                <option value=""></option>
                                                <option value=""></option>
                                                <option value=""></option>
                                                <option value=""></option>
                                                <option value=""></option>
                                                <option value=""></option>
                                                <option value=""></option>
                                                <option value=""></option>
                                                <option value=""></option>
                                            </select>
                                        </li>
                                        <li class="">
                                            <select id="helpdesk_select_reply" name="reply">
                                                <option value=""disabled hidden selected>回覆狀態</option>
                                                <option value="all">全部</option>
                                                <option value="已回覆">已回覆</option>
                                                <option value="未回覆">未回覆</option>
                                            </select>
                                        </li>

                                        <li><button type="submit" class="custom-btn btn-4 m-0 p-0" style="width:3rem; ">送出</button></li>
                                    </ul>
                                </div>
                                <div class="bar bg-secondary text-white py-2 align-items-center row m-0 ">
                                        <div class="col-sm-2 text-center ">圖片</div>
                                        <div class="col-sm-3 text-center ">來信時間</div>
                                        <div class="col-sm-5">信件主旨</div>
                                        <div class="col-sm-2 text-center">回覆狀態</div>
                                    </div>

                                <div class="hdItem  p-0 m-0">
                                </div>
                            </form>
                        </div>



                        <!-- ================================ 通知設定 ================================ -->

                        <div id="setting" class="tab-pane fade row mb-5">
                            <ul class="m-auto  col-md-9 col-sm-12 ">
                                    <li class="d-flex align-items-center justify-content-between mt-3 ">
                                        <p>訂閱電子報</p>
                                        <div class="toggle toggle-knob ">
                                            <input type="checkbox" id="toggle-knob1" class="toggle-checkbox">
                                            <label class="toggle-btn" for="toggle-knob1"><p class="toggle-feature" data-label-on="on"  data-label-off="off"></p></label>
                                        </div>
                                    </li>
                                    <li class="d-flex align-items-center justify-content-between mt-3 ">
                                        <p>手機 簡訊通知</p>
                                        <div class="toggle toggle-knob ">
                                            <input type="checkbox" id="toggle-knob2" class="toggle-checkbox">
                                            <label class="toggle-btn" for="toggle-knob2"><p class="toggle-feature" data-label-on="on"  data-label-off="off"></p></label>
                                        </div>
                                    </li>
                                    <li class="d-flex align-items-center justify-content-between mt-3 ">
                                        <p>LINE 簡訊通知</p>
                                        <div class="toggle toggle-knob ">
                                            <input type="checkbox" id="toggle-knob3" class="toggle-checkbox">
                                            <label class="toggle-btn" for="toggle-knob3"><p class="toggle-feature" data-label-on="on"  data-label-off="off"></p></label>
                                        </div>
                                    <li class="d-flex align-items-center justify-content-between mt-3 ">
                                        <p>Facebook Messager 簡訊通知</p>
                                        <div class="toggle toggle-knob ">
                                            <input type="checkbox" id="toggle-knob4" class="toggle-checkbox">
                                            <label class="toggle-btn" for="toggle-knob4"><p class="toggle-feature" data-label-on="on"  data-label-off="off"></p></label>
                                        </div>
                                    </li>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>




    </main>

    <?php include __DIR__ . '/parts/scripts.php'; ?>

    <!------------------------------------- document ready ------------------------------------->
    <script>
        $(function() {
            // 呈現數量
            quantity.each(function() {
                const qty = $(this).attr('data-qty') * 1;
                $(this).val(qty);
            });

            calPrices();
            getWishList();
            helpdeskRecord();
            readCat();
        });
    </script>

    <!------------------------------------- trade record ------------------------------------->

    <script>
        const quantity = $('select.quantity');

        // 計算並呈現價格
        const calPrices = function() {
            let total = 0;
            $('tbody>tr').each(function() {
                const $price = $(this).find('.price');
                const price = $price.attr('data-price') * 1;
                $price.text('$ ' + dallorCommas(price));

                const qty = $(this).find('.quantity').val() * 1;

                $(this).find('.sub-total').text('$ ' + dallorCommas(price * qty));
                total += price * qty;
                console.log(price);
                console.log(qty);
                console.log(total);
            });
            $('.totalPrice').text('$ ' + dallorCommas(total));
        };
    </script>
    <script>
        function readOrder(){
            var start_date = $("#start_date").val();
            var end_date = $("#end_date").val();
            $.post('<?= WEB_API ?>/order-api.php', {
                action: 'read',
                start_date: start_date,
                end_date: end_date
            },function(data) {
                $("#tradeRecord table tbody").html("");
                console.log(data);
                var maxLength = 12;
                data.forEach(function(elem){
                    var order_id = "";
                    var status_class = "";
                    if (elem['status'] == "已取消"){
                        status_class = "text-danger";
                    }
                    var tr = `<tr>
                            <td class="order_id text-center">${elem['order_id']}</td>
                            <td class="order_date text-center">${elem['create_datetime']}</td>
                            <td class="order_price text-left">${dallorCommas(elem['price'])}</td>
                            <td class="order_status text-center ${status_class}">${elem['status']}</td>
                            <td class="order_status text-center "><a href="cart-confirm.php?id=${elem['id']}&type='search'">查詢</a></td>
                            <td class="order_status text-center "><a onclick="orderCancel(${elem['order_id']})">取消</a></td>
                        </tr>`;
                    $("#tradeRecord table tbody").append(tr);
                });
                
                
            }, 'json')
            .fail(
                function(e) {
                    alert( "error" );
                    console.log(e.responseText);
            });
        }

        function orderCancel(order_id){
            if (!confirm("確定刪除?")) return 0;
            $.post('<?= WEB_API ?>/order-api.php', {
                action: 'cancel',
                order_id
            },function(data) {
                console.log(data);
                if ("info" in data){
                    alert(data["info"]);
                }else{
                    alert("取消成功");
                    location.reload();
                }
            }, 'json')
            .fail(
                function(e) {
                    alert( "error" );
                    console.log(e.responseText);
            });
        }
        
        $("#end_date").val(getFormattedDate(new Date()));
        
        function getFormattedDate(d){
            var formatted_month = (d.getMonth() + 1).toString().padStart(2, "0");
            var formatted_date = (d.getDate()).toString().padStart(2, "0");
            var formatted_date = `${d.getFullYear()}-${formatted_month}-${formatted_date}`;
            return formatted_date;
        }


    </script>


    <!------------------------------------- wish list ------------------------------------->

    <script>

        function getWishList(){
            $.post('<?= WEB_API ?>/wishList-api.php', {
                action: 'read'
            }, function(data){
                
                console.log("data");
                console.log(data);
                data.forEach(function(elem){
                    var output = "";
                    var type_map = {restaurant: "森林咖啡館", event: "森林體驗", hotel: "夜宿薰衣草森林"};
                    var goToWhere = `${elem['type']}.php`;
                    switch (elem['type']){
                        case 'event':
                            goToWhere += `#event_${elem['id']}`;
                            break;
                        case "hotel":
                            goToWhere += `#reservation`;
                            break;
                        case "restaurant":
                            goToWhere += `#bookSeat`;
                            break;
                    }
                    output += "<td>" + type_map[elem['type']] + "</td>";
                    output += "<td>" + elem['name'] + "</td>";
                    output += "<td>" + elem['date'] + "/" + elem['time'].slice(0, 5) + "</td>";
                    output += "<td>" + dallorCommas(elem['price']) + "</td>";
                    output += `<td><a href="${goToWhere}"><i class="fas fa-trash-alt"></i></a></td>`;
                    output += '<td><a href="javascript:" onclick="deleteWishList(event,' + elem['wish_list_id'] + ')"><i class="fas fa-trash-alt"></i></a></td>';
                    output = '<tr>' + output + '</tr>';
                    $("#wishList table tbody").append(output);
                    console.log(output);
                });
            }, 'json')
        }
        function deleteWishList(hd, id){
            let t = $(hd.currentTarget);
            $.post('<?= WEB_API ?>/wishList-api.php', {
                action: 'delete',
                id: id,
            }, function(data){
                
                t.closest('tr').remove();
            }, 'json').fail(function(e){
            })
        }
        function deleteWishListAll(){
            $.post('<?= WEB_API ?>/wishList-api.php', {
                action: 'deleteAll',
            }, function(data){
                location.reload();
            }, 'json').fail(function(e){
            })
        }

    </script>


    <!------------------------------------- coupon ------------------------------------->

    <script>
        function coupon(){
            $.post('<?= WEB_API ?>/coupon-api.php', {
                action: 'readAll',
                cat_id: $("#cat_id").val(),
                year: $("#year").val(),
                month: $("#month").val(),
            },function(data) {
                console.log(data);
                coupon_list = data['data'];
                $("#coupon table tbody").html("");
                coupon_list.forEach(function(coupon, index){
                    var output = `<tr>
                            <td class="text-secondary"  ;">${index + 1}</td>
                            <td>${coupon['cc_name']}</td>
                            <td>${coupon['price']}</td>
                            <td>${coupon['start_date']} ～ ${coupon['end_date']}</td>
                            <td>${coupon['used_date'] ?? ''}</td>
                            <td>${coupon['balance']}</td>
                            <td>${coupon['note']}</td>
                            </tr>`;
                    $("#coupon table tbody").append(output);
                });
            }, 'json')
        }
        function readCat(){
            $.post('api/coupon-api.php', {
                action: 'readCat',
            }, function(result){
                
                var selected_cat_id = parseInt("<?= $_GET['cat_id'] ?? ''?>");
                result.forEach(function(elem){
                    output = `<option value='${elem['id']}' ${selected_cat_id == elem['id'] ? "selected" : ""}>${elem['name']}</option>`;
                    $("#select_cat_id").append(output);
                })
                coupon();
            }, 'json').fail(function(data){
            })
        }
        
    </script>


    <!------------------------------------- helpdesk ------------------------------------->

    <script>
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
                console.log(img);
                $(".hdItem").html("");
                data.forEach(function(hd){
                    var hdi_output_members = "";
                    var hdi_output_staff = "";
                    var imgList_members = img['members'][hd['id']] ?? [];
                    var imgList_staff = img['staff'][hd['id']] ?? [];
                    console.log([img['members'], img['members'][hd['id']], hd['id']]);
                    imgList_members.forEach(function(hdi){
                        hdi_output_members += `<div class="text-center fancybox d-flex row p-1 m-0"> 
                                            <a id="fancybox" href="${hdi['path']}"  data-fancybox='F_box1' data-caption= ''>
                                            <img width="120px" src="${hdi['path']}" alt=''  >
                                            </a>
                                        </div>`;
                    });
                    
                    console.log(hdi_output_members);
                    imgList_staff.forEach(function(hdi){
                        hdi_output_staff += `<div class="text-center fancybox p-1 m-0" > 
                                            <a id="fancybox" href="${hdi['path']}"  data-fancybox='F_box1' data-caption= ''>
                                            <img width="120px" src="${hdi['path']}" alt=''  >
                                            </a>
                                        </div>`;
                    });



                    var output = `<a href="#a${ hd['id'] }" class=" " data-toggle="collapse">
                                      <div class="bar justify-content-center align-items-center text-secondary row m-0">
                                        <div class="col-sm-2 text-center"><img width="120px" class="p-1" src="${ imgList_members.length != 0 ? imgList_members[0]['path'] : '' }"/></div>
                                        <div class="col-sm-3 text-center ">${ hd['created_at'] ?? "" }</div>
                                        <div class="col-sm-5">${ hd["topic"] }</div>
                                        <div class="col-sm-2 text-center">❤ ${ hd['status'] }</div>
                                      </div>
                                    </a>
                    
                    
                    
                                 <div class=" collapse row mx-0 mb-4" id="a${ hd['id'] }">
                                    <div class="col-md-12 text-white p-2" style="background-color: #83a573">❤ ${ hd['status'] }：${ hd['replied_at'] ?? "" }</div>
                                    <div class="col-md-12"><div class="row m-0  py-2">圖片：${ hdi_output_members }</div> </div>
                                    <div class="col-md-12 py-2  " >
                                        <div>日期：<span>${ hd['created_at'] }</span></div>
                                        <div>信件主旨：<span>${ hd["topic"] } </span></div>
                                        <div>問題類型：<span>${ hd["cat_name"] }</span></div>
                                        <div>訂單編號：<span>${ hd["order_num"] }</span></div>
                                    </div>
                                    <div class="col-md-12  py-2">信件內容：
                                    <p>${ hd["content"] }</ｐ></div>
                                    <div class="reply_content col-md-12  py-2" style="background: #dcedd5">回覆內容：
                                    <pre><p>${ hd["reply"] }</p></pre></div>
                                    <div class="d-flex" style="flex-wrap: wrap;">${hdi_output_staff}</div>
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

    <!------------------------------------- helpdesk search bar 設定 ------------------------------------->
    <script>
        var date = new Date();
        var year = date.getFullYear() - 3;
        var month = 1;
        var selectedMonth = "<?= $_GET['month'] ?? "" ?>";
        var selectedYear = "<?= $_GET['year'] ?? "" ?>";
        var selectedId = "<?= $_GET['cat_id'] ?? "" ?>";
        $("#helpdesk_select_month option").each(function(ind, elem) {
            if (ind > 1) {
                elem.text = month;
                elem.value = month;
                month++;
            }
            if (month > 12) {
                month = 1;
            }
            if (elem.value === selectedMonth){
                elem.selected = true;
            }
        });
        $("#helpdesk_select_year option").each(function(ind, elem) {
            if (ind === 2){
                elem.text = "之前";
                elem.value = `~${year}`;
            }else if (ind === 1) {
                elem.text = "全部";
                elem.value = "all";
                year++;
            }else if (ind > 0) {
                elem.text = year;
                elem.value = year;
                year++;
            }
            if (elem.value === selectedYear){
                elem.selected = true;
            }
        });
        $("#helpdesk_select_id").val(selectedId);
    </script>

    <!------------------------------------- member ------------------------------------->
    <script>
        var date = new Date();
        var year = date.getFullYear() - 3;
        var month = date.getMonth() + 1;
        var selectedMonth = "<?= $_GET['month'] ?? "" ?>";
        var selectedYear = "<?= $_GET['year'] ?? "" ?>";
        var selectedId = "<?= $_GET['cat_id'] ?? "" ?>";
        var selectedOrder = "<?= $_GET['order'] ?? "" ?>";
        $("#select_month option").each(function(ind, elem) {
            if (ind > 1) {
                elem.text = month;
                elem.value = month;
                month++;
            }
            if (month > 12) {
                month = 1;
            }
            if (elem.value === selectedMonth){
                elem.selected = true;
            }
        });
        $("#select_year option").each(function(ind, elem) {
            if (ind == 2){
                elem.text = "之前";
                elem.value = `~${year}`;
            }else if (ind > 2) {
                elem.text = year;
                elem.value = year;
                year++;
            }
            if (elem.value === selectedYear){
                elem.selected = true;
            }
        });
        $("#select_id").val(selectedId);
        $("#select_order").val(selectedOrder);
    </script>
    <!------------------------------------- 進入各tab內頁 ------------------------------------->

    <script>
        console.log(location.search.replace('?tab=', ''))

        const nowTab = location.search.replace('?tab=', '');
        if (nowTab === '') {
            $('#myTab li:eq(0) a').tab('show');
        }
        if (nowTab === 'tradeRecord') {
            $('#myTab li:eq(1) a').tab('show');
        }
        if (nowTab === 'wishList') {
            $('#myTab li:eq(2) a').tab('show');
        }

        if (nowTab === 'coupon') {
            $('#myTab li:eq(3) a').tab('show');
        }
        if (nowTab === 'helpdeskRecord') {
            $('#myTab li:eq(4) a').tab('show');
        }
        if (nowTab === 'setting') {
            $('#myTab li:eq(5) a').tab('show');
        }

    </script>

    <?php include __DIR__ . '/parts/html-foot.php'; ?>