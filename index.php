<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <style>
            .rainbow {
  background-image: -webkit-gradient( linear, left top, right top, color-stop(0, #f22), color-stop(0.15, #f2f), color-stop(0.3, #22f), color-stop(0.45, #2ff), color-stop(0.6, #2f2),color-stop(0.75, #2f2), color-stop(0.9, #ff2), color-stop(1, #f22) );
  background-image: gradient( linear, left top, right top, color-stop(0, #f22), color-stop(0.15, #f2f), color-stop(0.3, #22f), color-stop(0.45, #2ff), color-stop(0.6, #2f2),color-stop(0.75, #2f2), color-stop(0.9, #ff2), color-stop(1, #f22) );
  color:transparent;
  -webkit-background-clip: text;
  background-clip: text;
  margin-top: 0px;
  margin-bottom: 0px;
}
.odd{
    background-color: gray;
}
.even{
    background-color: black;
}

td{
    padding: 10px;
}
        </style>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body bgcolor="#000">
        <?php
        $url = 'http://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml';
        $xml = simplexml_load_file($url) or die("Error: Cannot create object");
        
        $date = $xml -> Cube -> Cube -> attributes()[0];
        echo "<h1><span class='rainbow'>Курсы на " .$date."</span></h1>";
        echo "<table>";
        echo "<tr><td><span style='color:white'>Валюта </span></td></tr>";
        foreach ($xml -> Cube -> Cube->Cube as $pair) {
            $attr = $pair->attributes();
            $classname=($count%2 !=0) ? "odd" : "even";
            echo "<tr class='".$classname."'><td><span class='rainbow'>".$attr[0]."-".$attr[1]."</span></td></tr>";
            $count++;
        }
        ?>
    </body>
</html>
