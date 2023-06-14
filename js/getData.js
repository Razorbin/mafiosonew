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
        var formattedBullets = formatNumberWithSpaces(response.bullets);
        var formattedPoints = formatNumberWithSpaces(response.points);

        $("#balance").text(formattedBalance + ",-");
        $("#bullets").text(formattedBullets);
        $("#points").text(formattedPoints);
        $("#city").text(response.city);
        $("#family").text(response.family);
        $("#playersOnline").text(response.playersOnline);
        $("#playersInJail").text(response.playersInJail);
      },
    });
  }

  // Call the updateData function initially to display the values
  updateData();

  // Update the data every few seconds (e.g., every 5 seconds)
  setInterval(updateData, 5000);
});
