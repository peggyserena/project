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
        box-shadow: 0px 0px 10px #666E9C; 
        margin-top: 3rem;
           
    }
    .catebox h3{
        margin: 0;
        padding: 0rem 0;
        background-color: #83a573;
        color: white;
    }
    .edit_column{
        cursor: pointer;
    }
</style>
<?php include __DIR__. '/parts/staff_navbar.php'; ?>
<?php include "parts/modal.php"?>

    <main>
        <div class="container ">
            <div class="con_01">
                <div id="searchBar"  class="" >
                    <h2 class="title b-green rot-135  ">各種類查詢</h2>

                    <div action="" class="p-2 m-auto  row justify-content-center align-items-center ">
                        <select id="category" name="">
                            <option disabled hidden selected >各種類查詢</option>
                            <option value="">全部</option>
                        </select>
                        <button type="button" class="custom-btn btn-4 ml-3 p-0" style="width:3rem;" onclick="readData();">送出</button></li>
                    </div>
                </div>
                
                <div id="searchResult">
                </div>
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
                    modal_init();
                    insertPage("#modal_img", "animation/animation_success.html");
                    insertText("#modal_content", '資料修改成功');
                    $("#modal_alert").modal("show");
                    setTimeout(function(){location.href = "staff_category_editor.php"}, 2000);
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
        // $(document).ready(function(){
        //     readData();
        // })
        $(document).ready(function() {
            readCat();
        });
        function readCat(){
            $.post('api/category-api.php', {
                action: 'readCat',
            }, function(result){
                console.log(result);
                // result = {
                //     0: "a",
                //     1: "b",
                // }
                for (key in result){
                    output = `<option value="${key}">${result[key]}</option>`;
                    $("#category").append(output);
                }
                window.catMap = result; // window是全域變數
                readData();
            }, 'json').fail(function(data){
            })
        }
        function readData(){
            $.post('api/category-api.php', {
                action: 'readAll',
                type: $("#category").val(),
            }, function(result){
                console.log("readData");
                console.log(result);

                cat_en_name = $("#category").val();
                cat_name = $("#category option:selected").text();
                $("#searchResult").html("");
                if (cat_en_name === "" || cat_en_name === null){
                    for (key in result){
                        fillData(result[key], key, window.catMap[key]);
                    }
                }else{
                    fillData(result, cat_en_name, cat_name);
                }
                $(".submitCat").click(function(){
                    console.log("submitCat");
                    if ($("input.actived.edit_column").data("id") != ""){
                        edit_column = $("input.actived.edit_column")[0];
                        editCat($(this).data("table"), $(edit_column).data("id"), edit_column.name, edit_column.value);
                    } else {
                        table = $(this).data('table');
                        param = {};
                        $("input.actived").parents("tr").find(".edit_column").each(function(ind, elem){
                            param[elem.name] = elem.value;
                        })
                        
                        addCatItem(table, param);
                    }


                    
                })
                
                $(".edit_column").click(function(){            
                    $(".actived").removeClass("actived");
                    $(this).addClass("actived");
                })
                $(".addCatItem").click(function(){    
                    $(".actived").removeClass("actived");
                    tbody = $(this).parents(".data_box").find("tbody");
                    key = $(tbody).find("tr").length;
                    cat_en_name = $(this).data("table");
                    output_tr = "";
                    id_name = `${cat_en_name}_${key + 1}`;
                    if (cat_en_name === "forestnews"){
                            output_td = `<td class="p-0"data-toggle="tooltip" data-placement="right"  title="點選修改" ><input class="category_en_name edit_column actived form-control " name="en_name" data-table="${cat_en_name}" data-id="" value=""/></td>`;
                        }
                        output_tr += `<tr class="category_data">
                                            <td class="bg-dark text-white category_count_num " style="border: #454d55 1px solid ;">${key + 1}</td>
                                            <td class="p-0"data-toggle="tooltip" data-placement="right"  title="點選修改"><input class="category_name edit_column actived form-control" name="name" data-table="${cat_en_name}" data-id="" value=""/></td>
                                            ${output_td}
                                            <td><a class="evetn_delete_link"  href="#"><i class="fas fa-trash-alt"></i></a></td>
                                        </tr>`;

                    tbody.append(output_tr);
                    $(".edit_column.actived").click(function(){            
                        $(".actived").removeClass("actived");
                        $(this).addClass("actived");
                    })
                })
            }, 'json').fail(function(data){
                console.log('error');
                console.log(data);
            })
        }
        
    function addCatItem(table, param){
        console.log("addCatItem");
        $.post('api/category-api.php', {
            action: 'add',
            table,
            param
        }, function(result){
            $("input.actived").data("id", result);
            $(".actived").removeClass("actived");
                modal_init();
                insertPage("#modal_img", "animation/animation_success.html");
                insertText("#modal_content", '資料修改成功');
                $("#modal_alert").modal("show");
                setTimeout(function(){location.href = "staff_category_editor.php"}, 2000);
        }, 'json').fail(function(data){
            console.log(data);
        })
    }
    function fillData(data, cat_en_name, cat_name){
        console.log("fillData");
        console.log(data);
        th = "";
        if (cat_en_name === "forestnews"){
            th = "<th>英文名稱</th>";
        }
        output_tr = "";
        data.forEach(function(elem, key){
            output_td = "";
            if (cat_en_name === "forestnews"){
                output_td = `<td class="p-0" data-toggle="tooltip" data-placement="right"  title="點選修改"><input class="category_en_name edit_column form-control" name="en_name" data-table="${cat_en_name}" data-id="${elem['id']}" value="${elem['en_name']}"/></td>`;
            }
            output_tr += `<tr class="category_data">
                                <td class="bg-dark text-white category_count_num" style="border: #454d55 1px solid ;">${key + 1}</td>
                                <td class="p-0"data-toggle="tooltip" data-placement="right"  title="點選修改"><input class="category_name edit_column form-control" name="name" data-table="${cat_en_name}" data-id="${elem['id']}" value="${elem['name']}"/></td>
                                ${output_td}
                                <td><a class="evetn_delete_link"  href="#"><i class="fas fa-trash-alt"></i></a></td>
                            </tr>`;
            
        })
        output = `<div class="data_box">
            <div class="catebox mx-5 ">
                <input type="hidden" name="type" value="add"/>
                <h3  class="m-0 p-2 text-center text-white  ">${cat_name}</h3>
                <table id="" class="table table-bordered table-Primary table-hover text-center m-0 ">
                    <thead class="thead-dark">
                        <tr class="">
                            <th>序號</th>
                            <th>活動類別</th>
                            ${th}
                            <th scope="col" class="m-0 t_shadow text-center"><i class="fas fa-trash-alt"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        ${output_tr}
                    </tbody>
                </table>
            </div>
            <div class="text-center my-5">                    
                <button class="custom-btn btn-4 c_1 addCatItem mx-2" type="button" data-table="${cat_en_name}">新增</button>
                <button class="custom-btn btn-4 c_1 submitCat mx-2" type="button" data-table="${cat_en_name}">送出</button>
            </div>
        </div><hr class="mx-4">`;
        $("#searchResult").append(output);
    }

    
    function editCat(table, id, name, value){
        console.log('edit');
        $.post('api/category-api.php', {
            action: 'edit',
            table,
            id,
            name,
            value,
        }, function(result){
           console.log("editCat");
           $(".actived").removeClass("actived");
                modal_init();
                insertPage("#modal_img", "animation/animation_success.html");
                insertText("#modal_content", '資料修改成功');
                $("#modal_alert").modal("show");
                setTimeout(function(){location.href = "staff_category_editor.php"}, 2000);
        }, 'json').fail(function(data){
            console.log('error');
            console.log(data);
        })
    }

    
    </script>
    <script>
    $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
    });
    </script>
<?php include __DIR__. '/parts/staff_html-foot.php'; ?>

