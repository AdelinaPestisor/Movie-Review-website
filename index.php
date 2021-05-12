<?php require_once "includes/header.php";
?>

<!-- Continut Pagina-->
<div class="container">

  <div class="continut-prima-pagina">

    <div class="centrare-elemente">

      <div class="mesaj ">
        <h2 class="heading-resize">
        <span class="dynamic-greetings">
        <?php

        greetings();

        ?>
        </span>
          Welcome to my movie collection!
          If you wanna read the best movie reviews, please push the button!
        </h2>
      </div>

      <div class="buton">
        <a href="movies.php" class="btn" aria-current="page">Go to Movies!</a>
      </div>

    </div>

  </div>

</div>


<?php
require_once "includes/footer.php";
?>