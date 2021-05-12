
<?php require_once "includes/header.php";
?>

<?php

$link_curent = $_SERVER["REQUEST_URI"];

  if($link_curent !="/demo/index.php" && $link_curent != "/demo/contact.php" ){
    $genres = json_decode(file_get_contents('assets/movies-list-db.json'), true)['genres']; 

    var_dump($genres);
?>
<ul>
<?php

foreach ($genres as $genre){
    // var_dump()
    ?>

  <li><a href = "movies.php?genre_type=<?php echo $genre ?>"><?php echo $genre ?></a> </li>


    <?php
}
?>
</ul>



<?php
  }
?>
<?php
require_once "includes/footer.php";
