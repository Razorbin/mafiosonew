<div id="counter" style="color: white;">1.00</div>
<button onclick="startCounter()">Start Counter</button>

<script>

var intervalId;

function startCounter() {
  var counterElement = document.getElementById('counter');
  var number = 1.00;
  var speed = 1000; // Initial speed: 1 decimal per second
  var target = Math.random() * 9 + 1; // Random target between 1 and 10

  intervalId = setInterval(function() {
    number += 0.01;

    if (number >= target) {
      clearInterval(intervalId);
      number = target.toFixed(2); // Round to 2 decimal places
      counterElement.style.color = 'red';
    }

    counterElement.textContent = number.toFixed(2);

    // Increase speed by decreasing the interval time, with a maximum speed of 1 second per 0.1 increase
    speed *= 0.9;
    speed = Math.max(speed, 50); // Maximum speed: 1 second per 0.1 increase

    clearInterval(intervalId);
    intervalId = setInterval(arguments.callee, speed);
  }, speed);
}

function stopCounter() {
  clearInterval(intervalId);
}



</script>