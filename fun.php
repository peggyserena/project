<?php include __DIR__ . '/parts/config.php'; ?>
<?php
$title = 'Fun';
$pageName = 'fun';
?>
<?php include __DIR__ . '/parts/html-head.php'; ?>
<?php include __DIR__ . '/parts/navbar.php'; ?>

</head>
<style>
    body {
        background: linear-gradient(45deg,#e8ddf1 0%,  #e1ebdc 100%);
        position: relative;
        index:1;

    }

    h2 {
        margin: 3rem 0;
        padding: 1rem;
        color: white
    }

    h3 {
        background-color: rgba(250, 195, 112, 0.2);
        margin-top: 2rem;
        color: white
    }

    form {
        color: white
    }

    span i {
        color: #adda9a;
        width: 2rem;
    }

    label {
        margin-top: 0.5rem;
    }

    #cardBoard img {
        width: 100%;
        margin: 0 auto;
    }

    .bgImg {
        background-image: url("./images/card/bg_wood04.svg.png");
        background-repeat: no-repeat;
        background-size: cover;
        box-shadow: 0px 0px 15px #666E9C;
        -webkit-box-shadow: 0px 0px 15px #666E9C;
        -moz-box-shadow: 0px 0px 15px #666E9C;
    }

    #cardBoard {
        font-size: 1.2rem;
        font-weight: 900;
        position: relative;
    }


    #cardBoard>div>div {
        margin: 0.5rem;
    }

    .loader svg {
        margin:0 auto;
        position:fixed;
        top:10%;
        left:20%;
        z-index: 999;
    }
    .loader{
        background-color:white;
        background-image: url("./images/other/bg_fun.svg") ;
        background-repeat: no-repeat; /* Do not repeat the image */
        background-size: cover; /* Resize the background image to cover the entire container */        
        height: 100%; 
        width: 100%; 
        position: fixed; 
        top: 0; 
        left: 0; 
        right:0;
        bottom:0;
        z-index: 100;
        animation-name:loader;
        animation-duration: 2s;
        animation-timing-function: linear;
        animation-delay: 6s;
        animation-direction: alternate;
        }

        @keyframes loader {
        0%   {transform:scale(1)}
        75%  {transform:scale(1)}
        100% {transform:scale(0)}
            }
        }



</style>
<body>
    <div class="loader">
        <?php include 'animation/animation_fun.html'?>
    </div> 
    <div class="container con2 bgImg  mb-5 mt-5">
        <h2 class="box_desktop b-green rot-135 text-center t_shadow mb-0">寫張卡片把喜悅快樂 分享給朋友吧！</h2>
        <h2 class="box_tablet b-green rot-135 text-center t_shadow mb-0">寫張卡片把喜悅快樂 分享給朋友吧！</h2>
        <h3 class="box_cellphone b-green rot-135 text-center t_shadow mb-0 p-2">寫張卡片把喜悅快樂<br>分享給朋友吧！</h3>
        <div>
            <div id="cardBoard">
                <hr>
                <h3 class="ts box_desktop p-3"><span><i class="fas fa-step-forward"></i></span>步驟一(Step 1)：選取喜歡的卡片</h3>
                <h3 class="ts box_tablet p-3"><span><i class="fas fa-step-forward"></i></span>步驟一(Step 1)：選取喜歡的卡片</h3>
                <p class="ts box_cellphone text-white p-3"><span><i class="fas fa-step-forward"></i></span>步驟一(Step 1)：選取喜歡的卡片</p>
                <div class="row ">
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                        <img src="./images/card/card01.svg" id="image1">
                        <input type="radio" name="img" onchange="drawImage_1(document.getElementById(this.value))" value="image1" />
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                        <img src="./images/card/card02.svg" id="image2">
                        <input type="radio" name="img" onchange="drawImage_1(document.getElementById(this.value))" value="image2" />
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                        <img src="./images/card/card03.svg" id="image3">
                        <input type="radio" name="img" onchange="drawImage_1(document.getElementById(this.value))" value="image3" />
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                        <img src="./images/card/card04.svg" id="image4">
                        <input type="radio" name="img" onchange="drawImage_1(document.getElementById(this.value))" value="image4" />
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                        <img src="./images/card/card05.svg" id="image5">
                        <input type="radio" name="img" onchange="drawImage_1(document.getElementById(this.value))" value="image5" />
                    </div>
                </div>
                <h3 class="ts box_desktop p-3"><span><i class="fas fa-step-forward"></i></span>步驟二(Step 2)：填入文字，按鍵盤的　＂ｔａｂ＂鍵換到下一個文字框～</h3>
                <h3 class="ts box_tablet p-3"><span><i class="fas fa-step-forward"></i></span>步驟二(Step 2)：填入文字，按鍵盤的　＂ｔａｂ＂鍵換到下一個文字框～</h3>
                <p class="ts box_cellphone text-white p-3"><span><i class="fas fa-step-forward"></i></span>步驟二(Step 2)：填入文字，按鍵盤的 "tab" 鍵換到下一個文字框～</p>
                <div class="row mt-2 text-center">
                    <div class="col-lg-4 col-sm-12">
                        <canvas id="myCanvas" width="350px" height="480px" style="border:1px solid #d3d3d3;">
                            Your browser does not support the HTML5 canvas tag.
                        </canvas>
                    </div>
                    <div class="col-lg-7 col-sm-12 ">
                        <form class="form-horizontal" id="card_form">
                            <div class="form-group text-left ts  pt-0">
                                <label class="control-label col" for="">收件人</label>
                                <div class="col">
                                    <input class="form-control " type="text" maxlength="18" id="receiver" onchange="fillText()" />
                                </div>
                                <label class="control-label col " for="">內文</label>
                                <div class=" col">
                                    <textarea rows="6" maxlength="198" id="context" style="width: 100%;" onchange="fillText()"></textarea>
                                </div>
                                <label class="control-label col" for="">寄件人</label>
                                <div class="col">
                                    <input class="form-control" type="text" maxlength="12" id="sender" onchange="fillText()" />
                                </div>
                                <label class="control-label col" for="">日期</label>
                                <div class="col">
                                    <input class="form-control" type="date" maxlength="10" id="time" onchange="fillText()" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        <h3 class="ts box_desktop p-3 "><span><i class="fas fa-step-forward"></i></span>驟三(Step 3)：確定以後就可以下載或email唷～</h3>
        <h3 class="ts box_tablet p-3 "><span><i class="fas fa-step-forward"></i></span>驟三(Step 3)：確定以後就可以下載或email唷～</h3>
        <p class="ts box_cellphone p-3 text-white "><span><i class="fas fa-step-forward"></i></span>驟三(Step 3)：確定以後就可以下載了喔～</p>
        <div class="container cardBoardBtn text-center">
            <button class="custom-btn btn-4  t_shadow  m-2" onclick="clearCanvas();clearFormJQuery();" value="clear">重寫</button>
            <button class="custom-btn btn-4 t_shadow m-2" onclick="downloadCanvas();" value="download">下載</button>
        </div>
        </div>
 

        <div class="container  m-auto " style="background-color: rgba(250, 195, 112, 0.2);">
            <h2 class="box_desktop b-green rot-135 text-center t_shadow mt-5">歡迎下載動畫卡片，把真誠的祝福傳送給朋友吧！</h2>
            <h2 class="box_tablet b-green rot-135 text-center t_shadow mt-5">歡迎下載動畫卡片，把真誠的祝福傳送給朋友吧！</h2>
            <h3 class="box_cellphone b-green rot-135 text-center t_shadow p-2 mb-4 ">歡迎下載動畫卡片<br>把真誠的祝福傳送給朋友吧！</h3>
            <div class="row align-items-start">
                <video class="col-lg-6 col-md-6 col-sm-12 mb-4" controls="controls">width="500" height="250"
                    <source src="./images/video/helloween.mp4" type="video/mp4">
                </video>
                <video class="col-lg-6 col-md-6 col-sm-12  mb-4" controls="controls">width="500" height="250"
                    <source src="./images/video/mid-autum festival.mp4" type="video/mp4">
                </video>

            </div>
        </div>
    </div>

    <?php include __DIR__ . '/parts/scripts.php'; ?>

    <script>
        //=============== cardBoard ====================
        var c = document.getElementById("myCanvas");
        var ctx = c.getContext("2d");
        var width = 360;
        var height = 480;


        // add text
        function fillText() {
            // fillText(text, x, y)
            clearCanvas();

            // draw image
            var id = document.querySelector("input:checked").value;
            var img = document.getElementById(id);
            drawImage_1(img);

            // draw text
            var receiver = document.getElementById("receiver").value;
            var context = document.getElementById("context").value;
            var sender = document.getElementById("sender").value;
            var time = document.getElementById("time").value;

            ctx.font = "1rem Arial italic";
            ctx.fillStyle = "rgba(116, 125, 136)";
            ctx.textAlign = "left";

            ctx.fillText(receiver, 35, 90);
            ctx.fillText(context.substr(0, 18), 35, 130);
            ctx.fillText(context.substr(20, 18), 35, 160);
            ctx.fillText(context.substr(40, 18), 35, 190);
            ctx.fillText(context.substr(60, 18), 35, 210);
            ctx.fillText(context.substr(80, 18), 35, 240);
            ctx.fillText(context.substr(100, 18), 35, 270);
            ctx.fillText(context.substr(120, 18), 35, 300);
            ctx.fillText(context.substr(140, 18), 35, 330);
            ctx.fillText(context.substr(160, 18), 35, 360);
            ctx.fillText(context.substr(180, 18), 35, 390);
            // console.log('ctx.measureText(txt).width', ctx.measureText(context).width);
            ctx.fillText(sender, 150, 420);
            ctx.fillText(time, 150, 440);
        }

        // image
        function drawImage_1(img) {
            // drawImage(url, x, y, width, height)
            // var img = document.getElementById("image1");
            clearCanvas();
            ctx.drawImage(img, 0, 0);
        }

        function drawImage_2() {
            // drawImage(url, selectFromX, selectFromY, selectWidth, selectHeight, x, y, width, height);
            var img = document.getElementById("image1");
            ctx.drawImage(img, 65, 80, 130, 105, 10, 10, 390, 315);
        }

        // clear and download
        function clearCanvas() {
            // x, y, width, height
            ctx.clearRect(0, 0, width, height);
        }


        function downloadCanvas() {
            var a = document.createElement("a");

            a.href = c.toDataURL("image/png");

            a.download = "image.png";
            a.click();
        }

        function clearForm() {
            var form = document.getElementById("card_form");
            var input_list = form.getElementsByTagName("input"); // [elem1, elem2]
            var textarea_list = form.getElementsByTagName("textarea"); // [elem1, [elem2, elem3]]
            for (var i = 0; i < input_list.length; i++) {
                input_list[i].value = "";
            }
            for (var i = 0; i < textarea_list.length; i++) {
                textarea_list[i].value = "";
            }
        }

        function clearFormJQuery() {
            var input_list = $("#card_form input, #card_form textarea");
            input_list.val("");
        }
    </script>
    <script>
        $(document).ready(function(){
            setTimeout(function () {
                $('.loader').fadeOut("slow");
            }, 7000);
        });
    </script>



    <?php include __DIR__ . '/parts/html-foot.php'; ?>