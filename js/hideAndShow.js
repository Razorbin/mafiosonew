function hideAndShowDiv(div, seconds) {
  div.style.display = "none"; // Hide the div

  setTimeout(function () {
    div.style.display = "table"; // Show the div again after the specified time (in milliseconds)
  }, seconds * 1000);
}

function showAndHideDiv(div, secondsToShow) {
  div.style.display = "block"; // Show the div

  setTimeout(function () {
    div.style.display = "none"; // Hide the div after the specified time (in milliseconds)
  }, secondsToShow * 1000);
}

function startCountdown(countdownElement, seconds) {
  // Display the initial value
  countdownElement.textContent = seconds + "s";

  // Start the countdown
  const intervalId = setInterval(function () {
    seconds--;

    // Update the countdown element with the new value
    countdownElement.textContent = seconds + "s";

    // Check if the countdown has reached 0
    if (seconds === 0) {
      clearInterval(intervalId); // Stop the countdown when it reaches 0
      countdownElement.textContent = "0";
    }
  }, 1000); // Update the countdown every 1 second (1000 milliseconds)
}

function startCountdownHeader(icon, countdownElement, seconds) {
  // Display the initial value
  countdownElement.textContent = seconds + "s";
  countdownElement.classList.remove("readyText");
  icon.classList.remove("readyIcon");

  // Start the countdown
  const intervalId = setInterval(function () {
    seconds--;

    // Update the countdown element with the new value
    countdownElement.textContent = seconds + "s";

    // Check if the countdown has reached 0
    if (seconds === 0) {
      clearInterval(intervalId); // Stop the countdown when it reaches 0
      countdownElement.textContent = "Klar";
      countdownElement.classList.add("readyText");
      icon.classList.add("readyIcon");
    }
  }, 1000); // Update the countdown every 1 second (1000 milliseconds)
}
