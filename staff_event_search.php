<?php

require __DIR__ . '/parts/config.php';

?>

<?php
$title = '森林體驗查詢';
$pageName = 'event';


?>
<?php include __DIR__ . '/parts/staff_html-head.php'; ?>
<?php include __DIR__ . '/parts/staff_navbar.php'; ?>
<style>
    form ul{
        justify-content: center;

    }
    form li {
        list-style: none;
        padding: 0.5rem;
    }
    td{
        padding:0
    }

    .con_01 {
        background-color: whitesmoke;
    }


</style>



<body>
 
<div class="container">
        <div class="con_01">
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
                        <li class=" ">
                            <select  id="select_time" name="time">
                                <option disabled hidden selected value="">時段</option>
                                <option value="all">全部</option>
                                <option value="00:00-10:00" <?= $_GET['time'] ?? "" === "00:00-10:00" ? "selected" : "" ?>>10:00~之前</option>
                                <option value="10:00-12:00"  <?= $_GET['time'] ?? "" === "10:00-12:00" ? "selected" : "" ?>>10:00~12:00</option>
                                <option value="12:00-14:00"  <?= $_GET['time'] ?? "" === "12:00-14:00" ? "selected" : "" ?>>12:00~14:00</option>
                                <option value="14:00-16:00"  <?= $_GET['time'] ?? "" === "14:00-16:00" ? "selected" : "" ?>>14:00~16:00</option>
                                <option value="16:00-18:00"  <?= $_GET['time'] ?? "" === "16:00-18:00" ? "selected" : "" ?>>16:00~18:00</option>
                                <option value="18:00-23:59"  <?= $_GET['time'] ?? "" === "18:00-23:59" ? "selected" : "" ?>>18:00~之後</option>
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

            <div class="eventItem  p-0 m-0">
                    <table id="result" class="table table-bordered table-Primary table-hover text-center">
                            <thead class="thead-dark">
                                <tr>
                                    <th>序號</th>
                                    <th>主圖片</th>
                                    <th>活動名稱</th>
                                    <th>活動類別</th>
                                    <th>日期</th>
                                    <th>人數</th>
                                    <th>費用</th>
                                    <th>詳情</th>
                                    <th>修改</th>
                                    <th scope="col" class="m-0 t_shadow text-center"><i class="fas fa-trash-alt"></i></th>

                
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="event_data" style="display: none;">
                                    <td class="bg-dark text-white event_count_num" style="border: #454d55 1px solid ;"></td>
                                    <td ><img class="event_img_cover" src='' alt='' style="width: 120px;"></td>
                                    <td><span class="event_name"></span></td>
                                    <td><span class="ec_name"></span></td>
                                    <td><span class="event_date"></span></td>
                                    <td><span class="event_limitNum"></span></td>
                                    <td><span class="event_price"></span></td>
                                    <td><a class="event_detail_link" href="" target="blank">查詢</a></td>
                                    <td><a class="event_edit_link" href="" target="blank">修改</a></td>
                                    <td>
                                        <a class="evetn_delete_link"  href="#">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

            </div>

        </div>
  </div>
    <?php include __DIR__ . '/parts/staff_scripts.php'; ?>

    <script>
        var date = new Date();
        var year = date.getFullYear() - 3;
        var month = date.getMonth() + 1;
        var selectedMonth = "<?= $_GET['month'] ?? "" ?>";
        var selectedYear = "<?= $_GET['year'] ?? "" ?>";
        var selectedId = "<?= $_GET['cat_id'] ?? "" ?>";
        var selectedTime = "<?= $_GET['time'] ?? "" ?>";
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
        $("#select_time").val(selectedTime);
        $("#select_order").val(selectedOrder);
    </script>

    <script>
        const deleteItem = function(event, id) {
            let t = $(event.currentTarget);
            $.post('<?= WEB_API ?>/event-api.php', {
                action: 'delete',
                id
            }, function(data) {
                console.log(data);
                if ("message" in data){
                    alert(data['message']);
                }else{
                    t.closest('tr').remove();
                    // location.reload();  // 刷頁面
                    if ($('tbody>tr').length < 1) { 
                        //location.reload(); // 重新載入
                    }
                }
            }, 'json').fail(function(e){
            });
       };
    </script>


    <script>
        function readCat(){
            $.post('api/event-api.php', {
                action: 'readCat',
            }, function(result){
                
                var selected_cat_id = parseInt("<?= $_GET['cat_id'] ?? ''?>");
                result.forEach(function(elem){
                    output = `<option value='${elem['id']}' ${selected_cat_id == elem['id'] ? "selected" : ""}>${elem['name']}</option>`;
                    $("#select_cat_id").append(output);
                })
                readData();
            }, 'json').fail(function(data){
            })
        }
        function readData(){
            $.post('api/event-api.php', {
                action: 'readAll',
                year: $("#select_year").val(),
                month: $("#select_month").val(),
                time: $("#select_time").val(),
                cat_id: $("#select_cat_id").val(),
                order: $("#select_order").val(),
            }, function(result){
                console.log("readData");
                console.log(result);
                $("#result tbody").html($($(".event_data")[0]));
                data = result['data'];
                var count = 0;
                for (key in data){
                    count++;
                    elem = data[key];
                    output = $($(".event_data")[0]).clone();
                    output.show();
                    $("#result tbody").append(output);
                    elem['img'] = result['img'][elem['id']];
                    elem['quantity_map'] = result['quantity_map'];
                    elem['count_num'] = count;
                    console.log(elem);
                    fillData(elem, output);
                }
                
            }, 'json').fail(function(data){
                console.log('error');
                console.log(data);
            })
        }
        $(document).ready(function() {
            readCat();
        });
    function fillData(data, elem){
        var event_img_cover = "";
        if (typeof(data['img']) !== "undefined"){
            event_img_cover = "<?= WEB_ROOT."/" ?>" + data['img'][0]['path'];
        }
        list = [
            {
                selector: ".event_count_num",
                text: data['count_num'],
            },
            {
                selector: ".event_name",
                text: data['name'],
            },
            {
                selector: ".event_img_cover",
                attr: {
                    src: event_img_cover
                }
            },
            {
                selector: ".event_price",
                text: data['price'],
            },
            {
                selector: ".ec_name",
                text: data['ec_name'],
            },
            {
                selector: ".event_date",
                text: data['date'],
            },
            {
                selector: ".event_limitNum",
                text: data['limitNum'],
            },
            {
                selector: ".event_detail_link",
                attr: {
                    href: `staff_event_item.php?id=${data['id']}`
                }
            },
            {
                selector: ".event_edit_link",
                attr: {
                    href: `staff_event_editor.php?id=${data['id']}`
                }
            },
            {
                selector: ".evetn_delete_link",
                attr: {
                    onclick: `deleteItem(event, ${data['id']})`
                }
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
                $(elem).find(m['selector']).text(m['text']);
            }
            if ('value' in m){
                $(elem).find(m['selector']).val(m['value']);
            }
            for (attr_key in m['attr']){
                // fill_key = 'src'
                // m['attr']['src']
                $(elem).find(m['selector']).attr(attr_key, m['attr'][attr_key]);
            }
        });

        
        if (typeof(data['img']) !== "undefined"){
            data['img'].forEach(function(data_img){
                var output = `<a href='<?= WEB_ROOT."/" ?>${data_img['path']}' data-fancybox='F_box1' data-caption=' ${data['name']}'>
                        <img src='<?= WEB_ROOT."/" ?>${data_img['path']}' alt=''>
                    </a>`
                $(".fancybox").append(output);
            })
        }
    }
    </script>

    <?php include __DIR__ . '/parts/staff_html-foot.php'; ?>