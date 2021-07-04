<?php include __DIR__ . '/parts/config.php'; ?>
<?php
$title = '薰衣草森林 Lavender Forest';
$pageName = 'staff_event.php';
// $stmt = $pdo->query($sql); // $events = $stmt->fetchAll(); // $sql = "SELECT * FROM `index`"; ?>

<?php include __DIR__. '/parts/staff_html-head.php'; ?>
<style>
  table th {
    padding: 0.5rem 1rem;
  }
  textarea{
    border: none;
    margin: 0;
    padding: 0;
    overflow-wrap: break-word;
    word-wrap:break-word;
    white-space: normal;
  }

  table th tr td{
    margin: 0;
    padding: 0;
  }

  table thead th {
      margin: 0;
      padding: 0;
      height: 2rem;
  }

</style>
<?php include __DIR__. '/parts/staff_navbar.php'; ?>

  <main>
    <div class="table-responsive">
      <table class="table table-bordered text-center table-Primary table-hover my-5">
        <thead class="thead-dark">
          <tr>
            <th class="cat_id">分類</th>
            <th class="event_id">活動編號</th>
            <th class="img_count">照片數量</th>
            <th class="video">影片網址</th>
            <th class="name">活動名稱</th>
            <th class="date">活動日期</th>
            <th class="time">活動時間</th>
            <th class="price">金額</th>
            <th class="description">商品簡介</th>
            <th class="des_title">詳情標題</th>
            <th class="info">梯次/時間/年齡/費用</th>
            <th class="other">詳情/注意事項</th>
            <th class="limitNum">人數限制</th>
          </tr>
        </thead>
        <form action="">
          <tbody>
            <tr>
              <td class="p-0"><textarea name="" id="" ></textarea> </td>
              <td class="p-0"><textarea name="" id="" ></textarea> </td>
              <td class="p-0"><textarea name="" id="" ></textarea> </td>
              <td class="p-0"><textarea name="" id="" ></textarea> </td>
              <td class="p-0"><textarea name="" id="" ></textarea> </td>
              <td class="p-0"><textarea name="" id="" ></textarea> </td>
              <td class="p-0"><textarea name="" id="" ></textarea> </td>
              <td class="p-0"><textarea name="" id="" ></textarea> </td>
              <td class="p-0"><textarea name="" id="" ></textarea> </td>
              <td class="p-0"><textarea name="" id="" ></textarea> </td>
              <td class="p-0"><textarea name="" id="" ></textarea> </td>
              <td class="p-0"><textarea name="" id="" ></textarea> </td>
              <td class="p-0"><textarea name="" id="" ></textarea> </td>
            </tr>
          </tbody>
        </form>
      </table>
      <button type="submit" class="custom-btn btn-4">送出</button>
    </div>

   
  </main>

<?php include __DIR__. '/parts/staff_scripts.php'; ?>
<script>



</script>
<?php include __DIR__. '/parts/staff_html-foot.php'; ?>
