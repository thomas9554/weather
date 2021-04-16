<?php

$url = "http://api.openweathermap.org/data/2.5/weather?q=Lille&units=metric&appid=98244cb6eb021a298d38d5c1773a723a";


 $raw = file_get_contents($url);
    // Décode la chaine JSON
    $json = json_decode($raw);

    // Nom de la ville
    $name = $json->name;
    
    // Météo
    $weather = $json->weather[0]->main;
    

    // Températures
    $temp = $json->main->temp;
    $feel_like = $json->main->feels_like;
    $humidity = $json->main->humidity;

    // Vent
    $speed = $json->wind->speed;
   

    
?>

<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- Boostrap -->
           <script src="https://kit.fontawesome.com/a076d05399.js"></script> 
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <!-- Style -->
            <link rel="stylesheet" href="style.css">
            <title>Météo</title>
        </head>
        <body>
            <div class="container text-center py-5">
                <h1>Météo du jour à <strong><?php echo $name; ?></strong></h1>

                <div class="row justify-content-center align-items-center">
                    <?php 
                        switch($weather)
                        {
                            case "Clear":
                                ?>
                                   <div class="icon sunny">
                                        <div class="sun">
                                            <div class="rays"></div>
                                        </div>
                                    </div>           
                                <?php
                                break;
    
                                case 'Drizzle':
                                ?>
                                <div class="icon sun-shower">
                                    <div class="cloud"></div>
                                        <div class="sun">
                                            <div class="rays"></div>
                                    </div>
                                        <div class="rain"></div>
                                </div>
                                <?php 
                                break;
    
                                case 'Rain':
                                ?>
                                <div class="icon rainy">
                                    <div class="cloud"></div>
                                    <div class="rain"></div>
                                </div>
                                <?php 
                                break;
    
                                case 'Clouds':
                                ?>
                                <div class="icon cloudy">
                                    <div class="cloud"></div>
                                    <div class="cloud"></div>
                                </div>
                                <?php 
                                break;
    
                                case 'Thunderstorm':
                                ?>
                                <div class="icon thunder-storm">
                                    <div class="cloud"></div>
                                        <div class="lightning">
                                            <div class="bolt"></div>
                                            <div class="bolt"></div>
                                    </div>
                                </div>
                                <?php 
                                break;
    
                                case 'Snow':
                                ?>
                                <div class="icon flurries">
                                    <div class="cloud"></div>
                                        <div class="snow">
                                            <div class="flake"></div>
                                            <div class="flake"></div>
                                    </div>
                                </div>
    
                                <?php 
                                break;
                        }
                        ?>

                        <div class="meteo_desc text-left">
                            <h2>
                               <i class="fas fa-thermometer-three-quarters"></i> <?php echo $temp; ?> °C / Ressenti <?php echo $feel_like; ?> °C <br />
                               <i class="fas fa-wind"></i> <?php echo $speed; ?> Km/h  <br>
                               <i class="fas fa-tint"></i>  <?php echo $humidity; ?> % d'humidité
                        </h2>
                    </div>
                </div>
            </div>
        </body>
</html>