<?php require __DIR__ . '/parts/config.php'; ?>
<?php
$title = '薰衣草森林-管理系統';
$pageName = 'staff_info';

if(
  ! isset($_SESSION['staff'])
){
header('Location: staff_login.php');
exit;
}

// 陣列
// print_r, var_dump

// 字串
// 都可以 print_r, var_dump, echo, print


// $sql = "SELECT staff.*, src.position as position FROM staff JOIN `staff_role_category` as src ON src.id = id WHERE staff_id='" . $_SESSION['staff']['staff_id']."'";
// $r = $pdo->query($sql)->fetch();

?>
<?php include __DIR__. '/parts/staff_html-head.php'; ?>
<style>


 
  #profile .form-group {
        padding-bottom:3px;
        background: 
        linear-gradient(45deg, #DCC5EF 0%, #adda9a 100%)
        bottom
        no-repeat; 
        background-size:100% 3px ;
    }

</style>
<?php include __DIR__. '/parts/staff_navbar.php'; ?>
<main>
    <div class="container  my-5">
       <div class="row m-1 justify-content-center ">

          <div id="profile" class="con_01 col-md-8 col-sm-12  p-0">
            <h2 class="title b-green rot-135  ">員工個人資料</h2>
            <div class="p-md-5 p-sm-2">
                <div class="form-group">
                    <label for="staff_id">員工編號： </label>
                    <span type="text" id="staff_id"></span>
                </div>
                <div class="form-group">
                    <label for="position">職稱： </label><span id="position"></span></span>
                </div>
                <div class="form-group">
                    <label for="fullname">姓名： </label><span id="fullname"></span>
                </div>
                <div class="form-group">
                    <label for="birthday">生日： </label><spa id='birthday'></span>
                </div>

 
                <div class="form-group">
                    <label for="identityNum">身分證字號： </label><span id='identityNum'></span>
                </div>
                <div class="form-group">
                    <label for="email">E-mail： </label><span id='email'></span>
                </div>
                <div class="form-group">
                    <label for="mobile">手機： </label><span id='mobile'></span>
                </div>
                <div class="form-group">
                    <label for="county">地址： </label><span id='zipcode'></span><span id='county'></span><span id='district'></span><span id='address'></span>
                </div>
     
                <div  class="text-center"><a href="staff_info_editor.php" class="custom-btn btn-4 text-center t_shadow">修改</a>
                </div>
            </div>

       </div>
    </div>
</main>


<?php include __DIR__. '/parts/staff_scripts.php'; ?>

<script>
    $.post('api/staff-api.php', {
        action: 'readCurrent',
    }, function(result){
        data = result['data'];
        output = $("#profile");
        fillData(data, output);
    }, 'json').fail(function(data){
        console.log('error');
        console.log(data);
    })

    function fillData(data, elem){
        list = [
            {
                selector: "#staff_id",
                text: data['staff_id']
            },
            {
                selector: "#position",
                text: data['role_name']
            },
            {
                selector: "#fullname",
                text: data['fullname']
            },
            {
                selector: "#birthday",
                text: data['birthday']
            },
            {
                selector: "#identityNum",
                text: data['identityNum']
            },
            {
                selector: "#email",
                text: data['email']
            },
            {
                selector: "#mobile",
                text: data['mobile']
            },
            {
                selector: "#zipcode",
                text: data['zipcode']
            },
            {
                selector: "#county",
                text: data['county']
            },
            {
                selector: "#district",
                text: data['district']
            },
            {
                selector: "#address",
                text: data['address']
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
    }
</script>

<?php include __DIR__. '/parts/staff_html-foot.php'; ?>

