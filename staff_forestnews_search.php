<?php require __DIR__ . '/parts/config.php'; ?>


<?php
$title = '森林體驗查詢';
$pageName = 'forestnews';
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
                        <li class="bg-green">
                            <select id="select_order" name="order">
                                <option disabled hidden selected value="">排序</option>
                                <option value="1" <?= $_GET['order'] ?? "" == 1 ? "selected" : "" ?>>開始日起</option>
                                <option value="2" <?= $_GET['order'] ?? "" == 2 ? "selected" : "" ?>>結束日期</option>
                            </select>
                        </li>
                        <li><button type="button" class="custom-btn btn-4 m-0 p-0" style="width:3rem; ">送出</button></li>
                    </ul>
                </form>
            </div>

            <div class="forestnewsItem  p-0 m-0">
                    <table id="result" class="table table-bordered table-Primary table-hover text-center">
                            <thead class="thead-dark">
                                <tr>
                                    <th>序號</th>
                                    <th>主圖片</th>
                                    <th>活動類別</th>
                                    <th>活動名稱</th>
                                    <th>開始日期</th>
                                    <th>結束日期</th>
                                    <th>活動內容</th>
                                    <th>備註</th>
                                    <th>詳情</th>
                                    <th>修改</th>
                                    <th scope="col" class="m-0 t_shadow text-center"><i class="fas fa-trash-alt"></i></th>

                
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="forestnews_data" style="display: none;">
                                    <td class="bg-dark text-white forestnews_count_num" style="border: #454d55 1px solid ;"></td>
                                    <td ><img class="forestnews_img_cover" src='' alt='' style="width: 120px;"></td>
                                    <td><span class="fc_name"></span></td>
                                    <td><span class="forestnews_name"></span></td>
                                    <td><span class="forestnews_start_date"></span></td>
                                    <td><span class="forestnews_end_date"></span></td>
                                    <td><span class="forestnews_content"></span></td>
                                    <td><span class="forestnews_notice"></span></td>
                                    <td><a class="forestnews_detail_link" href="" target="blank">查詢</a></td>
                                    <td><a class="forest_edit_link" href="" target="blank">修改</a></td>
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
        const deleteItem = function(forestnews, id) {
            let t = $(forestnews.currentTarget);
            $.post('<?= WEB_API ?>/forestnews-api.php', {
                action: 'delete',
                id
            }, function(data) {
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
            $.post('api/forestnews-api.php', {
                action: 'readCat',
            }, function(result){
                
                var selected_cat_id = parseInt("<?= $_GET['cat_id'] ?? ''?>");
                result.forEach(function(elem){
                    output = `<option value='${elem['id']}' ${selected_cat_id == elem['id'] ? "selected" : ""}>${elem['name']}</option>`;
                    $("#select_cat_id").append(output);
                })
                readData();
            }, 'json').fail(function(data){
                console.log('error');
                console.log(data);
            })
        }
        function readData(){
            $.post('api/forestnews-api.php', {
                action: 'readAll',
                year: $("#select_year").val(),
                month: $("#select_month").val(),
                cat_id: $("#select_cat_id").val(),
                order: $("#select_order").val(),
            }, function(result){
                $("#result tbody").html($($(".forestnews_data")[0]));
                data = result['data'];
                var count = 0;
                for (key in data){
                    count++;
                    elem = data[key];
                    output = $($(".forestnews_data")[0]).clone();
                    output.show();
                    $("#result tbody").append(output);
                    elem['img'] = result['img'][elem['id']];
                    elem['count_num'] = count;
                    console.log(elem);
                    fillData(elem, output);
                }
                
            }, 'json').fail(function(data){
            })
        }
        $(document).ready(function() {
            readCat();
        });
    function fillData(data, elem){
        var forestnews_img_cover = "";
        if (typeof(data['img']) !== "undefined"){
            forestnews_img_cover = "<?= WEB_ROOT."/" ?>" + data['img'][0]['path'];
        }
        list = [
                {
                    selector: "#cat_id_H",
                    text: data['name'],
                },
                {
                    selector: "#cat_id_E",
                    text: data['en_name'],
                },
                {
                    selector: "#forestnews_img_cover",
                    attr: {
                        src: "<?= WEB_ROOT."/" ?>" + data['img'][0]['path']
                    }
                },
                {
                    selector: "#name",
                    text: data[data['name']],
                },
                {
                    selector: "#start_date",
                    text: [data['start_date']],
                },
                {
                    selector: "#end_date",
                    text: [data['start_date']],
                },
                {
                    selector: "#content",
                    text: data['content'],
                },
                 {
                    selector: "#notice",
                    text: data['notice'],
                },
            ]
        
        // map
        // {
        //     selector: "#forestnews_name",
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
                $(elem).find(m['selector']).value(m['value']);
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

    <?php include __DIR__ . '/parts/staff_html-foot.php'; ?>