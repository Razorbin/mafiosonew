function checkMafiosoClosed() {
  if (false) {
    // Display the overlay
    document.querySelector(".overlay-closed").style.display = "flex";
  } else {
    // Hide the overlay
    document.querySelector(".overlay-closed").style.display = "none";
  }
}

checkMafiosoClosed();

setInterval(checkMafiosoClosed, 5000);
