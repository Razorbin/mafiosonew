<div id="feedback" class="mt-5"></div>

<?php

include '../../db/db.php';
include '../../functions/crimes.php';

$stmt = $pdo->prepare('SELECT CD_time FROM cooldown WHERE CD_acc_id = :id AND CD_type = "crime"');
$stmt->execute(['id' => $_SESSION['ID']]);
$cd_crime = $stmt->fetchColumn();

$hasCooldown = $cd_crime > time();
$cooldownTimeLeft = $cd_crime - time();

?>

<script>
  
var crimeDiv = document.getElementById('crimeDiv');
var countdownDiv = document.getElementById('countdownDiv');
var secondsCountdown = document.getElementById('secondsCountdown');
var crimeCooldown = document.getElementById('crimeCooldown');
var crimeIcon = document.getElementById('crimeIcon');  

</script>

<?php if($hasCooldown){ ?>
<script>
    hideAndShowDiv(crimeDiv, <?php echo $cooldownTimeLeft ?>);
    showAndHideDiv(countdownDiv, <?php echo $cooldownTimeLeft ?>);
    startCountdown(secondsCountdown, <?php echo $cooldownTimeLeft ?>);
    startCountdownHeader(crimeIcon, crimeCooldown, <?php echo $cooldownTimeLeft ?>);
</script>
<?php } ?>

<div class="functionContainer df g5">
    <div class="fb60" style="align-self: flex-start;">
        <div class="gameBox fb100 df aic jcc">
            <img src="media/crime.png"/>
        </div>
        <div class="gameBox mt-5 g5 df fdcol">
            <div id="countdownDiv" class="container" style="display: <?php echo $hasCooldown ? 'block' : 'none'; ?>;">
            <div class="df fdrow g5 aic">
                <div class="infoIcon defaultBlue">
                    <iconify-icon icon="svg-spinners:clock"></iconify-icon>
                </div>
                <span>Du må vente <span id="secondsCountdown"><?php echo $cooldownTimeLeft; ?>s</span> før du kan utføre en ny kriminalitet!</span>
            </div>
            </div>
            <table class="w-100" id="crimeDiv" style="display: <?php echo $hasCooldown ? 'none' : 'table'; ?>;">
                <thead>
                    <tr>
                        <th>Handling</th>
                        <th>Ventetid</th>
                        <th class="tar">Sjanse</th>
                    </tr>
                </thead>
                <tbody class="mb-5">
                    <?php foreach ($crimesData as $item) { ?>
                        <tr class="clickable-tr">
                        <td><?= $item['action'] ?></td>
                        <td class="textSecondary"><?= $item['cooldown'] ?>s</td>
                        <td class="tar"><?= $item['chance'] ?>%</td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="gameBox fb40" style="align-self: flex-start;">
        <div class="fb60" style="align-self: flex-start;">
            <div class="df g5 fdcol pb-10">
                <b>STATISTIKK</b>
                <span class="textSecondary">Vellykkede krim utført i dag: 0</span>
                <br>
                <span class="textSecondary">Vellykkede krim utført: 100</span>
                <span class="textSecondary">Penger tjent på krim: 152 251,-</span>
                <span class="textSecondary">Mislykkede krim utført: 76</span>
                <br>
                <span class="textSecondary">Totalt antall krim utført i dag av alle: 3</span>
            </div>
        </div>
        <div class="fb40" style="align-self: flex-start;">
            <div class="df g5 fdcol">
                <b>TOPP 10 FLEST VELLYKKEDE KRIM</b>
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
        url: 'game/crime/commitCrime.php',
        type: 'POST',
        data: {
          clickedIndex: clickedIndex, // Send the index as data to the server-side
        },
        dataType: 'json',
        success: function (response) {
          createFeedbackDiv(response.message, response.type);
          hideAndShowDiv(crimeDiv, response.cooldown);
          showAndHideDiv(countdownDiv, response.cooldown);
          startCountdown(secondsCountdown, response.cooldown);
          startCountdownHeader(crimeIcon, crimeCooldown, response.cooldown);
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