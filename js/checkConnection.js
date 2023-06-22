function checkInternetConnectivity() {
  if (!navigator.onLine) {
    // Display the overlay
    document.querySelector(".overlay").style.display = "flex";
  } else {
    // Hide the overlay
    document.querySelector(".overlay").style.display = "none";
  }
}

setInterval(checkInternetConnectivity, 1000);
