<?php

require __DIR__ . '/parts/config.php';


$month = "";
$time = "";
$cat_id = "";
$date = date("Y-m-d");

$month = $_GET['month'] ?? "";
$time = $_GET['time'] ?? "";
$cat_id = $_GET['cat_id'] ?? "";
$order = $_GET['order'] ?? "";



$sql = "SELECT `e`.*, ec.name as `ec_name`, SUM(`oe`.quantity) as quantity FROM `event` as e";
$sql_condition = [];
if ($month != "") {
    array_push($sql_condition, "MONTH(`date`) = $month");
}
if ($time != "") {
    array_push($sql_condition, "`time` = '$time'");
}
if ($cat_id != "") {
    array_push($sql_condition, "`cat_id` = $cat_id");
}

array_push($sql_condition, "`date` >= '$date'");

$sql .= " JOIN `event_category` as ec ON `cat_id` = ec.`id`";
$sql .= " LEFT JOIN `order_event` as oe ON e.id = oe.event_id";

if (sizeof($sql_condition) > 0) {
    $sql .= " WHERE ";
}
$sql .= implode(" AND ", $sql_condition);
$sql .= " group by e.id";
switch ($order) {
    case 1:
        $sql .= " ORDER BY `quantity` DESC";
        break;
    case 2:
        $sql .= " ORDER BY `price`";
        break;
    case 3:
        $sql .= " ORDER BY `price` DESC";
        break;
    default:
        $sql .= " ORDER BY `date`";
        break;
}
$stmt = $pdo->query($sql);
$events = $stmt->fetchAll();

// 抓圖片
// $sql = "SELECT * FROM `event_image` WHERE event_id = ".$event['id'];
// $stmt = $pdo->prepare($sql);
// $stmt->execute([]);
// $event_img = $stmt->fetchAll();


// 活動歷年總數
$sql = "SELECT e.name, IFNULL(sum(`quantity`), 0) as quantity FROM `event` as e LEFT JOIN `order_event` as oe ON e.id = oe.event_id GROUP BY `name`";
$stmt = $pdo->query($sql);
$quantity_list = $stmt->fetchAll();
$quantity_map = [];
foreach($quantity_list as $value){
    $quantity_map[$value['name']] = $value['quantity'];
}

// 活動類別
$sql = "SELECT * FROM `event_category`";

$stmt = $pdo->query($sql);
$event_category = $stmt->fetchAll();




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
$title = '活動體驗';
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
        <div class=" " id="event">
            <form action="event.php" method="get">
                <ul div class="row  m-0 p-2 ">
                    <li class=" ">
                        <select name='cat_id'>
                            <option value="">活動類別</option>
                            <?php
                            // foreach($event_category as $cat){
                            //     print("<option value='".$cat['id']."'>".$cat['name']."</option>");
                            // }
                            ?>
                            <?php foreach ($event_category as $cat) { ?>
                                <option value='<?= $cat['id'] ?>'><?= $cat['name'] ?></option>
                            <?php } ?>
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
                        <select name="time">
                            <option value="">時段</option>
                            <option value="10:00">10:00</option>
                            <option value="12:00">12:00</option>
                            <option value="14:00">14:00</option>
                            <option value="16:00">16:00</option>
                        </select>
                    </li>
                    <li class="2 bg-green">
                        <select name="order">
                            <option value="">排序</option>
                            <option value="1" <?= $order == 1 ? "selected" : "" ?>>暢銷度由高至低</option>
                            <option value="2" <?= $order == 2 ? "selected" : "" ?>>價錢由低至高</option>
                            <option value="3" <?= $order == 3 ? "selected" : "" ?>>價錢由高至低</option>
                        </select>
                    </li>
                    <button type="submit" class="custom-btn btn-4 m-0 p-0" style="width:3rem; ">送出</button>


                </ul>
            </form>
        </div>

        <div class="container con01 m-0 p-0 row  text-secondary">
            <div class="eventItem  row p-0 m-0">
                <?php foreach ($events as $event) : ?>
                    <h2 class='text-center b-green rot-135 col-12 p-2 m-0' id="event_<?= $event['id']?>">
                        <?= $event['name'] ?>
                    </h2>

                    <div class='col-lg-8  m-0 p-0'>
                    <img src='<?= WEB_ROOT."/".$event_img[0]['path'] ?>' alt=''>
                    </div>
                    <div class='col-lg-4  row m-0 p-0 pop '  id="event_<?= $event['id'] ?>">
                        <div>
                        
                            <div class='col-12 p-3 mt-0 ml-0 mr-0 'style="margin-bottom:60px">
                                <div > 
                                    <p class=" text-success">累積銷售數量： <?= $quantity_map[$event['name']] ?></p>

                                    <p>活動類別：<span style="font-size:1.2rem">
                                        <?= $event["ec_name"] ?></span>
                                    </p>
                                    <p>日期：
                                        <span style="font-size:1.2rem"><?= $event["date"] . '&emsp;' . substr($event["time"], 0, 5) ?></span>
                                    </p>
                                    <p>尚有名額/總額：
                                        <span style="font-size:1.2rem"><?= $event["limitNum"] - $event["quantity"]  ?>/<?= $event["limitNum"] ?></span> 人
                                    </p>
                                    <p>單價：<span class="c_pink_t" style="font-size:1.2rem">
                                            <?= $event["price"]  ?>
                                            </span>
                                    </p>
                                    <br>
                                    <div>
                                    </div>
                                    <!-- <span class="d-inline-block text-truncate" style="max-width: 150px;">
                                        <?php 
                                            $description = $event["description"]; 
                                            echo $description;
                                        ?>
                                    </span> -->
                                    <span>
                                        <?php 
                                            $description = $event["description"]; 
                                            if (strlen($description) > 50){
                                                $description = mb_substr($description, 0, 50, 'utf-8'). "...";
                                            }
                                            echo $description;
                                        ?>
                                         <a class='m-0 ' type="button" href="event_item.php?id=<?= $event['id'] ?>">更多資訊</a>
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
                                            <input type='number' value='1' min='1' max="<?= $event['limitNum'] - $event['quantity'] ?>" name='quantity' id='quantity' style='width: 3rem; ' placeholder='1' class=''>
                                        </div>
                                        <button class='btn add-to-cart m-0 ' type="button" data-toggle="modal" data-target="#addToCartAlert" onclick="tr_addTransaction('event', 'cart', '<?= $event['id'] ?>')"><i class='fas fa-cart-plus'></i></button>
                                        <button class='btn add-to-wishList m-0 ' type="button"  data-toggle="modal" data-target="#addToWishListAlert" onclick="tr_addTransaction('event', 'wishList', '<?= $event['id'] ?>')" ><i class='fas fa-heart' ></i></button>
                                    </div>
                                </form>
                            </div>


                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

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
        $("#select_month option").each(function(ind, elem) {
            if (ind > 0) {
                elem.text = month;
                elem.value = month;
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
        if (location.search) {
            $('html, body').scrollTop(910);
        }
        $(".c_pink_t").each(function(ind, elem){
            $(elem).text(dallorCommas($(elem).text()) + "元"); 
        });
        scroll();
    });
    </script>
    <?php include __DIR__ . '/parts/html-foot.php'; ?>