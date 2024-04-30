$(document).ready(function () {
    const changingText = document.querySelector('.changing-text');
    const textContent = ["Delivery.", "Storage.", "Damage."];
    const currentIndexText = 0;

    function changeText() {
        changingText.textContent = textContent[currentIndexText];
        currentIndexText = (currentIndexText + 1) % textContent.length;
    }

    setInterval(changeText, 3000);

    const images = [
        'images/about/hero_two.jpeg',
        'images/about/hero_three.jpeg',
        'images/about/hero_four.jpeg',
        'images/about/hero_five.jpeg',
        'images/about/hero_six.jpeg'
    ];

    const currentIndexImage = 0;
    const animatedImage = document.getElementById('animatedImage');

    function changeImage() {
        animatedImage.src = images[currentIndexImage];
        currentIndexImage = (currentIndexImage + 1) % images.length;
    }

    setInterval(changeImage, 3000);
});