</div>
<script>
    function updateYear() {
        var currentYear = new Date().getFullYear();
        var yearSpan = document.querySelector("span a");
        yearSpan.textContent = "UnityDocs " + currentYear;
    }
    const sideMenu = document.querySelector("aside");
    const menuBtn = document.querySelector(".menu-btn");
    const closeBtn = document.querySelector(".close-btn");
    const theme = document.querySelector(".theme-toggler");

    menuBtn.addEventListener('click', () => {
        sideMenu.style.display = 'block';
    })

    closeBtn.addEventListener('click', () => {
        sideMenu.style.display = 'none';
    })

    theme.addEventListener('click', () => {
        document.body.classList.toggle('dark-theme');

        theme.querySelector('span:nth-child(1)').classList.toggle('active');
        theme.querySelector('span:nth-child(2)').classList.toggle('active');
    })

    function confirmLogout() {
        const confirmLogout = confirm("Are you sure you want to logout?");
        if (confirmLogout) {
            window.location.href = "logout.php";
        }
    }
</script>
</body>

</html>