<?php include "parts/modal.php"?>

<script>
//  購物車和我的收藏
function tr_addToCart(param, success, dataType = null, fail = function(){}) {
    // param = {key: value, ...};
    param['action'] = 'add';
    $.get('<?= WEB_API ?>/cart-api.php', param, success, dataType).fail(fail);
}

function tr_addToWishList(param, success, dataType = null, fail = function(){}) {
    param['action'] = 'add';
    $.post('<?= WEB_API ?>/wishList-api.php', param, success, dataType).fail(fail);
}

timeOutId = 0;
display_time = 2500;
function tr_addTransaction(type, method, id = 0){
    console.log("tr_addTransaction");
    switch (type){
        case "event":
            console.log("tr_addTransaction_event");
            tr_addTransaction_event(method, id);
            break;
        case "hotel":
            addTransaction_hotel(method);
            break;
        case "restaurant":
            addTransaction_restaurant(method);
            break;
        case "login":
            addTransaction_login(method);
            break;
    }
}
function tr_addTransaction_event(method, id){
    switch (method){
        case "cart":
            var param = {
                id : id,
                type : "event",
                qty : $("#event_" + id + " .event_quantity_input").val() ?? $("#event_quantity_input").val()
            };
            var success = function() {
                updateCartCount();

                // modal
                var modal_img = "animation/animation_addToCart.html";
                insertPage("#modal_img", modal_img);
                insertText("#modal_content", "已加入購物車");
                
                $("#modal_alert").modal("show");
                if (timeOutId != 0){
                    clearTimeout(timeOutId);
                }
                timeOutId = setTimeout(function(){$("#modal_alert").modal("hide");}, display_time);
            };
            tr_addToCart(param, success);
            break;

        case "wishList":
            var param = {
                id : id,
                type : "event",
                qty : $("#event_" + id + " #quantity").val()
            };

            var success = function(data) {
                if (data['status'] == 'success'){
                    console.log("addToWishList");
                    updateWishListCount();

                    var modal_img = "animation/animation_addToWishList.html";
                    insertPage("#modal_img", modal_img);
                    insertText("#modal_content", "已加入我的收藏");

                    $("#modal_alert").modal("show");
                    if (timeOutId != 0){
                        clearTimeout(timeOutId);
                    }
                    timeOutId = setTimeout(function(){$("#modal_alert").modal("hide");}, display_time);
                }else{
                    noUserAlert(data);
                }
                
            };

            tr_addToWishList(param, success, 'json');
            break;
    }
    
}
function addTransaction_hotel(method){
    switch (method){
        case "cart":
            var param = {
                id : $("#id").val(),
                type : "hotel",
                qty : $("#quantity").val(),
                people_num : $("#people_num").val(),
                order_date : $("#date").text()
            };

            var success = function() {
                console.log("AddToCart_success");
                updateCartCount();

                id = $("#id").val();
                order_date = $("#date").text();
                selector = `#hotel_btn_${id}_${order_date}`;
                modal_attribute = "";
                status_class = 'temp';
                onclick_function = `modalError('此商品已在購物車中')`;
                newSpan = `<span id="selector" class="" ${modal_attribute} onclick="${onclick_function}"><img class="${status_class}" src="./images/icon/bookStatus.svg" alt=""></span>`

                parent = $(selector).parent();
                $(selector).remove();
                parent.prepend(newSpan);

                // modal
                var modal_img = "animation/animation_addToCart.html";
                insertPage("#modal_img", modal_img);
                insertText("#modal_content", "已加入購物車");

                $("#modal_alert").modal("show");
                $("#myModal_1").modal("hide");
                if (timeOutId != 0){
                    clearTimeout(timeOutId);
                }
                timeOutId = setTimeout(function(){$("#modal_alert").modal("hide");}, display_time);
            };
            tr_addToCart(param, success);
            break;

        case "wishList":
            var param = {
                id : $("#id").val(),
                type : "hotel",
                qty : $("#hotel_" + $("#id").val() + " #quantity").val(),
                order_date : $("#date").text()
            };

            var success = function(data) {
                if (data['status'] == 'success'){
                    console.log("addToWishList: success");
                    updateWishListCount();

                    var modal_img = "animation/animation_addToWishList.html";
                    insertPage("#modal_img", modal_img);
                    insertText("#modal_content", "已加入我的收藏");

                    $("#modal_alert").modal("show");
                    $("#myModal_1").modal("hide");
                    if (timeOutId != 0){
                        clearTimeout(timeOutId);
                    }
                    timeOutId = setTimeout(function(){$("#modal_alert").modal("hide");}, display_time);
                }else{
                    $("#myModal_1").modal("hide");
                    noUserAlert(data);
                }
            };

            tr_addToWishList(param, success, 'json');
            break;
    }
    
}
function addTransaction_restaurant(method){
    console.log("addTransaction_restaurant");
    switch (method){
        case "cart":
            var param = {
                type : "restaurant",
                order_date : $("#order_date").val(),
                order_time : $("#order_time").val(),
                quantity : $("#quantity").val(),
            };

            var table = [];
            var max = 0;
			$("input[name='table[]']:checked").each(
				function(ind, elem) {
                    var quantity = -(96 - elem.id[0].charCodeAt());
				    max += quantity;
					table.push(elem.value);
				}
			)
            if (param['quantity'] > max){
                alert(`人數超過上限: ${max}人，請修改`);
            }else if (param['quantity'] < max - 1){
                alert(`人數少於下限: ${max - 1}人，請修改`);
            }else {
                param['table'] = table;

                var success = function(data) {
                    console.log("addToCart");
                    if ("info" in data){
                        alert(data["info"]);
                    }
                    updateCartCount();

                    // modal
                    var modal_img = "animation/animation_addToCart.html";
                    insertPage("#modal_img", modal_img);
                    insertText("#modal_content", "已加入購物車");

                    $("#modal_alert").modal("show");
                    $("#myModal_1").modal("hide");
                    if (timeOutId != 0){
                        clearTimeout(timeOutId);
                    }
                    timeOutId = setTimeout(function(){$("#modal_alert").modal("hide");}, display_time);
                };
                tr_addToCart(param, success, "json", function(){});
            }
            break;

        case "wishList":
            
        console.log("addTransaction_restaurant-wishList");
            var param = {
                type : "restaurant",
                quantity : $("#quantity").val(),
                order_date : $("#order_date").val(),
                order_time : $("#order_time").val()
            };
            var table = [];
			$("input[name='table[]']:checked").each(
				function(ind, elem) {
					table.push(elem.value);
				}
			)
            param['table'] = table;

            var success = function(data) {
                if (data['status'] == 'success'){
                    console.log("addToWishList: success");
                    updateWishListCount();

                    var modal_img = "animation/animation_addToWishList.html";
                    insertPage("#modal_img", modal_img);
                    insertText("#modal_content", "已加入我的收藏");

                    $("#modal_alert").modal("show");
                    $("#myModal_1").modal("hide");
                    if (timeOutId != 0){
                        clearTimeout(timeOutId);
                    }
                    timeOutId = setTimeout(function(){$("#modal_alert").modal("hide");}, display_time);
                }else{
                    noUserAlert(data);
                }
            };
            
            tr_addToWishList(param, success, 'json', function(data){console.log(data);});
            break;
    }
    
}


function noUserAlert(data){
    insertText("#modal_content", data['info']);
    $("#modal_alert").modal("show");
    if (timeOutId != 0){
        clearTimeout(timeOutId);
    }
    timeOutId = setTimeout(function(){
        $("#modal_alert").modal("hide");
        location.href = "login.php";
    }, display_time);
}
</script>