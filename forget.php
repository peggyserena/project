<?php include __DIR__. '/parts/config.php'; ?>

<?php
$title = '忘記密碼查詢';
?>

<?php include __DIR__. '/parts/html-head.php'; ?>
<style>
    body {
        background: linear-gradient(45deg,#e8ddf1 0%,  #e1ebdc 100%);
		color: gray;
    }
	main .box{
		width:400px;
		background-color:white;
		box-shadow: 0px 0px 15px #666E9C;
		-webkit-box-shadow: 0px 0px 15px #666E9C;
		-moz-box-shadow: 0px 0px 15px #666E9C;
		margin:3rem auto;
	}
	
	.form-group input[type=email]{
		border:none;
	}

	.form-group {
		border:none;
		padding-bottom:3px;
		text-align:center;
		background: 
		linear-gradient(45deg, #DCC5EF 0%, #adda9a 100%)
		bottom
		no-repeat; 
		background-size:100% 3px ;
	}

	main .note{
		padding:1.5rem;
		background-color:#dff0d8;
	}

	.disabled, .disabled:hover{
		background-color: gray;
		background-image: none;
	}
</style>
<?php include __DIR__. '/parts/navbar.php'; ?>

<main>
<div class="container">
	<?php include "parts/modal.php" ?>
	<div class="box">
		<div class="text-center m-0 ">
			<h2 class=" b-green rot-135 text-center p-2">忘記密碼</h2>
		</div>

		<div class="">
			<div class="card-body">
				<form action="">
					<div class="form-group">
						<label for="email" ><p>請輸入 e-mail，我們將寄送重設密碼連結給您</p></label>
						<input type="email" class="form-control" placeholder="e.g.  example@gmail.com" id="email">
					</div>
					<div>
						<input id="agree" type="checkbox" checked class="mr-2"><label for="agree"><h5 class="m-0">我同意<a href="privacyPolicy.php">網站服務條款及隱私權政策</a></h5></label>
					</div>
					<div class=" text-center mt-4">
						<button type="button" onclick="sendMail();" id="sendMailBtn" class="custom-btn btn-4 t_shadow">送出</button>
					</div>
					<div class=" text-center mt-4">
						<span id="sendMailTime"></span>
					</div>
				</form>
			</div>
		</div>
		<div class="note m-0">
			<h5>您將在幾分鐘後收到一封電子郵件，內有重新設定密碼的步驟說明。</h5>
			<h5>如果仍未收到e-mail，請檢查垃圾郵件中是否有來自<a href="mailto:lavenderforest@gmail.com?subject=Lavendar Forest %20使用者意見回饋&body=您好,%0A我在 薰衣草森林 遭遇了底下的問題，請協助處理～ %0A%0A謝謝">lavenderforest@gmail.com</a> 的信件，如果仍然找不到，歡迎與客服人員聯繫。</h5>
		</div>
	</div>
</main>


<?php include __DIR__. '/parts/scripts.php'; ?>
<script>
	function sendMail(){
		var email = $("#email").val();
		var id = setTimeout(modal_load, 2000);
		$.post('email-api.php', {
			action: "forget_password",
			email,
		}, function(data){
			clearTimeout(id);
			if ('error' in data){
				modal_msg(data['error']);
			}else {
				modal_msg(data['info']);
			}
		}, 'json');
		remail();
	}

	function modal_load(){
		modal_init();
		insertPage("#modal_img", "X_loading3.html");
		updateStyle('nobordertop');
		$("#modal_alert").modal("show");
	}
	function modal_msg(msg){
		modal_init();
		insertText("#modal_content", msg);
		updateStyle('nobordertop');
		$("#modal_alert").modal("show");
	}
	
	function remail(){
		$("#sendMailBtn").prop("disabled", true);
		$("#sendMailBtn").addClass("disabled");
		var time = 60 ;
		var id = setInterval(function(){
			time -= 1;
			$("#sendMailTime").html(`${time}秒後可以重新寄送`);
			if (time === 0){
				clearInterval(id);
				$("#sendMailBtn").prop("disabled", false);
				$("#sendMailBtn").removeClasss("disabled");
			}
		}, 1000);
	}
</script>
<?php include __DIR__. '/parts/html-foot.php'; ?>
