// Get the container element
const container = document.getElementById("composeContainer");
const header = document.getElementById("composeHeader");

var offsetX, offsetY;

// Function to handle mouse down event on the header
function handleMouseDown(e) {
  // Check if the mouse click occurred on the header
  if (e.target === header || header.contains(e.target)) {
    // Set initial mouse position relative to the container's current position
    offsetX = e.clientX - container.offsetLeft;
    offsetY = e.clientY - container.offsetTop;

    // Change cursor style to indicate dragging
    // container.style.cursor = "grabbing";

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
  // Reset cursor style
  container.style.cursor = "default";

  // Remove mouse move and mouse up event listeners
  document.removeEventListener("mousemove", handleMouseMove);
  document.removeEventListener("mouseup", handleMouseUp);
}

// Add mouse down event listener to the header
header.addEventListener("mousedown", handleMouseDown);
