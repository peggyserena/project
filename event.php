<?php

require __DIR__ . '/parts/config.php';
// 取得總筆數, 總頁數, 該頁的商品資料

// $perPage = 4; // 每一頁有幾筆
// $page = isset($_GET['page']) ? intval($_GET['page']) : 1; // 用戶要看第幾頁的商品

// $t_sql = "SELECT COUNT(1) FROM event $where ";
// // $t_sql = "SELECT COUNT(1) FROM address_book";
// $totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];
// $totalPages = ceil($totalRows / $perPage);

// if ($page < 1) $page = 1;
// if ($page > $totalPages) $page = $totalPages;

// $p_sql = sprintf("SELECT * FROM event $where LIMIT %s, %s ", ($page - 1) * $perPage, $perPage);

// $rows = $pdo->query($p_sql)->fetchAll();


?>

<?php
$title = '森林體驗';
$pageName = 'event';
?>
<?php include __DIR__ . '/parts/html-head.php'; ?>
<link rel="stylesheet" href="<?= WEB_ROOT ?>/css/event.css">
<?php include __DIR__ . '/parts/navbar.php'; ?>
<style>

</style>



<body>
    <?php include "parts/transaction.php"?>
    <!-- <div class="container">
        <div class="col">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
                        <a class="page-link" href="?<?php $qs['page'] = $page - 1;
                                                    echo http_build_query($qs); ?>">
                            <i class="fas fa-arrow-circle-left"></i>
                        </a>
                    </li>
                    <?php for ($i = $page - 2; $i <= $page + 2; $i++) :
                        if ($i >= 1 and $i <= $totalPages) :
                            $qs['page'] = $i;
                    ?>
                            <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                                <a class="page-link" href="?<?= http_build_query($qs) ?>"><?= $i ?></a>
                            </li>
                        <?php endif; ?>
                    <?php endfor; ?>
                    <li class="page-item <?= $page >= $totalPages ? 'disabled' : '' ?>">
                        <a class="page-link" href="?<?php $qs['page'] = $page + 1;
                                                    echo http_build_query($qs); ?>">
                            <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

    </div> -->
    
    

    <main id="event_contain">
        <div class="container">
            <div class="box row mt-5 mb-5 ">
                <div class="col-lg-8 col-md-12 col-sm-12 row align-items-center ml-0 mr-0 ">
                    <h3 class="box_desktop text-white t_shadow text-center rot-135" style="line-height: 200%;">
                        置身於紫色森林，放下生活的束縛，<br>打開心靈的耳朵，傾聽大自然的聲音，<br>欣賞得天獨厚的湖光山色，體驗到豐富的生態資源～<br><br>
                        薰衣草森林的探索與手作體驗，<br>以最初的心念，向旅人傳遞幸福，<br>尋回自己的夢想與勇氣，感受這座森林的紫色幸福！
                    </h3>
                    <h3 class="box_tablet text-white t_shadow text-center rot-135" style="line-height: 200%;">
                        置身於紫色森林，放下生活的束縛，<br>打開心靈的耳朵，傾聽大自然的聲音，<br>欣賞得天獨厚的湖光山色，體驗到豐富的生態資源～<br><br>
                        薰衣草森林的探索與手作體驗，<br>以最初的心念，向旅人傳遞幸福，<br>尋回自己的夢想與勇氣，感受這座森林的紫色幸福！
                    </h3>
                    <h3 class="box_cellphone text-white t_shadow text-center rot-135 p-4 mb-4" style="line-height: 200%;">
                        置身於紫色森林，<br> 放下生活的束縛，<br>打開心靈的耳朵，<br> 傾聽大自然的聲音，<br>欣賞得天獨厚的湖光山色，<br>體驗到豐富的生態資源～<br><br>
                        薰衣草森林的探索與手作體驗，<br>以最初的心念，<br>向旅人傳遞幸福，<br>尋回自己的夢想與勇氣，<br>感受這座森林的紫色幸福！
                    </h3>
                </div>
                <div class="box_calendar col-lg-4 col-md-12 col-sm-12  mt-lg-0  mt-sm-5 mt-md-5">
                    <div id="calendar" class=""></div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="m-0 p-0 " id="event">
                <form action="event.php" method="get">
                <ul class="row list-unstyled p-2 m-0 justify-content-center align-items-center ">
                        <li class=" ">
                            <select id="select_cat_id" name='cat_id'>
                                <option value="">活動類別</option>
                            </select>
                        </li>
                        <li class="">
                            <select id="select_month" name="month">
                                <option value="">月份</option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                            </select>
                        </li>
                        <li class=" ">
                            <select id="select_time" name="time">
                                <option value="">時段</option>
                                <option value="00:00-10:00" <?= $_GET['time'] ?? "" === "00:00-10:00" ? "selected" : "" ?>>10:00~之前</option>
                                <option value="10:00-12:00"  <?= $_GET['time'] ?? "" === "10:00-12:00" ? "selected" : "" ?>>10:00~12:00</option>
                                <option value="12:00-14:00"  <?= $_GET['time'] ?? "" === "12:00-14:00" ? "selected" : "" ?>>12:00~14:00</option>
                                <option value="14:00-16:00"  <?= $_GET['time'] ?? "" === "14:00-16:00" ? "selected" : "" ?>>14:00~16:00</option>
                                <option value="16:00-18:00"  <?= $_GET['time'] ?? "" === "16:00-18:00" ? "selected" : "" ?>>16:00~18:00</option>
                                <option value="18:00-23:59"  <?= $_GET['time'] ?? "" === "18:00-23:59" ? "selected" : "" ?>>18:00~之後</option>
                            </select>
                        </li>
                        <li class="2 bg-green">
                            <select id="select_order" name="order">
                                <option value="">排序</option>
                                <option value="1" <?= $_GET['order'] ?? "" == 1 ? "selected" : "" ?>>暢銷度由高至低</option>
                                <option value="2" <?= $_GET['order'] ?? "" == 2 ? "selected" : "" ?>>價錢由低至高</option>
                                <option value="3" <?= $_GET['order'] ?? "" == 3 ? "selected" : "" ?>>價錢由高至低</option>
                            </select>
                        </li>
                        <li><button type="submit" class="custom-btn btn-4 m-0 p-0" style="width:3rem; ">送出</button></li>


                    </ul>
                </form>
            </div>
        </div>

        <div class="container justify-content-center m-auto  row  text-secondary event_data" style="display: none;">
            <h2 class='text-center b-green rot-135 col-sm-12  p-2 m-0 event_name'></h2>
            <div class="eventItem col-sm-12 justify-content-center row px-0 ">
                <div class='col-lg-8  m-0 p-0'>
                    <div class='p-0 m-0'><img class="event_img_cover" src='' alt=''> </div>
                </div>
                <div class='col-lg-4  col-sm-12 row m-0 p-0 pop ' style="background-color: whitesmoke;">
                    
                        <div class='col-12 p-3 mt-0 ml-0 mr-0 'style="margin-bottom:60px">
                                <p class="text-success">累積銷售數量： <span class="event_quantity"></span></p>

                                <p>活動類別：<span style="font-size:1.2rem">
                                    <span class="ec_name"></span>
                                </p>
                                <p>日期：
                                    <span style="font-size:1.2rem" class="event_datetime"></span>
                                </p>
                                <p>尚有名額/總額：
                                    <span style="font-size:1.2rem" class="event_available_quantity"></span> 人
                                </p>
                                <p>單價：<span class="event_price" class="c_pink_t" style="font-size:1.2rem"></span>
                                </p>                                    
                                <br>
                                <div>
                                    <span class="event_description">
                                    </span> 
                                    <span>
                                        <a  class='event_link m-0 ' type="button" href="">更多資訊</a>
                                    </span> 
                                </div>
                        </div>
                        <div class='col-12 p-0 m-0 priceBar01'>
                            <form class='' action='' method=''>
                                <div class='d-flex c_pink justify-content-around pt-2 pb-2 pl-4 pr-4 '>
                                    <div class='d-flex align-items-center'>
                                        <label for='' class='m-0 p-0'>
                                            <h4 class='m-0 pr-2'>參加人數</h4>
                                        </label>
                                        <input type='number' value='1' min='1' max="" name='quantity' class='event_quantity_input' style='width: 3rem; ' placeholder='1' class=''>
                                    </div>
                                    <button class='btn add-to-cart m-0 ' type="button" data-toggle="modal" data-target="#addToCartAlert" onclick=""><i class='fas fa-cart-plus'></i></button>
                                    <button class='btn add-to-wishList m-0 ' type="button"  data-toggle="modal" data-target="#addToWishListAlert" onclick="" ><i class='fas fa-heart' ></i></button>
                                </div>
                            </form>
                        </div>
                    </div>

            </div>

        </div>

    </main>

    <?php include __DIR__ . '/parts/scripts.php'; ?>

    <script>
        !(function() {
            var today = moment();

            function Calendar(selector, events) {
                this.el = document.querySelector(selector);
                this.events = events;
                this.current = moment().date(1);
                this.draw();
                var current = document.querySelector(".today");
                if (current) {
                    var self = this;
                    window.setTimeout(function() {
                        self.openDay(current);
                    }, 500);
                }
            }

            Calendar.prototype.draw = function() {
                //Create Header
                this.drawHeader();

                //Draw Month
                this.drawMonth();

                this.drawLegend();
            };

            Calendar.prototype.drawHeader = function() {
                var self = this;
                if (!this.header) {
                    //Create the header elements
                    this.header = createElement("div", "header");
                    this.header.className = "header";

                    this.title = createElement("h1");

                    var right = createElement("div", "right");
                    right.addEventListener("click", function() {
                        self.nextMonth();
                    });

                    var left = createElement("div", "left");
                    left.addEventListener("click", function() {
                        self.prevMonth();
                    });

                    //Append the Elements
                    this.header.appendChild(this.title);
                    this.header.appendChild(right);
                    this.header.appendChild(left);
                    this.el.appendChild(this.header);
                }

                this.title.innerHTML = this.current.format("MMMM YYYY");
            };

            Calendar.prototype.drawMonth = function() {
                var self = this;

                this.events.forEach(function(ev) {
                    ev.date = self.current.clone().date(Math.random() * (29 - 1) + 1);
                });

                if (this.month) {
                    this.oldMonth = this.month;
                    this.oldMonth.className = "month out " + (self.next ? "next" : "prev");
                    this.oldMonth.addEventListener("webkitAnimationEnd", function() {
                        self.oldMonth.parentNode.removeChild(self.oldMonth);
                        self.month = createElement("div", "month");
                        self.backFill();
                        self.currentMonth();
                        self.fowardFill();
                        self.el.appendChild(self.month);
                        window.setTimeout(function() {
                            self.month.className = "month in " + (self.next ? "next" : "prev");
                        }, 16);
                    });
                } else {
                    this.month = createElement("div", "month");
                    this.el.appendChild(this.month);
                    this.backFill();
                    this.currentMonth();
                    this.fowardFill();
                    this.month.className = "month new";
                }
            };

            Calendar.prototype.backFill = function() {
                var clone = this.current.clone();
                var dayOfWeek = clone.day();

                if (!dayOfWeek) {
                    return;
                }

                clone.subtract("days", dayOfWeek + 1);

                for (var i = dayOfWeek; i > 0; i--) {
                    this.drawDay(clone.add("days", 1));
                }
            };

            Calendar.prototype.fowardFill = function() {
                var clone = this.current.clone().add("months", 1).subtract("days", 1);
                var dayOfWeek = clone.day();

                if (dayOfWeek === 6) {
                    return;
                }

                for (var i = dayOfWeek; i < 6; i++) {
                    this.drawDay(clone.add("days", 1));
                }
            };

            Calendar.prototype.currentMonth = function() {
                var clone = this.current.clone();

                while (clone.month() === this.current.month()) {
                    this.drawDay(clone);
                    clone.add("days", 1);
                }
            };

            Calendar.prototype.getWeek = function(day) {
                if (!this.week || day.day() === 0) {
                    this.week = createElement("div", "week");
                    this.month.appendChild(this.week);
                }
            };

            Calendar.prototype.drawDay = function(day) {
                var self = this;
                this.getWeek(day);

                //Outer Day
                var outer = createElement("div", this.getDayClass(day));
                outer.addEventListener("click", function() {
                    self.openDay(this);
                });

                //Day Name
                var name = createElement("div", "day-name", day.format("ddd"));

                //Day Number
                var number = createElement("div", "day-number", day.format("DD"));

                //Events
                var events = createElement("div", "day-events");
                this.drawEvents(day, events);

                outer.appendChild(name);
                outer.appendChild(number);
                outer.appendChild(events);
                this.week.appendChild(outer);
            };

            Calendar.prototype.drawEvents = function(day, element) {
                if (day.month() === this.current.month()) {
                    var todaysEvents = this.events.reduce(function(memo, ev) {
                        if (ev.date.isSame(day, "day")) {
                            memo.push(ev);
                        }
                        return memo;
                    }, []);

                    todaysEvents.forEach(function(ev) {
                        var evSpan = createElement("span", ev.color);
                        element.appendChild(evSpan);
                    });
                }
            };

            Calendar.prototype.getDayClass = function(day) {
                classes = ["day"];
                if (day.month() !== this.current.month()) {
                    classes.push("craft");
                } else if (today.isSame(day, "day")) {
                    classes.push("today");
                }
                return classes.join(" ");
            };

            Calendar.prototype.openDay = function(el) {
                var details, arrow;
                var dayNumber = +el.querySelectorAll(".day-number")[0].innerText ||
                    +el.querySelectorAll(".day-number")[0].textContent;
                var day = this.current.clone().date(dayNumber);

                var currentOpened = document.querySelector(".details");

                //Check to see if there is an open detais box on the current row
                if (currentOpened && currentOpened.parentNode === el.parentNode) {
                    details = currentOpened;
                    arrow = document.querySelector(".arrow");
                } else {
                    //Close the open events on differnt week row
                    //currentOpened && currentOpened.parentNode.removeChild(currentOpened);
                    if (currentOpened) {
                        currentOpened.addEventListener("webkitAnimationEnd", function() {
                            currentOpened.parentNode.removeChild(currentOpened);
                        });
                        currentOpened.addEventListener("oanimationend", function() {
                            currentOpened.parentNode.removeChild(currentOpened);
                        });
                        currentOpened.addEventListener("msAnimationEnd", function() {
                            currentOpened.parentNode.removeChild(currentOpened);
                        });
                        currentOpened.addEventListener("animationend", function() {
                            currentOpened.parentNode.removeChild(currentOpened);
                        });
                        currentOpened.className = "details out";
                    }

                    //Create the Details Container
                    details = createElement("div", "details in");

                    //Create the arrow
                    var arrow = createElement("div", "arrow");

                    //Create the event wrapper

                    details.appendChild(arrow);
                    el.parentNode.appendChild(details);
                }

                var todaysEvents = this.events.reduce(function(memo, ev) {
                    if (ev.date.isSame(day, "day")) {
                        memo.push(ev);
                    }
                    return memo;
                }, []);

                this.renderEvents(todaysEvents, details);

                arrow.style.left = el.offsetLeft - el.parentNode.offsetLeft + 27 + "px";
            };

            Calendar.prototype.renderEvents = function(events, ele) {
                //Remove any events in the current details element
                var currentWrapper = ele.querySelector(".events");
                var wrapper = createElement(
                    "div",
                    "events in" + (currentWrapper ? " new" : "")
                );

                events.forEach(function(ev) {
                    var div = createElement("div", "event");
                    var square = createElement("div", "event-category " + ev.color);
                    var span = createElement("span", "", ev.eventName);

                    div.appendChild(square);
                    div.appendChild(span);
                    wrapper.appendChild(div);
                });

                if (!events.length) {
                    var div = createElement("div", "event empty");
                    var span = createElement("span", "", "No Events");

                    div.appendChild(span);
                    wrapper.appendChild(div);
                }

                if (currentWrapper) {
                    currentWrapper.className = "events out";
                    currentWrapper.addEventListener("webkitAnimationEnd", function() {
                        currentWrapper.parentNode.removeChild(currentWrapper);
                        ele.appendChild(wrapper);
                    });
                    currentWrapper.addEventListener("oanimationend", function() {
                        currentWrapper.parentNode.removeChild(currentWrapper);
                        ele.appendChild(wrapper);
                    });
                    currentWrapper.addEventListener("msAnimationEnd", function() {
                        currentWrapper.parentNode.removeChild(currentWrapper);
                        ele.appendChild(wrapper);
                    });
                    currentWrapper.addEventListener("animationend", function() {
                        currentWrapper.parentNode.removeChild(currentWrapper);
                        ele.appendChild(wrapper);
                    });
                } else {
                    ele.appendChild(wrapper);
                }
            };

            Calendar.prototype.drawLegend = function() {
                var legend = createElement("div", "legend");
                var calendars = this.events
                    .map(function(e) {
                        return e.calendar + "|" + e.color;
                    })
                    .reduce(function(memo, e) {
                        if (memo.indexOf(e) === -1) {
                            memo.push(e);
                        }
                        return memo;
                    }, [])
                    .forEach(function(e) {
                        var parts = e.split("|");
                        var entry = createElement("span", "entry " + parts[1], parts[0]);
                        legend.appendChild(entry);
                    });
                this.el.appendChild(legend);
            };

            Calendar.prototype.nextMonth = function() {
                this.current.add("months", 1);
                this.next = true;
                this.draw();
            };

            Calendar.prototype.prevMonth = function() {
                this.current.subtract("months", 1);
                this.next = false;
                this.draw();
            };

            window.Calendar = Calendar;

            function createElement(tagName, className, innerText) {
                var ele = document.createElement(tagName);
                if (className) {
                    ele.className = className;
                }
                if (innerText) {
                    ele.innderText = ele.textContent = innerText;
                }
                return ele;
            }
        })();

        !(function() {
            var data = [{
                    eventName: "祈福儀式",
                    calendar: "節慶",
                    color: "orange"
                },
                {
                    eventName: "薰衣草節",
                    calendar: "節慶",
                    color: "orange"
                },
                {
                    eventName: "🌲森林一畝田，心裡一畝田🌲",
                    calendar: "森林體驗",
                    color: "yellow"
                },
                {
                    eventName: "凍凍市集",
                    calendar: "節慶",
                    color: "orange"
                },

                {
                    eventName: "森林音樂會",
                    calendar: "音樂會",
                    color: "blue"
                },
                {
                    eventName: "森林音樂會",
                    calendar: "音樂會",
                    color: "blue"
                },
                {
                    eventName: "森林音樂會",
                    calendar: "音樂會",
                    color: "blue"
                },
                {
                    eventName: "森林音樂會",
                    calendar: "音樂會",
                    color: "blue"
                },

                {
                    eventName: "🌲森林探索家．來一趟自然的探索🌳",
                    calendar: "森林體驗",
                    color: "yellow"
                },
                {
                    eventName: "森林派對",
                    calendar: "森林體驗",
                    color: "yellow"
                },
                {
                    eventName: "森林野餐會",
                    calendar: "森林體驗",
                    color: "yellow"
                },
                {
                    eventName: "森林螢河旅行",
                    calendar: "森林體驗",
                    color: "yellow"
                },

                {
                    eventName: "午茶花課",
                    calendar: "手工藝",
                    color: "green"
                },
                {
                    eventName: "幸福臉譜-植物拼畫",
                    calendar: "手工藝",
                    color: "green"
                },
                {
                    eventName: "春日苔球",
                    calendar: "手工藝",
                    color: "green"
                },
                {
                    eventName: "手作花草餅乾",
                    calendar: "手工藝",
                    color: "green"
                }
            ];

            function addDate(ev) {}

            var calendar = new Calendar("#calendar", data);
        })();
    </script>
    <script>
        var date = new Date();
        var month = date.getMonth() + 1;
        var selected_month = parseInt("<?= $_GET['month'] ?? '' ?>");
        $("#select_month option").each(function(ind, elem) {
            if (ind > 0) {
                elem.text = month;
                elem.value = month;
                if (month === selected_month){
                    $(elem).prop("selected", true);
                }
                month++;
            }
            if (month > 12) {
                month = 1;
            }
        });
    </script>
    <script>
        function scroll(){
            console.log('test' + window.scrollY);
            if (location.href.indexOf("#event") > -1){
                window.scrollTo(0, window.scrollY - 70)
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            $(".c_pink_t").each(function(ind, elem){
                $(elem).text(dallorCommas($(elem).text()) + "元");
            });
            scroll();
            $.post('api/event-api.php', {
                action: 'readAll',
                month: $("#select_month").val(),
                time: $("#select_time").val(),
                cat_id: $("#select_cat_id").val(),
                order: $("#select_order").val(),
            }, function(result){
                data = result['data'];
                for (key in data){
                    elem = data[key];
                    output = $($(".event_data")[0]).clone();
                    output.show();
                    $("#event_contain").append(output);
                    elem['img'] = result['img'][elem['id']];
                    elem['quantity_map'] = result['quantity_map'];
                    console.log(elem);
                    fillData(elem, output);
                }
                
            }, 'json').fail(function(data){
                console.log('error');
                console.log(data);
            })
            var selected_cat_id = parseInt("<?= $_GET['cat_id'] ?? ''?>");
            $.post('api/event-api.php', {
                action: 'readCat',
            }, function(result){
                result.forEach(function(elem){
                    output = `<option value='${elem['id']}' ${selected_cat_id == elem['id'] ? "selected" : ""}>${elem['name']}</option>`;
                    $("#select_cat_id").append(output);
                })
                
            }, 'json').fail(function(data){
                console.log('error');
                console.log(data);
            })


            
        });
    function fillData(data, elem){
        var event_img_cover = "";
        if (typeof(data['img']) !== "undefined"){
            event_img_cover = "<?= WEB_ROOT."/" ?>" + data['img'][0]['path'];
        }
        list = [
            {
                selector: ".eventItem",
                attr: {
                    id: `event_${data['id']}`,
                }
            },
            {
                selector: ".event_name",
                text: data['name'],
            },
            {
                selector: ".event_img_cover",
                attr: {
                    src: event_img_cover
                }
            },
            {
                selector: ".event_quantity",
                text: data['quantity_map'][data['name']],
            },
            {
                selector: ".event_datetime",
                text: `${data['date']} ${data['time'].substr(0, 5)}`,
            },
            {
                selector: ".event_available_quantity",
                text:`${data['limitNum'] - data['quantity']}/${data['limitNum']}`,
            },
            {
                selector: ".event_price",
                text: data['price'],
            },
            {
                selector: ".event_quantity_input",
                attr: {
                    max: data['limitNum'] - data['quantity'],
                },
            },

            {
                selector: ".ec_name",
                text: data['ec_name'],
            },
            {
                selector: ".event_location",
                text: data['location'],
            },
            {
                selector: ".event_limitNum",
                text: data['limitNum'],
            },
            {
                selector: ".event_content",
                text: data['content'],
            },
            {
                selector: ".event_description",
                text: substr(data['description'], 50),
            },
            {
                selector: ".event_link",
                attr: {
                    href: `event_item.php?id=${data['id']}`
                }
            },
            {
                selector: ".add-to-cart",
                attr: {
                    onclick: `tr_addTransaction('event', 'cart', ${data['id']})`
                }
            },
            {
                selector: ".add-to-wishList",
                attr: {
                    onclick: `tr_addTransaction('event', 'wishList', ${data['id']})`
                }
            },
        ]
        
        // map
        // {
        //     selector: "#event_name",
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

        
        if (typeof(data['img']) !== "undefined"){
            data['img'].forEach(function(data_img){
                var output = `<a href='<?= WEB_ROOT."/" ?>${data_img['path']}' data-fancybox='F_box1' data-caption=' ${data['name']}'>
                        <img src='<?= WEB_ROOT."/" ?>${data_img['path']}' alt=''>
                    </a>`
                $(".fancybox").append(output);
            })
        }
    }
    </script>

    <script>
    $(document).ready(function() {
        if (location.search) {
            $('html, body').scrollTop(910);
        }
        $(".c_pink_t").each(function(ind, elem){
            $(elem).text(dallorCommas($(elem).text()) + "元"); 
        });
        scroll();
    });
    </script>
    <script>
        function substr(str, count, pad = "..."){
            if (str.length > count){
                str = str.substring(0, count) + pad;
            }else{
                str = str.substring(0, count);
            }
            return str;
        }

    </script>
    <?php include __DIR__ . '/parts/html-foot.php'; ?>