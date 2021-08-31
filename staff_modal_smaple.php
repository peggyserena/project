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

    <div class="modal fade text-muted" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content ">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title title text-center m-0" name="title" ></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body pb-2 pl-4 pr-4 pt-4">
                    <pre>
                        <p id="modal_content" class="pb-2" name="content"></p>
                    </pre>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer p-3" style="background-color:MistyRose">
                    <pre>
                        <p id="modal_note" name="note"></p>
                    </pre>
                </div>
            </div>
        </div>
    </div>


  <?php include __DIR__ . '/parts/staff_scripts.php'; ?>
  

<?php include __DIR__. '/parts/staff_html-foot.php'; ?>
