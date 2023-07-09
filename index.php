<?php

ob_start();
include 'helpers.php';

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mafioso</title>
        <link rel='stylesheet' href='styling/styling.css' />
        <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.7/dist/iconify-icon.min.js"></script>
        <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
        <link rel="icon" type="image/x-icon" href="media/favicon-32x32.png">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
        <?php 
            include 'content/noInternet.php';  
            include 'content/gameClosed.php'; 
        ?>
        <div class="main">
        <?php

        include 'content/header.php';
        include 'content/underHeader.php';

        ?>
        <div class="df">
            <div class="container">
                <?php include 'content/actionHeader.php' ?>

                <div class="content">
                    <?php include 'content/leftMenu.php' ?>
                    <div class="game">
                        <?php

                        include 'content/gameHeader.php';

                        ?>
                        <div id="gameContent"></div>
                    </div>
                    <?php include 'content/rightMenu.php' ?>
                    <!-- <button onclick="newSnackbar('test', 'success')">Show Snackbar</button> -->
                </div>
            </div>
            <?php include 'content/livechat.php' ?>
        </div>
        <script src="js/checkConnection.js"></script>
        <script src="js/checkClosed.js"></script>
        <script src="js/numberFormat.js"></script>
        <script src="js/suggestions.js"></script>
        <script src="js/snackbar.js"></script>
        <script src="js/livechat.js"></script>
        <script src="js/getData.js"></script>
        <script src="js/router.js"></script>
        <script src="js/stock.js"></script>
        <script src="js/date.js"></script>
        
    </body>
</html>


