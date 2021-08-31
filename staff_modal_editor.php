<?php require __DIR__ . '/parts/config.php'; ?>
<?php
$title = '彈跳視窗新增';
$pageName = 'staff_modal_create';
// $stmt = $pdo->query($sql); // $forestnewss = $stmt->fetchAll(); // $sql = "SELECT * FROM `index`"; ?>

<?php include __DIR__. '/parts/staff_html-head.php'; ?>

<style>
#myModal button {
  transition: all 0.5s ease;
  width: 3rem;
  height: 3rem;
  position: absolute;
  z-index: 100;
  background-color: #ff9980;
  right: 1%;
  top: 1%;
  border-radius: 50%;
  border: 2px solid #fff;
  color: white;
  -webkit-box-shadow: -4px -2px 6px 0px rgba(0, 0, 0, 0.1);
}

#myModal button:hover {
  background-color: orange;
  color: #fff;
}

.modal button {
  transition: all 0.5s ease;
  border-radius: 50%;
  transform: scale(0.6);
  background-color: #ff9980;
  border: 2px solid #fff;
  color: white;
  font-weight: 900;
  -webkit-box-shadow: -4px -2px 6px 0px rgba(0, 0, 0, 0.1);
}
.modal button:hover {
  background-color: orange;
}
.modal-content {
  background: none;
  background-color: white;
}


</style>

<main>
    <div class="container ">
      <div class="con_01 row ">
          <h2 class="title b-green rot-135 col-sm-12">新增彈跳視窗</h2>
          <form class="p-5 col-sm-12" name="form" id="myForm" method="post" onsubmit="create(); return false;" enctype="multipart/form-data">
              <input type="hidden" name="type" value="add"/>
              <div class="form-group">
                  <label for="cat_id">放置網頁於</label>
                  <select class="form-control" id="select_cat_id" name="name" ></select>
              </div>
              <div class="form-group">
                  <label for="title">標題</label>
                  <input type="text" class="form-control" id="name" name="name"  >
              </div>
              <div class="form-group">
                  <label for="content">活動內容</label>
                  <textarea type="text" class="form-control" id="content" name="content"  required></textarea>
              </div>
              <div class="form-group">
                  <label for="notice">注意事項</label>
                  <textarea type="text" class="form-control" id="notice" name="notice"  required></textarea>
              </div>
              <div class="form-group">
                  <label for="link_name">連結標題</label>
                  <textarea type="text" class="form-control" id="notice" name="notice"  required></textarea>
              </div>
              <div class="form-group">
                  <label for="link_address">連結網址</label>
                  <textarea type="text" class="form-control" id="notice" name="notice"  required></textarea>
              </div>
              <div class="form-group">
                  <label for="status">連結網址</label>
                  <textarea type="text" class="form-control" id="notice" name="notice"  required></textarea>
              </div>
              <div class="form-group">
                  <label for="link_address">狀態</label>
                  <input class="status_used" type="radio" name="status">使用 &emsp; <input class="status_disable" type="radio" name="status">停用
              </div>
          </form>
      <div>
      
    </div>
  </main>


  <?php include __DIR__ . '/parts/staff_scripts.php'; ?>
  <script>
        $(document).ready(function() {
            readCat();
        });

        function readCat(){
            $.post('api/staff_modal-api.php', {
                action: 'readCat',
            }, function(result){
                
                var selected_cat_id = parseInt("<?= $_GET['cat_id'] ?? ''?>");
                result.forEach(function(elem){
                    output = `<option value='${elem['id']}' ${selected_cat_id == elem['id'] ? "selected" : ""}>${elem['name']}</option>`;
                    $(".select_cat_id").append(output);
                })
                readData();
            }, 'json').fail(function(data){
                console.log('error');
                console.log(data);
            })
        }
        function readData(){
            $.post('api/staff_modal-api.php', {
                action: 'read',
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
    <script>
  function edit(){
    $.ajax({
        url: '<?= WEB_API ?>/staff_modal-api.php',
        data: new FormData($("#myForm")[0]),
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        type: 'POST', // For jQuery < 1.9
        success: function(data){
            console.log(data);
            modal_init();
            insertPage("#modal_img", "animation/animation_success.html");
            insertText("#modal_content", "修改成功!");
            $("#modal_alert").modal("show");
            setTimeout(location.href = "staff_modal.php", 2000);

        },
        error: function(data){
            console.log(data);
            modal_init();
            insertPage("#modal_img", "animation/animation_error.html");
            insertText("#modal_content", "資料傳輸失敗");
            $("#modal_alert").modal("show");
            setTimeout(function(){window.history.back();}, 2000);
        }
    });
  }

    </script>
<?php include __DIR__. '/parts/staff_html-foot.php'; ?>
