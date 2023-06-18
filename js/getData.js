$(document).ready(function () {
  function formatNumberWithSpaces(number) {
    return number.toLocaleString("no-NO");
  }

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
        var formattedInterests = formatNumberWithSpaces(
          Math.floor(response.bankBalance * 0.1)
        );

        $("#balance").text(formattedBalance + ",-");
        $("#bankBalance").text(formattedBankBalance);
        $("#bullets").text(formattedBullets);
        $("#points").text(formattedPoints);
        $("#city").text(response.city);
        $("#family").text(response.family);
        $("#playersOnline").text(response.playersOnline);
        $("#playersOnline2").text(response.playersOnline);
        $("#playersInJail").text(response.playersInJail);
        $("#interests").text(formattedInterests);
      },
    });
  }

  // Call the updateData function initially to display the values
  updateData();

  // Update the data every few seconds (e.g., every 5 seconds)
  setInterval(updateData, 5000);
});
