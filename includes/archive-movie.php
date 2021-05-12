
  <div class=" col-12 col-md-4 col-lg-4" id=<?php echo $movie["id"] ?>>
    <div class="card mb-5">
      <img class="poster-adjusment" src="<?php echo $movie['posterUrl']; ?>" class="card-img-top" alt="<?php echo $movie['title'];?>">
      <div class="card-body">
        <h5 class="card-title"><?php echo $movie['title']; ?></h5>
        <p class="card-text card-overflow"><?php

        $number_characters = strlen($movie['plot']);

        if($number_characters<=100){
          echo $movie['plot'];
        }else{
          $plot_cut = substr($movie['plot'],0, 100);
          echo $plot_cut . '...';
        }
        ?>
        </p>
        <a href="movie.php?parameter_id=<?php echo  $movie["id"]; ?>" class="btn btn-primary">Read more</a>
      </div>
    </div>
  </div>
