$(function () {
  // Active menú
  $('#home-open').addClass('menu-open');
  $('#home').addClass('active');

  // Ajax
  $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
});