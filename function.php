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
        for($i = 0; $i < 4; $i++){
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
            "profilePic" => "./profile/profile.jpg",
            "cards"=> $hand
            );
        }
        for($i = 0; $i < 4; $i++)
        {
            $sum = 0;
            echo "<img src='".${'person'.$i}["profilePic"]."'>";
            for($j=0; $j<count(${'person'.$i}["cards"]); $j++)
            {
                $cards = ${'person'.$i}["cards"][$j];
    
                echo "<img src='".$cards["imgURL"]."'>";
                $sum += $cards["num"];
            }
            echo $sum;
            echo "<br/>";
        }
    }


 
?>