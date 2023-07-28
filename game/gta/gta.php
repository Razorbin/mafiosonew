<div id="feedback" class="mt-5"></div>

<?php

include '../../db/db.php';

$stmt = $pdo->prepare('SELECT CD_time FROM cooldown WHERE CD_acc_id = :id AND CD_type = "gta"');
$stmt->execute(['id' => $_SESSION['ID']]);
$cd_gta = $stmt->fetchColumn();

$hasCooldown = $cd_gta > time();
$cooldownTimeLeft = $cd_gta - time();

?>

<script>
  
var gtaDiv = document.getElementById('gtaDiv');
var countdownDiv = document.getElementById('countdownDiv');
var secondsCountdown = document.getElementById('secondsCountdown');
var gtaCooldown = document.getElementById('gtaCooldown');
var gtaIcon = document.getElementById('gtaIcon');  

</script>

<?php if($hasCooldown){ ?>
<script>
    hideAndShowDiv(gtaDiv, <?php echo $cooldownTimeLeft ?>);
    showAndHideDiv(countdownDiv, <?php echo $cooldownTimeLeft ?>);
    startCountdown(secondsCountdown, <?php echo $cooldownTimeLeft ?>);
    startCountdownHeader(gtaIcon, gtaCooldown, <?php echo $cooldownTimeLeft ?>);
</script>
<?php } ?>

<div class="functionContainer df g5">
    <div class="fb60" style="align-self: flex-start;">
        <div class="gameBox fb60 df aic">
            <img src="media/gta.png"/>
        </div>
        <div class="gameBox fb60 mt-5 g5 df fdcol">
            <div id="countdownDiv" class="container" style="display: <?php echo $hasCooldown ? 'block' : 'none'; ?>;">
            <div class="df fdrow g5 aic">
                <div class="infoIcon defaultBlue">
                    <iconify-icon icon="svg-spinners:clock"></iconify-icon>
                </div>
                <span>Du må vente <span id="secondsCountdown"><?php echo $cooldownTimeLeft; ?>s</span> før du kan utføre et nytt biltyveri!</span>
            </div>
            </div>
            <table class="w-100" id="gtaDiv" style="display: <?php echo $hasCooldown ? 'none' : 'table'; ?>;">
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
                Et dirkesett kan benyttes for å få 50% mer sjanse for å stjele bilen Ferrari 488 GTB. Et dirkesett kan du få ved å utføre 
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

function runGetData() {
  var script = document.createElement('script');
  script.src = 'js/getData.js';
  document.body.appendChild(script);
}

$(document).ready(function () {
  $('.clickable-tr').off('click').on('click', function () {
    var $this = $(this);
    var clickedIndex = $this.index(); // Get the index of the clicked <tr> among its siblings

    if (!$this.data('clicked')) {
      $this.data('clicked', true);

      $.ajax({
        url: 'game/gta/commitGta.php',
        type: 'POST',
        data: {
          clickedIndex: clickedIndex, // Send the index as data to the server-side
        },
        dataType: 'json',
        success: function (response) {
          createFeedbackDiv(response.message, response.type);
          hideAndShowDiv(gtaDiv, response.cooldown);
          showAndHideDiv(countdownDiv, response.cooldown);
          startCountdown(secondsCountdown, response.cooldown);
          startCountdownHeader(gtaIcon, gtaCooldown, response.cooldown);
          runGetData();
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