<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <meta charset="UTF-8">

    </head>
    <body>
        <?php
        $url = 'http://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml';
        $xml = simplexml_load_file($url) or die("Error: Cannot create object");
        $date = $xml->Cube->Cube->attributes()[0];
        
        echo '<div class="row">';
        echo '<div class="col-md-3 col-md-offset-1">';
        echo "<h1><span>Курсы на " . $date . "</span></h1>";
        echo "<table class='table table-striped'>";
        echo "<tr><td>Валюта</td><td>Курс</td></tr>";
        foreach ($xml->Cube->Cube->Cube as $pair) {
            $attr = $pair->attributes();
            echo "<tr><td>" . $attr[0] . "</td><td>" . $attr[1] . "</td></tr>";
        }
        echo '</table>';
        echo '</div>';
        echo '</div>';
        ?>


        <a href="index.php">Aesthetics</a>
        <a href="indexnoaesthetics_1.php">no aesthetics</a>
    </body>
</html>
