<?php require_once "includes/header.php";
?>
<!-- Continut Pagina-->
<div class="container">

  <div class="movie-title mb-5">

    <h1 class="movies-title-adjust">Movies</h1>

    <?php


  //  $g=reset($movies);
  //  var_dump($g);
  //  var_dump($_GET["genre_type"]);
  //  $bla= in_array($_GET["genre_type"], $movies["genres"]);
  // var_dump($bla);

    ?>

    <div class="row">

    <?php
    // global $genres;


    // var_dump($genres);

    //  foreach ($genres as $genre){
    //   var_dump($genres);

      // if(isset($_GET["genre_type"])=== $genres ){

      //   include 'includes/archive-movie.php';



      // }

    //  }

    ?>

      <?php
      // function get_movies_by_genre ($x){
 
      //   if($_GET["genre_type"] == $x["genres"]){
      //   return true;
      //      } else { return false;}

      // }

      // var_dump($movies);

      // $bla= in_array($_GET["genre_type"],$movies );
      // var_dump($bla);

      // $dupa_gen = array_filter($movies,"get_movies_by_genre");

      // $gen = reset($dupa_gen);


      // var_dump($gen);

      foreach ($movies as $movie) {


      include 'includes/archive-movie.php';
     
      }
      ?>

    </div>
  </div>
</div>

<!-- footer -->

<?php
require_once "includes/footer.php";
?>