<?php require_once('includes/header.php'); ?>
<?php require_once('includes/functions.php'); ?>


<?php
$movies_filtered = array_filter($movies, 'find_movie_by_id');

$film = reset($movies_filtered);
?>

<div class="container">
  <h1><?php echo $film['title']; ?> </h1>
  <div class="row">
    <div class="col-md-3">
      <img src="<?php echo $film['posterUrl']; ?> " alt="Poster image" class="poster">
    </div>
    <div class="col-md-9" class="text-movie">
      <div class="text-movie">
        <p><?php echo $film['plot']; ?></p>

        <?php
        $toggle_value = 1;
        $toggle_btn = "Add to favorites!";
        if (
              (
                
                isset($_POST['favorites_toggle'])
                &&
                $_POST['favorites_toggle'] === '1'
              ) 
              || 
              (
                isset($_COOKIE['favorites']) 
                && 
                in_array($_GET['movie_id'], json_decode($_COOKIE['favorites'],true))
                &&
                 !isset($_POST['favorites_toggle'])
              )
            ) {
          
            $toggle_value = 0;
            $toggle_btn = "Remove favorites!";
          }
         ?>

        <form action="" method="POST">
          <input type="hidden" name="favorites_toggle" value="<?php echo $toggle_value; ?>">
          <input type="submit" name="trimite" value="<?php echo $toggle_btn; ?>">
        </form>

        <?php

        if (isset($_COOKIE['favorites']))
          $cookie_value = $_COOKIE['favorites'];
        else
          $cookie_value = '[]';

          var_dump($_COOKIE['favorites']);
        
          var_dump($cookie_value);

        $cookie_value_arr = json_decode($cookie_value, true);
            //var_dump($cookie_value_arr);
        
            if (isset($_POST['favorites_toggle']))  
        {
          $favorites_toggle = $_POST['favorites_toggle'];

          
          if ($favorites_toggle) 
          {
            //aici adaug filmul in cookie
            array_push($cookie_value_arr, $_GET['movie_id']);
            $cookie_value_arr = array_unique($cookie_value_arr);
          } else {
            //aici sterg filmul din cookie
            if (($key = array_search($_GET['movie_id'], $cookie_value_arr)) !== false) {
              unset($cookie_value_arr[$key]);
            }
          }
          setcookie('favorites', json_encode($cookie_value_arr), time() + 60 * 60 * 24 * 365, '/');
        }

        //var_dump($cookie_value_arr);
        ?>


        <strong>Genre: </strong>
        <?php
        echo implode($film['genres'], ', ');
        ?> <br>
        <strong>Director: </strong> <?php echo $film['director']; ?> <br>
        <strong>Actors: </strong>
        <?php
        $actors = explode(",", $film['actors']);
        if (!empty($film['actors'])) {
          echo '<ul>';
          foreach ($actors as $actor) {
            printf('<li>%s</li>', $actor);
          }
          echo '</ul>';
        }
        ?>
        <strong>Year: </strong> <?php echo $film['year']; ?>
        <?php
        if (check_old_movie($film['year']) != -1) {
        ?>
          <span class="badge badge-success">New</span>
        <?php
          if (check_old_movie($film['year']) == 0)
            echo "New movie: less than a year old!";
          else
            echo "New movie: " . check_old_movie($film['year']) . " year(s) old!";
        }
        ?><br>
        <strong>Runtime: </strong> <?php echo runtime_prettier($film['runtime']); ?><br>
      </div>
    </div>
  </div>
</div>

<?php require_once('includes/footer.php'); ?>