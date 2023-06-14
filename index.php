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
    <link rel="icon" type="image/x-icon" href="media/favicon-32x32.png">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="main">
        <?php 
        
        include 'content/header.php';
        include 'content/underHeader.php';
        
        ?>

        <div class="container">
            <?php include 'content/actionHeader.php' ?>
    
            <div class="content">
                <?php include 'content/leftMenu.php' ?>
                <div class="game">
                   <?php 
                   
                   include 'content/gameHeader.php';
                   ?>

                <div id="gameContent">

                </div>

                   <?php

                    // if(isset($_GET['page'])){
                    //     if(!is_dir('game/'.$_GET['page'])){
                    //         echo '404';
                    //     } else {
                    //         include 'game/'.$_GET['page'].'/'.$_GET['page'].'.php';
                    //     }
                    // }
                   
                   ?>
                </div>
                <?php include 'content/rightMenu.php' ?>
                <button onclick="newSnackbar('test', 'success')">Show Snackbar</button>
            </div>
        </div>
    </div>
</body>
</html>

  <script src="js/snackbar.js"></script>
  <script src="js/router.js"></script>
  <script src="js/getData.js"></script>
  <script src="js/date.js"></script>
