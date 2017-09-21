<!DOCTYPE html>
<?php
       include 'function.php';
?>
<html>
    <head>
        <link rel="stylesheet" href="css/css.css">
        <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    </head>
    <body>
    <?php
        $deck = generate();
        dealHand($deck);
    ?>
     </body>
</html>