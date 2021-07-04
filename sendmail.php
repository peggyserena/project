<script>

$(function(){ 
    $("#sub_btn").click(function(){ 
    var email = $("#email").val(); 
    var preg = /^w ([- .]w )*@w ([-.]w )*.w ([-.]w )*/; //匹配Email 

    if(email=='' || !preg.test(email)){ 
        $("#chkmsg").html("請填寫正確的郵箱！"); 
    }else{ 
        $("#sub_btn").attr("disabled","disabled").val('提交中..').css("cursor","default"); 
        $.post("sendmail.php",{mail:email},function(msg){ 
            if(msg=="noreg"){ 
                $("#chkmsg").html("該郵箱尚未註冊！"); 
                $("#sub_btn").removeAttr("disabled").val('提 交').css("cursor","pointer"); 
            }else{ 
                $(".demo").html("<h3>" msg "</h3>"); 
                } 
            }); 
        } 
    }); 
})

</script>