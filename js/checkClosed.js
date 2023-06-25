function checkMafiosoClosed() {
  var closed = false;

  if (closed) {
    // Display the overlay
    document.querySelector(".overlay-closed").style.display = "flex";
  } else {
    // Hide the overlay
    document.querySelector(".overlay-closed").style.display = "none";
  }
}

checkMafiosoClosed();

setInterval(checkMafiosoClosed, 5000);
