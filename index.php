<!DOCTYPE html>
<?php
       include 'function.php';
?>
<html>
    <head>
    </head>
    <body>
    <?php
        $deck = generate();
        dealHand($deck);
    ?>
     </body>
</html>