<?php require __DIR__ . '/parts/config.php'; ?>
<?php
$title = '會員註冊';
$pageName ='staff_register';
$aceept_role = [1, 2];

if (!in_array($_SESSION['staff']['role'], $aceept_role)){
    header("Location: staff_index.php");
}
?>
<?php include __DIR__ . '/parts/staff_html-head.php'; ?>
<style>

    form .form-group small.error {
        color: red;
    }

    .btnGroup button.facebook {
        background-color: #3b5998;
    }

    .btnGroup button.twitter {
        background-color: #1da1f2;
    }

    .btnGroup button.google {
        background-color: #dd4b39;
    }

    span {
        color: rgb(224, 100, 100);
        font-size: 0.8rem;
    }

    .container {
        margin: 5% auto;
    }

    .button {
        text-align: center;
    }

    form {
        color: gray;
        padding: 5% 7.5%;
        background: white;
        font-weight: 600;

    }


/* =============================== modal =============================== */



    .bee svg{
        width: 100px;
        height:100px;
        margin:1rem;
    }



</style>

<?php include __DIR__ . '/parts/staff_navbar.php'; ?>
<main>
    <!-- ===============================  modal - 確認登入 =============================== -->
    
    <?php include "parts/modal.php"?>
    <div class="container ">
        <div class="row justify-content-center  ">
            <div class="col-md-7 con_01 m-0 p-0">
                <h2 class="title b-green rot-135">新增員工</h2>
                <form name="form1" method="post" onsubmit="checkForm(); return false;">
                    <input type="hidden" name="action" value="admin_register"/>
                    <div class="form-group">
                        <label for="quantity">人數 <span>(必填)</span></label>
                        <input type="text" class="form-control" id="quantity" name="quantity" min=1 autofocus required>
                        <small class="form-text error"></small>
                    </div>
                    <div class="form-group">
                        <label for="role">類型<span>(必填)</span></label>
                        <select type="text" class="form-control" id="role" name="role_id" autofocus required>
                            <option value="">請選擇</option>
                        </select>
                        <small class="form-text error"></small>
                    </div>
                    <span class="button m-4"><button type="submit" class="custom-btn btn-4 t_shadow ">註冊</button></span>
                    <span class="button m-4"><button type="button" class="custom-btn btn-4 t_shadow" onclick="location.reload();">清除</button></span>
                    <span class="button m-4"><button type="button" class="custom-btn btn-4 t_shadow" onclick="exportExcel();">匯出</button></span>
                    <hr>
                </form>
                <form name="form2" id="form2" method="post" action="<?= WEB_API ?>/staff-api.php" hidden>
                    <input type="hidden" name="action" value="exportExcel"/>
                    <input type="hidden" name="data" value=''/>
                </form>
            </div>
        </div>
        <div class="row justify-content-center  ">
            <div class="col-md-7 con_01 m-0 p-0">
                <h2 class="title b-green rot-135">新增結果</h2>
                <table id="result" class="table table-bordered table-Primary table-hover text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>序號</th>
                            <th>職稱</th>
                            <th>員工編號</th>
                            <th>密碼</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</main>
<?php include __DIR__ . '/parts/staff_scripts.php'; ?>
<script>
    function checkForm() {
        $.post(
            '<?= WEB_API?>/register-api.php',
            $(document.form1).serialize(),
            function(data) {
                if (data.authError) {
                    modal_init();
                    insertPage("#modal_img", "animation/animation_success.html");
                    insertText("#modal_content", data.authError);
                    $("#modal_alert").modal("show");
                } else if (data.success) {
                    var base = $("#result tbody tr").length;
                    data['data'].forEach(function(staff, index){
                    $("table#result tbody").append(`<tr>
                            <td>${base + index + 1}</td>
                            <td>${staff['position']}</td>
                            <td>${staff['staff_id']}</td>
                            <td>${staff['password']}</td>
                        </tr>`);
                    });
                    modal_init();
                    insertPage("#modal_img", "animation/animation_success.html");
                    insertText("#modal_content", "新增員工成功");
                    $("#modal_alert").modal("show");
                } else {
                    modal_init();
                    insertPage("#modal_img", "animation/animation_error.html");
                    insertText("#modal_content", "資料傳輸失敗");
                    $("#modal_alert").modal("show");
                    setTimeout(function(){window.history.back();}, 2000);
                     // alert(data.error);
                }
            },
            'json'
        ).fail(function(d){
            alert(d);
            console.log(d);
        })

    }
    
    function exportExcel(){
        var form2 = $("#form2");
        var dataElem = form2.find("input[name='data']");
        var dataJSON = [["序號", "職稱", "員工編號", "密碼"]];
        $("#result tbody tr").each(function(index, elem){
            var row = [];
            $(elem).find("td").each(function(index2, elem2){
                row.push($(elem2).text());
            });
            dataJSON.push(row);
        });
        dataElem.val(JSON.stringify(dataJSON));
        form2.submit();
    }
</script>
<script>
        $(document).ready(function() {
            $(".c_pink_t").each(function(ind, elem){
                $(elem).text(dallorCommas($(elem).text()) + "元");
            });
            scroll();
            $.post('api/staff-api.php', {
                action: 'readCat',
            }, function(result){
                role = parseInt(<?= $_SESSION['staff']['role']?>);
                data = result['data'];

                for (key in data){
                    if (role === 2 && !(data[key]['id'] in [3, 4])){
                        continue;
                    }
                    $("#role").append(`<option value="${data[key]['id']}">${data[key]['position']}</option>`);
                }
                
            }, 'json').fail(function(data){
                console.log('error');
                console.log(data);
            })
            var selected_cat_id = parseInt("<?= $_GET['cat_id'] ?? ''?>");
            $.post('api/event-api.php', {
                action: 'readCat',
            }, function(result){
                result.forEach(function(elem){
                    output = `<option value='${elem['id']}' ${selected_cat_id == elem['id'] ? "selected" : ""}>${elem['name']}</option>`;
                    $("#select_cat_id").append(output);
                })
                
            }, 'json').fail(function(data){
                console.log('error');
                console.log(data);
            })


            
        });
    function fillData(data, elem){
        var event_img_cover = "";
        if (typeof(data['img']) !== "undefined"){
            event_img_cover = "<?= WEB_ROOT."/" ?>" + data['img'][0]['path'];
        }
        list = [
            {
                selector: ".eventItem",
                attr: {
                    id: `event_${data['id']}`,
                }
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
                selector: ".event_quantity",
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
                selector: ".event_quantity_input",
                attr: {
                    max: data['limitNum'] - data['quantity'],
                },
            },

            {
                selector: ".ec_name",
                text: data['ec_name'],
            },
            {
                selector: ".event_location",
                text: data['location'],
            },
            {
                selector: ".event_limitNum",
                text: data['limitNum'],
            },
            {
                selector: ".event_content",
                text: data['content'],
            },
            {
                selector: ".event_description",
                text: substr(data['description'], 50),
            },
            {
                selector: ".event_link",
                attr: {
                    href: `event_item.php?id=${data['id']}`
                }
            },
            {
                selector: ".add-to-cart",
                attr: {
                    onclick: `tr_addTransaction('event', 'cart', ${data['id']})`
                }
            },
            {
                selector: ".add-to-wishList",
                attr: {
                    onclick: `tr_addTransaction('event', 'wishList', ${data['id']})`
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