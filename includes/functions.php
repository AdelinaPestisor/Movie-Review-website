<?php

function runtime_prettier($time, $format = '%02d:%02d')
{
    if ($time < 1) {
        return;
    }
    $hours = floor($time / 60);
    $minutes = ($time % 60);
    return sprintf($format, $hours, $minutes);
}

function check_old_movie($an_film)
{
    $today = date("Y");
    $vechime_film = $today - $an_film;
    if ($vechime_film >= 7) return $vechime_film;
    else {
        return false;
    }
}

function greetings()
{
    date_default_timezone_set("Europe/Bucharest");
    $hour = date("H");
    if ($hour < 12 && $hour >= 6) {
        echo "Good morning!";
    } elseif ($hour >= 12 && $hour < 18) {
        echo "Good afternoon!";
    } elseif ($hour >= 18 && $hour < 00) {
        echo "Good evening!";
    } elseif ($hour >= 00 && $hour < 6) {
        echo "Good night!";
    }
    echo "<br>";
}
function find_movie_by_id($film){
    if( intval($_GET['parameter_id'])==$film['id']){
     return true;
    }else{
      return false;
    };  
}

function get_movie_by_s($x){
    global $s;
 
    if(stripos($x["title"], $s ) === false){
        return false;
     } else { return true;}
}

// connect to data base 
// Construim functia in fisierul functions.php
function dbConnect($host = "localhost", $username = "php-user", $password = "php-password", $dbname = "php-proiect"){
	return mysqli_connect($host, $username, $password, $dbname);
}


