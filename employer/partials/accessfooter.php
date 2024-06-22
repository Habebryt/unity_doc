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
        //     let switchCtn = document.querySelector("#switch-cnt");
        //     let switchC1 = document.querySelector("#switch-c1");
        //     let switchC2 = document.querySelector("#switch-c2");
        //     let switchCircle = document.querySelectorAll(".switch__circle");
        //     let switchBtn = document.querySelectorAll(".switch-btn");
        //     let aContainer = document.querySelector("#a-container");
        //     let bContainer = document.querySelector("#b-container");
        //     let allButtons = document.querySelectorAll(".submit");

        //     let getButtons = (e) => {
        //         if (!e.target.classList.contains('submit')) {
        //             e.preventDefault();
        //         }
        //     }

        //     let changeForm = (e) => {

        //         switchCtn.classList.add("is-gx");
        //         setTimeout(function() {
        //             switchCtn.classList.remove("is-gx");
        //         }, 1500)

        //         switchCtn.classList.toggle("is-txr");
        //         switchCircle[0].classList.toggle("is-txr");
        //         switchCircle[1].classList.toggle("is-txr");

        //         switchC1.classList.toggle("is-hidden");
        //         switchC2.classList.toggle("is-hidden");
        //         aContainer.classList.toggle("is-txl");
        //         bContainer.classList.toggle("is-txl");
        //         bContainer.classList.toggle("is-z200");
        //     }

        //     let mainF = (e) => {
        //         for (var i = 0; i < allButtons.length; i++)
        //             allButtons[i].addEventListener("click", getButtons);
        //         for (var i = 0; i < switchBtn.length; i++)
        //             switchBtn[i].addEventListener("click", changeForm)
        //     }

        //     window.addEventListener("load", mainF);
        //     const passwordInput = document.getElementById('password-input');
        //     const togglePasswordBtn = document.querySelector('.toggle-password-btn');

        //     togglePasswordBtn.addEventListener('click', function() {
        //         const inputType = passwordInput.getAttribute('type');

        //         if (inputType === 'password') {
        //             passwordInput.setAttribute('type', 'text');
        //             togglePasswordBtn.textContent = 'Hide Password';
        //         } else {
        //             passwordInput.setAttribute('type', 'password');
        //             togglePasswordBtn.textContent = 'Show Password';
        //         }
        //     });
    </script>
    </body>

    </html>