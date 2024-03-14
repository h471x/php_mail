var compose = document.querySelector(".sidebar__compose");
var iframe = document.querySelector(".iframe");
var isIframeVisible = false;

compose.onclick = function () {
  iframe.style.visibility = isIframeVisible ? "hidden" : "visible";
  isIframeVisible = !isIframeVisible;
};
