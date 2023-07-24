function createFeedbackDiv(message, type) {
  // Check if the feedback div already exists
  const feedbackDiv = document.getElementById("feedback");

  // Remove any existing feedback divs
  const existingDivs = feedbackDiv.querySelectorAll(".feedback");
  existingDivs.forEach((div) => {
    feedbackDiv.removeChild(div);
  });

  // Create a new feedback div
  const newDiv = document.createElement("div");
  newDiv.className = `feedback feedback-${type}`;
  const span = document.createElement("span");
  span.innerText = message;
  newDiv.appendChild(span);
  feedbackDiv.appendChild(newDiv);
}
