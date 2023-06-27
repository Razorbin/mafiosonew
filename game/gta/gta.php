<div class="functionContainer df g5">
    <div class="fb60" style="align-self: flex-start;">
        <div class="gameBox fb60">
            <table class="w-100">
                <thead>
                    <tr>
                        <th>Handling</th>
                        <th>Ventetid</th>
                        <th class="tar">Sjanse</th>
                    </tr>
                </thead>
                <tbody class="mb-5">
                    <tr class="clickable-tr">
                        <td>Stjel bil fra AXA Auto Care</td>
                        <td class="textSecondary">65s</td>
                        <td class="tar">70%</td>
                    </tr>
                    <tr class="clickable-tr">
                        <td>Stjel bil fra Desert Oasis Imports</td>
                        <td class="textSecondary">105s</td>
                        <td class="tar">50%</td>
                    </tr>
                    <tr class="clickable-tr">
                        <td>Stjel bil fra AXA Auto Care</td>
                        <td class="textSecondary">65s</td>
                        <td class="tar">70%</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="gameBox fb60 mt-5 g5 df fdcol">
            <b>Dirkesett</b>
            <span class="textSecondary">
                Et dirkesett kan benyttes for å få 50% mer sjanse for å stjele bilene Rolls Royce Wraith, 
                1955 Mercedes 300SL Gullwing, Bugatti La Voiture Noire eller 
                Rolls-Royce Boat Tail. Et dirkesett kan du få ved å utføre 
                kriminelle handlinger.
            </span>
            <span class="textSecondary">Et dirkesett varer i 1 time</span>
            <span class="textSecondary">Du har 0 dirkesett</span>
            <input class="fg1" id="allIn" type="submit" value="Bruk dirkesett" disabled="disabled" />
        </div>
    </div>
    <div class="gameBox fb40" style="align-self: flex-start;">
        <div class="df g5 fdcol pb-10">
            <b>STATISTIKK</b>
            <span class="textSecondary">Vellykkede biltyveri utført i dag: 0</span>
            <br>
            <span class="textSecondary">Vellykkede biltyveri utført: 100</span>
            <span class="textSecondary">Mislykkede biltyveri utført: 76</span>
            <br>
            <span class="textSecondary">Totalt antall biltyveri utført i dag av alle: 3</span>
        </div>
        <div class="df g5 pt-10 fdcol divider-top">
            <b>TOPP 10 FLEST VELLYKKEDE BILTYVERI</b>
            <table class="w-100">
                <tbody class="mb-5">
                    <tr style="height: 20px;">
                        <td style="color:#C9B037">1.</td>
                        <td>Joe</td>
                        <td class="tar">100</td>
                    </tr>
                    <tr style="height: 20px;">
                        <td style="color:#D7D7D7">2.</td>
                        <td>Doe</td>
                        <td class="tar">90</td>
                    </tr>
                    <tr style="height: 20px;">
                        <td style="color:#AD8A56">3.</td>
                        <td class="pointer-hover visitLink" data-page="profile&user=skitzo" data-phpfile="game/profile/profile.php?user=skitzo" data-targetdiv="#gameContent">Skitzo</td>
                        <td class="tar">80</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
      $(".visitLink").click(function () {
        var phpFile = $(this).data("phpfile");
        var targetDiv = $(this).data("targetdiv");
        var page = $(this).data("page");

        // Update the URL without refreshing the page
        history.pushState({ page: page }, "", "?page=" + page);

        $.ajax({
          url: phpFile,
          success: function (result) {
            $(targetDiv).html(result);
          },
        });
      });
    });
</script>