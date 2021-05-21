<?php include __DIR__ . '/parts/config.php';

?>
<?php
$title = '美食饗宴';
$pageName = 'restaurant';
?>
<?php include __DIR__ . '/parts/html-head.php'; ?>

<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<script src="./restaurant/booklet/jquery.easing.1.3.js" type="text/javascript"></script>
<script src="./restaurant/booklet/jquery.booklet.1.1.0.min.js" type="text/javascript"></script>
<link href="./restaurant/booklet/jquery.booklet.1.1.0.css" type="text/css" rel="stylesheet" media="screen" />
<link rel="stylesheet" href="./restaurant/css/style.css" type="text/css" media="screen" />
<script src="./restaurant/cufon/cufon-yui.js" type="text/javascript"></script>
<script src="./restaurant/cufon/ChunkFive_400.font.js" type="text/javascript"></script>
<script src="./restaurant/cufon/Note_this_400.font.js" type="text/javascript"></script>
<script type="text/javascript">
	Cufon.replace('h1,p,.b-counter');
	Cufon.replace('.book_wrapper a', {
		hover: true
	});
	Cufon.replace('.title', {
		text: '1px 1px #C59471',
		fontFamily: 'ChunkFive'
	});
	Cufon.replace('.reference a', {
		text: '1px 1px #C59471',
		fontFamily: 'ChunkFive'
	});
	Cufon.replace('.loading', {
		text: '1px 1px #000',
		fontFamily: 'ChunkFive'
	});
</script>
<?php include __DIR__ . '/parts/navbar.php'; ?>
<style>
	input {
		color: black;
	}

	select {
		color: black;
	}

	h2 i {
		color: #adda9a;
		width: 2rem;
	}

	.container>div>div>div>h4 {
		padding: 0 1rem;
	}

	.container>div>h2 {
		margin: 3rem 0 2rem 0;
		color: white;

	}

	.container>h2 {
		margin: 3rem 0 2rem 0;
	}

	/* ===================== seatchart ====================== */
	.b-load img {
		height: 50%;
		object-fit: contain;
	}

	.seatChart_02 img {
		width: 1110px;
	}

	.seatChart_num>div>input[type="checkbox"]:checked~label {
		background-color: #0000E3;
		font-weight: 900;
		width: 30px;
		height: 30px;
		border-radius: 50%;
		line-height: 30px;
		text-align: center;

	}

	.seatChart_num>div>input {
		display: none;
	}

	.seatChart_num>div>label {
		width: 30px;
		height: 30px;
		border-radius: 50%;
		line-height: 30px;
		text-align: center;
		background-color: #C07AB8;
		font-weight: 900;
	}

	.seatChart_num>div>label:hover {
		background-color: #2ACD72;
		font-weight: 900;

	}

	.seatChart_parents {
		text-align: center;
		margin: 0 auto;

	}

	.seatChart_num {
		position: relative;
		margin: 0 auto;
		text-align: center;
		transform: translateX(-50%);
		left: 50%;
	}

	.seatChart_num>div:nth-child(1) {
		position: absolute;
		top: 335px;
		left: 78px;
	}

	.seatChart_num>div:nth-child(2) {
		position: absolute;
		top: 390px;
		left: 78px;
	}

	.seatChart_num>div:nth-child(3) {
		position: absolute;
		top: 450px;
		left: 78px;
	}

	.seatChart_num>div:nth-child(4) {
		position: absolute;
		top: 520px;
		left: 78px;
	}

	.seatChart_num>div:nth-child(5) {
		position: absolute;
		top: 595px;
		left: 78px;
	}

	.seatChart_num>div:nth-child(6) {
		position: absolute;
		top: 370px;
		left: 135px;
	}

	.seatChart_num>div:nth-child(7) {
		position: absolute;
		top: 443px;
		left: 135px;
	}

	.seatChart_num>div:nth-child(8) {
		position: absolute;
		top: 512px;
		left: 135px;
	}

	.seatChart_num>div:nth-child(9) {
		position: absolute;
		top: 583px;
		left: 135px;
	}

	.seatChart_num>div:nth-child(10) {
		position: absolute;
		top: 325px;
		left: 245px;
	}

	.seatChart_num>div:nth-child(11) {
		position: absolute;
		top: 455px;
		left: 195px;
	}

	.seatChart_num>div:nth-child(12) {
		position: absolute;
		top: 455px;
		left: 270px;
	}

	.seatChart_num>div:nth-child(13) {
		position: absolute;
		top: 600px;
		left: 225px;
	}

	.seatChart_num>div:nth-child(14) {
		position: absolute;
		top: 510px;
		left: 385px;
	}

	.seatChart_num>div:nth-child(15) {
		position: absolute;
		top: 510px;
		left: 426px;
	}

	.seatChart_num>div:nth-child(16) {
		position: absolute;
		top: 510px;
		left: 468px;
	}

	.seatChart_num>div:nth-child(17) {
		position: absolute;
		top: 510px;
		left: 513px;
	}

	.seatChart_num>div:nth-child(18) {
		position: absolute;
		top: 510px;
		left: 560px;
	}

	.seatChart_num>div:nth-child(19) {
		position: absolute;
		top: 510px;
		left: 605px;
	}

	.seatChart_num>div:nth-child(20) {
		position: absolute;
		top: 360px;
		left: 799px;
	}

	.seatChart_num>div:nth-child(21) {
		position: absolute;
		top: 360px;
		left: 870px;
	}

	.seatChart_num>div:nth-child(22) {
		position: absolute;
		top: 350px;
		left: 905px;
	}

	.seatChart_num>div:nth-child(23) {
		position: absolute;
		top: 350px;
		left: 963px;
	}

	.seatChart_num>div:nth-child(24) {
		position: absolute;
		top: 208px;
		left: 992px;
	}

	.seatChart_num>div:nth-child(25) {
		position: absolute;
		top: 180px;
		left: 605px;
	}

	.seatChart_num>div:nth-child(26) {
		position: absolute;
		top: 297px;
		left: 620px;
	}

	.container>div>div>label {
		font-weight: 600;
		font-size: 1.2rem;
		padding-left: 2rem;
		padding-bottom: 2rem;
	}

	.container>div>div>label>i {
		color: #adda9a;
		padding-right: 0.2rem;
	}

	.container>div>div>input {
		text-align: center;
	}


	.orderBoard {
		padding: 2rem;
		border-radius: 0.25rem;
		background-color: rgb(255, 255, 255);
		color: #5f5f5f;
	}

	.orderBoard button {
		border: 2px solid white;

	}
</style>

<body>

	<div style="text-align:center;clear:both">
		<script src="/gg_bd_ad_720x90.js" type="text/javascript"></script>
		<script src="/follow.js" type="text/javascript"></script>
	</div>
	<div class="container rounded pb-0 text-white ">
		<h1 class="text-center text-white pt-3 pb-0 t_shadow" style="font-weight:900;">MENU</h1>
		<div class="book_wrapper ">
			<a id="next_page_button"></a>
			<a id="prev_page_button"></a>
			<div id="loading" class="loading">Loading pages...</div>
			<div id="mybook" style="display:none;">
				<div class="b-load">
					<div>
						<img src="./restaurant/images/set_01.jpg" alt="" />
						<h1>Slider Gallery</h1>
						<p>This tutorial is about creating a creative gallery with a
							slider for the thumbnails. The idea is to have an expanding
							thumbnails area which opens once an album is chosen.
							The thumbnails will scroll to the end and move back to
					</div>
					<div>
						<img src="./restaurant/images/set_02.jpg" alt="" />
						<h1>Animated Portfolio Gallery</h1>
						<p>Today we will create an animated portfolio gallery with jQuery.
							The gallery will contain a scroller for thumbnails and a
							content area where we will display details about the portfolio
					</div>
					<div>
						<img src="./restaurant/images/set_04.jpg" alt="" />
						<h1>Annotation Overlay Effect</h1>
						<p>Today we will create a simple overlay effect to display annotations in e.g. portfolio
							items of a web designers portfolio. We got the idea from the wonderful
					</div>
					<div>
						<img src="./restaurant/images/set_05.jpg" alt="" />
						<h1>Bubbleriffic Image Gallery</h1>
						<p>In this tutorial we will create a bubbly image gallery that
							shows your images in a unique way. The idea is to show the
							thumbnails of albums in a rounded fashion allowing the
							fit into the screen.</p>
					</div>
					<div>
						<img src="./restaurant/images/set_09.jpg" alt="" />
						<h1>Collapsing Site Navigation</h1>
						<p>Today we will create a collapsing menu that contains vertical
							navigation bars and a slide out content area. When hovering
							over a menu item, an image slides down from the top and a
					</div>
					<div>
						<img src="./restaurant/images/set_10.jpg" alt="" />
						<h1>Custom Animation Banner</h1>
						<p>We will be using the jQuery Easing Plugin and the jQuery 2D
							Transform Plugin to create some nifty animations.</p>
					</div>
					<div>
						<img src="./restaurant/images/picnic.jpg" alt="" />
						<h1>Thumbnails Navigation Gallery</h1>
						<p>In this tutorial we are going to create an extraordinary
							gallery with scrollable thumbnails that slide out from a
							navigation. We are going to use jQuery and some CSS3
							bar with thumbnails when clicked.</p>
					</div>

					<div>
						<img src="./restaurant/images/dessert_01.jpg" alt="" />
						<h1>Full Page Image Gallery</h1>
						<p>In this tutorial we are going to create a stunning full page
							gallery with scrollable thumbnails and a scrollable full
							screen preview. The idea is to have a thumbnails bar at
							the bottom of the page that scrolls automatically when
					</div>
					<div>
						<img src="./restaurant/images/dessert_02.jpg" alt="" />
						<h1>Hover Slide Effect</h1>
						<p>Today we will create a neat effect with some images using
							jQuery. The main idea is to have an image area with several
							right, fading out or not. When we click on any area,
							all areas will slide their images out.</p>
					</div>
					<div>
						<img src="./restaurant/images/dessert_03.jpg" alt="" />
						<h1>Merging Image Boxes</h1>
						<p>Today we will show you a nice effect for images with jQuery.
							The idea is to have a set of rotated thumbnails that,
							it will scatter into the little box shaped thumbnails again.</p>
					</div>
					<div>
						<img src="./restaurant/images/dessert_04.jpg" alt="" />
						<h1>Compact News Previewer</h1>
						<p>Today we will create a news previewer that let’s you
							show your latest articles or news in a compact way.
							longer description on the right. Once a news on the left
							is clicked, the preview will slide in.</p>
					</div>
					<div>
						<img src="./restaurant/images/drink_01_LAVENDER GIN AND TONIC PUNCH.jpg" alt="" />
						<h1>Overlay Effect Menu</h1>
						<p>In this tutorial we are going to create a simple menu
							that will stand out once we hover over it by covering
							everything except the menu with a dark overlay.
							The menu will stay white and a submenu area will
							expand. We will create this effect using jQuery.</p>
					</div>
					<div>
						<img src="./restaurant/images/drink_02Lavender Tea Lemonade.jpg" alt="" />
						<h1>Polaroid Photobar Gallery</h1>
						<p>In this tutorial we are going to create an image gallery
							with a Polaroid look. We will have albums that will expand
							through the pictures or simply choose another thumbnail
							to be displayed.</p>
					</div>
					<div>
						<img src="./restaurant/images/drink_03wild rose petal sangria.jpg" alt="" />
						<h1>Pull Out Content Panel</h1>
						<p>In this tutorial we will create a content panel that
							slides out at a predefined scroll position. It will
							slider allows to scroll through many items in the
							panel.</p>
					</div>
					<div>
						<img src="./restaurant/images/drink_04_milktea_Lavender London Fog Latte for Mom.jpg" alt="" />
						<h1>Thumbnails Navigation Gallery</h1>
						<p>In this tutorial we are going to create an extraordinary
							gallery with scrollable thumbnails that slide out from a
							navigation. We are going to use jQuery and some CSS3
							bar with thumbnails when clicked.</p>
					</div>
					<div>
						<img src="./restaurant/images/drink_05_coffee_Honey Lavender Cold Brew Latte.jpg" alt="" />
						<h1>Thumbnails Navigation Gallery</h1>
						<p>In this tutorial we are going to create an extraordinary
							gallery with scrollable thumbnails that slide out from a
							navigation. We are going to use jQuery and some CSS3
							bar with thumbnails when clicked.</p>
					</div>

				</div>
			</div>
		</div>
	</div>
	<form action="./addCartItems.php" method="post">
		<div class="container   rounded text-white  ">
			<h2><i class="fas fa-step-forward"></i>步驟一 STEP 1：填選日期、時段及人數</h2>
			<div class="d-flex ">
				<div>
					<label class="t_shadow" for=""><i class="fas fa-calendar-alt"></i>日期</label>
					<input type="date" value="date" name="order_date" id="order_date" format="yyyy-MM-dd">
				</div>
				<div>
					<label class="t_shadow" for=""><i class="fas fa-clock"></i>時段</label>
					<select name="order_time" id="order_time" style="width: 5rem; ">
						<option value="08:00:00"> 08 a.m.</option>
						<option value="10:00:00"> 10 a.m.</option>
						<option value="12:00:00"> 12 p.m.</option>
						<option value="14:00:00"> 14 p.m.</option>
						<option value="17:00:00"> 17 p.m.</option>
						<option value="19:00:00"> 19 p.m.</option>
					</select>
				</div>
				<div>
					<label class="t_shadow" for=""><i class="fas fa-user-friends"></i>訂位人數</label>
					<input type="number" value="1" min="1" name="quantity" id="quantity" style="width: 5rem; " placeholder="1">
				</div>
			</div>
		</div>

		<!-- 快速設定座位label和checkbox -->
		<!-- var str = "";
for (var i = 1; i <= 26; i++){
    str += `<div><input type="checkbox" name="table[]" value="a${i}" id="a${i}"><label for="a${i}">${i}</label></div>`
} -->

		<div class="container   rounded pb-4 text-white">
			<h2><i class="fas fa-step-forward"></i>步驟二 STEP 2：挑選座位</h2>
			<div class="seatChart_parents">
				<div class="seatChart_num">
					<div><input type="checkbox" name="table[]" value="c1" id="c1"><label for="c1">1</label></div>
					<div><input type="checkbox" name="table[]" value="b2" id="b2"><label for="b2">2</label></div>
					<div><input type="checkbox" name="table[]" value="c3" id="c3"><label for="c3">3</label></div>
					<div><input type="checkbox" name="table[]" value="c4" id="c4"><label for="c4">4</label></div>
					<div><input type="checkbox" name="table[]" value="c5" id="c5"><label for="c5">5</label></div>
					<div><input type="checkbox" name="table[]" value="b6" id="b6"><label for="b6">6</label></div>
					<div><input type="checkbox" name="table[]" value="b7" id="b7"><label for="b7">7</label></div>
					<div><input type="checkbox" name="table[]" value="b8" id="b8"><label for="b8">8</label></div>
					<div><input type="checkbox" name="table[]" value="b9" id="b9"><label for="b9">9</label></div>
					<div><input type="checkbox" name="table[]" value="d10" id="d10"><label for="d10">10</label></div>
					<div><input type="checkbox" name="table[]" value="d11" id="d11"><label for="d11">11</label></div>
					<div><input type="checkbox" name="table[]" value="c12" id="c12"><label for="c12">12</label></div>
					<div><input type="checkbox" name="table[]" value="d13" id="d13"><label for="d13">13</label></div>
					<div><input type="checkbox" name="table[]" value="a14" id="a14"><label for="a14">14</label></div>
					<div><input type="checkbox" name="table[]" value="a15" id="a15"><label for="a15">15</label></div>
					<div><input type="checkbox" name="table[]" value="a16" id="a16"><label for="a16">16</label></div>
					<div><input type="checkbox" name="table[]" value="a17" id="a17"><label for="a17">17</label></div>
					<div><input type="checkbox" name="table[]" value="a18" id="a18"><label for="a18">18</label></div>
					<div><input type="checkbox" name="table[]" value="a19" id="a19"><label for="a19">19</label></div>
					<div><input type="checkbox" name="table[]" value="d20" id="d20"><label for="d20">20</label></div>
					<div><input type="checkbox" name="table[]" value="c21" id="c21"><label for="c21">21</label></div>
					<div><input type="checkbox" name="table[]" value="a22" id="a22"><label for="a22">22</label></div>
					<div><input type="checkbox" name="table[]" value="b23" id="b23"><label for="b23">23</label></div>
					<div><input type="checkbox" name="table[]" value="c24" id="c24"><label for="c24">24</label></div>
					<div><input type="checkbox" name="table[]" value="c25" id="c25"><label for="c25">25</label></div>
					<div><input type="checkbox" name="table[]" value="c26" id="c26"><label for="c26">26</label></div>

				</div>

				<div>
					<picture class="seatChart_02"> <img src="./restaurant/images/seatingChart_02.png" alt=""> </picture>
				</div>
			</div>
		</div>

		<div class="container   rounded text-white">
			<h3 class="c_pink_t">已被訂位的桌數顯示 disabled <br>人數與桌數的條件 例如4人桌 只能坐 3~5人 桌的座位數(n人桌) n+1> 人數 > n-1 <br>
				a:1人 b:2人 b:4人 c:6人 <br> "p"不見 </h3>

			<div class="  p-0 pb-2 m-0 mb-5">
				<h2><i class="fas fa-step-forward"></i>步驟三 STEP 3 加入購物車</h2>
				<div class="mb-2 orderBoard">
					<h3 class="mb-4">以下為您的訂位資訊</h3>
					<div class="mb-3">
						<h4 class="f-fle">訂位日期：<span id="show_order_date"></span></h4>
						<h4>訂位時段：<span id="show_order_time"></span></h4>
						<h4>訂位人數：<span id="show_quantity"></span></h4>
						<h4>訂位桌號：<span id="show_table"></span></h4>
						<h4>訂位費用：<span class="c_pink_t"><i class="fas fa-dollar-sign "></i>0</span></h4>
					</div>
					<div class=" m-0 p-0 ">
						<div class="d-flex">

							<div class="d-flex align-items-center">
								<label for="" class="mb-0">
									<h3 class="p-0 m-0 ">加入購物車</h3>
								</label>
								<button class='btn add-to-cart text-white m-2' type="button" style='background-color:#04c2ff' onclick="addToCart()"><i class='fas fa-cart-plus'></i></button>
							</div>
							<div class="d-flex align-items-center">
								<label for="" class="ml-5 mb-0">
									<h3 class="p-0 m-0">加入我的最愛</h3>
								</label>
								<button class='btn text-white c_pink_b m-2 ' type="button"><i class='fas fa-heart'></i></button>
							</div>
						</div>
					</div>
					<p>本公司保留最終會員註冊、訂單條件、商品兌換、調整相關商品或服務價格及修改本服務條款之權利，本公司擁有最終決定權。</p>

				</div>
			</div>
		</div>
	</form>
	
	<?php // include __DIR__ . '/parts/scripts.php'; ?>
	<!-- <script src="./js/jquery-3.6.0.js"></script> -->
	 <script src="./js/bootstrap.bundle.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
	<script src="https://kit.fontawesome.com/4641c99346.js" crossorigin="anonymous"></script>
	<!-- <script src="./js/script.js"></script> -->

	<!-- The JavaScript -->
	<script type="text/javascript">
		$(function() {
			var $mybook = $('#mybook');
			var $bttn_next = $('#next_page_button');
			var $bttn_prev = $('#prev_page_button');
			var $loading = $('#loading');
			var $mybook_images = $mybook.find('img');
			var cnt_images = $mybook_images.length;
			var loaded = 0;
			//preload all the images in the book,
			//and then call the booklet plugin

			$mybook_images.each(function() {
				var $img = $(this);
				var source = $img.attr('src');
				$('<img/>').load(function() {
					++loaded;
					if (loaded == cnt_images) {
						$loading.hide();
						$bttn_next.show();
						$bttn_prev.show();
						$mybook.show().booklet({
							name: null, // name of the booklet to display in the document title bar
							width: 950, // container width
							height: 585, // container height
							speed: 600, // speed of the transition between pages
							direction: 'LTR', // direction of the overall content organization, default LTR, left to right, can be RTL for languages which read right to left
							startingPage: 0, // index of the first page to be displayed
							easing: 'easeInOutQuad', // easing method for complete transition
							easeIn: 'easeInQuad', // easing method for first half of transition
							easeOut: 'easeOutQuad', // easing method for second half of transition

							closed: true, // start with the book "closed", will add empty pages to beginning and end of book
							closedFrontTitle: null, // used with "closed", "menu" and "pageSelector", determines title of blank starting page
							closedFrontChapter: null, // used with "closed", "menu" and "chapterSelector", determines chapter name of blank starting page
							closedBackTitle: null, // used with "closed", "menu" and "pageSelector", determines chapter name of blank ending page
							closedBackChapter: null, // used with "closed", "menu" and "chapterSelector", determines chapter name of blank ending page
							covers: false, // used with  "closed", makes first and last pages into covers, without page numbers (if enabled)

							pagePadding: 2, // padding for each page wrapper
							pageNumbers: true, // display page numbers on each page

							hovers: false, // enables preview pageturn hover animation, shows a small preview of previous or next page on hover
							overlays: false, // enables navigation using a page sized overlay, when enabled links inside the content will not be clickable
							tabs: false, // adds tabs along the top of the pages
							tabWidth: 60, // set the width of the tabs
							tabHeight: 20, // set the height of the tabs
							arrows: false, // adds arrows overlayed over the book edges
							cursor: 'pointer', // cursor css setting for side bar areas

							hash: false, // enables navigation using a hash string, ex: #/page/1 for page 1, will affect all booklets with 'hash' enabled
							keyboard: true, // enables navigation with arrow keys (left: previous, right: next)
							next: $bttn_next, // selector for element to use as click trigger for next page
							prev: $bttn_prev, // selector for element to use as click trigger for previous page

							menu: null, // selector for element to use as the menu area, required for 'pageSelector'
							pageSelector: false, // enables navigation with a dropdown menu of pages, requires 'menu'
							chapterSelector: false, // enables navigation with a dropdown menu of chapters, determined by the "rel" attribute, requires 'menu'

							s: true, // display  s on page animations
							TopFwdWidth: 166, //   width for top forward anim
							TopBackWidth: 166, //   width for top back anim
							BtmWidth: 50, //   width for bottom  

							before: function() {}, // callback invoked before each page turn animation
							after: function() {} // callback invoked after each page turn animation
						});
						Cufon.refresh();
					}
				}).attr('src', source);
			});

		});

		$("input[name='table[]'], #order_date, #order_time, #quantity").change(function() {
			var order_date = $("#order_date").val();
			var order_time = $("#order_time").val();
			var quantity = $("#quantity").val();
			var table = [];
			$("input[name='table[]']:checked").each(
				function(ind, elem) {
					table.push(elem.value.substr(1));
					// table.push(elem.value.replace("a", ""));
				}
			)
			table = table.join("、");
			$("#show_order_date").text(order_date);
			$("#show_order_time").text(order_time);
			$("#show_quantity").text(quantity);
			$("#show_table").text(table);
		});
	</script>
	<script>
		//  購物車
		function addToCart() {
			var type = "restaurant";
			var order_date = $("#order_date").val();
			var order_time = $("#order_time").val();
			var quantity = $("#quantity").val();
			var table = [];
			$("input[name='table[]']:checked").each(
				function(ind, elem) {
					table.push(elem.value.substr(1));
					// table.push(elem.value.replace("a", ""));
				}
			)
			// table = table.join(",");
			if (confirm("確認訂購?")) {
				$.get('cart-api.php', {
					action: 'add',
					type: type,
					order_date: order_date,
					order_time: order_time,
					quantity: quantity,
					table: table,
				}, function(data) {
					console.log(data);
					updateCartCount();
				});
			}
		}
	</script>
	<script>
		function showCartCount(cart) {
			let total = 0;
			for (let i in cart) {
				total += Object.keys(cart[i]).length;
				// total ++;
			}
			$('.cart-count').text(total);
		}


		function updateCartCount(cart) {
			$.get('cart-api.php', function(data) {
				console.log(data);
				showCartCount(data);
			}, 'json');
		}
		updateCartCount();

		// function updateCartCount(cart) {
		//     $.get('cart-api.php', function(data) {
		//         let total = 0;
		//         for (let i in cart) {
		//             total += cart[i].quantity;
		//             // total ++;
		//         }
		//         $('.cart-count').text(total);
		//     }, 'json');    
		// }
		// updateCartCount();
	</script>
	<?php include __DIR__ . '/parts/html-foot.php'; ?>