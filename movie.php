<?php require_once "includes/header.php";

$movies_filtered = array_filter($movies, 'find_movie_by_id');

$movie = reset($movies_filtered);
// var_dump($movie);

if (!isset($_GET["parameter_id"]) || $_GET["parameter_id"] != $movie['id'] || empty($_GET["parameter_id"])) {
?>
  <div class="container forms-pages mt-5">
    <h3>
      <strong>Error:</strong> This movie id does not exites. Please go
    </h3>
    <a href="movies.php" type="button" class="btn btn-danger">Back to movies!</a>
  </div>

<?php
} else {
?>
  <!-- Continut Pagina-->
  <div class="container">
    <?php

    ?>

    <h1 class="movie-title"><?php echo $movie['title']; ?></h1>

    <div class="row mb-5">

      <div class="col-12  col-md-4 ">

        <img class="movie-pic img-fluid" src="<?php echo $movie['posterUrl']; ?>" alt="<?php echo $movie['title']; ?>">

      </div>

      <div class="col-12  col-md-8 ">

        <h5>Favorite:</h5>
        <?php
        $file_fav = "assets/movie-favorites.json";
        $content_fav = file_get_contents($file_fav);
        $content_fav_arr = json_decode($content_fav, true);

        // var_dump($content_fav_arr);

        $toggle_value = 1;
        $toggle_btn = "Add movie to favorites";

        if (
          isset($_POST["favorites_toggle"])
          &&
          $_POST["favorites_toggle"] === "1"
          ||
          (isset($_COOKIE["favorites"])
            &&
            in_array($_GET["parameter_id"], json_decode($_COOKIE["favorites"], true))
            &&
            !isset($_POST["favorites_toggle"]))
        ) {
          $toggle_value = 0;
          $toggle_btn = "Delete movie from favorites";
        }

        ?>
        <form action="" method="POST">
          <input type="hidden" name="favorites_toggle" value="<?php echo $toggle_value;  ?>">
          <input type="submit" value="<?php echo $toggle_btn; ?>">
        </form>

        <?php

        if (isset($_COOKIE["favorites"])) {
          $cookie_fav = $_COOKIE["favorites"];
        } else {
          $cookie_fav = '[]';
        }

        $cookie_fav_arr = json_decode($cookie_fav, true);
        // var_dump(  $cookie_fav_arr);

        if (isset($_POST["favorites_toggle"])) {
          $favorites_toggle = $_POST["favorites_toggle"];

          if ($content_fav_arr === null) {
            $content_fav_arr[$_GET["parameter_id"]] = 0;
          } else {
            if (array_key_exists($_GET["parameter_id"], $content_fav_arr)) {
              // e ok, nu fac nimic  
            } else {
              $content_fav_arr[$_GET["parameter_id"]] = 0;
            }
          }
          //identic cu ce e mai sus
          // if(!$content_fav_arr || !array_key_exists($_GET["parameter_id"],$content_fav_arr)){
          //   $content_fav_arr[$_GET["parameter_id"]] = 0;
          // }

          if ($favorites_toggle) {
            //adauga filmul in cookie
            array_push($cookie_fav_arr, $_GET["parameter_id"]);
            $cookie_fav_arr = array_unique($cookie_fav_arr);

            $content_fav_arr[$_GET["parameter_id"]]++;
          } else {
            //sterge filmul din cookie
            if (($key = array_search($_GET["parameter_id"], $cookie_fav_arr)) !== false) {
              unset($cookie_fav_arr[$key]);
            }

            //@todo: daca era 0, -- va genera -1, ceea ce nu e bine.
            if ($content_fav_arr[$_GET["parameter_id"]] > 0) {
              $content_fav_arr[$_GET["parameter_id"]]--;
            }
          }
          file_put_contents($file_fav, json_encode($content_fav_arr));
          setcookie('favorites', json_encode($cookie_fav_arr), time() + 60 * 60 * 24 * 365, "/");
        }

        ?>
        <?php
        if (!$content_fav_arr || !array_key_exists($_GET["parameter_id"], $content_fav_arr)) {
          $nr_adaugari = 0;
        } else {
          $nr_adaugari = $content_fav_arr[$_GET["parameter_id"]];
        }
        ?>

        <?php if (isset($nr_adaugari) && $nr_adaugari > 0) { ?>
          <div class="border border-info my-3 py-2">
            <?php echo $nr_adaugari; ?> times added to favorites
          </div>
        <?php } else { ?>
          <div class="border border-info my-3 py-2">
            Be the first to add this movie to your favorites!
          </div>
        <?php } ?>

        <h2 class="movie-year">Relase year: <?php echo $movie['year']; ?></h2>
        <?php

        $ani = check_old_movie($movie['year']);

        if ($ani >= 7) {
          echo "<h2 class ='badge bg-danger'>OLD Movie </h2>";
        } else echo "<h2 class ='badge bg-success'>NEW Movie </h2>";

        echo " This movie has" . " " . check_old_movie($movie['year']) . " " . "years old";

        ?>

        <p class="plot">
          <?php echo $movie['plot'] ?>

        </p>
        <p class="director">

          <span>Directed by:</span> <?php echo $movie['director']; ?>

        </p>
        <p class="time">
          <span>Runtime:</span> <?php echo runtime_prettier($movie['runtime']) ?>
        </p>

        <p>
          <strong>
            Genres:
          </strong>
          <?php
          $genres = implode(", ", $movie["genres"]);
          echo $genres;
          ?>
        </p>

        <p>
          <strong>Cast:</strong>
        </p>

        <ul>
          <?php
          $actors = explode(", ", $movie['actors']);
          foreach ($actors as $actor) {
          ?>
            <li><?php echo $actor ?></li>

          <?php
          }
          ?>
        </ul>
        <?php
        // Create connection
        $conn =  dbConnect();

        // Check connection
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }
        $reviews_data = [];

        //APELEZ CU TOATE REVIEWS DE LA ACEST FILM 

        $sql = "SELECT nume, email, review FROM Reviews WHERE parameter_id = '" . $_GET['parameter_id'] . "' ";
        $reviews_list = mysqli_query($conn, $sql);

        $reviews_data['count'] = mysqli_num_rows($reviews_list);

        if ($reviews_data['count'] > 0) {
          //transform lista intr un array asociativ
          $reviews_data["list"] =  mysqli_fetch_all($reviews_list, MYSQLI_ASSOC);
          //lista cu emails
          $reviews_email = array_column($reviews_data["list"], 'email');
          // var_dump($reviews_email);
        }
        // leaga formularul de baza de date 
        $sql = "CREATE TABLE IF NOT EXISTS Reviews (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                parameter_id bigint(20) UNSIGNED NOT NULL,
                nume tinytext NOT NULL,
                email varchar(100) NOT NULL,
                review TEXT NOT NULL
                )";

        if (mysqli_query($conn, $sql)) {
          if (isset($_POST['review'])) {
            if (in_array($_POST["email"], $reviews_email)) {
              $reviews_data['response'] = true;
              $reviews_data['message'] = "Looks like you left another review for this movie. You can't leave multiple reviews for the same movie.";
            } else {
              $sql = "INSERT INTO Reviews (parameter_id, nume, email, review)
                                  VALUES ('" . $_GET['parameter_id'] . "', '" . $_POST['nume'] . "','" . $_POST['email'] . "','" . $_POST['review'] . "')";

              if (mysqli_query($conn, $sql)) {
                //s a adaugat in baza de date -afisam succes 
                $reviews_data['response'] = true;
                $reviews_data['message'] = "The form was sent successfully!";
              } else {
                //nu s-a adaugat -  afisam eroare 
                $reviews_data['response'] = false;
                $reviews_data['message'] = "An error occurred. The review could not be added. Try again!";
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }
            }
          }
        }
        ?>

        <?php
        if (isset($reviews_data['response']) && $reviews_data['response'] === true) {
        ?>
          <div class="alert alert-success" role="alert">
            <?php echo $reviews_data['message']; ?>
          </div>
        <?php } else { ?>

          <form action="" method="POST" class="border p-3 bg-light">
            <div class="mb-3">
              <label for="name">Name</label><br>
              <input type="text" class="form-control" id="name" name="nume" required>
            </div>
            <div class="mb-3">
              <label for="email">E-mail</label><br>
              <input type="text" class="form-control" id="email" name="email" required>

            </div>

            <div class="mb-3">
              <label for="review">Review</label><br>
              <textarea class="form-control" name="review" id="review" cols="30" rows="10" required></textarea>
            </div>

            <div class="mb-3">
              <input type="checkbox" value="acceptance" id="acceptance" name="acceptance" required><br>
              <label for="acceptance">I agree to the processing of personal data.</label>

            </div>
            <input type="submit" class="btn btn-primary" value="Send">

          </form>
        <?php
        }
        ?>
        <?php

        if ($reviews_data['count'] > 0) { ?>

          <h4>Reviews:</h4>

          <?php foreach ($reviews_data["list"] as $reviews) { ?>
            <hr>

            <div class="border border-info mb-3 pb-3">
              <div class="h5 mb-2">
                <?php echo ($reviews['nume'] . ": "); ?>
              </div>
              <?php echo  $reviews['review']; ?>
            </div>

          <?php } ?>

        <?php } else { ?>
          <p>
            Be the first to review this movie!
          </p>
        <?php } ?>

      </div>
    </div>
  </div>
<?php
}
require_once "includes/footer.php";
?>