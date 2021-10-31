// accordion
$('.search-ttl').on('click', function () {
  $(this).toggleClass('open');
  $('.search-cont').toggleClass('open');
});

// popup
if ($('div').hasClass('popup')) {
  $('body').addClass('blk-out');
} else {
  $('body').removeClass('blk-out');
}

$('.popup-close').on('click', function () {
  $('body').removeClass('blk-out');
  $('.popup').css('display', 'none');
});