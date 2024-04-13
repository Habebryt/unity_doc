$(document).ready(function () {
    var changingText = document.querySelector('.changing-text');
    var textContent = ["Collaboration.", "Sharing.", "Easy of control.", "Access."];
    var currentIndexText = 0;
  
    function changeText() {
      changingText.textContent = textContent[currentIndexText];
      currentIndexText = (currentIndexText + 1) % textContent.length;
    }
  
    setInterval(changeText, 3000);
  
    var images = [
      'images/hero/doc_mgt.jpeg',
      'images/hero/access.jpeg',
      'images/hero/secure.jpeg',
      'images/hero/sharing.jpeg'
    ];
  
    let currentIndexImage = 0;
    var animatedImage = document.getElementById('animatedImage');
  
    function changeImage() {
      animatedImage.src = images[currentIndexImage];
      currentIndexImage = (currentIndexImage + 1) % images.length;
    }
  
    setInterval(changeImage, 3000);
  });