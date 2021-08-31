<?php require __DIR__ . '/parts/config.php'; ?>


<?php
$title = '彈跳視窗查詢';
$pageName = 'staff_modal_search';
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
    main{
        width: 97.5%;
        margin: 100px auto;
    }

 

</style>



<body>
 
<main>
    <div class="con_01">
    <div id="searchBar"  class="" >
                    <h2 class="title b-green rot-135  ">彈跳視窗查詢</h2>

                    <div action="" class="p-2 m-auto  row justify-content-center align-items-center ">
                        <select id="select_cat_id" name="">
                            <option disabled hidden selected >放置頁面查詢</option>
                            <option value="">全部</option>
                        </select>
                        <button type="button" class="custom-btn btn-4 ml-3 p-0" style="width:3rem;" onclick="readData();">送出</button></li>
                    </div>
                </div>

        <div class="modalItem  p-0 m-0">
                <table id="result" class="table table-bordered table-Primary table-hover ">
                        <thead class="thead-dark">
                            <tr>
                                <th>序號</th>
                                <th style="width: 10%;">放置頁面</th>
                                <th style="width: 6.5%;">標題</th>
                                <th style="width: 6.5%;">內容</th>
                                <th style="width: 20%;">備註</th>
                                <th style="width: 20%;">連結標題</th>
                                <th style="width: 20%;">連結網址</th>
                                <th>修改</th>
                                <th scope="col" class="m-0 t_shadow text-center">狀態</th>

            
                            </tr>
                        </thead>
                        <tbody class="modal_data">
                            <tr class="modal_data text-center" style="display: none;">
                                <td class="bg-dark text-white count_num" style="border: #454d55 1px solid ;"></td>
                                <td><span class="cat_id"></span></td>
                                <td><span class="name"></span></td>
                                <td><span class="content"></span></td>
                                <td><p class="notice"></p></p><p id="link_name"></p><p id="link_address"></td>
                                <td><a class="edit_link" href="" target="blank">修改</a></td>
                                <td><input class="status_used" type="radio" name="status">使用 &emsp; <input class="status_disable" type="radio" name="status">停用</td>
                            </tr>
                        </tbody>
                    </table>

        </div>

    </div>
</main>
    <?php include __DIR__ . '/parts/staff_scripts.php'; ?>
    <script>
        $(document).ready(function() {
            readCat();
            fillData(data, elem)
        });

        function readCat(){
            $.post('api/staff_modal-api.php', {
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
            $.post('api/staff_modal-api.php', {
                action: 'readAll',
                cat_id: $("#select_cat_id").val(),
            }, function(result){
                $("#result tbody").html($($(".modal_data")[0]));
                data = result['data'];
                console.log(result);
                var count = 0;
                for (key in data){
                    count++;
                    elem = data[key];
                    output = $($(".modal_data")[0]).clone();
                    output.show();
                    $("#result tbody").append(output);
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

        list = [
                {
                    selector: ".count_num",
                    text: data['count_num'],
                },
                {
                    selector: ".cat_id",
                    text: data['m_name'],
                },
                {
                    selector: ".name",
                    text: data['name'],
                },
                {
                    selector: ".content",
                    text: data['content'],
                },
                {
                    selector: ".notice",
                    text: data['notice'],
                },
                {
                    selector: ".link_address",
                    text: data['link_address']
                },
                 {
                    selector: ".link_name",
                    text: data['link_name'],
                },
                {
                    selector: ".edit_link",
                    attr: {
                        href: `staff_modal_editor.php?id=${data['id']}`,
                    },
                },
                {
                    selector: ".status",
                    attr: {
                        checked: `deleteItem(event, ${data['id']})`,
                    },
                },
            ]
        
        // map
        // {
        //     selector: "#modal_name",
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
        
    }
    </script>


    <?php include __DIR__ . '/parts/staff_html-foot.php'; ?>