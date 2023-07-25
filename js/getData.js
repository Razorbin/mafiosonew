$(document).ready(function () {
  // Function to fetch the data and update the elements
  function updateData() {
    $.ajax({
      url: "data/getData.php",
      dataType: "json",
      success: function (response) {
        var formattedBalance = formatNumberWithSpaces(response.balance);
        var formattedBankBalance = formatNumberWithSpaces(response.bankBalance);
        var formattedBullets = formatNumberWithSpaces(response.bullets);
        var formattedPoints = formatNumberWithSpaces(response.points);
        var interests = Math.floor(response.bankBalance * 0.1);

        if (interests > 1000000) {
          interests = 1000000;
        }

        var formattedInterests = formatNumberWithSpaces(interests);

        $("#balance").text(formattedBalance + ",-");
        $("#bankBalance").text(formattedBankBalance);
        $("#bullets").text(formattedBullets);
        $("#points").text(formattedPoints);
        $("#city").text(response.city + " " + response.cityTax);
        $("#family").text(response.family);
        $("#playersOnline").text(response.playersOnline);
        $("#playersOnline2").text(response.playersOnline);
        $("#playersInJail").text(response.playersInJail);
        $("#interests").text(formattedInterests);
        $("#rank").text(response.rank);
        $("#progressPercentage").text(response.progress.toFixed(1) + " %");
        $("#progressExp").text(formatNumberWithSpaces(response.exp) + " EXP");

        $("#cars").text(formatNumberWithSpaces(response.cars));
        $("#maxCars").text(formatNumberWithSpaces(response.maxCars));

        $("#things").text(formatNumberWithSpaces(response.things));
        $("#maxThings").text(formatNumberWithSpaces(response.maxThings));

        var progressPercentage = response.progress;
        $("#rankbar").css("width", progressPercentage.toFixed(1) + "%");
      },
    });
  }

  // Call the updateData function initially to display the values
  updateData();

  // Update the data every few seconds (e.g., every 5 seconds)
  setInterval(updateData, 5000);
});
