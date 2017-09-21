<!DOCTYPE html>
<?php
       include 'function.php';
?>
<html>
    <head>
        <link rel="stylesheet" href="css/css.css">
    </head>
    <body>
    <?php
        $deck = generate();
        dealHand($deck);
    ?>
     </body>
</html>