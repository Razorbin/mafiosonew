function runGetData() {
  var script = document.createElement("script");
  script.src = "js/getData.js";
  document.body.appendChild(script);
}

$(document).ready(function () {
  $(".clickable-tr")
    .off("click")
    .on("click", function () {
      var $this = $(this);
      var clickedIndex = $this.index(); // Get the index of the clicked <tr> among its siblings

      if (!$this.data("clicked")) {
        $this.data("clicked", true);

        $.ajax({
          url: "game/airport/travel.php",
          type: "POST",
          data: {
            clickedIndex: clickedIndex, // Send the index as data to the server-side
          },
          dataType: "json",
          success: function (response) {
            createFeedbackDiv(response.message, response.type);
            hideAndShowDiv(airportDiv, response.cooldown);
            showAndHideDiv(countdownDiv, response.cooldown);
            startCountdown(secondsCountdown, response.cooldown);
            startCountdownHeader(
              airportIcon,
              airportCooldown,
              response.cooldown
            );
            runGetData();
          },
          error: function (xhr, status, error) {
            newSnackbar(error, "error");
          },
          complete: function () {
            $this.data("clicked", false);
          },
        });
      }
    });
});
