    <script src="../assets/statics/js/jquery-3.7.1.js"></script>
    <script>
        $(document).ready(function() {
            const $switchCtn = $('#switch-cnt');
            const $switchC1 = $('#switch-c1');
            const $switchC2 = $('#switch-c2');
            const $switchCircle = $('.switch__circle');
            const $switchBtn = $('.switch-btn');
            const $aContainer = $('#a-container');
            const $bContainer = $('#b-container');
            const $allButtons = $('.submit');

            const getButtons = function(e) {
                if (!$(e.target).hasClass('submit')) {
                    e.preventDefault();
                }
            };

            const changeForm = function(e) {
                $switchCtn.addClass('is-gx');
                setTimeout(function() {
                    $switchCtn.removeClass('is-gx');
                }, 1500);
                $switchCtn.toggleClass('is-txr');
                $switchCircle.toggleClass('is-txr');
                $switchC1.toggleClass('is-hidden');
                $switchC2.toggleClass('is-hidden');
                $aContainer.toggleClass('is-txl');
                $bContainer.toggleClass('is-txl');
                $bContainer.toggleClass('is-z200');
            };

            const mainF = function() {
                $allButtons.on('click', getButtons);
                $switchBtn.on('click', changeForm);
            };

            mainF();

            // Get the password input and toggle password icon elements
            const passwordInput = document.getElementById('password');
            const togglePassword = document.getElementById('togglePassword');

            // Add click event listener to the toggle password icon
            togglePassword.addEventListener('click', function() {
                // Toggle password visibility by changing the input type
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    togglePassword.classList.remove('fa-eye-slash');
                    togglePassword.classList.add('fa-eye');
                } else {
                    passwordInput.type = 'password';
                    togglePassword.classList.remove('fa-eye');
                    togglePassword.classList.add('fa-eye-slash');
                }
            });
        });
        
    </script>
    </body>

    </html>