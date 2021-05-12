<?php require_once "includes/header.php";
?>
<!-- Continut Pagina-->
<div class="container">

  <h1 class="movie-title">The Walking Dead</h1>

  <div class="row">

    <div class="col-12  col-md-4 ">

      <img class="movie-pic img-fluid" src="https://resizing.flixster.com/i-Pyncfj96IdeH78ga6Xz2u-RUA=/fit-in/1152x864/v1.dDs1NTc2MjY7ajsxODcwOTsxMjAwOzMwMDA7MjAwMg" alt="img twd">

    </div>

    <div class="col-12  col-md-8 ">

      <h2 class="movie-year">Relase year: 2010</h2>
      <?php
      
     $ani = check_old_movie(2010);

     if ($ani >= 7) {
       echo "<h2 class ='badge bg-danger'>OLD Movie </h2>";

     } else echo "<h2 class ='badge bg-success'>NEW Movie </h2>";
     
     echo " This movie has" . " " . check_old_movie(2010) . " " . "years old";
  
      ?>
      

      <p class="plot">

        The Walking Dead takes place after the onset of a worldwide zombie apocalypse. The zombies, colloquially referred to as "walkers", shamble towards living humans and other creatures to eat them; they are attracted to noise, such as gunshots, and to different scents, e.g. humans. Although it initially seems that only humans that are bitten or scratched by walkers can turn into other walkers, it is revealed early in the series that all living humans carry the pathogen responsible for the mutation. The mutation is activated after the death of the pathogen's host, and the only way to permanently kill a walker is to damage its brain or destroy the body, such as by cremating it.

        The series centers on sheriff's deputy Rick Grimes, who wakes up from a coma. While in a coma, the world has been taken over by walkers. He becomes the leader of a group of survivors from the Atlanta, Georgia, region as they attempt to sustain and protect themselves not only against attacks by walkers but by other groups of survivors willing to use any means necessary to stay alive.

      </p>
      <p class="director">

        <span>Directed by:</span> Frank Darabont and Angela Kang

      </p>
      <p class="time">

        <span>Runtime:</span> <?php echo runtime_prettier(45) ?>

      </p>

      <h4>Cast:</h4>
      

      <ul>
        <li>Andrew Lincoln</li>
        <li>Lauren Cohan</li>
        <li>Danai Gurira</li>
        <li>Melissa McBride </li>
        <li>Norman Reedus</li>
        <li>Jeffrey Dean Morgan</li>
        <li class="last-item">Khary Payton </li>
      </ul>

    </div>
  </div>
</div>


<?php
require_once "includes/footer.php";
?>