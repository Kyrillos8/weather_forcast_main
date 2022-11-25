<?php
$key = '2435715985ee40b6ba6192541222511';
$weather = "";
// $city=str_replace(" ", "", $city);

$url = "https://api.weatherapi.com/v1/current.json?key=" . $key . "&q=" . $_GET[$city=str_replace(" ", "", 'city')] ;
// $_POST['city'];
if(array_key_exists('submit',$_GET)){
    if($_GET['city']){
        $apidata =file_get_contents($url);
        $weatherarray = json_decode($apidata , true);
        $weather = $weatherarray['location']['name'];
        $weatherTemp = $weatherarray['current']['temp_c'];
        $cityTime = $weatherarray['location']['localtime'];
        $weatherIcon = $weatherarray['current']['condition']['icon'];
        $weatherdes = $weatherarray['current']['condition']['text'];
                    }
    if(!$_GET['city']){
        echo 'error';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>weather forcast</title>
</head>
<body>
    <div class="container">
    <form action="" method="GET">
        City: <input type="text" name="city" placeholder="city"><br>
        <button type="submit" name="submit">submit</button>
    </form>
    <h2>
        
        <?php 
        $weather;
        if($weather){
            $u = "https://www.weatherapi.com/";
            echo "City: " .  $weather . "<br>";
            echo "The temp is: " . $weatherTemp . " C" . "<br>";
            echo "Time is: " . $cityTime . "<br>";
            echo "<img src= $weatherIcon alt = $weatherdes />";
        }else{
            echo 'error';
        }
     ?>
     </h2>
     </div>
</body>
</html>