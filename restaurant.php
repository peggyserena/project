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
		text-align:center;
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
		width: 100%;
		height:100%;

	}


	.seatChart_02 img {
		width: 100%;
		height:100%;
	}



	.seatChart_num>div>label:hover {
		background-color: #2ACD72;
		font-weight: 900;

	}

	.seatChart_num>div:nth-child(1) {
		position: absolute;
		top: 47%;
		left: 7%;
	}

	.seatChart_num>div:nth-child(2) {
		position: absolute;
		top: calc(390% / 7.02702703);
		left: calc(78% / 11.1428571);
	}

	.seatChart_num>div:nth-child(3) {
		position: absolute;
		top: calc(450% / 7.027027027207);
		left:calc( 78% / 11.1428571);
	}

	.seatChart_num>div:nth-child(4) {
		position: absolute;
		top: calc(520% / 7.027027027207);
		left:calc( 78% / 11.1428571);
	}

	.seatChart_num>div:nth-child(5) {
		position: absolute;
		top: calc(595% / 7.027027027207);
		left:calc( 78% / 11.1428571);
	}

	.seatChart_num>div:nth-child(6) {
		position: absolute;
		top: calc(370% / 7.027027027207);
		left: calc(135% / 11.1428571);
	}

	.seatChart_num>div:nth-child(7) {
		position: absolute;
		top: calc(443% / 7.027027027207);
		left: calc(135% / 11.1428571);
	}

	.seatChart_num>div:nth-child(8) {
		position: absolute;
		top: calc(512% / 7.027027027207);
		left: calc(135% / 11.1428571);
	}

	.seatChart_num>div:nth-child(9) {
		position: absolute;
		top: calc(583% / 7.027027027207);
		left: calc(135% / 11.1428571);
	}

	.seatChart_num>div:nth-child(10) {
		position: absolute;
		top: calc(325% / 7.027027027207);
		left: calc(245% / 11.1428571);
	}

	.seatChart_num>div:nth-child(11) {
		position: absolute;
		top: calc(455% / 7.027027027207);
		left: calc(195% / 11.1428571);
	}

	.seatChart_num>div:nth-child(12) {
		position: absolute;
		top: calc(455% / 7.027027027207);
		left: calc(270% / 11.1428571);
	}

	.seatChart_num>div:nth-child(13) {
		position: absolute;
		top: calc(600% / 7.027027027207);
		left: calc(225% / 11.1428571);
	}

	.seatChart_num>div:nth-child(14) {
		position: absolute;
		top: calc(510% / 7.027027027207);
		left: calc(385% / 11.1428571);
	}

	.seatChart_num>div:nth-child(15) {
		position: absolute;
		top: calc(510% / 7.027027027207);
		left: calc(426% / 11.1428571);
	}

	.seatChart_num>div:nth-child(16) {
		position: absolute;
		top: calc(510% / 7.027027027207);
		left: calc(468% / 11.1428571);
	}

	.seatChart_num>div:nth-child(17) {
		position: absolute;
		top: calc(510% / 7.027027027207);
		left: calc(513% / 11.1428571);
	}

	.seatChart_num>div:nth-child(18) {
		position: absolute;
		top: calc(510% / 7.027027027207);
		left: calc(560% / 11.1428571);
	}

	.seatChart_num>div:nth-child(19) {
		position: absolute;
		top: calc(510% / 7.027027027207);
		left: calc(605% / 11.1428571);
	}

	.seatChart_num>div:nth-child(20) {
		position: absolute;
		top: calc(360% / 7.027027027207);
		left: calc(799% / 11.1428571);
	}

	.seatChart_num>div:nth-child(21) {
		position: absolute;
		top: calc(360% / 7.027027027207);
		left: calc(870% / 11.1428571);
	}

	.seatChart_num>div:nth-child(22) {
		position: absolute;
		top: calc(350% / 7.027027027207);
		left: calc(905% / 11.1428571);
	}

	.seatChart_num>div:nth-child(23) {
		position: absolute;
		top: calc(350% / 7.027027027207);
		left: calc(963% / 11.1428571);
	}

	.seatChart_num>div:nth-child(24) {
		position: absolute;
		top: calc(208% / 7.027027027207);
		left:calc( 992% / 11.1428571);
	}

	.seatChart_num>div:nth-child(25) {
		position: absolute;
		top: calc(180% / 7.027027027207);
		left: calc(605% / 11.1428571);
	}

	.seatChart_num>div:nth-child(26) {
		position: absolute;
		top: calc(297% / 7.027027027207);
		left: calc(620% / 11.1428571);
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

/* ===================== menu ====================== */

	.book_wrapper .b-load h3{
		margin:0 1.5rem;
		text-align:center;
		padding-top:1rem;
	}
	.book_wrapper .b-load h4{
		margin:1.5rem;
		font-size:1rem;
		font-weight:600;
		color:gray;
	}


	.box_desktop .b-load div h4+h4{
		position:absolute;
		bottom:1rem;
	}

	.box_desktop .b-load div h3{
		margin-bottom:1rem;
	}
	.box_desktop .b-load div h4{
		line-height:1.5rem;
		font-weight:600;
		text-align:justify;
	}
	.tablet_cellphone img{
		width:100%;
		object-fit:cover;
	}

	.tablet_cellphone .nav-item h2{
		line-height:1.4rem;
		font-weight:500;
		font-size:1.3rem;
		padding:0.5rem;
		margin:0;
	}
	.tablet_cellphone .tab-content h2{
		line-height:1.4rem;
		font-weight:500;
		font-size:1.3rem;
		padding-top:0.5rem;
		margin:0;
	}

	.tablet_cellphone h4{
		line-height:1.4rem;
		font-weight:500;
		text-align:justify;
		font-size:1rem;
		margin:1rem 0 0 0;
	}
	.tablet_cellphone .tab-content .tab-pane .row {
		background-color:rgba(20, 20, 50, 0.5);
		color:white;
		padding:1rem;
		margin: 1rem 0;
		align-items: center;

	}
	.tablet_cellphone .nav-item{
		border-radius:10px 10px 0 0; 
		text-shadow: 0 0 0.2em #0000E3, 0 0 0.25em #9AFF02, -1px -1px white, 1px 1px rgb(26, 2, 94);
		background-color:rgba(20, 20, 50, 0.5);


	}
	.tablet_cellphone .nav-link.active{
		background: linear-gradient(45deg, #DCC5EF 0%, #adda9a 100%);
		border-radius:10px 10px 0 0; 
	}

	.cellphone_seat button{
		background-color: #0000e3;
		border-radius:5px;
		color:white;
	}

</style>

<body>
	<?php include "parts/transaction.php"?>
	<div style="text-align:center;clear:both">
		<script src="/gg_bd_ad_720x90.js" type="text/javascript"></script>
		<script src="/follow.js" type="text/javascript"></script>
	</div>
	<div class="container rounded pb-0 text-white ">
		<h2 class="text-center text-white pt-3 pb-0 t_shadow mb-5" style="font-size:2rem;font-weight:900;">MENU</h2>
		
		<div class="box_desktop book_wrapper ">
			<a id="next_page_button"></a>
			<a id="prev_page_button"></a>
			<div id="loading" class="loading">Loading pages...</div>
			<div id="mybook" style="display:none;">
				<div class="b-load">
					<div>
						<img  src="./restaurant\images\cover.png" alt="" />
					</div>
					<div>
						<img  src="./restaurant/images/set_01.jpg" alt="" />
						<h3 class="t_shadow" >窯烤小餐包</h3>
						<h4>扎實的麵包口感與龍眼木柴燒的香氣，以天然蘋果酵母發酵，讓麵包吃起來扎實飽滿，享受無香料麵包的自然風味與香氣。</p>
						<h4>$ 120 /3個</h4>
					</div>
					<div>
						<img src="./restaurant/images/set_02.jpg" alt="" />
						<h3 class="t_shadow">菲達乳酪希臘沙拉</h3>
						<h4>色彩鮮艷的蘿蔓、番茄、黑橄欖等，搭配希臘特有的傳統菲達乳酪(feta Cheese)，嚐起來鹹香深邃、酸味宛如檸檬酸、橘子酸，還帶有奶香與鹹鴨蛋的風味。層次豐富，清爽之餘又有增進食慾，大大滿足四季味蕾。</p>
						<h4>$ 220 /道</h4>
					</div>
					<div>
						<img src="./restaurant/images/set_04.jpg" alt="" />
						<h3 class="t_shadow">煙燻慢烤豬肋排</h3>
						<h4>以23種香料塗抹醃製，再以龍眼木煙燻低溫慢烤6-8小時，焦糖化的外層酥香，內層肉質鮮嫩多汁，入口後隨即鬆散化開還帶點咬感，再搭配細心熬煮的獨家秘製濃郁的BBQ風味裡，有著甜鹹柔嫩鮮香的豐富內涵。</p>
						<h4>$ 320 /道</h4>
					</div>
					<div>
						<img src="./restaurant/images/set_05.jpg" alt="" />
						<h3 class="t_shadow">迷迭香草檸檬烤全雞</h3>
						<h4>迷迭香，是地中海的香草植物，拉丁名稱Rosmarinus officinalis，意指「來自海洋的露水」。檸檬的清香佐上迷迭香的獨特氣味，特別適合鮮嫩多汁烤雞料理，來森林的朋友們，一起品嘗這道幸福的香草料理吧。</p>
						<h4>$ 650 /道</h4>
					</div>
					<div>
						<img src="./restaurant/images/set_09.jpg" alt="" />
						<h3 class="t_shadow">鐵板蔬食</h3>
						<h4>特約有機農場的鮮採青椒、洋蔥，與有機蘑菇拌炒炙燒、再加進特調黑胡椒醬，道地中式鐵板美味。</h4>
						<h4>$ 230 /道</h4>
					</div>
					<div>
						<img src="./restaurant/images/set_10.jpg" alt="" />
							<h3>暖薑香蘋果茶</h3>
							<h4>內有豐富的蘋果和薑，清甜而不辛辣，帶來滿滿暖意和溫潤好 ... 添加刺槐豆和玫瑰花瓣等優質花草茶原料，可以潤喉解渴、調整體質，排便順暢。</h4>
						<h4>$ 220 /道</h4>
					</div>
					<div>
						<img src="./restaurant/images/picnic.jpg" alt="" />
						<h3 class="t_shadow">Thumbnails Navigation Gallery</h3>
						<h4>In this tutorial we are going to create an extraordinary</h4>
						<h4>$ 650 /道</h4>
					</div>

					<div>
						<img src="./restaurant/images/dessert_01.jpg" alt="" />
						<h3 class="t_shadow">Full Page Image Gallery</h3>
						<h4>In this tutorial we are going to create a stunning full page</h4>
						<h4>$ 650 /道</h4>
					</div>
					<div>
						<img src="./restaurant/images/dessert_02.jpg" alt="" />
						<h3 class="t_shadow">Hover Slide Effect</h3>
						<h4>Today we will create a neat effect with some images using</h4>
						<h4>$ 650 /道</h4>
					</div>
					<div>
						<img src="./restaurant/images/dessert_03.jpg" alt="" />
						<h3 class="t_shadow">Merging Image Boxes</h3>
						<h4>Today we will show you a nice effect for images with jQuery.</h4>
						<h4>$ 650 /道</h4>
					</div>
					<div>
						<img src="./restaurant/images/dessert_04.jpg" alt="" />
						<h3 class="t_shadow">Compact News Previewer</h3>
						<h4>Today we will create a news previewer that let’s you</h4>
						<h4>$ 650 /道</h4>
					</div>
					<div>
						<img src="./restaurant/images/drink_01_LAVENDER GIN AND TONIC PUNCH.jpg" alt="" />
						<h3 class="t_shadow">Overlay Effect Menu</h3>
						<h4>In this tutorial we are going to create a simple menu</h4>
						<h4>$ 650 /道</h4>
					</div>
					<div>
						<img src="./restaurant/images/drink_02Lavender Tea Lemonade.jpg" alt="" />
						<h3 class="t_shadow">Polaroid Photobar Gallery</h3>
						<h4>In this tutorial we are going to create an image gallery
							with a Polaroid look. We will have albums that will expand</h4>
						<h4>$ 650 /道</h4>
					</div>
					<div>
						<img src="./restaurant/images/drink_03wild rose petal sangria.jpg" alt="" />
						<h3 class="t_shadow">Pull Out Content Panel</h3>
						<h4>In this tutorial we will create a content panel that</h4>
						<h4>$ 650 /道</h4>
					</div>
					<div>
						<img src="./restaurant/images/drink_04_milktea_Lavender London Fog Latte for Mom.jpg" alt="" />
						<h3 class="t_shadow">Thumbnails Navigation Gallery</h3>
						<h4>In this tutorial we are going to create an extraordinaryd</h4>
						<h4>$ 650 /道</h4>
					</div>
					<div>
						<img src="./restaurant/images/drink_05_coffee_Honey Lavender Cold Brew Latte.jpg" alt="" />
						<h3 class="t_shadow">Thumbnails Navigation Gallery</h3>
						<h4>In this tutorial we are going to create an extraordinary</h4>
						<h4>$ 650 /道</h4>
					</div>

				</div>
			</div>
		</div>

		<div class="tablet_cellphone container">
			<br>
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li class="nav-item"> 
				<a class="nav-link active" data-toggle="tab" href="#home"><h2>開胃前菜</h2></a>
				</li>
				<li class="nav-item ">
				<a class="nav-link" data-toggle="tab" href="#menu1"><h2>美味排餐</h2></a>
				</li>
				<li class="nav-item ">
				<a class="nav-link" data-toggle="tab" href="#menu2"><h2>精緻糕點</h2></a>
				</li>
				<li class="nav-item ">
				<a class="nav-link" data-toggle="tab" href="#menu3"><h2>風味飲品</h2></a>
				</li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
				<div id="home" class="container tab-pane active"><br>
					<div class=" row "  >
						<div class="col-lg-6 col-md-6 col-sm-12">
							<img  src="./restaurant/images/set_01.jpg" alt="" />
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12">
							<h2 >窯烤小餐包</h2>
							<h4>扎實的麵包口感與龍眼木柴燒的香氣，以天然蘋果酵母發酵，讓麵包吃起來扎實飽滿，享受無香料麵包的自然風味與香氣。 </h4>
							<h4>$ 120 /3個</h4>
						</div>
					</div>
					<div class=" row "  >
						<div class="col-lg-6 col-md-6 col-sm-12">
							<img src="./restaurant/images/set_02.jpg" alt="" />	
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12">
							<h2>菲達乳酪希臘沙拉</h2>
							<h4>色彩鮮艷的蘿蔓、番茄、黑橄欖等，搭配希臘特有的傳統菲達乳酪(feta Cheese)，嚐起來鹹香深邃、酸味宛如檸檬酸、橘子酸，還帶有奶香與鹹鴨蛋的風味。層次豐富，清爽之餘又有增進食慾之效果，大大滿足夏季味蕾。</h4>
							<h4>$ 220 /道</h4>
						</div>
					</div>
					<div class=" row"  >
						<div class="col-lg-6 col-md-6 col-sm-12">
							<img src="./restaurant/images/set_09.jpg" alt="" />
						</div>	
						<div class="col-lg-6 col-md-6 col-sm-12">
							<h2>鐵板蔬食</h2>
							<h4>特約有機農場的鮮採青椒、洋蔥，與有機蘑菇拌炒炙燒、再加進特調黑胡椒醬，道地中式鐵板美味</h4>
							<h4>$ 230 /道</h4>
						</div>
					</div>
					<div class=" row"  >
						<div class="col-lg-6 col-md-6 col-sm-12">
							<img src="./restaurant/images/set_10.jpg" alt="" />
						</div>	
						<div class="col-lg-6 col-md-6 col-sm -12">
							<h2>暖薑香蘋果茶</h2>
							<h4>內有豐富的蘋果和薑，清甜而不辛辣，帶來滿滿暖意和溫潤好 ... 添加刺槐豆和玫瑰花瓣等優質花草茶原料，可以潤喉解渴、調整體質，排便順暢</h4>
							<h4>$ 220 /道</h4>
						</div>
					</div>
				</div>
				<div id="menu1" class="container tab-pane fade"><br>
					<div class=" row"  >
						<div class="col-lg-6 col-md-6 col-sm-12">
							<img src="./restaurant/images/set_04.jpg" alt="" />	
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12">
							<h2>煙燻慢烤豬肋排</h2>
							<h4>以23種香料塗抹醃製，再以龍眼木煙燻低溫慢烤6-8小時，再搭配熬煮一整天的BBQ醬，焦糖化的外層酥香，內層肉質鮮嫩多汁，入口後隨即鬆散化開還帶點咬感，獨家秘製濃郁的BBQ風味裡，有著甜鹹柔嫩鮮香的豐富內涵。</h4>
							<h4>$ 320 /道</h4>
						</div>
					</div>
					<div class=" row"  >
						<div class="col-lg-6 col-md-6 col-sm-12">
							<img src="./restaurant/images/set_05.jpg" alt="" />	
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12">
							<h2>迷迭香草檸檬烤全雞</h2>
							<h4>迷迭香，是地中海的香草植物，拉丁名稱Rosmarinus officinalis，意指「來自海洋的露水」。檸檬的清香佐上迷迭香的獨特氣味，特別適合鮮嫩多汁烤雞料理，來森林的朋友們，一起品嘗這道幸福的香草料理吧</p>
							<h4>$ 650 /道</h4>
						</div>
					</div>
					<div class=" row"  >
						<div class="col-lg-6 col-md-6 col-sm-12">
							<img src="./restaurant/images/picnic.jpg" alt="" />
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12">
							<h3 class="t_shadow">鐵板蔬食</h3>
							<h4>特約有機農場的鮮採青椒、洋蔥，與有機蘑菇拌炒炙燒、再加進特調黑胡椒醬，道地中式鐵板美味</h4>
							<h4>$ 230 /道</h4>
						</div>
					</div>
				</div>
				<div id="menu2" class="container tab-pane fade"><br>
					<div class=" row"  >
						<div class="col-lg-6 col-md-6 col-sm-12">
							<img src="./restaurant/images/dessert_01.jpg" alt="" />
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12">
						    <h2>暖薑香蘋果茶</h2>
							<h4>內有豐富的蘋果和薑，清甜而不辛辣，帶來滿滿暖意和溫潤好 ... 添加刺槐豆和玫瑰花瓣等優質花草茶原料，可以潤喉解渴、調整體質，排便順暢</h4>
							<h4>$ 220 /道</h4>
						</div>
					</div>
					<div class=" row"  >
						<div class="col-lg-6 col-md-6 col-sm-12">
							<img src="./restaurant/images/dessert_02.jpg" alt="" />
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12">
							<h2>Hover Slide Effect</h2>
							<h4>Today we will create a neat effect with some images using</h4>
							<h4>$ 650 /道</h4>
						</div>
					</div>
					<div class=" row"  >
						<div class="col-lg-6 col-md-6 col-sm-12">
							<img src="./restaurant/images/dessert_03.jpg" alt="" />
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12">
							<h2>Merging Image Boxes</h2>
							<h4>Today we will show you a nice effect for images with jQuery.</h4>
							<h4>$ 650 /道</h4>
						</div>
					</div>
					<div class=" row"  >
						<div class="col-lg-6 col-md-6 col-sm-12">
							<img src="./restaurant/images/dessert_04.jpg" alt="" />
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12">
							<h2>Compact News Previewer</h2>	
							<h4>Today we will create a news previewer that let’s you</h4>
							<h4>$ 650 /道</h4>
						</div>
					</div>
				</div>
				<div id="menu3" class="container tab-pane fade"><br>
					<div class=" row"  >
						<div class="col-lg-6 col-md-6 col-sm-12">
							<img src="./restaurant/images/drink_01_LAVENDER GIN AND TONIC PUNCH.jpg" alt="" />
						</div>
						<div class="col-lg-6 col-md-6 col-sm -12">
							<h2>Overlay Effect Menu</h2	>
							<h4>In this tutorial we are going to create a simple menu.</h4>
							<h4>$ 650 /道</h4>
						</div>
					</div>
					<div class=" row"  >
						<div class="col-lg-6 col-md-6 col-sm-12">
							<img src="./restaurant/images/drink_02Lavender Tea Lemonade.jpg" alt="" />
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12">
							<h2	>Polaroid Photobar Gallery</h2>
							<h4>In this tutorial we are going to create an image gallery</h4>
							<h4>$ 650 /道</h4>
						</div>
					</div>
					<div class=" row"  >
						<div class="col-lg-6 col-md-6 col-sm-12">
							<img src="./restaurant/images/drink_03wild rose petal sangria.jpg" alt="" />
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12">
							<h2>Pull Out Content Panel</h2>	
							<h4>In this tutorial we will create a content panel that</h4>
							<h4>$ 650 /道</h4>
						</div>
					</div>
					<div class=" row"  >
						<div class="col-lg-6 col-md-6 col-sm-12">
							<img src="./restaurant/images/drink_04_milktea_Lavender London Fog Latte for Mom.jpg" alt="" />
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12">
							<h2>Thu	mbnails Navigation Gallery</h2>
							<h4>I this tutorial we are going to create an extraordinary</h4>
							<h4>$ 650 /道</h4>
						</div>
					</div>
					<div class=" row"  >
						<div class="col-lg-6 col-md-6 col-sm-12">
							<img src="./restaurant/images/drink_05_coffee_Honey Lavender Cold Brew Latte.jpg" alt="" />
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12">
							<h2>Thu	mbnails Navigation Gallery</h2>
							<h4>I this tutorial we are going to create an extraordinary</h4>
							<h4>$ 650 /道</h4>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	
	<form id="bookSeat" action="./addCartItems.php" method="post">
		<div class="container   rounded text-white  ">
			<h2><i class="fas fa-step-forward"></i>步驟一 STEP 1：填選日期、時段及人數</h2>
			<div class="row ">
				<div class="col-lg-4 col-md-4 col-sm-12">
					<label class="t_shadow p-2 mb-0 mt-2 " for=""><i class="fas fa-calendar-alt"></i>日期</label>
					<input class="text-center"type="date" value="date" name="order_date" id="order_date" format="yyyy-MM-dd" style="width:100%;;height:30px">
				</div>
				<div class="col-lg-3 col-md-3 col-sm-12">
					<label class="t_shadow p-2 mb-0 mt-2" for=""><i class="fas fa-clock"></i>時段</label>
					<select class="" name="order_time" id="order_time" style="width: 100%; height:30px; text-align-last:center;">
						<option value="08:00"> 08 a.m.</option>
						<option value="10:00"> 10 a.m.</option>
						<option value="12:00"> 12 p.m.</option>
						<option value="14:00"> 14 p.m.</option>
						<option value="17:00"> 17 p.m.</option>
						<option value="19:00"> 19 p.m.</option>
					</select>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-12">
					<label class="t_shadow p-2 mb-0 mt-2" for=""><i class="fas fa-user-friends"></i>人數</label>
					<input class="text-center"type="number" value="1" min="1" name="quantity" id="quantity" style="width:100%;; height:30px" placeholder="1">
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
					<!-- UPDATE `restaurant` SET name = REPLACE(name, "c", "d") WHERE name like "c%" -->
					<div><input type="checkbox" name="table[]" value="1" id="d1"><label for="d1">1</label></div>
					<div><input type="checkbox" name="table[]" value="2" id="b2"><label for="b2">2</label></div>
					<div><input type="checkbox" name="table[]" value="3" id="d3"><label for="d3">3</label></div>
					<div><input type="checkbox" name="table[]" value="4" id="d4"><label for="d4">4</label></div>
					<div><input type="checkbox" name="table[]" value="5" id="d5"><label for="d5">5</label></div>
					<div><input type="checkbox" name="table[]" value="6" id="b6"><label for="b6">6</label></div>
					<div><input type="checkbox" name="table[]" value="7" id="b7"><label for="b7">7</label></div>
					<div><input type="checkbox" name="table[]" value="8" id="b8"><label for="b8">8</label></div>
					<div><input type="checkbox" name="table[]" value="9" id="b9"><label for="b9">9</label></div>
					<div><input type="checkbox" name="table[]" value="10" id="f10"><label for="f10">10</label></div>
					<div><input type="checkbox" name="table[]" value="11" id="f11"><label for="f11">11</label></div>
					<div><input type="checkbox" name="table[]" value="12" id="d12"><label for="d12">12</label></div>
					<div><input type="checkbox" name="table[]" value="13" id="f13"><label for="f13">13</label></div>
					<div><input type="checkbox" name="table[]" value="14" id="a14"><label for="a14">14</label></div>
					<div><input type="checkbox" name="table[]" value="15" id="a15"><label for="a15">15</label></div>
					<div><input type="checkbox" name="table[]" value="16" id="a16"><label for="a16">16</label></div>
					<div><input type="checkbox" name="table[]" value="17" id="a17"><label for="a17">17</label></div>
					<div><input type="checkbox" name="table[]" value="18" id="a18"><label for="a18">18</label></div>
					<div><input type="checkbox" name="table[]" value="19" id="a19"><label for="a19">19</label></div>
					<div><input type="checkbox" name="table[]" value="20" id="f20"><label for="f20">20</label></div>
					<div><input type="checkbox" name="table[]" value="21" id="c21"><label for="c21">21</label></div>
					<div><input type="checkbox" name="table[]" value="22" id="a22"><label for="a22">22</label></div>
					<div><input type="checkbox" name="table[]" value="23" id="b23"><label for="b23">23</label></div>
					<div><input type="checkbox" name="table[]" value="24" id="d24"><label for="d24">24</label></div>
					<div><input type="checkbox" name="table[]" value="25" id="d25"><label for="d25">25</label></div>
					<div><input type="checkbox" name="table[]" value="26" id="d26"><label for="d26">26</label></div>
					<picture class="seatChart_02"> <img src="./restaurant/images/seatingChart_02.png" alt=""> </picture>


				</div>

				<div>
				</div>
			</div>
		</div>
		
		<div class="container cellphone_seat rounded text-white row m-auto d-md-none" id="table_btn">
			<div class="col-3 my-2"><button type="button" class="  btn-block " data-id="d1">1</button></div>
			<div class="col-3 my-2"><button type="button" class="  btn-block " data-id="b2">2</button></div>
			<div class="col-3 my-2"><button type="button" class="  btn-block " data-id="d3">3</button></div>
			<div class="col-3 my-2"><button type="button" class="  btn-block " data-id="d4">4</button></div>
			<div class="col-3 my-2"><button type="button" class="  btn-block " data-id="d5">5</button></div>
			<div class="col-3 my-2"><button type="button" class="  btn-block " data-id="b6">6</button></div>
			<div class="col-3 my-2"><button type="button" class="  btn-block " data-id="b7">7</button></div>
			<div class="col-3 my-2"><button type="button" class="  btn-block " data-id="b8">8</button></div>
			<div class="col-3 my-2"><button type="button" class="  btn-block " data-id="b9">9</button></div>
			<div class="col-3 my-2"><button type="button" class="  btn-block " data-id="f10">10</button></div>
			<div class="col-3 my-2"><button type="button" class="  btn-block " data-id="f11">11</button></div>
			<div class="col-3 my-2"><button type="button" class="  btn-block " data-id="d12">12</button></div>
			<div class="col-3 my-2"><button type="button" class="  btn-block " data-id="f13">13</button></div>
			<div class="col-3 my-2"><button type="button" class="  btn-block " data-id="a14">14</button></div>
			<div class="col-3 my-2"><button type="button" class="  btn-block " data-id="a15">15</button></div>
			<div class="col-3 my-2"><button type="button" class="  btn-block " data-id="a16">16</button></div>
			<div class="col-3 my-2"><button type="button" class="  btn-block " data-id="a17">17</button></div>
			<div class="col-3 my-2"><button type="button" class="  btn-block " data-id="a18">18</button></div>
			<div class="col-3 my-2"><button type="button" class="  btn-block " data-id="a19">19</button></div>
			<div class="col-3 my-2"><button type="button" class="  btn-block " data-id="f20">20</button></div>
			<div class="col-3 my-2"><button type="button" class="  btn-block " data-id="c21">21</button></div>
			<div class="col-3 my-2"><button type="button" class="  btn-block " data-id="a22">22</button></div>
			<div class="col-3 my-2"><button type="button" class="  btn-block " data-id="b23">23</button></div>
			<div class="col-3 my-2"><button type="button" class="  btn-block " data-id="d24">24</button></div>
			<div class="col-3 my-2"><button type="button" class="  btn-block " data-id="d25">25</button></div>
			<div class="col-3 my-2"><button type="button" class="  btn-block " data-id="d26">26</button></div>
		</div>

		<div class="container rounded text-white">

			<div class="  p-0 pb-2 m-0 mb-5">
				<h2><i class="fas fa-step-forward"></i>步驟三 STEP 3 加入購物車</h2>
				<div class=" orderBoard ">
					<h3 class="mb-4 ml-4">以下為您的訂位資訊</h3>
					<div class="ml-4 ">
						<h4 class="f-fle">訂位日期：<span id="show_order_date"></span></h4>
						<h4>訂位時段：<span id="show_order_time"></span></h4>
						<h4>訂位人數：<span id="show_quantity"></span></h4>
						<h4>訂位桌號：<span id="show_table"></span></h4>
						<h4>訂位單價：<span class="c_pink_t"><i class="fas fa-dollar-sign "></i>0</span></h4>
					</div>
				</div>
				<div class=" row m-0  c_pink justify-content-center align-items-center ">
					<div class="">
						<label for="" class="ml-3 mb-0">
							<h3 class="p-0 m-0  ">加入購物車</h3>
						</label>
						<button class='btn add-to-cart ' type="button" onclick="tr_addTransaction('restaurant', 'cart');"><i class='fas fa-cart-plus'></i></button>
					</div>
					<div>
						<label for="" class="ml-3 mb-0">
							<h3 class="p-0 m-0 ">加入我的收藏</h3>
						</label>
						<button class='btn add-to-wishList text-right ' type="button" onclick="tr_addTransaction('restaurant', 'wishList');"><i class='fas fa-heart' ></i></button>
					</div>
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

		
		// 更新資料
		function createRestaurantData() {
			var order_date = $("#order_date").val();
			var order_time = $("#order_time").val();
			$.post('restaurant-api.php', {
				action: 'read',
				order_date: order_date,
				order_time: order_time,
			}, function(data) {
				console.log("createRestaurantData");
				console.log(data);
				
				$(`input[name='table[]']`).attr("checked", false);
				$(`input[name='table[]']`).attr("disabled", true);
				$("[name='table[]']+label").removeClass("available");
				
				data.forEach(function(elem){
					$(`#${elem['name']}`).attr("disabled", false);
					$(`label[for='${elem['name']}']`).addClass("available");
				});
			}, "json");
		}


		$("#order_date, #order_time").change(function() {
			createRestaurantData();
		});
		$("input[name='table[]']").change(function() {
			console.log('changed');
			var sum = 0;
			$("input[name='table[]']:checked").each(function(ind, elem){
				var quantity = -(96 - elem.id[0].charCodeAt());
				sum += quantity;
			})
			// $("#quantity").attr("min", Math.max(sum - 1, 1));
			// $("#quantity").attr("max", sum);
			// $("#quantity").val(Math.max(sum - 1, 1));
		});
		

		$("input[name='table[]'], #order_date, #order_time, #quantity").change(function() {
			console.log('changed2');
			var order_date = $("#order_date").val();
			var order_time = $("#order_time").val();
			var quantity = $("#quantity").val();
			var table = [];
			$("input[name='table[]']:checked").each(
				function(ind, elem) {
					table.push(elem.value);
				}
			)
			table = table.join("、");
			$("#show_order_date").text(order_date);
			$("#show_order_time").text(order_time);
			$("#show_quantity").text(quantity);
			$("#show_table").text(table);
		});

		// $("#quantity").keyup(function(){
		// 	var value = parseInt($(this).val());
		// 	var max = parseInt($(this).attr('max'));
		// 	var min = parseInt($(this).attr('min'));
		// 	if (value > max){
		// 		alert(`超出人數上限: ${max}人`);
		// 		$(this).val(max);
		// 	}else if (value < min){
		// 		alert(`低於人數下限: ${min}人`);
		// 		$(this).val(min);
		// 	}
		// })
		$("#table_btn button").click(function(){
			
			var checkbox = $("#" + $(this).data('id'));
			checkbox.prop("checked", !checkbox.prop("checked"));
			checkbox.trigger("change");
			$(this).css('background-color', '#2ACD72');

		});
		// 初始日起為當天
		var d = new Date();
		var nowDate = d.getFullYear() + "-" + (d.getMonth() + 1).toString().padStart(2, "0") + "-" + d.getDate().toString().padStart(2, "0");	
		$("#order_date").val(nowDate);
		$("#order_date").trigger("change");

	</script>
	
	<script src="<?= WEB_ROOT ?>/js/navbar.js"></script>
	<?php include __DIR__ . '/parts/html-foot.php'; ?>