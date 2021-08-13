<?php require __DIR__ . '/parts/config.php'; ?>
<?php
$title = '各項種類資料查詢';
$pageName = 'staff_category_search';

if(
  ! isset($_SESSION['staff'])
){
header('Location: staff_login.php');
exit;
} 


?>
<?php include __DIR__. '/parts/staff_html-head.php'; ?>
<style>
    .container{
        margin: 100px auto;
    }

    select{
        width: 150px;
    }
    .table th, .table td{
        padding: 0.5rem;
    }
    .catebox{
        box-shadow: 0px -2px 5px #666E9C; 
        background-color:#83a573;   
    }

</style>
<?php include __DIR__. '/parts/staff_navbar.php'; ?>
    <main>
        <div class="container ">
            <div class="con_01">
                <div id="searchBar"  class="" >
                    <h2 class="title b-green rot-135  ">各種類查詢</h2>

                    <div action="" class="p-2 m-auto  row justify-content-center align-items-center "onsubmit="categorySearch(); return false;">
                        <select id="category" name="">
                            <option disabled hidden selected >各種類查詢</option>
                            <option value="">全部</option>
                            <option value="">森林體驗</option>
                            <option value="">森林快報</option>
                            <option value="">客服信件</option>
                            <option value="">客戶種類</option>
                            <option value="">員工職稱種類</option>
                        </select>
                        <button type="submit" class="custom-btn btn-4 ml-3 p-0" style="width:3rem; ">送出</button></li>
                    </div>
                </div>
                    
                <form class="col-sm-12 py-5 " name="form" id="myForm" method="post" onsubmit="create(); return false;" enctype="multipart/form-data">
                    <div class="catebox mx-5 ">
                        <input type="hidden" name="type" value="add"/>
                        <!-- event/forestnews/helpdesk/member/staff -->
                        <h3  class="m-0 p-2 text-center text-white  ">森林體驗</h3>
                        <table id="" class="table table-bordered table-Primary table-hover text-center m-0 ">
                            <thead class="thead-dark">
                                <tr class="">
                                    <th>序號</th>
                                    <th>活動類別</th>
                                    <th>修改</th>
                                    <!-- <th scope="col" class="m-0 t_shadow text-center"><i class="fas fa-trash-alt"></i></th> -->

                
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="category_data" style="display: none;">
                                    <td class="bg-dark text-white category_count_num" style="border: #454d55 1px solid ;"></td>
                                    <td><span class="category_name"></span></td>
                                    <td><a class="category_edit_link" href="" target="blank">修改</a></td>
                                    <td><a class="evetn_delete_link"  href="#"><i class="fas fa-trash-alt"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center my-5">                    
                        <button class="custom-btn btn-4 c_1" type="button">新增</button>
                    </div>

                </form>

            </div>

        </div>
  </main>

    <?php include __DIR__ . '/parts/staff_scripts.php'; ?>

    <script>
        var selectedId = "<?= $_GET['cat_id'] ?? "" ?>";

        $("#select_id").val(selectedId);
    </script>

    <script>
        const deleteItem = function(category, id) {
            let t = $(category.currentTarget);
            $.post('<?= WEB_API ?>/category-api.php', {
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
            $.post('api/category-api.php', {
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
            $.post('api/category-api.php', {
                action: 'readAll',
                time: $("#select_time").val(),
                cat_id: $("#select_cat_id").val(),
                order: $("#select_order").val(),
            }, function(result){
                console.log("readData");
                console.log(result);
                $("#result tbody").html($($(".category_data")[0]));
                data = result['data'];
                var count = 0;
                for (key in data){
                    count++;
                    elem = data[key];
                    output = $($(".category_data")[0]).clone();
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
        list = [
            {
                selector: ".category_count_num",
                text: data['count_num'],
            },
            {
                selector: ".category_name",
                text: data['name'],
            },
            {
                selector: ".ec_name",
                text: data['ec_name'],
            },
            {
                selector: ".category_detail_link",
                attr: {
                    href: `staff_category_item.php?id=${data['id']}`
                }
            },
            {
                selector: ".category_edit_link",
                attr: {
                    href: `staff_category_editor.php?id=${data['id']}`
                }
            },
            {
                selector: ".evetn_delete_link",
                attr: {
                    onclick: `deleteItem(category, ${data['id']})`
                }
            },

        ]
        
        // map
        // {
        //     selector: "#category_name",
        //     attr: {
        //         text: data['name']
        //     }
        // }
        list.forEach(function(m){
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
<?php include __DIR__. '/parts/staff_html-foot.php'; ?>

