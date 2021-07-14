<?php include __DIR__ . '/parts/config.php'; ?>
<?php
$title = '訂單查詢';
$pageName = 'staff_member_info_search';

if(
  ! isset($_SESSION['staff'])
){
header('Location: staff_login.php');
exit;
}

$sql = "SELECT * FROM staff WHERE staff_id='" . $_SESSION['staff']['staff_id']."'";
$stamt = $pdo->query($sql)->fetch();



$sql = "SELECT * FROM `members` WHERE id=id";
$r = $pdo->query($sql)->fetchAll();



$year = "";
$month = "";
$age = "";

// $date = date("Y-m-d");

$year = $_GET['year'] ?? "";
$month = $_GET['month'] ?? "";
$order = $_GET['order'] ?? "";



// $sql = "SELECT `e`.*, ec.name as `ec_name`, SUM(`oe`.quantity) as quantity FROM `event` as e";
$sql_condition = [];
if ($year != "") {
    if (strpos($year, '~')!== false){
        $year = str_replace("~", "", $year);
        array_push($sql_condition, "YEAR(`date`) < $year");
    }else {
        array_push($sql_condition, "YEAR(`date`) = $year");
    }
}
if ($month != "") {
    array_push($sql_condition, "MONTH(`date`) = $month");
}




if (sizeof($sql_condition) > 0) {
    $sql .= " WHERE ";
}
$sql .= implode(" AND ", $sql_condition);





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
  select{
      height: 30px;
  }
  li{
      margin: 0 0.5rem;
  }

</style>
<?php include __DIR__. '/parts/staff_navbar.php'; ?>
<main>
    <div class="container">
        <div class="con_01  col-sm-12  p-0  m-auto">
            <h3 class="text-center title1 b-green rot-135">會員資料查詢</h3>
            <div class=" " id="searchBar" >
                <form action="staff_member_info_search.php" method="post" >
                    <ul class="row list-unstyled p-2 m-0 justify-content-center align-items-center">
                        <li class=" ">
                            <input type="text" value="" placeholder="帳號(E-mail)">          
                        </li>
                        <li class=" ">
                            <input type="text" value="" placeholder="姓名">          
                        </li>
                        <li class=" ">
                            <input type="text" value="" placeholder="性別">          
                        </li>
                        <li class=" ">
                            <input type="text" value="" placeholder="手機">          
                        </li>
                        <li class="">
                            <select id="select_month" name="month">
                                <option value="">生日月份</option>
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
                                <option value="0-6">0-6歲</option>
                                <option value="6-12">6-12歲</option>
                                <option value="12-15">12-15歲</option>
                                <option value="15-18">15-18歲</option>
                                <option value="18-22">18-22歲</option>
                                <option value="23-30">23-30歲</option>
                                <option value="31-40">31-40歲</option>
                                <option value="41-50">41-50歲</option>
                                <option value="51-100">51歲以上</option>
                            </select>
                        </li>
                        <div  class="text-center"><a href="staff_member_info_editor.php" class="custom-btn btn-4 text-center t_shadow">修改</a>

                    </ul>

                </form>
            </div>

            
            <table class="table table-striped table-bordered" id="memberInfo_table">
                <thead>
                    <tr class="b-green rot-135 text-white">
                        <th scope="col" class="m-0 t_shadow text-center">會員編號</th>
                        <th scope="col" class="m-0 t_shadow text-center">帳號(e-mail)</th>
                        <th scope="col" class="m-0 t_shadow text-center">FB帳號</th>
                        <th scope="col" class="m-0 t_shadow text-center">姓名</th>
                        <th scope="col" class="m-0 t_shadow text-center">生日</th>
                        <th scope="col" class="m-0 t_shadow text-center">手機</th>
                        <th scope="col" class="m-0 t_shadow text-center">地址</th>
                        <th scope="col" class="m-0 t_shadow text-center">加入會員時間</th>
                        <th scope="col" class="m-0 t_shadow text-center">修改</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>


            <div id="profile" class="p-5">
                <form name="form1" method="post">
                    <div class="form-group">
                        <label for="email">帳號 ( email )： </label><span><?= $r['email'] ?></span>
                    </div>
                    <div class="form-group">
                        <label for="fullname">姓名： </label><span><?= $r['fullname'] ?></span>
                    </div>
                    <div class="form-group">
                        <label for="birthday">生日： </label><span><?= $r['birthday'] ?></span>
                    </div>
                    <div class="form-group">
                        <label for="mobile">手機： </label><span><?= $r['mobile'] ?></span>
                    </div>
                    <div class="form-group">
                        <label for="email_2nd">備用email： </label><span><?= $r['email_2nd'] ?></span>
                    </div>
                    <div class="form-group">
                        <label for="zipcode">地址： </label><span><?= $r['zipcode'] ?></span><span><?= $r['county'] ?></span><span><?= $r['district'] ?></span><span><?= htmlentities($r['address']) ?></span>
                    </div>
                </form>
            </div>

        </div>
    </div>

</main>


<?php include __DIR__. '/parts/staff_scripts.php'; ?>

<script>
        var date = new Date();
        var year = date.getFullYear() - 3;
        var month = date.getMonth() + 1;
        var selectedMonth = "<?= $_GET['month'] ?? "" ?>";
        var selectedYear = "<?= $_GET['year'] ?? "" ?>";
          var selectedOrder = "<?= $_GET['order'] ?? "" ?>";
        $("#select_month option").each(function(ind, elem) {
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
    
        $("#select_order").val(selectedOrder);
    </script>

<?php include __DIR__. '/parts/staff_html-foot.php'; ?>

