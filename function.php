<?php
  function mapCards($num){
      $cardValue = ($num % 13) + 1;
      $cardSuit = floor($num/13);
      
      $suitStr = "";
      
      switch($cardSuit)
      {
            case 0:
                $suitStr = "spades";
                break;
            case 1:
                $suitStr = "clubs";
                break;
            case 2:
                $suitStr = "diamonds";
                break;
            case 3:
                $suitStr = "hearts";
                break;
      }
      
      $card = array(
          'num' => $cardValue,
          'suit' => $cardSuit,
          'imgURL' => "./cards/".$suitStr."/".$cardValue.".png");
          
    return $card;
  }
  
  function generate(){
      
    $cards = array();
    
    for($i = 0; $i < 52; $i++)
        array_push($cards,$i);
        
    shuffle($cards);
    
    return $cards;
  }
  
  function printDeck($deck)
  {
      for($i =0; $i < count($deck);$i++)
      {
          $cardNum = $deck[$i];
          $card = mapCards($cardNum);
          
        //   echo "imgURL: ".$card["imgURL"]."<br/>";
          echo '<img src='.$card["imgURL"].'><br/>';
      }
  }
    function deal($deck)
    {
        $hand = array();
        $sum = 0;
        while($sum <= 37)
        {
            $cardnumber = array_pop($deck);
            $card = mapCards($cardnumber);
            array_push($hand, $card);
            $sum += $card["num"];
        }
        
        return $hand;
    }
    function dealHand($deck){
        $totalSum = 0;
        $winnerIndex;
        $winnerSum;
        
        echo "<h1>Silverjack</h1>";
        
        for($i = 0; $i < 4; $i++) {
            $hand = array();
            $sum = 0;
            
            while($sum <= 37)
            {
                $cardnumber = array_pop($deck);
                $card = mapCards($cardnumber);
                array_push($hand, $card);
                $sum += $card["num"];
            }
            
            ${'person'.$i} = array(
                "profilePic" => "./profile/profile.". ($i + 1) . ".jpg",
                "cards" => $hand,
                "sum" => 0
                );
        }
        
        $winnerSum = 0;
        for($i = 0; $i < 4; $i++)
        {
            $sum = 0;
            echo "<img id='profile' src='".${'person'.$i}["profilePic"]."'>";
            for($j=0; $j<count(${'person'.$i}["cards"]); $j++)
            {
                $cards = ${'person'.$i}["cards"][$j];
    
                echo "<img src='".$cards["imgURL"]."'>";
                $sum += $cards["num"];
            }
            
            ${'person'.$i}["sum"] = $sum;
            
            if (closerTo42($sum, $winnerSum)) {
                $winnerIndex = $i;
                $winnerSum = $sum;
            }
                
            echo "<div id='sum'>" . $sum;
            echo "</div><br/>";
            $totalSum += $sum;
        }
        
        echo "<br/>";
        echo "<div class = 'winner'>";
        echo "<h3>And the winner, with $totalSum points, is!</h3>";
        echo "<figure>";
        echo "<img src='".${'person'.$winnerIndex}["profilePic"]."'>";
        echo "<figcaption>";
        echo "Assembly Unit Number: " . rand();
        echo "</figcaption>";
        echo "</figure>";
        echo "</div>";
        
    }
    
    function closerTo42($challenger, $JohnCena) {
        // get their absolute distance from 42. 0 means they got 42
        $cDist = abs(42 - $challenger);
        $jDist = abs(42 - $JohnCena);
        
        // did the challenger beat JOHN CENA?! https://www.youtube.com/watch?v=RZIhpba83hY
        //                                     https://www.youtube.com/watch?v=wRRsXxE1KVY
        return $cDist <= $jDist;
    }
 
?>