$(document).ready(function () {
    $('.signup-switch, .login-switch').click(function (e) {
        e.preventDefault();
        swapPos(this);
    });

    function swapPos(link) {
        var isSignupSwitch = $(link).hasClass('signup-switch');
        var signupForm = $('.signup-form');
        var loginForm = $('.login-form');
    
        signupForm.toggleClass('above', isSignupSwitch);
        loginForm.toggleClass('above', !isSignupSwitch);
        signupForm.toggleClass('below', !isSignupSwitch);
        loginForm.toggleClass('below', isSignupSwitch);
    }


    $('.toggle-password').on('click', function() {
        var targetInput = $(this).data('target');
        var passwordInput = $('#' + targetInput);
        var toggleIcon = $('#toggleIcon-' + targetInput);
    
        if (passwordInput.attr('type') === 'password') {
          passwordInput.attr('type', 'text');
          toggleIcon.removeClass('fa-eye').addClass('fa-eye-slash');
        } else {
          passwordInput.attr('type', 'password');
          toggleIcon.removeClass('fa-eye-slash').addClass('fa-eye');
        }
      });
});