// add hovered class to selected list item
let list = document.querySelectorAll(".navigation li");

function activeLink() {
  list.forEach((item) => {
    item.classList.remove("hovered");
  });
  this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouseover", activeLink));

// Menu Toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
};

// Profile tab switching

// Get the parent element that contains the tab buttons and content boxes
const tabContainer = document.querySelector('.profile-tab');

// Get the line element
const line = document.querySelector('.line');

// Set the initial width and position of the line
const activeTab = document.querySelector('.tab_btn.active');
line.style.width = `${activeTab.offsetWidth}px`;
line.style.left = `${activeTab.offsetLeft}px`;

// Add an event listener to the parent element
tabContainer.addEventListener('click', (event) => {
  // Check if the clicked element is a tab button
  if (event.target.classList.contains('tab_btn')) {
    // Remove the 'active' class from all tab buttons
    const activeTabs = document.querySelectorAll('.tab_btn.active');
    activeTabs.forEach(tab => tab.classList.remove('active'));

    // Add the 'active' class to the clicked tab button
    event.target.classList.add('active');

    // Update the line position and width
    line.style.width = `${event.target.offsetWidth}px`;
    line.style.left = `${event.target.offsetLeft}px`;

    // Hide all content boxes
    const contentBoxes = document.querySelectorAll('.content');
    contentBoxes.forEach(content => content.classList.remove('active'));

    // Show the corresponding content box
    const tabIndex = Array.from(event.target.parentNode.children).indexOf(event.target);
    contentBoxes[tabIndex].classList.add('active');
  }
});


// Profile Tab switch 

const tabs = document.querySelectorAll('.tab_btn');
const all_content = document.querySelectorAll('.content');

tabs.forEach((tab, index) => {
  tab.addEventListener('click', (e) => {
    tabs.forEach(tab => {
      tab.classList.remove('active')
    });
    tab.classList.add('active');
    var line = document.querySelector('.line');
    line.style.width = e.target.offsetWidth + 'px';
    line.style.left = e.target.offsetLeft + 'px';

    all_content.forEach(content => {
      content.classList.remove('active')
    });
    all_content[index].classList.add('active');
  })
})

// Profile tab switch Ends here


// Logout JS confirmation

function confirmLogout() {
  const confirmLogout = confirm("Are you sure you want to logout?");
  if (confirmLogout) {
    window.location.href = "logout.php";
  }
}


// States Function

 // Get the country and state select elements
 const countrySelect = document.getElementById('country');
 const stateSelect = document.getElementById('state');

 // Add event listener to country select element
 countrySelect.addEventListener('change', function() {
   const selectedCountry = this.value;

   // Fetch states based on the selected country
   fetchStates(selectedCountry);
 });

 function fetchStates(selectedCountry) {
   // Clear existing options in the states select element
   stateSelect.innerHTML = '<option value="">Loading...</option>';

   // Fetch states based on the selected country
   fetch('getstates.php?country=' + selectedCountry)
     .then(response => response.json())
     .then(data => {
       // Clear existing options
       stateSelect.innerHTML = "<option hidden>Select State</option>";

       // Populate the state select element with fetched states
       data.forEach(state => {
         const option = document.createElement('option');
         option.value = state.idstate;
         option.textContent = state.state_name;
         stateSelect.appendChild(option);
       });
     })
     .catch(error => {
       console.error('Error fetching states:', error);
       stateSelect.innerHTML = '<option value="">Error fetching states</option>';
     });
 }


//  Form Update for Profile AJAX




