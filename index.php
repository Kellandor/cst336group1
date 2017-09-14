<!DOCTYPE html>
<html>
    <head>
        
    </head>
    
    <?php
        //this is phuc branch
        echo "omae wa mou shindeiru ";
        
        $person = array(
            "name"=> "NANI",
            "imgurl"=> "card_back.png",
            "cards"=> array(
                array(
                    "suits"=> "hearts",
                    "value"=> "7"
                    ),
                array(
                    "suits"=> "spades",
                    "value"=> "13"
                    )
                )
            );
            
        echo $person["name"]." ".$person["imgurl"];
        echo "<br/>";
        for($i=0; $i<count($person["cards"]); $i++)
        {
            $cards = $person["cards"][$i];
            $imgurl = "./cards/".$cards["suits"]."/".$cards["value"].".png";
            // echo $cards["value"]." of ".$cards["suits"];
            echo "<img src='$imgurl'>";
        }
    ?>
    
</html>