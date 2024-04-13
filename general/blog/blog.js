$(document).ready(function() {

    $('.burger').click(function() {
      $('.nav-links').toggleClass('nav-active');
      $('.burger div').toggleClass('toggle');
    });
  
    $(window).on('scroll', function() {
      $('.animate-on-scroll').each(function() {
        var elementPosition = $(this).offset().top;
        var screenPosition = $(window).scrollTop() + $(window).height();
  
        if (elementPosition < screenPosition) {
          $(this).addClass('animate');
        } else {
          $(this).removeClass('animate');
        }
      });
    });
  
    $('a[href^="#"]').on('click', function(event) {
      var target = $(this.getAttribute('href'));
  
      if (target.length) {
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top - 80
        }, 1000);
      }
    });
  });