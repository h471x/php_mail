// Get the container element
const container = document.getElementById("composeContainer");
const header = document.getElementById("composeHeader");

var offsetX, offsetY;

// Function to handle mouse down event on the header
function handleMouseDown(e) {
  if (e.target === header || header.contains(e.target)) {
    // Set initial mouse position relative to the container's current position
    offsetX = e.clientX - container.offsetLeft;
    offsetY = e.clientY - container.offsetTop;

    // Add mouse move and mouse up event listeners
    document.addEventListener("mousemove", handleMouseMove);
    document.addEventListener("mouseup", handleMouseUp);
  }
}

// Function to handle mouse move event
function handleMouseMove(e) {
  // Calculate new container position
  var posX = e.clientX - offsetX;
  var posY = e.clientY - offsetY;

  // Update container position
  container.style.left = posX + "px";
  container.style.top = posY + "px";
}

// Function to handle mouse up event
function handleMouseUp() {
  // Remove mouse move and mouse up event listeners
  focusElement(destination, subject, message);
  document.removeEventListener("mousemove", handleMouseMove);
  document.removeEventListener("mouseup", handleMouseUp);
}

// Add mouse down event listener to the header
header.addEventListener("mousedown", handleMouseDown);

// handle form submit
const composeForm = document.querySelector('.composeForm');
const ComposeDestination = document.querySelector("#destinationUser");
const ComposeSubject = document.querySelector("#subject");
const ComposeMessage = document.querySelector("#mailmessage");
const emailRegexForm = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

function validateElements(elements) {
  let firstBlankElement = null;

  for (let i = 0; i < elements.length; i++) {
    const element = elements[i];
    if (element.value.trim() === '') {
      if (!firstBlankElement) {
        firstBlankElement = element;
      } else {
        element.blur();
      }
    } else if (element === ComposeDestination && !emailRegexForm.test(element.value.trim())) {
      element.style.borderBottom = '2px solid var(--github-orange)';
      setTimeout(function() {
        element.style.borderBottom = '';
      }, 2000);
      if (!firstBlankElement) firstBlankElement = element;
    } else {
      element.style.borderBottom = '';
    }
  }

  if (firstBlankElement) {
    firstBlankElement.focus();
    return false;
  }
  return true;
}

// Add conditions before submitting the form
composeForm.addEventListener('submit', function(event) {
  event.preventDefault();

  let composeValid = validateElements([ComposeDestination, ComposeSubject, ComposeMessage]);

  if (composeValid) {
    console.log('Form submitted successfully');
    composeForm.submit();
    resetValue(ComposeDestination, ComposeSubject, ComposeMessage);
  }
});