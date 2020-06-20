<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<div class="container" style = "margin-top : 100px">
    <h2 class="text-center">COVID-19 CORONAVIRUS PANDEMIC</h2>

    <form method = "post" style = "margin-top : 50px">
        <input type = text name = "countryname" placeholder = "Enter Country Name" class="form-control" style = "color : #0088ff">
        <br>
        <input type = submit name="submit" class="form-control btn-primary">
    </form>
</div>

<div class="container text-center" style = "position : absolute ; top : 75% ; left : 8%">
    <h2 class='btn btn-success'>Stay Home | Stay Safe | Save Lives</h2>
    <br>
    <br>
    <h3>Designed And Developed By Pankaj Panjwani</h3>

</div>
</body>
</html>
<?php

if(isset($_POST['submit']))
{

    abc($_POST['countryname']);
}
function abc($str)
{

    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,'https://www.worldometers.info/coronavirus/country/'.$str);
    curl_setopt($ch,CURLOPT_POST,false);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

    $html = curl_exec($ch);
    curl_close($ch);




    $DOM = new DOMDocument;
    libxml_use_internal_errors(true);
    $DOM->loadHTML($html);

//$elements = $DOM->getElementsByClassName("maincounter-number");
    $elements = $DOM->getElementsByTagName('span');



    /*for($i=4;$i<7;$i++)
    {
     echo $elements->item($i)->nodeValue . "<br>";
    }*/
    echo "<br><br><br><div class='container text-center' style = 'font-weight : bold'>";
    echo "<span style = 'color : #0088ff'>CoronaVirus Cases : </span>" . $elements->item(4)->nodeValue . "<br>";
    echo "<span style = 'color : #0088ff'>Deaths : </span>" . $elements->item(5)->nodeValue . "<br>";
    echo "<span style = 'color : #0088ff'>Recovered : </span>" . $elements->item(6)->nodeValue . "<br>";
    echo "<div>";
}

?>