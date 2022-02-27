<?php
    function afficherPiece($indexPiece, $couleur){
        
        $pieces = ["tour", "cavalier", "fou", "reine", "roi", "fou", "cavalier", "tour", "pion", "pion", "pion", "pion", "pion", "pion", "pion", "pion"];
        
        $piece = $pieces[$indexPiece];
        
        if($couleur == "BLANC"){
            if($piece == "reine"){
                $piece = "roi";
            }
            elseif($piece == "roi"){
                $piece = "reine";
            }
        }
        
        return $piece." ".$couleur;
    }

    function generatePlateau(){
        
        $html = "";
        $classeCase = "case-blanche";
        
        for($i = 1; $i <= 64; $i++){
            
            $html.= "<div class='case ".$classeCase."'>";
            if($i <= 16){
                $html.= afficherPiece($i-1, "NOIR");
            }
            if($i > 48){
                $html.= afficherPiece(64-$i, "BLANC");
            }
            $html.= "</div>";
            if($i % 8 != 0){
                $classeCase = ($classeCase == "case-blanche") ? "case-noire" : "case-blanche";
            }
        }
        
        return $html;
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHESS GAME</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="plateau">
        <?= generatePlateau();?>
    </div>
    
</body>

</html>