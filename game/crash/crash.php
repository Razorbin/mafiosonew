<h3 id="counter" style="color: white;">1.00</h3>
<input type="submit" id="startButton" onclick="startCounter()" value="Start Counter">
<input type="submit" style="display: none;" id="cashOutButton" onclick="cashOut()" value="">

<script>
var intervalId;
var money = 10000; // User's initial money amount

function startCounter() {
  var counterElement = document.getElementById('counter');
  var startButton = document.getElementById('startButton');
  var cashOutButton = document.getElementById('cashOutButton');
  var number = 1.00;
  var speed = 1000; // Initial speed: 1 decimal per second
  var target = getRandomTarget();
  var betSize = 1000;
  var cashout;

  startButton.style.display = 'none';
  cashOutButton.style.display = 'block';
  cashOutButton.value = 'Cash Out: ' + betSize.toLocaleString() + ',-';

  intervalId = setInterval(function() {
    number += 0.01;
    cashout = betSize * number;
    cashOutButton.value = 'Cash Out: ' + cashout.toLocaleString() + ',-';

    if (cashOutButton.disabled && number >= target) {
      clearInterval(intervalId);
      number = target.toFixed(2); // Round to 2 decimal places
      counterElement.style.color = 'red';
    } else if (cashOutButton.disabled) {
      counterElement.style.color = 'green';
    }

    counterElement.textContent = number.toFixed(2);

    // Increase speed by decreasing the interval time, with a maximum speed of 1 second per 0.1 increase
    speed *= 0.9;
    speed = Math.max(speed, 50); // Maximum speed: 1 second per 0.1 increase

    clearInterval(intervalId);
    intervalId = setInterval(arguments.callee, speed);
  }, speed);
}

function cashOut() {
  clearInterval(intervalId);
  var counterElement = document.getElementById('counter');
  var startButton = document.getElementById('startButton');
  var cashOutButton = document.getElementById('cashOutButton');

  counterElement.style.color = 'green';
  cashOutButton.disabled = true;

  // Update user's money amount
  money += parseFloat(counterElement.textContent);

  // Reset the counter and display the updated money amount
  counterElement.textContent = '1.00';
  startButton.style.display = 'block';
  cashOutButton.style.display = 'none';

  console.log('User money amount:', money);
}

function getRandomTarget() {
  var random = Math.random();

  if (random < 0.9) {
    return Math.random() * 0.5 + 1; // 90% chance of target between 1 and 1.5
  } else if (random < 0.97) {
    return Math.random() * 1.5 + 1.5; // 7% chance of target between 1.5 and 3
  } else {
    return Math.random() * 2 + 3; // 3% chance of target between 3 and 5
  }
}
</script>
