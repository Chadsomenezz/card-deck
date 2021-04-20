<?php include "functions.inc.php";

$player1 = new Player("Richard");

if(isset($_GET["cards1"])){
    session_start();
    if(!isset($_SESSION["score"])){
        $_SESSION["score"] = 0;
    }
    $player1->checkCollected([$_GET["cards1"],$_GET["cards2"],$_GET["cards3"],$_GET["cards4"]]);
    $_SESSION["score"] += $player1->getTotalScore();
    $player1->shuffle();
}

if(isset($_GET["shuffle"]) && $_GET["shuffle"] === "yes"){
    $player1->shuffle();
}


if(isset($_SESSION["score"]) && $_SESSION["score"] > 4){
    session_destroy();

    echo "<h2>You Win!</h2>";

    session_start();
    $_SESSION["score"] = 0;


}

?>



<HTML>
<HEAD>
    <style>
        .goUp{
            margin-bottom: 40px;
            transition: all .2s ease-in-out;
        }
    </style>
<META NAME="description" CONTENT="A full deck of Playing Card Icons">
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=ISO-8859-1">
<META NAME="keywords" CONTENT="Playing Cards, deck of cards, deck, cards, icons, images">
<TITLE>Playing Cards</TITLE>
</HEAD>

<h2>Score: <?= ( isset($_SESSION["score"]) ) ? $_SESSION["score"] : "0"; ?> </h2>
<div>
    <a href="index.php?shuffle=yes" id="shuffle">Shuffle</a>
</div>

<BODY BGCOLOR=#006633  TEXT=#e1ffd7 LINK=#FFFFFF VLINK=#FFFFFF>
<CENTER>
<TABLE BORDER=0 CELLSPACING=10 CELLPADDING=10>
<TR>
<TD>
<IMG SRC="b1pt.png"><BR>
<IMG SRC="b1fh.png"><BR>
<IMG SRC="b1pb.png"><BR>
</TD>
<TD>
<IMG SRC="b1pl.png">
<IMG SRC="b1fv.png">
<IMG SRC="b1pr.png">
</TD>
<TD><IMG SRC="jb.png"></TD>
<TD VALIGN=CENTER><STRONG>Playing Cards</STRONG></TD>
<TD><IMG SRC="jr.png"></TD>
<TD>
<IMG SRC="b2pl.png">
<IMG SRC="b2fv.png">
<IMG SRC="b2pr.png">
</TD>
<TD>
<IMG SRC="b2pt.png"><BR>
<IMG SRC="b2fh.png"><BR>
<IMG SRC="b2pb.png"><BR>
</TD>
</TR>
<TR></TR>
</TABLE>
<TABLE>

    <TR>
        <?php
            for($i=0;$i<13;$i++){

                echo "<td align='center'><img src='{$player1->CARD_DECK[$i]}' alt='card' data-name='{$player1->CARD_DECK[$i]}' class='cards'></td>";
            }
        ?>
    </TR>

</TABLE>
<TABLE BORDER=0 CELLSPACING=10>
<TR>
<TD ALIGN=CENTER><FONT SIZE=2><BR>
        <div>
            <a href="#" id="check">Check</a>
        </div>
</FONT></TD>
</TR>
</TABLE>

    <form action=""></form>
    <script>
        let cards = document.querySelectorAll(".cards");
        let check = document.querySelector("#check");
        let selectedCard = [];
        document.addEventListener("click",(e)=>{
            if(e.target.classList.contains("cards")){
                e.target.classList.toggle("goUp");
                if(selectedCard.length < 4){
                    selectedCard.push(e.target.getAttribute("data-name"));
                    check.setAttribute("href",`index.php?cards1=${selectedCard[0]}&cards2=${selectedCard[1]}&cards3=${selectedCard[2]}&cards4=${selectedCard[3]}`)
                }
            }
        })



    </script>
</BODY>
</HTML>
