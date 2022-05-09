$(document).ready(
  $('.nav-bar-icon').click(() => {
    console.log('toggle')
    $('#menu').toggleClass('active-menu')
  })
)

$(document).ready(function () {
  $('.nav-link').on('click', function () {
    $('.navbar-nav').find('.active').removeClass('active');
    $(this).addClass('active');
  });
});
