<?php

include 'db/db.php';

?>
<script src="js/hideAndShow.js"></script>

<div class="actionContainer">
    <div class="action visitLink prevent-select" data-page="moneyCollection" data-phpfile="game/moneyCollection/moneyCollection.php" data-targetdiv="#gameContent">
        <div class="actionIcon readyIcon">
            <iconify-icon icon="game-icons:shotgun-rounds"></iconify-icon>
        </div>
        <div class="actionText">
            <p class="actionTextPrimary">Organisert krim</p>
            <p class="actionTextSecondary readyText">Klar</p>
        </div>
    </div>
    <div class="action visitLink prevent-select" data-page="streetrace" data-phpfile="game/streetrace/streetrace.php" data-targetdiv="#gameContent">
        <div class="actionIcon readyIcon">
            <iconify-icon icon="fontisto:drug-pack"></iconify-icon>    
        </div>
        <div class="actionText">
            <p class="actionTextPrimary">Smugling</p>
            <p class="actionTextSecondary readyText">Klar</p>
        </div>
    </div>



    <!-- CRIME START -->
    <?php

    $stmt = $pdo->prepare('SELECT CD_time FROM cooldown WHERE CD_acc_id = :id AND CD_type = "crime"');
    $stmt->execute(['id' => $_SESSION['ID']]);
    $cd_crima = $stmt->fetchColumn();

    $hasCrimeCooldown = $cd_crima > time();
    $cooldownCrimeTimeLeft = $cd_crima - time();

    ?>
    <div class="action visitLink prevent-select" data-page="crime" data-phpfile="game/crime/crime.php" data-targetdiv="#gameContent">
        <div id="crimeIcon" class="actionIcon <?= !$hasCrimeCooldown ? 'readyIcon' : ''; ?>">
            <iconify-icon icon="game-icons:crime-scene-tape"></iconify-icon>    
        </div>
        <div class="actionText">
            <p class="actionTextPrimary">Kriminalitet</p>
            <p class="actionTextSecondary">
                <span class="<?= !$hasCrimeCooldown ? 'readyText' : ''; ?>" id="crimeCooldown">
                    <?= $hasCrimeCooldown ? $cooldownCrimeTimeLeft.'s' : 'Klar'; ?>
                </span>
            </p>
        </div>
    </div>
    <script>

    var crimetHeaderCooldown = document.getElementById('crimeCooldown');
    var crimeIcon = document.getElementById('crimeIcon');  
    
    </script>
    <?php if($hasCrimeCooldown){ ?>
    <script>

        startCountdownHeader(crimeIcon, crimeHeaderCooldown, <?php echo $cooldownTheftTimeLeft ?>);

    </script>
    <?php } ?>
    <!-- CRIME END -->



    <!-- GTA START -->
    <?php

    $stmt = $pdo->prepare('SELECT CD_time FROM cooldown WHERE CD_acc_id = :id AND CD_type = "gta"');
    $stmt->execute(['id' => $_SESSION['ID']]);
    $cd_gta = $stmt->fetchColumn();

    $hasGtaCooldown = $cd_gta > time();
    $cooldownTimeLeft = $cd_gta - time();

    ?>
    <div class="action visitLink prevent-select" data-page="gta" data-phpfile="game/gta/gta.php" data-targetdiv="#gameContent">
        <div id="gtaIcon" class="actionIcon <?= !$hasGtaCooldown ? 'readyIcon' : ''; ?>">
            <iconify-icon icon="game-icons:car-key"></iconify-icon>    
        </div>
        <div class="actionText">
            <p class="actionTextPrimary">Biltyveri</p>
            <p class="actionTextSecondary">
                <span class="<?= !$hasGtaCooldown ? 'readyText' : ''; ?>" id="gtaCooldown">
                <?= $hasGtaCooldown ? $cooldownTimeLeft.'s' : 'Klar'; ?>
            </span>
            </p>
        </div>
    </div>
    <script>

    var gtaHeaderCooldown = document.getElementById('gtaCooldown');
    var gtaIcon = document.getElementById('gtaIcon');  
    
    </script>
    <?php if($hasGtaCooldown){ ?>
    <script>

        startCountdownHeader(gtaIcon, gtaHeaderCooldown, <?php echo $cooldownTimeLeft ?>);

    </script>
    <?php } ?>
    <!-- GTA END -->


    <!-- THEFT START -->
    <?php

    $stmt = $pdo->prepare('SELECT CD_time FROM cooldown WHERE CD_acc_id = :id AND CD_type = "theft"');
    $stmt->execute(['id' => $_SESSION['ID']]);
    $cd_theft = $stmt->fetchColumn();

    $hasTheftCooldown = $cd_theft > time();
    $cooldownTheftTimeLeft = $cd_theft - time();

    ?>
    <div class="action visitLink prevent-select" data-page="theft" data-phpfile="game/theft/theft.php" data-targetdiv="#gameContent">
        <div id="theftIcon" class="actionIcon <?= !$hasTheftCooldown ? 'readyIcon' : ''; ?>">
            <iconify-icon icon="game-icons:crowbar"></iconify-icon>    
        </div>
        <div class="actionText">
            <p class="actionTextPrimary">Brekk</p>
            <p class="actionTextSecondary">
            <span class="<?= !$hasTheftCooldown ? 'readyText' : ''; ?>" id="theftCooldown">
                <?= $hasTheftCooldown ? $cooldownTheftTimeLeft.'s' : 'Klar'; ?>
            </span>
            </p>
        </div>
    </div>
    <script>

    var theftHeaderCooldown = document.getElementById('theftCooldown');
    var theftIcon = document.getElementById('theftIcon');  
    
    </script>
    <?php if($hasTheftCooldown){ ?>
    <script>

        startCountdownHeader(theftIcon, theftHeaderCooldown, <?php echo $cooldownTheftTimeLeft ?>);

    </script>
    <?php } ?>
    <!-- THEFT END -->






    <div class="action visitLink prevent-select" data-page="steal" data-phpfile="game/steal/steal.php" data-targetdiv="#gameContent">
        <div class="actionIcon">
            <!-- <iconify-icon icon="streamline:money-cash-coins-stack-accounting-billing-payment-stack-cash-coins-currency-money-finance"></iconify-icon> -->
            <iconify-icon icon="game-icons:money-stack"></iconify-icon>
        </div>
        <div class="actionText">
            <p class="actionTextPrimary">Stjel</p>
            <p class="actionTextSecondary">55s</p>
        </div>
    </div>
    <div class="action visitLink prevent-select" data-page="jail" data-phpfile="game/jail/jail.php" data-targetdiv="#gameContent">
        <div class="actionIcon">
            <iconify-icon icon="mdi:handcuffs"></iconify-icon>
        </div>
        <div class="actionText">
            <p class="actionTextPrimary">Fengsel</p>
            <p class="actionTextSecondary"><span id="playersInJail">NaN</span> spillere</p>
        </div>
    </div>
</div>

<div id="stockTicker" class="hiddenStockTicker actionContainer stockTicker">
    <div class="ticker-wrap">
    <div class="ticker">
        <div class="ticker__item self-start flex-none">
            <iconify-icon icon="fa6-solid:oil-well"></iconify-icon>
            <span class="stock-name">EQN</span>
            <span class="stock-price">15 000,-</span>
            <span class="stock-growth negative">&#9660; 14 857</span>
        </div>
        <div class="ticker__item self-start flex-none">
        <iconify-icon icon="eos-icons:software"></iconify-icon>
            <span class="stock-name">CRAYN</span>
            <span class="stock-price">$335.18</span>
            <span class="stock-growth positive">&#9650; $0.57</span>
        </div>
        <div class="ticker__item self-start flex-none">
            <span class="stock-name">PLS</span>
            <span class="stock-price">$226.90</span>
            <span class="stock-growth negative">&#9660; $0.57</span>
        </div>
        <div class="ticker__item self-start flex-none">
            <span class="stock-name">BRO</span>
            <span class="stock-price">$335.18</span>
            <span class="stock-growth positive">&#9650; $0.57</span>
        </div>
        <div class="ticker__item self-start flex-none">
            <span class="stock-name">TLSA</span>
            <span class="stock-price">$335.18</span>
            <span class="stock-growth positive">&#9650; $0.57</span>
        </div>
        <div class="ticker__item self-start flex-none">
            <span class="stock-name">BRO</span>
            <span class="stock-price">$335.18</span>
            <span class="stock-growth positive">&#9650; $0.57</span>
        </div>
        <div class="ticker__item self-start flex-none">
            <span class="stock-name">PLS</span>
            <span class="stock-price">$226.90</span>
            <span class="stock-growth negative">&#9660; $0.57</span>
        </div>
        <div class="ticker__item self-start flex-none">
            <span class="stock-name">BRO</span>
            <span class="stock-price">$335.18</span>
            <span class="stock-growth positive">&#9650; $0.57</span>
        </div>
        <div class="ticker__item self-start flex-none">
            <span class="stock-name">PLS</span>
            <span class="stock-price">$226.90</span>
            <span class="stock-growth negative">&#9660; $0.57</span>
        </div>
        <div class="ticker__item self-start flex-none">
            <span class="stock-name">DIA</span>
            <span class="stock-price">$335.18</span>
            <span class="stock-growth positive">&#9650; $0.57</span>
        </div>
        <div class="ticker__item self-start flex-none">
            <span class="stock-name">DIA</span>
            <span class="stock-price">$335.18</span>
            <span class="stock-growth positive">&#9650; $0.57</span>
        </div>
    </div>
    </div>
</div>