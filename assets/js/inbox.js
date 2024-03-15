// Get the compose button
const compose = document.querySelector(".sidebar__compose");
const iframe = document.querySelector(".iframe");
var isIframeVisible = false;

// When clicked Show/Hide the compose
compose.onclick = function () {
  iframe.style.visibility = isIframeVisible ? "hidden" : "visible";
  isIframeVisible = !isIframeVisible;
};