<?php
    function displayHand(){
        $person = array(
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
        for($i=0; $i<count($person["cards"]); $i++)
        {
            $cards = $person["cards"][$i];
            $imgurl = "./cards/".$cards["suits"]."/".$cards["value"].".png";
            echo "<img src='$imgurl'>";
        }
    }
  
  function deck(){
      $cards = array();
      
      for($i = 0; $i < 52; $i++)
      {
          array_push($cards,$i);
      }
      
      shuffle($cards);
      
      return $cards;
  }  
  
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
      
      echo "$cardValue<br/>";
      echo "$cardSuit<br/>";
      echo "$suitStr<br/>";
      
      $imgurl = "./cards/".$suitStr."/".$cardValue.".png";
      echo "<img src='$imgurl'><br/>";
      
      $cards = array(
          'num' => $cardValue,
          'suit' => $cardSuit,
          'imgURL' => "./cards/".$suitStr."/".$cardValue.".png");
  }
  
  function generate(){
    $deck = deck();
      
    shuffle($deck);
    
    for($i = 0; $i < count($deck); $i++)
        mapCards(array_pop($deck));
  }

?>