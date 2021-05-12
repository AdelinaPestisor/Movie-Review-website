<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cristescu Adelina</title>

    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
    <?php
     include "includes/functions.php";
    define('LOGO', 'AC');

    $dinamic_drop_menu = array(
        array(
            "nume" => "TWD",
            "link" => "movie-1.php"
        ),
        array(
            "nume" => "GOT",
            "link" => "movie-2.php"
        ),
        array(
            "nume" => "Mr. Robot",
            "link" => "movie-3.php"
        )

    );

    $dinamic_nav_bar = array(
        array(
            "Nume" => "Home",
            "Link" => "index.php"

        ),
        array(
            "Nume" => "Movies",
            "Link" => "movies.php"

        ),
        array(
            "Nume" => "Contact",
            "Link" => "contact.php"
        )
    );
    ?>

    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light navbar-style">

            <div class="container">

                <a class="navbar-brand navbar-logo" href="index.php"><?php echo LOGO ?></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <?php
                        foreach ($dinamic_nav_bar as $dinamic_nav) {
                        ?>
                            <li class="nav-item  ">
                                <a class="nav-link <?php if ("/demo/" . $dinamic_nav["Link"] == $_SERVER["PHP_SELF"]) {
                                                        echo "active";
                                                    }   ?>" aria-current="page" href="<?php echo $dinamic_nav["Link"] ?>"> <?php echo $dinamic_nav["Nume"] ?> </a>
                            </li>
                        <?php
                        }
        
                        ?>
                        

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" href="movies.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Movie List
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                                <?php
                                foreach ($dinamic_drop_menu as $nav_movies) {
                                ?>

                                    <li><a class="dropdown-item" href="<?php echo $nav_movies["link"] ?>"> <?php echo $nav_movies["nume"] ?></a></li>

                                <?php
                                }
                                ?>

                            </ul>
                        </li>
                    </ul>

                    <?php include 'search-form.php' ?>

                </div>
            </div>
        </nav>
    </header>

     <?php


$link_curent = $_SERVER["REQUEST_URI"];

  if($link_curent !="/demo/index.php" && $link_curent != "/demo/contact.php" ){
    $movies = json_decode(file_get_contents('assets/movies-list-db.json'), true)['movies']; 
    // var_dump($movies);  
    // array(
    //     array(
    //         "title" => "TWD",
    //         "posterUrlr" => "https://resizing.flixster.com/6vBB4OYyoECiBYdIdv8ZqIdiH1g=/fit-in/1152x864/v1.bjsyNjg0OTE0O2o7MTg3Nzg7MTIwMDsxOTIwOzEwODA",
    //         "plot" => "The story of the years that follow after a zombie apocalypse, following a group of survivors led by a former police officer.",
    //         "permalink" => "movie-1.php",
    //         "id" => "1"
    //     ),
    //     array(
    //         "title" => "GOT",
    //         "posterUrl" => "https://resizing.flixster.com/sxS8hzEdR8g1hb2qrfMM61H7jLs=/fit-in/1152x864/v1.bjsxNzA1ODA2O2o7MTg3Njc7MTIwMDsxOTIwOzEwODA",
    //         "plot" => "An adaptation of author George R.R. Martin's \"A Song of Ice and Fire\" medieval fantasies about power struggles among the Seven Kingdoms of Westeros.",
    //         "permalink" => "movie-2.php",
    //         "id" => "2"
    //     ),
    //     array(
    //         "title" => "Mr. Robot",
    //         "posterUrlr" => "https://resizing.flixster.com/2wdhTfOgg0LvtAEawtsgjh-ePG4=/fit-in/1152x864/v1.bjsyMzUxNzAyO2o7MTg3NzQ7MTIwMDszMDAwOzE2NjQ",
    //         "plot" => "Mr. Robot follows Elliot Alderson, a young computer programmer with an anxiety disorder, who is recruited by Mr Robot and his anarchist team of hackers 'fsociety'.",
    //         "permalink" => "movie-3.php",
    //         "id" => "3"
    //     )
    // );

     } 
     
    ?>