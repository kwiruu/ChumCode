const buttons = document.querySelectorAll('.toggle-button');
const pages = document.querySelectorAll('.page');

buttons[0].classList.add('active');

// Add click event listener to each button
buttons.forEach((button, index) => {
  button.addEventListener('click', function() {
    // Remove 'active' class from all buttons
    buttons.forEach(btn => {
      btn.classList.remove('active');
    });
    // Add 'active' class to the clicked button
    this.classList.add('active');

    // Hide all pages
    pages.forEach(page => {
      page.style.display = 'none';
    });
    // Show the corresponding page
    pages[index].style.display = 'block';
  });
});

// Get references to the button and textarea
const showTextareaButton = document.getElementById('showTextareaButton');
const myTextarea = document.getElementById('myTextarea');

// Add click event listener to the button
showTextareaButton.addEventListener('click', function() {
    // Toggle the visibility of the textarea
    if (myTextarea.style.display === 'none') {
        myTextarea.style.display = 'block';
    }
});

 // Show the popup/modal para ni sa course page
function openAddActivityPopup() {
 
  alert("This is where you can add your course name and description fields.");
}

function openAddActivityPopup() {
  document.getElementById("addActivityModal").style.display = "block";
}

function closeAddActivityPopup() {
  document.getElementById("addActivityModal").style.display = "none";
}

document.addEventListener("DOMContentLoaded", function() {
  var buttons = document.querySelectorAll(".toggleButton-drop-down");
  buttons.forEach(function(button) {
      button.addEventListener("click", function() {
          var courseID = this.getAttribute("data-course-id");
          var content = document.getElementById("contentz" + courseID);
          content.classList.toggle("hidden-drop-down"); // Toggle visibility class
          this.classList.toggle("rotate");
      });
  });
});
