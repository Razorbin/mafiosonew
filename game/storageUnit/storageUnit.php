<div class="functionContainer df g5">
    <div class="gameBox df w-100 fdcol aifs">
        <div id="noItems" style="display: none;">Du har ingen ting i ditt lager. Utfør Brekk for å skaffe ting til lageret ditt.</div>
        <table id="itemsTable" class="w-100" style="display: none;">
            <thead>
                <tr>
                    <th>Ting</th>
                    <th>Antall</th>
                    <th class="tar">Verdi</th>
                </tr>
            </thead>
            <tbody id="itemsTableBody"></tbody>
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

function loadItems() {
    fetch('game/storageUnit/getStorageUnitData.php')
        .then(response => response.json())
        .then(items => {
            var itemsTableBody = document.getElementById('itemsTableBody');
            var itemsTable = document.getElementById('itemsTable');
            var infoDiv = document.getElementById('infoDiv');
            var noItemsDiv = document.getElementById('noItems');

            if (items.length === 0) {
                noItemsDiv.style.display = 'block'; // Show the "noItems" div
                itemsTable.style.display = 'none'; // Hide the table
                infoDiv.style.display = 'none'; // Hide the infoDiv
            } else {
                itemsTableBody.innerHTML = '';

                items.forEach(function (item) {
                    var row = document.createElement('tr');

                    var itemCell = document.createElement('td');
                    itemCell.textContent = item.name;
                    row.appendChild(itemCell);

                    var amountCell = document.createElement('td');
                    amountCell.textContent = item.amount;
                    row.appendChild(amountCell);

                    var valueCell = document.createElement('td');
                    valueCell.textContent = formatNumberWithSpaces(item.total_value) + ',-';
                    row.appendChild(valueCell);
                    valueCell.classList.add('tar');

                    itemsTableBody.appendChild(row);
                });

                itemsTable.style.display = 'table'; // Show the table
                infoDiv.style.display = 'flex'; // Show the infoDiv

                var totalValue = items.reduce(function (total, item) {
                    return total + item.total_value;
                }, 0);

                // Update the total value div with the calculated total value
                var totalValueDiv = document.getElementById('totalValueDiv');
                totalValueDiv.textContent = 'Total verdi: ' + formatNumberWithSpaces(totalValue) + ',-';
            }
        })
        .catch(error => console.error('Error:', error));
}

loadItems();

$(document).ready(function () {
    $('#sellAll').click(function () {
        $.ajax({
            url: 'game/storageUnit/sellAllItems.php',
            type: 'POST',
            data: {},
            success: function (response) {
                runGetData();
                loadItems();
                newSnackbar(response, 'success'); // Use response here as a feedback to the user
            },
            error: function (xhr, status, error) {
                newSnackbar(error, 'error');
            }
        });
    });
});
</script>
