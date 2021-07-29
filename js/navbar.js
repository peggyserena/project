
function showCartCount(cart) {
    let total = 0;
    console.log("cart");
    console.log(cart);
    for (let i in cart) {
        total += Object.keys(cart[i]).length;
        // total ++;
    }
    $('.cart-count').text(total);
}


function updateCartCount() {
    $.get(`${WEB_API}/cart-api.php`, {
        type: "cart",
        action: "read",
    },function(data) {
        console.log(data);
        showCartCount(data);
    }, 'json');
}
updateCartCount();



function showWishListCount(wishList) {
    $('.wishList-count').text(wishList.length);
}
function updateWishListCount() {
    $.post(`${WEB_API}//wishList-api.php`, {
        action: 'read'
    },function(data) {
        console.log("wishList");
        console.log(data);
        showWishListCount(data);
    }, 'json');
}
updateWishListCount();


// function updateCartCount(cart) {
//     $.get('<?= WEB_API ?>/cart-api.php', function(data) {
//         let total = 0;
//         for (let i in cart) {
//             total += cart[i].quantity;
//             // total ++;
//         }
//         $('.cart-count').text(total);
//     }, 'json');    
// }
// updateCartCount();