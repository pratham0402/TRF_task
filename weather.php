<?php

    
   if (isset($_POST['search'])) {
    $city = $_POST['city'];
    // getting entered city    

    $file = file_get_contents("http://api.openweathermap.org/data/2.5/forecast?q=".$city."&units=metric&appid=962f05f10a4d1a9c7f881268a80300f3");
    // getting API content in file which is in JSON form  api.openweathermap.org/data/2.5/forecast?q=London,us&mode=xml

    $data = json_decode($file,true);
    // decoding json file

    $city_name = $data['city']['name'];
    $country = $data['city']['country'];

    //print_r($data);
    //print_r($data['list'][0]['main']);
    //print_r($data['list'][0]['weather']);

    $day1_date = $data['list'][0]['dt_txt'];
    $day1_temp = $data['list'][0]['main']['temp'];
    $day1_humi = $data['list'][0]['main']['humidity'];
    $day1_icon = $data['list'][0]['weather'][0]['main'];
    $day1_pressure = $data['list'][0]['main']['pressure'];

    $day2_date = $data['list'][8]['dt_txt'];
    $day2_temp = $data['list'][8]['main']['temp'];
    $day2_humi = $data['list'][8]['main']['humidity'];
    $day2_icon = $data['list'][8]['weather'][0]['main'];
    $day2_pressure = $data['list'][8]['main']['pressure'];

    $day3_date = $data['list'][16]['dt_txt'];
    $day3_temp = $data['list'][16]['main']['temp'];
    $day3_humi = $data['list'][16]['main']['humidity'];
    $day3_icon = $data['list'][16]['weather'][0]['main'];
    $day3_pressure = $data['list'][16]['main']['pressure'];

    $day4_date = $data['list'][24]['dt_txt'];
    $day4_temp = $data['list'][24]['main']['temp'];
    $day4_humi = $data['list'][24]['main']['humidity'];
    $day4_icon = $data['list'][24]['weather'][0]['main'];
    $day4_pressure = $data['list'][24]['main']['pressure'];

    $day5_date = $data['list'][32]['dt_txt'];
    $day5_temp = $data['list'][32]['main']['temp'];
    $day5_humi = $data['list'][32]['main']['humidity'];
    $day5_icon = $data['list'][32]['weather'][0]['main'];
    $day5_pressure = $data['list'][32]['main']['pressure'];
   }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="weatherreport.css">
    <link rel='icon' href='images/weather.jpg'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>
    <div class="today">
    <p><h4><b><?php echo $city_name."  ".$country; ?></b></h4></p>
    <p><?php 
         if ($day1_icon == 'Rain'){
            echo "<i class='fa fa-bolt' aria-hidden='true'></i>";
         }
         elseif ($day1_icon == 'Clear') {
            echo "<i class='fa fa-sun-o' aria-hidden='true'></i>";
         }
         else {
            echo "<i class='fa fa-cloud' aria-hidden='true'></i>";
         }
    ?></p>
    <p><?php echo "Temperature: ".$day1_temp." °C"; 
            if ($day1_temp < 0) {
                echo "  <i class='fa fa-thermometer-empty' aria-hidden='true'></i>";
            }
            elseif ($day1_temp > 0 and $day1_temp < 15) {
                echo "  <i class='fa fa-thermometer-quarter' aria-hidden='true'></i>";
            }
            elseif ($day1_temp > 15 and $day1_temp < 30) {
                echo "  <i class='fa fa-thermometer-half' aria-hidden='true'></i>";
            }
            elseif ($day1_temp > 30 and $day1_temp < 45) {
                echo "  <i class='fa fa-thermometer-three-quarters' aria-hidden='true'></i>";
            }
            else {
                echo "  <i class='fa fa-thermometer-full' aria-hidden='true'></i>";
            }
    ?></p>
    </div>
    <br>
    <hr>
    <br>
    <div class="block">

        <div class="rem">
        <p><?php echo $day1_icon; ?></p>
        <p><?php echo "Temperature: ".$day1_temp."°C"; ?></p>
        <p><?php echo "Humidity:  ".$day1_humi ;?></p>
        <p><?php echo "Pressure:  ".$day1_pressure." Pa" ?></p>
        <p><?php echo "D/T:  ".$day1_date; ?></p>
        </div>

        <div class="rem">
        <p><?php echo $day2_icon; ?></p>
        <p><?php echo "Temperature: ".$day2_temp." °C"; ?></p>
        <p><?php echo "Humidity:  ".$day2_humi ;?></p>
        <p><?php echo "Pressure:  ".$day2_pressure." Pa" ?></p>
        <p><?php echo "D/T:  ".$day2_date; ?></p>
        </div>

        <div class="rem">
        <p><?php echo $day3_icon; ?></p>
        <p><?php echo "Temperature: ".$day3_temp."°C"; ?></p>
        <p><?php echo "Humidity:  ".$day3_humi ;?></p>
        <p><?php echo "Pressure:  ".$day3_pressure." Pa" ?></p>
        <p><?php echo "D/T:  ".$day3_date; ?></p>
        </div>

        <div class="rem">
        <p><?php echo $day4_icon; ?></p>
        <p><?php echo "Temperature: ".$day4_temp."°C"; ?></p>
        <p><?php echo "Humidity:  ".$day4_humi ;?></p>
        <p><?php echo "Pressure:  ".$day4_pressure." Pa" ?></p>
        <p><?php echo "D/T:  ".$day4_date; ?></p>
        </div>

        <div class="rem">
        <p><?php echo $day5_icon; ?></p>
        <p><?php echo "Temperature: ".$day5_temp."°C"; ?></p>
        <p><?php echo "Humidity:  ".$day5_humi ;?></p>
        <p><?php echo "Pressure:  ".$day5_pressure." Pa" ?></p>
        <p><?php echo "D/T:  ".$day5_date; ?></p>
        </div>

    </div>

</body>
</html>