// =================== nav ==================
// 會員中心Tooltip
$(document).ready(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

// =================== slider ==================
$(function () {
  window.items = 2
  if ($(window).width() <= 992) {
    items = 1
  }
  initOwlCarousel(items)
})
function initOwlCarousel() {
  $('#slider').owlCarousel({
    items: items,
    autoplay: true,
    loop: true,
    autoplayTimeout: 5000,
    autoplaySpeed: 5000
  })
}
$(window).resize(function () {
  var newItems = 2
  if ($(window).width() <= 992) {
    newItems = 1
  }
  if (items != newItems) {
    items = newItems
    $('#slider').owlCarousel('destroy')
    initOwlCarousel(items)
    console.log('create new carousel')
  }
  console.log('resize')
})

// ==================== goTop ===================
$(function () {
  $('.goTop').click(function () {
    $('html,body').animate({ scrollTop: 0 }, 'slow')
    return false
  })

  $(window).scroll(function () {
    if ($(this).scrollTop() > 600) {
      $('.goTop').fadeIn()
    } else {
      $('.goTop').fadeOut()
    }
  })
})

//=============== restaurant ====================
const dallorCommas = function (n) {
  return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',')
}
