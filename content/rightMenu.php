<?php

include 'functions/ranks.php';

$stmt = $pdo->prepare('SELECT username FROM user WHERE id = :id');
$stmt->execute(['id' => $_SESSION['ID']]);
$username = $stmt->fetchColumn();

?>

<div class="rightMenu">
    <div class="gameBox">
        <div class="df g5 fdcol">
            <div class="df userInfo jcsb">
                <h5 class="pointer-hover visitLink df aic g5" data-page="profile&user=<?= $username ?>" data-phpfile="game/profile/profile.php?user=<?= $username ?>" data-targetdiv="#gameContent">
                    <iconify-icon class="readyIcon" icon="mdi:user"></iconify-icon>
                    <?= $username ?>
                </h5>
                <span id="rank" class="textSecondary">NaN</span>
            </div>
            <div class="rankbar">
                <div id="rankbar" class="fill" style="width: 0%;"></div>
            </div>
            <div class="df jcsb progressInfo">
                <span id="progressPercentage" class="textSecondary fontSmall"></span>
                <span id="progressExp" class="textSecondary fontSmall"></span>
            </div>
        </div>
    </div>
    <div class="gameBox mt-5">
        <div class="df g5 fdcol">
            <div class="df userInfo jcsb">
                <h5 class="pointer-hover visitLink df aic g5" data-page="hospital" data-phpfile="game/hospital/hospital.php" data-targetdiv="#gameContent">
                    <iconify-icon icon="mdi:heart"></iconify-icon>
                    Helse
                </h5>
                <span id="healthAmount" class="textSecondary">NaN</span>
            </div>
            <div class="healthbar">
                <div id="healthbar" class="fill" style="width: 0%;"></div>
            </div>
        </div>
    </div>
</div>