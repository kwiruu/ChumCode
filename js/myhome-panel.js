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
