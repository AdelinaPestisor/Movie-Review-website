<?php require_once "includes/header.php";?>

<!-- Continut Pagina-->
<div class="container">
 <?php if(isset($_GET["s"])){
     $s = $_GET["s"];
     ?>
      <div class="forms-pages" >
        <h2 class="heading-resize mt-5 mb-5">Search results for: <i> <?php echo $s; ?></i></h2>
      </div>
      <hr>
     <?php 
     $number_letter = strlen($_GET["s"]);

     if($number_letter <= 3){
       ?>   
         <h2 class="mt-5 "> Search phrase too short!</h2>
         <p>Try again.</p>
         <div class="mb-5" style="max-width:400px;">
         <?php include ('includes/search-form.php'); ?>
         </div>
    <?php } ?>
    <?php
     $movies_filtered_by_s = array_filter($movies, "get_movie_by_s");
            
      if(count($movies_filtered_by_s) === 0){
            echo "<h1>We do not have this movie</h1>";
           } else {
             ?>

        <div class="row">
          <?php foreach ($movies_filtered_by_s as $movie) {
                require 'includes/archive-movie.php';
              }?>
        </div>
    <?php } ?>

<?php }else{  ?>
    
    <div class="mb-5 forms-pages">
     <h2 class="mt-5"> Invalid search phrase!</h2>
     <p>Try again.</p>

     <?php include ('includes/search-form.php'); ?>
     </div>

<?php } ?>
</div>
<?php

require_once ("includes/footer.php");
