<style>
.modal-content {
        padding:3px;
        background: 
        linear-gradient(45deg, #DCC5EF 0%, #adda9a 100%)
        no-repeat; 
        background-size:100% 10px ;
        background-color:white;
    }
#modal_content{
    color:white;
	font-size: 1.5rem;
	font-weight: 700;
	text-shadow: 0 0 0.2em #0000E3, 0 0 0.25em #9AFF02, -1px -1px white, 1px 1px rgb(26, 2, 94);
}

.nobordertop {
    background: white;
}
.content svg {
    width: 100px;
    height: 100px;
    margin: 1rem;
}

</style>
    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="modal_alert" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm ">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="content">
                        <div id="modal_img"></div>   
                        <div id="modal_content"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function modal_init(){
            $("#modal_img").html("");
            $("#modal_content").html("");
        }
        function insertPage(selector, name){
            $(selector).load(name);
        }
        function insertText(selector, name){
            $(selector).text(name);
        }
        function updateStyle(style){
            switch (style){
                case 'nobordertop':
                    $(".modal-content").addClass("nobordertop");
                    break;
            }
        }
    </script>