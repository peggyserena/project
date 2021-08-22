<?php require __DIR__ . '/parts/config.php'; ?>
<?php
$title = '會員資料查詢';
$pageName = 'staff_member_info_search';
?>



<?php include __DIR__. '/parts/staff_html-head.php'; ?>
<style>
.box{
    width: 100%;
    margin: 100px auto;
}
 
  select{
      height: 30px;
  }
  li{
      margin: 0 0.5rem;
  }
  td{
      font-size: 0.8rem;
  }

</style>
<?php include __DIR__. '/parts/staff_navbar.php'; ?>
<main>
    <div class="box">
        <div class="con_01  col-sm-12  p-0  m-auto">
            <h3 class="text-center title1 b-green rot-135">會員資料查詢</h3>
            <div class=" " id="searchBar" >
                <form action="staff_member_info_search.php" method="post" onsubmit="memberIntoSearch(); return false;">

                <form action="staff_member_info_search.php" method="post" >
                    <ul class="row list-unstyled p-2 m-0 text-center justify-content-center align-items-center">
                        <li class=" ">
                            <input id="email" type="text" value="" placeholder="帳號(E-mail)">          
                        </li>
                        <li class=" ">
                            <input id="fullname" type="text" value="" placeholder="姓名">          
                        </li>

                        <li class=" ">
                            <input id="mobile" type="text" value="" placeholder="手機">          
                        </li>
                        <li class="">
                            <select id="select_month" name="birthmonth">
                                <option disabled hidden selected value="">生日月份</option>
                                <option value="">全部</option>
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
                            <select id="gender" name="gender">
                                <option disabled hidden selected value="">性別</option>
                                <option value="">全部</option>
                                <option value="先生">先生</option>
                                <option value="小姐">小姐</option>
                                <option value="中性">不填</option>
                            </select>
                        </li>
                        <li class="">
                            <select id="age" name="age">
                                <option value="" disabled hidden selected>年齡區間</option>
                                <option value="">全部</option>
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
                        <li><button type="submit" class="custom-btn btn-4 m-0 p-0" style="width:3rem; ">送出</button></li>                    
                    </ul>

                </form>
            </div>

            <div id="profile" class="  p-0  m-0">
                <div class="">
                    <table class="table table-bordered table-Primary table-hover text-center">
                        <thead class="bg-dark text-white">
                            <tr class="">
                                <th scope="col" class="m-0  ">S/N</th>
                                <th scope="col" class="m-0  ">ID</th>
                                <th scope="col" class="m-0  ">姓名</th>
                                <th scope="col" class="m-0  ">FB帳號</th>
                                <th scope="col" class="m-0  ">帳號(e-mail)</th>
                                <th scope="col" class="m-0  ">備用信箱</th>
                                <th scope="col" class="m-0  ">性別</th>
                                <th scope="col" class="m-0  ">生日</th>
                                <th scope="col" class="m-0  ">手機</th>
                                <th scope="col" class="m-0  ">地址</th>
                                <th scope="col" class="m-0  ">加入時間</th>
                                <th scope="col" class="m-0  ">訂單紀錄</th>
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
  function memberIntoSearch(){
    $.post('<?= WEB_API ?>/member-api.php', {
        action: 'readAll',
        id: $("#id").val(),
        fullname: $("#fullname").val(),
        gender: $("#gender").val(),
        mobile: $("#mobile").val(),
        email: $("#email").val(),
        birthmonth: $("#select_month").val(),
        age: $("#age").val(),
    },function(data) {
        console.log(data);
        members_list = data['result'];
        $("#profile table tbody").html("");
        members_list.forEach(function(members, index){
            var output = `<tr>
                            <td class="bg-dark text-white" style="border: #454d55 1px solid ;">${index + 1}</td>
                            <td>${nullTo(members['id'])}</td>
                            <td>${nullTo(members['fullname'])}</td>
                            <td>${nullTo(members['fb_id'])}</td>
                            <td>${nullTo(members['email'])}</td>
                            <td>${nullTo(members['email_2nd'])}</td>
                            <td>${nullTo(members['gender'])}</td>
                            <td>${nullTo(members['birthday'])}</td>
                            <td>${nullTo(members['mobile'])}</td>
                            <td>${nullTo(members['zipcode']) + nullTo(members['county']) + nullTo(members['district']) + nullTo(members['address'])}</td>
                            <td>${nullTo(members['created_at'])}</td>
                            <td><a hreef="staff_member_order_item.php"> </td>

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
</script>


<?php include __DIR__. '/parts/staff_html-foot.php'; ?>

