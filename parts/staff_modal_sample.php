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
                    <h4 id="modal_title" class="modal-title title text-center m-0" name="title" ></h4>
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
  <script>
      document.onreadystatechange = function(){
        readModal();
      };
      function readModal(){
          $.post('api/staff_modal-api.php', {
              action: 'readByPage',
              link_address: "<?= basename($_SERVER['SCRIPT_NAME']); ?>",
          }, function(data){
              console.log(data);
              if (data){
                fillDataa(data, $("#myModal"));
                $("#myModal").modal("show");
              }
              
          }, 'json').fail(function(data){
              console.log('error');
              console.log(data);
          })
      }

      function fillDataa(data, elem){
        list = [
                {
                    selector: "#modal_title",
                    text: data['title'],
                },
                {
                    selector: "#modal_content",
                    text: data['content'],
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
