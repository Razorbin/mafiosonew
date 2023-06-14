var container = null;
var maxSnackbars = 5;
var fadeTimer = 10;

function createSnackbarContainer() {
  container = document.createElement("div");
  container.className = "snackbar-container";
  document.body.appendChild(container);
}

function removeSnackbar(el) {
  container.removeChild(el);

  if (container.childNodes.length === 0) {
    document.body.removeChild(container);
    container = null;
  }
}

function fadeIn(el) {
  el.style.opacity = 0; // Set initial opacity to 0
  el.style.visibility = "visible"; // Make the snackbar element visible

  var opacity = 0;
  var startTime = performance.now(); // Use performance.now() for better accuracy

  function animate(currentTime) {
    var progress = currentTime - startTime;
    opacity = progress / 500; // 500ms is the duration for fade-in effect
    el.style.opacity = Math.min(opacity, 1);

    if (progress < 500) {
      requestAnimationFrame(animate);
    }
  }

  requestAnimationFrame(animate);
}

function removeOldestSnackbar() {
  if (container && container.childNodes.length > maxSnackbars) {
    var oldestSnackbar = container.firstChild;
    removeSnackbar(oldestSnackbar);
  }
}

function newSnackbar(text, type) {
  if (!container) {
    createSnackbarContainer();
  }

  var el = document.createElement("div");
  el.className = "snackbar" + " " + type;
  el.innerHTML = text;

  container.appendChild(el);

  removeOldestSnackbar();
  fadeIn(el);

  setTimeout(function () {
    el.style.opacity = 0; // Set opacity to 0 for a smooth fade out effect
    setTimeout(function () {
      removeSnackbar(el);
    }, 500); // Wait for 500ms before removing the snackbar element completely
  }, fadeTimer * 1000);
}
