<?php // index.php

include 'inc/db.php';
include 'inc/query.php';
include 'inc/fonctions.php';
include 'inc/headerFront.php';

$movies = randomMovies();
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

<button type="button" name="button">Voir plus de flims</button>

</section>


<?php
include 'inc/footerFront.php';
?>
