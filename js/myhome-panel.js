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

//Add Special course to the student
function addSpecialCourse(element) {
    var courseName = element.querySelector('h5').innerText;
    var courseDescription = element.querySelector('span').innerText;

    // Populate form fields
    document.getElementById('specialCourseName').value = courseName;
    document.getElementById('specialCourseDescp').value = courseDescription;

    // Submit form
    document.getElementById('addSpecialCourseForm').submit();
}

document.addEventListener("DOMContentLoaded", function() {
  // Get references to buttons and pages
  const inProgressButton = document.querySelector(".tab-button-act:nth-child(1)");
  const completedButton = document.querySelector(".tab-button-act:nth-child(2)");
  const page1 = document.querySelector(".page1");
  const page2 = document.querySelector(".page2");
  
  // Function to toggle active state of buttons
  function toggleButton(button) {
      const buttons = document.querySelectorAll('.tab-button-act');
      buttons.forEach(btn => {
          btn.classList.remove('active');
      });
      button.classList.add('active');
  }
  
  // Add click event listeners to buttons
  inProgressButton.addEventListener("click", function() {
      // Display page 1 and hide page 2
      page1.style.display = "block";
      page2.style.display = "none";
      toggleButton(this);
  });
  
  completedButton.addEventListener("click", function() {
      // Display page 2 and hide page 1
      page1.style.display = "none";
      page2.style.display = "block";
      toggleButton(this);
  });
});

//This is for the enroll student modal 
function openEnrollStudentPopup() {
  document.getElementById('enrollStudentModal').style.display = "block";
}
function closeEnrollStudentPopup() {
  document.getElementById('enrollStudentModal').style.display = "none";
}


