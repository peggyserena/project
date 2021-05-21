<?php include __DIR__ . '/parts/config.php'; ?>
<?php
$title = 'Fun';
$pageName = 'fun';
?>
<?php include __DIR__ . '/parts/html-head.php'; ?>
<?php include __DIR__ . '/parts/navbar.php'; ?>

</head>
<style>
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


    }

    #cardBoard {
        font-size: 1.2rem;
        font-weight: 900;
        position: relative;
    }


    #cardBoard>div>div {
        margin: 0.5rem;
    }
</style>

<body>

    <div class="container bgImg">
        <h2 class=" b-green rot-135 text-center ">寫張卡片把喜悅快樂 分享給朋友吧！</h2>

        <div id="cardBoard">
            <hr>
            <h3 class="ts p-3"><span><i class="fas fa-step-forward"></i></span>步驟一(Step 1)：選取喜歡的卡片</h3>
            <div class="d-flex ">
                <div>
                    <img src="./images/card/card01.svg" id="image1">
                    <input type="radio" name="img" onchange="drawImage_1(document.getElementById(this.value))" value="image1" />
                </div>
                <div>
                    <img src="./images/card/card02.svg" id="image2">
                    <input type="radio" name="img" onchange="drawImage_1(document.getElementById(this.value))" value="image2" />
                </div>
                <div>
                    <img src="./images/card/card03.svg" id="image3">
                    <input type="radio" name="img" onchange="drawImage_1(document.getElementById(this.value))" value="image3" />
                </div>
                <div>
                    <img src="./images/card/card04.svg" id="image4">
                    <input type="radio" name="img" onchange="drawImage_1(document.getElementById(this.value))" value="image4" />
                </div>
                <div>
                    <img src="./images/card/card05.svg" id="image5">
                    <input type="radio" name="img" onchange="drawImage_1(document.getElementById(this.value))" value="image5" />
                </div>
            </div>
            <h3 class="ts p-3"><span><i class="fas fa-step-forward"></i></span>步驟二(Step 2)：填入文字，按鍵盤的　＂Ｔａｂ＂鍵換到下一個文字框～</h3>
            <div class="row mt-2 text-center">
                <div class="col-lg-4 col-sm-12">
                    <canvas id="myCanvas" width="360" height="480" style="border:1px solid #d3d3d3;">
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
        <h3 class="ts p-3 "><span><i class="fas fa-step-forward"></i></span>驟三(Step 3)：確定以後就可以下載或email唷～</h3>
        <div class="container cardBoardBtn text-center">
            <button class="custom-btn btn-4 " onclick="clearCanvas();clearFormJQuery();" value="clear">重寫</button>
            <button class="custom-btn btn-4" onclick="downloadCanvas();" value="download">下載</button>
            <a href="mailto:example@gmail.com"><button class="custom-btn btn-4">email</button></a>
        </div>
        <h2 class="c_pink_t">可否直接email夾帶png寄出 或分享到FB messenger Line?</h2>
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
    <?php include __DIR__ . '/parts/html-foot.php'; ?>