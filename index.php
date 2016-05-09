<?php // index.php

include 'inc/db.php';
include 'inc/query.php';
include 'inc/fonctions.php';

$movies = randomMovies();
include 'inc/headerFront.php';

?>



<section class="wrapper">

<?php

foreach ($movies as $movie) {
  echo '<a href="details.php?id='.$movie['id'].'&title='.$movie['slug'].'" alt="#">';
  echo '<div class="thumbnail">';
  $filename = 'posters/' . $movie['id'] . '.jpg';
  // test si $filename existe et si elle n'existe pas, la remplace par une image par défaut.
  if(file_exists($filename)){
    echo '<img height="310" width="220" src="posters/'.$movie['id'].'.jpg" alt="#" />';
  }else{
    echo '<img height="310" width="220" src="posters/no-image.jpg" alt="#" />';
  }
  echo '<p>'.$movie['title'].'</p>';
  echo '</div>';
  echo '</a>';
}

?>

<a href="index.php"><button class="buttonbig" type="button" name="button">Voir d'autres flims</button></a>

</section>


<?php
include 'inc/footerFront.php';
?>
