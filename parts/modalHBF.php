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
                    <h4 class="modal-title title text-center m-0" name="title" >森林防疫懶人包</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body pb-2 pl-4 pr-4 pt-4">
                    <pre>
                        <p id="modal_content" class="pb-2" name="content">
                            薰衣草森林兩園區照常營業，
                            但目前防疫為首要任務，
                            請旅人來訪時，
                            遵循以下守則：</p>
                    </pre>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer p-3" style="background-color:MistyRose">
                    <pre>
                        <p id="modal_note" name="note">
                           ※ 醫護人員入園免費，及森林咖啡館用 8 折
                           ※ 繡球花節，活動期間4/17~6/30<br>
                           目前園區花卉還有 #鼠尾草 #追風草 #小天使花～
                        </p>
                    </pre>
                </div>
            </div>
        </div>
    </div>


    <script>
    $.post('api/staff_modal-api.php', {
        action: 'readAll',
    }, function(result){

    })


        
    
</script>
