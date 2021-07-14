<?php include __DIR__ . '/parts/config.php'; ?>
<?php
$title = '薰衣草森林-管理系統';
$pageName = 'staff_info';

if(
  ! isset($_SESSION['staff'])
){
header('Location: staff_login.php');
exit;
} 




// role類別
$sql = "SELECT * FROM `staff_role_category`";
$stmt = $pdo->query($sql);
$result = $stmt->fetchAll();
$staff_role_category = [];
//ArrayArray ( [1] => 管理者 [2] => 經理 [3] => 會計 [4] => 一般員工 )
foreach($result as $role_cat){
    $staff_role_category[$role_cat['id']] = $role_cat['position'];
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

.box{
    width: 80%;
    margin: 100px auto;
}
  #profile .form-group {
        padding-bottom:3px;
        background: 
        linear-gradient(45deg, #DCC5EF 0%, #adda9a 100%)
        bottom
        no-repeat; 
        background-size:100% 3px ;
    }
    select{
      height: 30px;
  }
  li{
      margin: 0 0.5rem;
  }
</style>
<?php include __DIR__. '/parts/staff_navbar.php'; ?>
<main>
    <div class="box">
        <div class="con_01  p-0  m-auto">
            <div id="searchBar"  class=" " >
                <h2 class="title b-green rot-135  ">員工個人資料</h2>

                <form action="staff_info_search.php" method="post" onsubmit="staffIntoSearch(); return false;">
                    <ul class="row list-unstyled p-2 m-0 justify-content-center align-items-center">
                        <li class=" ">
                            <input type="text" id="staff_id" value="" placeholder="員工編號">          
                        </li>
                        <li class=" ">
                            <input type="text" id="fullname" value="" placeholder="姓名">          
                        </li>
                        <li class=" ">
                            <input type="text"  id="mobile" value="" placeholder="手機">          
                        </li>
                        <li class=" ">
                            <input type="text"  id="identityNum" value="" placeholder="身分證">          
                        </li>
                        <li class="">
                            <select id="birthday_month" name="month">
                                <option disabled hidden selected >生日月份</option>
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
                            <select id="age" name="age">
                                <option value="" disabled hidden selected>年齡區間</option>
                                <option value="18-22">18-20歲</option>
                                <option value="23-30">21-30歲</option>
                                <option value="31-40">31-40歲</option>
                                <option value="41-50">41-50歲</option>
                                <option value="51-100">51歲以上</option>
                            </select>
                        </li>
                        <li><button type="submit" class="custom-btn btn-4 m-0 p-0" style="width:3rem; ">送出</button></li>

                    </ul>
                </form>
            </div>

            <div id="profile" class="  p-0  m-0">
                <div class="p-md-5 p-sm-2">
                <table class="table table-striped table-bordered text-center">
                        <thead>
                            <tr>
                                <td>序號</td>
                                <td>員工編號</td>
                                <td>職稱</td>
                                <td>姓名</td>
                                <td>生日</td>
                                <td>身分證字號</td>
                                <td>mail</td>
                                <td>手機</td>
                                <td>地址</td>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</main>


<?php include __DIR__. '/parts/staff_scripts.php'; ?>

<script>
  function staffIntoSearch(){
    $.post('staff-api.php', {
        action: 'readAll',
        staff_id: $("#staff_id").val(),
        fullname: $("#fullname").val(),
        mobile: $("#mobile").val(),
        identityNum: $("#identityNum").val(),
        age: $("#age").val(),
    },function(data) {
        console.log(data);
        staff_list = data['result'];
        $("#profile table tbody").html("");
        staff_list.forEach(function(staff, index){
            var output = `<tr>
                            <td>${index + 1}</td>
                            <td>${nullTo(staff['staff_id'])}</td>
                            <td>${nullTo(staff['role_name'])}</td>
                            <td>${nullTo(staff['fullname'])}</td>
                            <td>${nullTo(staff['birthday'])}</td>
                            <td>${nullTo(staff['identityNum'])}</td>
                            <td>${nullTo(staff['email'])}</td>
                            <td>${nullTo(staff['mobile'])}</td>
                            <td>${nullTo(staff['zipcode']) + nullTo(staff['county']) + nullTo(staff['district']) + nullTo(staff['address'])}</td>
                            </tr>`;
            $("#profile table tbody").append(output);
        })
    }, 'json')
    .fail(
        function(e) {
            alert( "error" );
            console.log(e.responseText);
    });
  }
  function nullTo(str){
    return str === null ? "" : str; 
  }
</script>
<script>
    var month = 1;
    var selectedMonth = "<?= $_GET['month'] ?? "" ?>";
    $("#birthday_month option").each(function(ind, elem) {
        if (ind > 0) {
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
</script>

<?php include __DIR__. '/parts/staff_html-foot.php'; ?>

