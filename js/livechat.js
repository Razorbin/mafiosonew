var liveChat = document.getElementById("liveChat");
var toggleButton = document.getElementById("toggleLivechat");

toggleButton.addEventListener("click", function () {
  liveChat.classList.toggle("hiddenLivechat");
  toggleButton.classList.toggle(
    "defaultBlue",
    !liveChat.classList.contains("hiddenLivechat")
  );
});

document
  .getElementById("chatForm")
  .addEventListener("submit", function (event) {
    event.preventDefault();
    var message = document.getElementsByName("message")[0].value;
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "save_message.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        document.getElementsByName("message")[0].value = "";
        getChatMessages(); // Fetch updated messages after sending a new one
      }
    };
    xhr.send("message=" + encodeURIComponent(message));
  });

var chatBox = document.getElementById("chatBox");

function getChatMessages() {
  var scrollAtBottom =
    chatBox.scrollHeight - chatBox.clientHeight <= chatBox.scrollTop + 1;

  var xhr = new XMLHttpRequest();
  xhr.open("GET", "get_messages.php", true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      var response = JSON.parse(xhr.responseText);
      chatBox.innerHTML = ""; // Clear previous chat messages
      for (var i = 0; i < response.length; i++) {
        var message = response[i].message;
        var user = response[i].user;
        var p = document.createElement("p");
        p.textContent = user + ": " + message;
        chatBox.appendChild(p);
      }
      if (scrollAtBottom) {
        chatBox.scrollTop = chatBox.scrollHeight;
      }
    }
  };
  xhr.send();
}

// Fetch chat messages initially and then poll for new messages every second
getChatMessages();
setInterval(getChatMessages, 1000);
