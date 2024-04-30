document.addEventListener('DOMContentLoaded', function() {
  const burger = document.querySelector('.burger');
  const navLinks = document.querySelector('.nav-links');
  const header = document.querySelector('.header');
  const nav = document.querySelector('.header-nav');
  let prevScrollPos = window.scrollY;

  // Function to handle scroll event
  window.addEventListener('scroll', function() {
    const currentScrollPos = window.scrollY;

    if (prevScrollPos > currentScrollPos) {
      // User is scrolling up, show the menu items
      header.classList.remove('scroll');
      nav.classList.remove('scroll');
    } else {
      // User is scrolling down, hide the menu items and show the burger
      header.classList.add('scroll');
      nav.classList.add('scroll');
    }

    prevScrollPos = currentScrollPos;
  });
});
