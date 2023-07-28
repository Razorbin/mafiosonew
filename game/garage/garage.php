<div id="feedback" class="mt-5"></div>

<div class="functionContainer df g5">
    <div class="gameBox df w-100 fdcol aifs">
        <div id="noCars" style="display: none;">Du har ingen biler i din garasje. Utfør biltyveri for å skaffe biler.</div>
        <table id="carTable" class="w-100" style="display: none;">
            <thead>
                <tr>
                    <th>Bil</th>
                    <th>By</th>
                    <th>Antall</th>
                    <th class="tar">Verdi</th>
                </tr>
            </thead>
            <tbody id="carTableBody"></tbody>
        </table>
        <div id="infoDiv" class="my-5 g5 df jcc aic w-100" style="display: none;">
            <div id="totalValueDiv"></div>
            <input type="submit" id="sellAll" value="Selg alle">
        </div>
    </div>
</div>

<script>
function runGetData() {
    var script = document.createElement('script');
    script.src = 'js/getData.js';
    document.body.appendChild(script);
}

function loadCars() {
    fetch('game/garage/getGarageData.php')
        .then(response => response.json())
        .then(cars => {
            var carTableBody = document.getElementById('carTableBody');
            var carTable = document.getElementById('carTable');
            var infoDiv = document.getElementById('infoDiv');
            var noCarsDiv = document.getElementById('noCars');

            if (cars.length === 0) {
                noCarsDiv.style.display = 'block'; // Show the "noCars" div
                carTable.style.display = 'none'; // Hide the table
                infoDiv.style.display = 'none'; // Hide the infoDiv
            } else {
                carTableBody.innerHTML = '';

                cars.forEach(function (car) {
                    var row = document.createElement('tr');

                    var carCell = document.createElement('td');
                    carCell.textContent = car.car;
                    row.appendChild(carCell);

                    var cityCell = document.createElement('td');
                    cityCell.textContent = car.city;
                    row.appendChild(cityCell);

                    var amountCell = document.createElement('td');
                    amountCell.textContent = car.amount;
                    row.appendChild(amountCell);

                    var valueCell = document.createElement('td');
                    valueCell.textContent = formatNumberWithSpaces(car.total_value) + ',-';
                    row.appendChild(valueCell);
                    valueCell.classList.add('tar');

                    carTableBody.appendChild(row);
                });

                noCarsDiv.style.display = 'none'; // Hide the "noCars" div
                carTable.style.display = 'table'; // Show the table
                infoDiv.style.display = 'flex'; // Show the infoDiv

                var totalValue = cars.reduce(function (total, car) {
                    return total + car.total_value;
                }, 0);

                // Update the total value div with the calculated total value
                var totalValueDiv = document.getElementById('totalValueDiv');
                totalValueDiv.textContent = 'Total verdi: ' + formatNumberWithSpaces(totalValue) + ',-';
            }
        })
        .catch(error => console.error('Error:', error));
}

loadCars();

$(document).ready(function () {
    $('#sellAll').click(function () {
        var $this = $(this);

        if (!$this.data('clicked')) {
            $this.data('clicked', true);

            $.ajax({
                url: 'game/garage/sellAllCars.php',
                type: 'POST',
                data: {},
                dataType: 'json', // Expect JSON response
                success: function (response) {
                    runGetData();
                    loadCars();
                    // newSnackbar(response, 'success'); // Use response here as a feedback to the user
                    createFeedbackDiv(response.message, response.type);
                },
                error: function (xhr, status, error) {
                    newSnackbar(error, 'error');
                },
                complete: function () {
                    $this.data('clicked', false);
                }
            });
        }
    });
});

</script>

