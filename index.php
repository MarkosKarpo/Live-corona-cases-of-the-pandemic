<html>
<head>
    <style>
        .words{
            font-family: "Open Sans Semibold", fantasy;
            color: #007bff;
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<div class="container" style = "margin-top : 100px">
    <h2 class="text-center">COVID-19 PANDEMIC</h2>

    <form method = "post" style = "margin-top : 50px">
        <input type ="text" name= "countryname" placeholder = "Enter Country Name" class="form-control" style = "color : #000000">
        <br>
        <input type = submit name="submit" class="form-control btn-primary">
    </form>
</div>
</div>
</body>
</html>
<?php


    if(!empty($_POST['countryname'])){
        $str = $_POST['countryname'];
    }

    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,'https://www.worldometers.info/coronavirus/country/'.$str);
    curl_setopt($ch,CURLOPT_POST,TRUE);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);

    $html = curl_exec($ch);
    curl_close($ch);

    $DOM = new DOMDocument;
    libxml_use_internal_errors(true);
    $DOM->loadHTML($html);

    $elements = $DOM->getElementsByTagName('span');

    echo "<br><br><br><div class='container text-center' style = 'font-weight : bold'>";
    echo "<span style class='words'>CoronaVirus Cases : </span>" . $elements->item(4)->nodeValue . "<br>";

    echo "<span style class='words'>Deaths : </span>" . $elements->item(5)->nodeValue . "<br>";
    echo "<span style class='words'>Recovered : </span>" . $elements->item(6)->nodeValue . "<br>";
    echo "<div>";


?>


