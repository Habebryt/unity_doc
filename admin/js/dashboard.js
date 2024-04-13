var openModalBtn = document.getElementById('openModalBtn');
var addDocumentModal = document.getElementById('addDocumentModal');
var closeModal = document.getElementsByClassName('close')[0];
var closeBtn = document.getElementById('closeBtn');
var shareBtn = document.getElementById('shareBtn');

openModalBtn.addEventListener('click', () => {
  addDocumentModal.style.display = 'block';
});

closeModal.addEventListener('click', () => {
  addDocumentModal.style.display = 'none';
});

closeBtn.addEventListener('click', () => {
  addDocumentModal.style.display = 'none';
});

window.addEventListener('click', (event) => {
  if (event.target === addDocumentModal) {
    addDocumentModal.style.display = 'none';
  }
});

var documentForm = document.getElementById('documentForm');

documentForm.addEventListener('submit', (event) => {
  event.preventDefault();
  var fileUpload = document.getElementById('fileUpload').value;
  var docName = document.getElementById('docName').value;
  var tag = document.getElementById('tag').value;
  // Here you can perform actions like uploading the document
  console.log('File Upload:', fileUpload);
  console.log('Document Name:', docName);
  console.log('Tag:', tag);
  addDocumentModal.style.display = 'none';
});

shareBtn.addEventListener('click', () => {
  // Here we perform actions of sharing the document
  console.log('Sharing document...');
});

document.addEventListener('DOMContentLoaded', function () {
  const burgerMenu = document.querySelector('.burger-menu');
  const menu = document.querySelector('.menu');
  const userInfo = document.querySelector('.user-info');

  burgerMenu.addEventListener('click', function () {
      menu.classList.toggle('active');
      userInfo.classList.toggle('active');
  });
});
