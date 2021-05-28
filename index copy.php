<?php include __DIR__ . '/parts/config.php'; ?>
<?php
$title = '薰衣草森林 Lavender Forest';
$pageName = 'index';
// $stmt = $pdo->query($sql);
// $events = $stmt->fetchAll();
// $sql = "SELECT * FROM `index`";
?>
<?php include __DIR__ . '/parts/html-head.php'; ?>
<?php include __DIR__ . '/parts/navbar.php'; ?>
<style>
    body .container:nth-child(2)>h3 {
        letter-spacing: 3px;
        line-height: 2.5rem;
    }

    body .container:nth-child(3) {
        margin: 5% auto;
    }

    /*======================= weather =========================*/

    table {
        background-color: rgb(95, 185, 173);
        color: rgb(255, 255, 255);
        width: 100%;
    }

    .tableOne {
        width: 100%;
        height: 100%;
        text-align: center;
        font-size: .7rem;
    }

    .tableOne tbody td:nth-child(2) {
        background-color: darkcyan;
        font-weight: 900;
    }

    #WD img {
        width: 100%;
        padding-left: 5px
    }

    #WD {
        background-color: #E8E8EB;
    }

    #WDW {
        width: 50%;
        padding: 0.7rem;
        text-align: center;
        background-color: #E8E8EB;
        color: blue;
        font-size: 1.2rem;
        font-weight: 400;
    }



</style>

<main>




    <div class="container row ">
        <div class="tableOne col-sm-12 col-md-6 col-lg-6 p-2">
            <table>
                <tbody>
                    <tr>
                        <th id="WD" colspan="4" scope="col"></th>
                        <th id="WDW" colspan="4" scope="col"></th>
                    </tr>
                    <tr>
                        <td rowspan="2" scope="col">日期</td>
                        <td class="bT" id="date1" scope="col"></td>
                        <td class="bT" id="date2" scope="col"></td>
                        <td class="bT" id="date3" scope="col"></td>
                        <td class="bT" id="date4" scope="col"></td>
                        <td class="bT" id="date5" scope="col"></td>
                        <td class="bT" id="date6" scope="col"></td>
                        <td class="bT" id="date7" scope="col"></td>
                    </tr>
                    <tr>
                        <td class="dbox" scope="col" style="text-align: center; background-color: darkcyan; font-weight:900;">
                        </td>
                        <td class="dbox" scope="col" style="background-color:rgb(95, 185, 173)"></td>
                        <td class="dbox" scope="col"></td>
                        <td class="dbox" scope="col"></td>
                        <td class="dbox" scope="col"></td>
                        <td class="dbox" scope="col"></td>
                        <td class="dbox" scope="col"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</main>

<?php include __DIR__ . '/parts/scripts.php'; ?>
<script>
    //=============== weather ====================
    var dayNames = ["日", "一", "二", "三", "四", "五", "六"];
    const dbox = $('.dbox');
    const today = new Date().getDay();

    $(document).ready(function() {

        for (let i = 0; i < dbox.length; i++) {
            let j = (today + i) % 7;
            dbox.eq(i).text(dayNames[j]);
        }
    })



</script>





<?php include __DIR__ . '/parts/html-foot.php'; ?>