// Recursive function to fetch user data with retries
function fetchUserDataWithRetries(retries) {
  // Fetch the 'user' parameter from the URL
  const urlParams = new URLSearchParams(window.location.search);
  const user = urlParams.get("user");

  // Fetch user data from the PHP script
  fetch("game/profile/fetchProfileData.php?user=" + user)
    .then((response) => response.json())
    .then((data) => {
      document.getElementById("username").textContent = data.username;
      document.getElementById("status").textContent = data.status;
      document.getElementById("profileRank").textContent = data.rank;
      document.getElementById("pengerank").textContent = data.pengerank;
      document.getElementById("drap").textContent = data.drap;
      document.getElementById("familie").textContent = data.familie;
      document.getElementById("oppdrag").textContent = data.oppdrag;
      document.getElementById("registrert").textContent = data.registrert;
      document.getElementById("sistaktiv").textContent = data.sistaktiv;

      const profileTextElement = document.getElementById("profileText");
      profileTextElement.textContent = data.profileText;

      const avatarElement = document.getElementById("avatar");
      avatarElement.src = data.avatar;
    })

    .catch((error) => {
      console.error("Error:", error);

      if (retries > 0) {
        // Retry fetching the data after a delay
        setTimeout(function () {
          fetchUserDataWithRetries(retries - 1);
        }, 1000); // Adjust the delay (in milliseconds) between retries as needed
      }
    });
}

// Start fetching the user data with retries
fetchUserDataWithRetries(5); // Set the number of retries as needed
