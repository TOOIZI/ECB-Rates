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
        <a class="col-md-offset-11" href="index.php">Aesthetics</a>
        <a class="col-md-offset-11" href="indexnoaesthetics.php">no aesthetics</a>
        <?php
        $url = 'http://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml';
        $xml = simplexml_load_file($url) or die("Error: Cannot create object");
        $date = $xml->Cube->Cube->attributes()[0];
        ?>
        <div class="row">
            <div class="col-md-3 col-md-offset-1">
                <h1><span>Курсы на <?php echo $date; ?></span></h1>
                <table class='table table-striped'>
                    <tr><td>Валюта</td><td>Курс</td></tr>
                    <?php
                    foreach ($xml->Cube->Cube->Cube as $pair) {
                        $attr = $pair->attributes();
                        echo "<tr><td>" . $attr[0] . "</td><td>" . $attr[1] . "</td></tr>";
                    }
                    ?>
                </table>
            </div>

            <div class="col-md-3 col-md-offset-1">
                <h2>Kалькулятор</h2>
                <form>
                    <div class="form-group">
                        <label>У меня есть</label>
                        <input type="text" class="form-control" id="inCurrencyAmount">
                    </div>
                    <div class="form-group">

                        <select class="form-control" id="inCurrencyName">
                            <option>EUR</option>
                            <?php
                            foreach ($xml->Cube->Cube->Cube as $pair) :
                                $attr = $pair->attributes();
                                ?>
                                <option value="<?= $attr[0]; ?>"><?= $attr[0]; ?></option>
                            <?php endforeach; ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label>Хочу Получить</label>
                        <select class="form-control" id="outCurrencyName">
                            <option>EUR</option>
                            <?php
                            foreach ($xml->Cube->Cube->Cube as $pair) :
                                $attr = $pair->attributes();
                                ?>
                                <option value="<?= $attr[0]; ?>"><?= $attr[0]; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="button" id="calcBtn" class="btn btn-primary">Посчитать</button>
                    </div>
                    <div class="form-group">
                        <label>Вы получите</label>
                        <input type="text" class="form-control" id="outCurrencyText" readonly>
                    </div>
                </form>

            </div>

        </div>



        <script>
            var rates = {};
            rates['EUR'] = 1;
                        <?php
                foreach ($xml->Cube->Cube->Cube as $pair) :
                $attr = $pair->attributes();
            ?>
            rates ['<?= $attr[0]; ?>'] = <?= $attr[1] ?>;
            <?php endforeach; ?>
                console.log(rates);
                
        </script>
        <script src="js/calc.js"></script>

    </body>
</html>
