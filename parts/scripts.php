<script src="<?= WEB_ROOT ?>/js/jquery-3.6.0.js"></script>
<script src="<?= WEB_ROOT ?>/js/bootstrap.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://kit.fontawesome.com/4641c99346.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment.min.js"></script>
<script src="<?= WEB_ROOT ?>/js/script.js"></script>

<script>
    function showCartCount(cart) {
        let total = 0;
        for (let i in cart) {
            total += Object.keys(cart[i]).length;
            // total ++;
        }
        $('.cart-count').text(total);
    }


    function updateCartCount() {
        $.get('cart-api.php', function(data) {
            console.log(data);
            showCartCount(data);
        }, 'json');
    }
    updateCartCount();


    
    function showWishListCount(wishList) {
        $('.wishList-count').text(wishList.length);
    }
    function updateWishListCount() {
        $.post('wishList-api.php', {
            action: 'read'
        },function(data) {
            console.log("wishList");
            console.log(data);
            showWishListCount(data);
        }, 'json');
    }
    updateWishListCount();


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