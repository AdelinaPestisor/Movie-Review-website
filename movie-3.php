<?php require_once "includes/header.php";
?>

<!-- Continut Pagina-->
<div class="container">

  <h1 class="movie-title">Mr. Robot</h1>

  <div class="row">

    <div class="col-12  col-md-4 ">

      <img class="movie-pic img-fluid" src="https://resizing.flixster.com/Zvb7CHIzhJBLXd52HlzYq5uYYUQ=/fit-in/1152x864/v1.bjsxODI3NDMyO2o7MTg3Njg7MTIwMDsyOTk0OzIwMDA" alt="img twd">

    </div>

    <div class="col-12  col-md-8 ">

      <h2 class="movie-year">Relase year: 2015</h2>
      <?php
     
  
     $ani = check_old_movie(2015);


     if ($ani >= 7) 
      echo "<h2 class ='badge bg-danger'>OLD Movie </h2>";

      else echo "<h2 class ='badge bg-success'>NEW Movie </h2>";
 
       echo " This movie has les then  7 years old";

      ?>

      <p class="plot">

        Mr. Robot is an American drama thriller television series created by Sam Esmail for USA Network. It stars Rami Malek as Elliot Alderson, a cybersecurity engineer and hacker with social anxiety disorder and clinical depression. Elliot is recruited by an insurrectionary anarchist known as "Mr. Robot", played by Christian Slater, to join a group of hacktivists called "fsociety".[8] The group aims to destroy all debt records by encrypting the financial data of E Corp, the largest conglomerate in the world.

        The pilot premiered via online and video on demand services on May 27, 2015. The first season debuted on USA Network on June 24, 2015, and the second on July 13, 2016. The third season premiered on October 11, 2017. The fourth and final season premiered on October 6, 2019, and concluded on December 22, 2019.

        Mr. Robot has received critical acclaim, particularly for the performances of Malek and Slater, its story and visual presentation, and Mac Quayle's musical score. Esmail has received praise for his direction of the series, having directed three episodes in the first season before serving as the sole director for the remainder of the show. The show received numerous accolades, including two Golden Globe Awards, two Primetime Emmy Awards, and a Peabody Award.

      </p>
      <p class="director">

        <span>Directed by:</span> Sam Esmailg

      </p>
      <p class="time">

       
        <span>Runtime:</span> <?php echo runtime_prettier(49) ?>

      </p>

      <h4>Cast:</h4>

      <ul>
        <li>Rami Malek</li>
        <li>Carly Chaikin</li>
        <li>Portia Doubleday</li>
        <li>Martin Wallström </li>
        <li>Christian Slater </li>
        <li>Michael Cristofer </li>
        <li class="last-item">BD Wong </li>
      </ul>

    </div>
  </div>
</div>

<?php
require_once "includes/footer.php";
?>