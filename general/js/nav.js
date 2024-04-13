$(document).ready(function() {
  $('.burger').click(function() {
    $('.nav-links').toggleClass('nav-active');
    $('.burger div').toggleClass('toggle');
  });
});