<?php


class Go_Fish{

    public $CARD_DECK = [
    "c1.png","c2.png","c3.png","c4.png","c5.png","c6.png","c7.png","c8.png","c9.png","c10.png","cj.png","ck.png","cq.png",
    "d1.png","d2.png","d3.png","d4.png","d5.png","d6.png","d7.png","d8.png","d9.png","d10.png",
    "h1.png","h2.png","h3.png","h4.png","h5.png","h6.png","h7.png","h8.png","h9.png","h10.png",
    "hj.png","hk.png","hq.png",
    "jb.png","jr.png",
    "s1.png","s2.png","s3.png","s4.png","s5.png","s6.png","s7.png","s8.png","s9.png","s10.png",
    "sj.png","sk.png","sq.png"
    ];
    public $cardScore = ["c"=>0,"d"=>0,"h"=>0,"s"=>0];

    function shuffle(){
        shuffle($this->CARD_DECK);
        return $this;
    }

    function checkCollected($arr){
        $counter = 0;
        if(count($arr) == 4){
            for($i=0;$i<count($arr);$i++){
                if($arr[0][0] == $arr[$i][0]){
                    $counter++;
                }
                if($counter == 4){
                    $this->cardScore["{$arr[0][0]}"] +=1;
                }
            }
        }
        return $this;
    }
    function getTotalScore(){
        $score = 0;
        foreach ($this->cardScore as $key => $value){
            $score += $value;
        }
        return $score;
    }

}


class Player extends Go_Fish{
    public function __construct($name){
        $this->name = $name;
    }
}


