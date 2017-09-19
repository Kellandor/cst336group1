<!DOCTYPE html>
<?php
       include 'function.php';
?>
<html>
    <head>
        
    </head>
    <form method="post">
    <input type="submit" name="test" value="RUN" /><br/>
    </form>
    
    <?php
        if(array_key_exists('test',$_POST)){
        displayHand();
        }
        generate();
?>
    
</html>