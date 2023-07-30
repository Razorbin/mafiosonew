<div id="feedback" class="mt-5"></div>

<?php

include '../../db/db.php';
include '../../functions/cities.php';

$stmt = $pdo->prepare('SELECT CD_time FROM cooldown WHERE CD_acc_id = :id AND CD_type = "airport"');
$stmt->execute(['id' => $_SESSION['ID']]);
$cd_airport = $stmt->fetchColumn();

$stmt = $pdo->prepare('SELECT city FROM user WHERE id = :id');
$stmt->execute(['id' => $_SESSION['ID']]);
$user_row = $stmt->fetchColumn();

$hasCooldown = $cd_airport > time();
$cooldownTimeLeft = $cd_airport - time();

if ($user_row >= 0 && $user_row < count($cities)) {
    unset($cities[$user_row]);
}

$filteredCities = array_values($cities);

?>

<script>
  
var airportDiv = document.getElementById('airportDiv');
var countdownDiv = document.getElementById('countdownDiv');
var secondsCountdown = document.getElementById('secondsCountdown');
var airportCooldown = document.getElementById('airportCooldown');
var airportIcon = document.getElementById('airportIcon');  

</script>

<?php if($hasCooldown){ ?>
<script>
    hideAndShowDiv(airportDiv, <?php echo $cooldownTimeLeft ?>);
    showAndHideDiv(countdownDiv, <?php echo $cooldownTimeLeft ?>);
    startCountdown(secondsCountdown, <?php echo $cooldownTimeLeft ?>);
    startCountdownHeader(airportIcon, airportCooldown, <?php echo $cooldownTimeLeft ?>);
</script>
<?php } ?>

<div class="functionContainer df g5">
    <div class="fb60" style="align-self: flex-start;">
        <div class="gameBox fb100 df aic jcc">
            <img src="media/game/airport.png"/>
        </div>
        <div class="gameBox mt-5 g5 df fdcol">
            <div id="countdownDiv" class="container" style="display: <?php echo $hasCooldown ? 'block' : 'none'; ?>;">
                <div class="df fdrow g5 aic">
                    <div class="infoIcon defaultBlue">
                        <iconify-icon icon="svg-spinners:clock"></iconify-icon>
                    </div>
                    <span>Du må vente <span id="secondsCountdown"><?php echo $cooldownTimeLeft; ?>s</span> før du kan reise!</span>
                </div>
            </div>
            <?php 
            
            $elementsPerRow = 2; // Number of elements to display per "fdrow" div
            $count = 0; // Initialize the counter variable
            
            for ($i = 0; $i < count($filteredCities); $i++) {
                // Open a new "fdrow" div when the counter reaches 0
                if ($count === 0) {
                    echo '<div class="df fdrow">';
                }
            
                ?>
                <div class="fb50">
                    <?= $filteredCities[$i] ?>
                </div>
                <?php
            
                // Increment the counter
                $count++;
            
                // Close the current "fdrow" div and reset the counter when it reaches the desired elements per row
                if ($count === $elementsPerRow) {
                    echo '</div>';
                    $count = 0;
                }
            }
            
            ?>
            </div>
        </div>
    </div>
    <div class="gameBox fb40" style="align-self: flex-start;">
        <div class="fb60" style="align-self: flex-start;">
            <div class="df g5 fdcol pb-10">
                <b>Flyplassen i {BY}</b>
                <span class="textSecondary">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vitae luctus mi, lacinia suscipit tortor. In accumsan sit amet tortor id pretium. Vivamus ipsum ipsum, tempus vel vulputate a, pretium sed mauris. Quisque lacus elit, tincidunt vitae facilisis a, sagittis id lectus. Quisque leo quam, commodo id augue egestas, placerat semper neque. Nullam faucibus erat eget felis lacinia vulputate. Aenean tempus venenatis elementum. Aenean placerat risus eu quam tempor imperdiet.

Praesent semper iaculis dolor ut varius. Suspendisse felis velit, vestibulum nec est vitae, laoreet hendrerit magna. Nunc tempor ac ante eu laoreet. Integer rhoncus porttitor ante quis auctor. In at tristique quam. Suspendisse tempor ex id nunc finibus lacinia. Phasellus sapien nibh, porttitor id ante ac, aliquam mattis nisi.</span>
               
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
        url: 'game/airport/travel.php',
        type: 'POST',
        data: {
          clickedIndex: clickedIndex, // Send the index as data to the server-side
        },
        dataType: 'json',
        success: function (response) {
          createFeedbackDiv(response.message, response.type);
          hideAndShowDiv(airportDiv, response.cooldown);
          showAndHideDiv(countdownDiv, response.cooldown);
          startCountdown(secondsCountdown, response.cooldown);
          startCountdownHeader(airportIcon, airportCooldown, response.cooldown);
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