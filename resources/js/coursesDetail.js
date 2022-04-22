$(document).ready(function () {
  if ($('#headingOne').has('.active-switch')) {
    $('#headingTwo').click(() => {
      $('#headingOne').removeClass('active-switch');
      $('#headingTwo').addClass('active-switch');
      $('#headingThree').removeClass('active-switch')
    })
  }

  if ($('#headingTwo').has('.active-switch')) {
    $('#headingOne').click(() => {
      $('#headingTwo').removeClass('active-switch');
      $('#headingOne').addClass('active-switch');
      $('#headingThree').removeClass('active-switch')
    })
  }

  if ($('#headingThree').has('.active-switch')) {
    $('#headingThree').click(() => {
      $('#headingTwo').removeClass('active-switch');
      $('#headingOne').removeClass('active-switch');
      $('#headingThree').addClass('active-switch')
    })
  }
});
