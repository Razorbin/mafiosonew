<div class="functionContainer df g5">
    <div class="gameBox df aic w-100 fdcol">
        <table class="w-100">
            <thead>
                <tr>
                    <th>Bil</th>
                    <th>By</th>
                    <th>Verdi</th>
                </tr>
            </thead>
            <tbody id="carTableBody"></tbody>
        </table>
        <button id="loadCarsButton">Load</button>
        <button id="sellAll">Selg alle</button>
    </div>
</div>

<script>

function runGetData() {
  var script = document.createElement('script');
  script.src = 'js/getData.js';
  document.body.appendChild(script);
}

$(document).ready(function() {
  $('#sellAll').click(function() {
    $.ajax({
      url: 'game/garage/sellAllCars.php',
      type: 'POST',
      data: {},
      success: function(response) {
        runGetData();
      },
      error: function(xhr, status, error) {
        console.error(error);
      }
    });
  });
});

function loadCars() {
  fetch('game/garage/getGarageData.php')
    .then(response => response.json())
    .then(cars => {
      var carTableBody = document.getElementById('carTableBody');
      carTableBody.innerHTML = '';

      cars.forEach(function(car) {
        var row = document.createElement('tr');

        var carCell = document.createElement('td');
        carCell.textContent = car.car;
        row.appendChild(carCell);

        var cityCell = document.createElement('td');
        cityCell.textContent = car.city;
        row.appendChild(cityCell);

        var valueCell = document.createElement('td');
        valueCell.textContent = car.value + ',-';
        row.appendChild(valueCell);

        carTableBody.appendChild(row);
      });
    })
    .catch(error => console.error('Error:', error));
}

loadCars();

var button = document.getElementById('loadCarsButton');
button.addEventListener('click', loadCars);

</script>