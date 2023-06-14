function updateClock() {
  var currentDate = new Date();
  var dayNames = [
    "Søndag",
    "Mandag",
    "Tirsdag",
    "Onsdag",
    "Torsdag",
    "Fredag",
    "Lørdag",
  ];
  var day = dayNames[currentDate.getDay()];
  var date = currentDate.getDate();
  var monthNames = [
    "Januar",
    "Februar",
    "Mars",
    "April",
    "Mai",
    "Juni",
    "Juli",
    "August",
    "September",
    "Oktober",
    "November",
    "Desember",
  ];
  var month = monthNames[currentDate.getMonth()];
  var hours = currentDate.getHours();
  var minutes = currentDate.getMinutes();
  var seconds = currentDate.getSeconds();

  hours = hours < 10 ? "0" + hours : hours;
  minutes = minutes < 10 ? "0" + minutes : minutes;
  seconds = seconds < 10 ? "0" + seconds : seconds;

  var formattedTime = hours + ":" + minutes + ":" + seconds;
  var formattedDate = day + " " + date + " " + month;

  document.getElementById("clock").textContent = formattedTime;
  document.getElementById("date").textContent = formattedDate;
}

updateClock();
setInterval(updateClock, 1000);
