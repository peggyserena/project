<?php

require __DIR__ . '/parts/config.php';

?>

<?php
$title = '森林體驗查詢';
$pageName = 'setting';


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
 
<?php include "parts/modal.php"?>
<div class="container">
        <div class="con_01">
            

            <div class="settingItem  p-0 m-0">
                    <table id="result" class="table table-bordered table-Primary table-hover text-center">
                            <thead class="thead-dark">
                                <tr>
                                    <th>序號</th>
                                    <th>名稱</th>
                                    <th>參數</th>
                                    <th>修改</th>
                                    <th scope="col" class="m-0 t_shadow text-center"><i class="fas fa-trash-alt"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="setting_data" style="display: none;">
                                    <td class="bg-dark text-white setting_count_num" style="border: #454d55 1px solid ;"></td>
                                    <td ><span class="setting_name"></span></td>
                                    <td><input class="setting_value"/></td>
                                    <td><a class="setting_edit_link" href="#" onclick="addSetting(this)">送出</a></td>
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
        <!-- <div class="con_01">
            <div id="setting_1">
                <form  onsubmit="addSetting(this);">
                    <input type='hidden' name="id" value="1"/>
                    <h4>房型未開放</h4>
                    開始日期<input type='date' name="startDate"/>
                    結束日期<input type='date' name="endDate"/>
                    <button type="submit">送出</button>
                </form>
            </div>
            <div id="setting_2">
                <form  onsubmit="addSetting(this);">
                    <input type='hidden' name="id" value="2"/>
                    <h4>房型預設開放	</h4>
                    開放月數<input type='number' name="value"/>
                    <button type="submit">送出</button>
                </form>
            </div>

        </div> -->
  </div>
    <?php include __DIR__ . '/parts/staff_scripts.php'; ?>

    <script>
        $(document).ready(function(){
            readData();
        })
        //  function addSetting(form){
        //     $.post('api/staff_setting-api.php', $(form).serialize() + "&action=edit", function(data){
        //         console.log("readData");
                
        //     }, 'json').fail(function(data){
        //         console.log('error');
        //         console.log(data);
        //     })
        // }
        function addSetting(elem){
            if (confirm("確定修改?")){

                input = $(elem).parents("tr").find(".setting_value");
                
                $.post('api/staff_setting-api.php', {
                    action : "edit",
                    id: $(input).data('id'),
                    value: $(input).val(),
                }, function(data){
                    modal_init()
                    insertPage('#modal_img', 'animation/animation_success.html')
                    insertText('#modal_content', '修改成功')
                    $('#modal_alert').modal('show')
                    setTimeout(function () {
                        $('#modal_alert').modal('hide')
                    }, 2000)
                }, 'json').fail(function(data){
                    console.log('error');
                    console.log(data);
                })
            }
        }
        function readData(){
            $.post('api/staff_setting-api.php', {
                action: 'readAll',
            }, function(data){
                console.log("readData");
                $("#result tbody").html($($(".setting_data")[0]));
                var count = 0;
                for (key in data){
                    count++;
                    elem = data[key];
                    output = $($(".setting_data")[0]).clone();
                    output.show();
                    $("#result tbody").append(output);
                    elem['count_num'] = count;
                    fillData(elem, output);
                    $(output).find(".setting_value").data("id", elem['id']);
                }
                
            }, 'json').fail(function(data){
                console.log('error');
                console.log(data);
            })
        }
    function fillData(data, elem){
        list = [
            {
                selector: ".setting_count_num",
                text: data['count_num'],
            },
            {
                selector: ".setting_name",
                text: data['name'],
            },
            {
                selector: ".setting_value",
                value: data['value'],
            },

        ]
        
        // map
        // {
        //     selector: "#setting_name",
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