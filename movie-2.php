<?php require_once "includes/header.php";
?>
<!-- Continut Pagina-->
<div class="container">

  <h1 class="movie-title">Game of Thrones</h1>

  <div class="row">

    <div class="col-12  col-md-4 ">

      <img class="movie-pic img-fluid" src="https://resizing.flixster.com/fXxgn18EeNfsznp_u4q3eIK8pIw=/fit-in/1152x864/v1.bjsxNjkwNDQ4O2o7MTg3Njc7MTIwMDszMDAwOzIwMDA" alt="img twd">

    </div>

    <div class="col-12  col-md-8 ">

      <h2 class="movie-year">Relase year: 2011</h2>

      <?php


      $ani = check_old_movie(2011);

      if ($ani >= 7) {
        echo "<h2 class ='badge bg-danger'>OLD Movie </h2>";
      } else echo "<h2 class ='badge bg-success'>NEW Movie </h2>";

      echo " This movie has" . " " . check_old_movie(2011) . " " . "years old";

      ?>



      <p class="plot">

        Game of Thrones is an American fantasy drama television series created by David Benioff and D. B. Weiss for HBO. It is an adaptation of A Song of Ice and Fire, a series of fantasy novels by George R. R. Martin, the first of which is A Game of Thrones. The show was shot in the United Kingdom, Canada, Croatia, Iceland, Malta, Morocco, and Spain. It premiered on HBO in the United States on April 17, 2011, and concluded on May 19, 2019, with 73 episodes broadcast over eight seasons.

        Set on the fictional continents of Westeros and Essos, Game of Thrones has a large ensemble cast and follows several story arcs throughout the course of the show. A major arc concerns the Iron Throne of the Seven Kingdoms of Westeros through a web of political conflicts among the noble families either vying to claim the throne or fighting for independence from it. Another focuses on the last descendant of the realm's deposed ruling dynasty, who has been exiled to Essos and is plotting a return to the throne. A third story arc follows the Night's Watch, a military order defending the realm against threats from the North.

        Game of Thrones attracted a record viewership on HBO and has a broad, active, and international fan base. Critics have praised the series for its acting, complex characters, story, scope, and production values, although its frequent use of nudity and violence (including sexual violence) has been subject to criticism. The final season received significant critical backlash for its reduced length and creative decisions, with many considering it a disappointing conclusion. The series received 59 Primetime Emmy Awards, the most by a drama series, including Outstanding Drama Series in 2015, 2016, 2018 and 2019. Its other awards and nominations include three Hugo Awards for Best Dramatic Presentation, a Peabody Award, and five nominations for the Golden Globe Award for Best Television Series – Drama. Many critics and publications have named the show as one of the best television series of all time.

      </p>
      <p class="director">

        <span>Directed by:</span> David Benioff and D.B. Weiss

      </p>
      <p class="time">


        <span>Runtime:</span> <?php echo runtime_prettier(57) ?>

      </p>

      <h4>Cast:</h4>

      <ul>
        <li>Kit Harington</li>
        <li>Peter Dinklage</li>
        <li>Maisie Williams</li>
        <li>Lena Headey </li>
        <li>Emilia Clarke </li>
        <li>Sophie Turner</li>
        <li class="last-item">Michelle Fairley </li>
      </ul>

    </div>
  </div>
</div>

<?php
require_once "includes/footer.php";
?>